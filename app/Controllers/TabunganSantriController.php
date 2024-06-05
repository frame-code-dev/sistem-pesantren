<?php

namespace App\Controllers;

use App\Helpers\Helpers;
use App\Models\Santri_model;
use App\Models\TransaksiModel;
use Dompdf\Dompdf;

class TabunganSantriController extends BaseController
{
	protected $helpers = ['form'];

	private $transaksi;
	private $santri;
	private $db;
	public function __construct()
	{
		$this->santri = new Santri_model();
		$this->transaksi = new TransaksiModel();
		$this->db = \Config\Database::connect();

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{
		$santri = $this->request->getGet("santri");
		$data["santriId"] = $santri ?? 0;
		$data["filter"] = false;
		$data["santri"] = $this->santri->getSantriAktifAlumni()->getResultArray();
		if ($santri) {

			$data["filter"] = true;
			$data["pengeluaran"] = $this->transaksi->getPengeluaranById($santri)->getResultArray();
			$data["pemasukan"] = $this->transaksi->getPemasukanById($santri)->getResultArray();
		}
		return view("backoffice/tabungan-santri/index", $data);
	}


	public function store()
	{
		$nominal = Helpers::replaceRupiah($this->request->getPost("nominal"));
		$tanggal = $this->request->getPost("tanggal");
		$kategori = $this->request->getPost("kategori");
		$santriId = $this->request->getPost("santri");
		$userId = session()->get("user_id");
		$this->db->transBegin();
		try {
			$data = [
				"kategori" => $kategori,
				"santri_id" => $santriId,
				"nominal" => $nominal,
				"no_transaksi" => $this->transaksi->generateKode(),
				"jenis_id" => 4,
				"tanggal_bayar" => $tanggal,
				"user_id" => $userId,
			];
			$this->transaksi->storePengeluaran($data);
			$this->db->transCommit();

			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Tabungan santri berhasil ditambahkan');
			return redirect()->back();
		} catch (\Throwable $th) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Tabungan santri gagal ditambahkan, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Tabungan santri gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}
	public function update($id)
	{
		$nominal = Helpers::replaceRupiah($this->request->getPost("nominal"));
		$tanggal = $this->request->getPost("tanggal");
		$kategori = $this->request->getPost("kategori");
		$santriId = $this->request->getPost("santri");
		$userId = session()->get("user_id");
		$this->db->transBegin();
		try {
			$data = [
				"nominal" => $nominal,
				"tanggal_bayar" => $tanggal,
			];
			$this->transaksi->updatePengeluaran($data, $id);
			$this->db->transCommit();

			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Tabungan santri berhasil diubah');
			return redirect()->back();
		} catch (\Throwable $th) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Tabungan santri gagal diubah, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Tabungan santri gagal diubah, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}


	public function cetak($idSantri, $idTransaksi, $kategori)
	{
		$filename = "$kategori Santri ";
		$transaksi  = $this->transaksi->where("id", $idTransaksi)->first();
		$data["tanggal"] = Helpers::formatDate($transaksi["tanggal_bayar"]);
		$data["nama"] = $this->santri->getById($idSantri)->nama;
		$data["nominal"] = Helpers::formatRupiah($transaksi["nominal"]);
		$data["title"] = $filename;
		// instantiate and use the dompdf class
		$dompdf = new Dompdf();

		// load HTML content
		$dompdf->loadHtml(view('backoffice/tabungan-santri/nota', $data));

		// (optional) setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');
		// render html as PDF
		$dompdf->render();

		// output the generated pdf
		ob_clean();
		$dompdf->stream($filename, ["Attachment" => true]);
		exit();
	}
}
