<?php

namespace App\Controllers;

use App\Helpers\Helpers;
use App\Models\Santri_model;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
	protected $helpers = ['form'];
	protected $transaksi;
	protected $santri;
	protected $validation;
	protected $db;
	public function __construct()
	{
		$this->transaksi = new TransaksiModel();
		$this->santri = new Santri_model();
		$this->validation = \Config\Services::validation();
		$this->db = \Config\Database::connect();

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function replaceRupiah($rupiah)
	{
		$nominal = str_replace(['Rp.', '.', ' '], '', $rupiah);
		return $nominal;
	}

	public function kode_transaksi()
	{
		$this->transaksi->generateKode();
	}

	public function index()
	{
		$data["tittle"] = "Pemasukan";
		$data["curennt_page"] = "Pendaftaran";
		$data["data"] = $this->transaksi->getPendaftaran()->getResultArray();
		return view("backoffice/pendaftaran/index", $data);
	}
	public function create()
	{
		$status_santri = 'belum_registrasi';
		$countsantri = $this->santri->countSantri($status_santri);
		if ($countsantri == 0) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Tidak ada santri yang belum membayar registrasi, Silahkan tambahkan santri terlebih dahulu.');
			return redirect()->to('dashboard/pendaftaran');
		}

		$data["title"] = "Pemasukan";
		$data["current_page"] = "Pendaftaran";
		$data["santri"] = $this->santri->getSantriRegistrasi()->getResultArray();


		return view("backoffice/pendaftaran/create", $data);
	}

	public function store()
	{
		$santri_id = $this->request->getPost("santri");
		$tanggal_bayar = $this->request->getPost("tanggal_bayar");

		$nominal = $this->replaceRupiah($this->request->getPost("nominal"));

		$userId = session()->get("user_id");
		$userId = 1;

		$valid = $this->validateData([
			"santri" => $santri_id,
			"tanggal_bayar" => $tanggal_bayar,
			"nominal" => $nominal
		], $this->transaksi->rulesPendaftaran());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		$this->db->transBegin();
		try {
			$data = [
				"kategori" => "pemasukan",
				"santri_id" => $santri_id,
				"nominal" => $nominal,
				"no_transaksi" => $this->transaksi->generateKode(),
				"jenis_id" => 1,
				"tanggal_bayar" => $tanggal_bayar,
				"user_id" => $userId,
			];

			$status_santri = 'belum_registrasi_ulang';

			$this->santri->updateStatus($santri_id, $status_santri);
			$this->db->transCommit();

			$this->transaksi->storePendaftaran($data);
			$this->db->transCommit();

			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Pendaftaran santri berhasil.');
			return redirect()->to('dashboard/pendaftaran');
		} catch (\Throwable $th) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Pendaftaran gagal, <br>' . $th->getMessage());
			return redirect()->to('dashboard/pendaftaran');
		} catch (\Exception $e) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Pendaftaran gagal, <br>' . $e->getMessage());
			return redirect()->to('dashboard/pendaftaran');
		}
	}

	public function edit($id)
	{
		$data["title"] = "Pemasukan";
		$data["current_page"] = "Pendaftaran";
		$user_id =  $this->transaksi->detailTransaksi($id)->user_id;
		$data["data"] = $this->transaksi->detailTransaksi($id);
		$data["santri"] = $this->santri->getById($user_id)->nama;
		return view("backoffice/pendaftaran/edit", $data);
	}

	public function update($id = null)
	{
		$nominal = Helpers::replaceRupiah($this->request->getPost("nominal"));
		$tanggal_bayar = $this->request->getPost("tanggal_bayar");

		$validation = $this->validateData(
			[
				"nominal" => $nominal,
				"tanggal_bayar" => $tanggal_bayar,
			],
			$this->transaksi->rulesUpdatePendaftaran()
		);
		if (!$validation) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {
			$data = [
				"nominal" => $nominal,
				"tanggal_bayar" => $tanggal_bayar,
			];
			$this->transaksi->updatePendaftaran($id, $data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data pendaftaran berhasil diubah.');
			return redirect()->to('dashboard/pendaftaran');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data pendaftaran gagal diubah, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data pendaftaran gagal diubah, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}



	public function pendaftaranUlang()
	{
		$data["tittle"] = "Pemasukan";
		$data["curennt_page"] = "Pendaftaran Ulang";
		$data["data"] = $this->transaksi->getPendaftaranUlang()->getResultArray();
		return view("backoffice/pendaftaran-ulang/index", $data);
	}
	public function pendaftaranUlangCreate()
	{
		$status_santri = 'belum_registrasi_ulang';
		$countsantri = $this->santri->countSantri($status_santri);
		if ($countsantri == 0) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Tidak ada santri yang belum membayar registrasi ulang, Silahkan tambahkan santri terlebih dahulu.');
			return redirect()->to('dashboard/pendaftaran-ulang');
		}
		$data["title"] = "Pemasukan";
		$data["current_page"] = "Pendaftaran Ulang";
		$data["santri"] = $this->santri->getSantriRegistrasiUlang()->getResultArray();

		return view("backoffice/pendaftaran-ulang/create", $data);
	}

	public function pendaftaranUlangStore()
	{
		$santri_id = $this->request->getPost("santri");
		$tanggal_bayar = $this->request->getPost("tanggal_bayar");

		$nominal = $this->replaceRupiah($this->request->getPost("nominal"));

		$userId = session()->get("user_id");
		$userId = 1;

		$valid = $this->validateData([
			"santri" => $santri_id,
			"tanggal_bayar" => $tanggal_bayar,
			"nominal" => $nominal
		], $this->transaksi->rulesPendaftaran());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		$this->db->transBegin();
		try {
			$data = [
				"kategori" => "pemasukan",
				"santri_id" => $santri_id,
				"nominal" => $nominal,
				"no_transaksi" => $this->transaksi->generateKode(),
				"jenis_id" => 2,
				"tanggal_bayar" => $tanggal_bayar,
				"user_id" => $userId,
			];
			$status_santri = 'aktif';

			$this->santri->updateStatus($santri_id, $status_santri);


			$this->transaksi->storePendaftaran($data);

			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Pendaftaran ulang santri berhasil.');
			$this->db->transCommit();
			return redirect()->to('dashboard/pendaftaran-ulang');
		} catch (\Throwable $th) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Pendaftaran ulang gagal, <br>' . $th->getMessage());
			return redirect()->back()->withInput();
		} catch (\Exception $e) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Pendaftaran ulang gagal, <br>' . $e->getMessage());
			return redirect()->back()->withInput();
		}
	}

	public function pendaftaranUlangEdit($id)
	{
		$data["title"] = "Pemasukan";
		$data["current_page"] = "Pendaftaran Ulang";
		$user_id =  $this->transaksi->detailTransaksi($id)->user_id;
		$data["data"] = $this->transaksi->detailTransaksi($id);
		$data["santri"] = $this->santri->getById($user_id)->nama;
		return view("backoffice/pendaftaran-ulang/edit", $data);
	}

	public function pendaftaranUlangUpdate($id = null)
	{
		$nominal = Helpers::replaceRupiah($this->request->getPost("nominal"));
		$tanggal_bayar = $this->request->getPost("tanggal_bayar");

		$validation = $this->validateData(
			[
				"nominal" => $nominal,
				"tanggal_bayar" => $tanggal_bayar,
			],
			$this->transaksi->rulesUpdatePendaftaran()
		);
		if (!$validation) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {
			$data = [
				"nominal" => $nominal,
				"tanggal_bayar" => $tanggal_bayar,
			];
			$this->transaksi->updatePendaftaran($id, $data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data pendaftaran ulang berhasil diubah.');
			return redirect()->to('dashboard/pendaftaran-ulang');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data pendaftaran ulang gagal diubah, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data pendaftaran ulang gagal diubah, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}




	//method transaksi bulanan
	public function indexBulanan()
	{
		$data["tittle"] = "Pemasukan";
		$data["curennt_page"] = "Bulanan";
		$data["data"] = $this->transaksi->getBulanan()->getResultArray();
		return view("backoffice/bulanan/index", $data);
	}
	public function createBulanan()
	{
		$data["title"] = "Tambah Bulanan";
		$data["current_page"] = "Bulanan";
		$data["santri"] = $this->santri->getSantriAktifAlumni()->getResultArray();
		return view("backoffice/bulanan/create", $data);
	}

	public function storeBulanan()
	{
		$santriId = $this->request->getPost('santri');
		$nominal = $this->replaceRupiah($this->request->getPost("nominal"));
		$bulan = $this->request->getPost("bulan");
		$tahun = $this->request->getPost("tahun");
		$userId = session()->get("user_id");
		$validasi = [
			"santri" => $santriId,
			"bulan" => $bulan,
			"tahun" => $tahun,
			"nominal" => $nominal,
		];
		$valid = $this->validateData($validasi, $this->transaksi->rulesBulanan());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}


		//kondisi duplikat data transaksi
		$santri = $this->transaksi
			->join("santri", "transaksi.santri_id = santri.id")
			->where("bulan", $bulan)
			->where("tahun", $tahun)
			->where("santri_id", $santriId)
			->first();
		if ($santri) {
			$namaSantri = $santri["nama"];
			session()->setFlashdata("status_error", true);
			$bulan = Helpers::getMontName($bulan - 1);
			session()->setFlashdata('error', "Transaksi bulanan pada bulan $bulan  dan tahun $tahun untuk santri $namaSantri sudah ada");
			return redirect()->back()->withInput();
		}

		//kondisi tanggal keluar alumni
		$santri = $this->santri->select("month(tanggal_keluar) as bulan,year(tanggal_keluar) as tahun,nama")
			->where("status_santri", "alumni")
			->where("id", $santriId)
			->first();
		if ($santri) {
			if (
				$santri["tahun"] < $tahun || ($santri["tahun"] == $tahun && $santri["bulan"] < $bulan)
			) {
				$namaSantri = $santri["nama"];
				session()->setFlashdata("status_error", true);
				$bulan = Helpers::getMontName($santri["bulan"] - 1);
				$tahun = $santri["tahun"];
				session()->setFlashdata('error', "Transaksi bulanan  untuk santri $namaSantri tidak boleh lebih dari  bulan $bulan   $tahun");
				return redirect()->back()->withInput();
			}
		}

		//kondisi tanggal masuk 
		$santri = $this->santri->select("month(tanggal_masuk) as bulan,year(tanggal_masuk) as tahun,nama")
			->where("id", $santriId)
			->first();
		if ($santri) {
			if (
				$santri["tahun"] > $tahun || ($santri["tahun"] == $tahun && $santri["bulan"] > $bulan)
			) {
				$namaSantri = $santri["nama"];
				session()->setFlashdata("status_error", true);
				$bulan = Helpers::getMontName($santri["bulan"] - 1);
				$tahun = $santri["tahun"];
				session()->setFlashdata('error', "Transaksi bulanan  untuk santri $namaSantri tidak boleh kurang dari  bulan $bulan   $tahun");
				return redirect()->back()->withInput();
			}
		}

		try {
			$this->db->transBegin();
			$data = [
				"kategori" => "pemasukan",
				"santri_id" => $santriId,
				"nominal" => $nominal,
				"no_transaksi" => $this->transaksi->generateKode(),
				"jenis_id" => 3,
				"tanggal_bayar" => date("Y-m-d H:i"),
				"bulan" => $bulan,
				"tahun" => $tahun,
				"user_id" => $userId,
			];

			if ($this->transaksi->storeBulanan($data)) {
				session()->setFlashdata("status_success", true);
				$this->db->transCommit();
				session()->setFlashdata('message', 'Transaksi berhasil ditambahkan');
				return redirect()->to('dashboard/bulanan');
			} else {
				session()->setFlashdata("status_error", true);
				$this->db->transRollback();
				session()->setFlashdata('error', 'Transaksi gagal ditambahkan');
				return redirect()->back()->withInput();
			}
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			$this->db->transRollback();
			session()->setFlashdata('error', 'Transaksi gagal ditambahkan');
			return redirect()->back()->withInput();
		}
	}

	public function editBulanan($id)
	{
		$data["title"] = "Ubah Bulanan";
		$data["current_page"] = "Bulanan";
		$data["santri"] = $this->santri->getSantriAktifAlumni()->getResultArray();
		$data["data"] = $this->transaksi->where("id", $id)->first();

		return view("backoffice/bulanan/edit", $data);
	}
	public function updateBulanan($id)
	{
		$santriId = $this->transaksi->where("id", $id)->first()["santri_id"];
		$nominal = $this->replaceRupiah($this->request->getPost("nominal"));
		$bulan = $this->request->getPost("bulan");
		$tahun = $this->request->getPost("tahun");
		$validasi = [
			"bulan" => $bulan,
			"tahun" => $tahun,
			"nominal" => $nominal,
		];
		$valid = $this->validateData($validasi, [
			"bulan" => "required",
			"tahun" => "required",
			"nominal" => "required"
		]);
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}


		//kondisi duplikat data transaksi
		$santri = $this->transaksi
			->join("santri", "transaksi.santri_id = santri.id")
			->where("bulan", $bulan)
			->where("tahun", $tahun)
			->where("santri_id", $santriId)
			->first();
		if ($santri) {
			$namaSantri = $santri["nama"];
			session()->setFlashdata("status_error", true);
			$bulan = Helpers::getMontName($bulan - 1);
			session()->setFlashdata('error', "Transaksi bulanan pada bulan $bulan  dan tahun $tahun untuk santri $namaSantri sudah ada");
			return redirect()->back()->withInput();
		}

		//kondisi tanggal keluar alumni
		$santri = $this->santri->select("month(tanggal_keluar) as bulan,year(tanggal_keluar) as tahun,nama")
			->where("status_santri", "alumni")
			->where("id", $santriId)
			->first();
		if ($santri) {
			if (
				$santri["tahun"] < $tahun || ($santri["tahun"] == $tahun && $santri["bulan"] < $bulan)
			) {
				$namaSantri = $santri["nama"];
				session()->setFlashdata("status_error", true);
				$bulan = Helpers::getMontName($santri["bulan"] - 1);
				$tahun = $santri["tahun"];
				session()->setFlashdata('error', "Transaksi bulanan  untuk santri $namaSantri tidak boleh lebih dari  bulan $bulan   $tahun");
				return redirect()->back()->withInput();
			}
		}

		//kondisi tanggal masuk 
		$santri = $this->santri->select("month(tanggal_masuk) as bulan,year(tanggal_masuk) as tahun,nama")
			->where("id", $santriId)
			->first();
		if ($santri) {
			if (
				$santri["tahun"] > $tahun || ($santri["tahun"] == $tahun && $santri["bulan"] > $bulan)
			) {
				$namaSantri = $santri["nama"];
				session()->setFlashdata("status_error", true);
				$bulan = Helpers::getMontName($santri["bulan"] - 1);
				$tahun = $santri["tahun"];
				session()->setFlashdata('error', "Transaksi bulanan  untuk santri $namaSantri tidak boleh kurang dari  bulan $bulan   $tahun");
				return redirect()->back()->withInput();
			}
		}

		try {
			$this->db->transBegin();
			$data = [
				"nominal" => $nominal,
				"bulan" => $bulan,
				"tahun" => $tahun,
			];

			if ($this->transaksi->updateBulanan($data, $id)) {
				session()->setFlashdata("status_success", true);
				$this->db->transCommit();
				session()->setFlashdata('message', 'Transaksi berhasil diubah');
				return redirect()->to('dashboard/bulanan');
			} else {
				session()->setFlashdata("status_error", true);
				$this->db->transRollback();
				session()->setFlashdata('error', 'Transaksi gagal diubah');
				return redirect()->back()->withInput();
			}
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			$this->db->transRollback();
			session()->setFlashdata('error', 'Transaksi gagal diubah');
			return redirect()->back()->withInput();
		}
	}




	public function indexPengeluaran()
	{
		$data['data'] = $this->transaksi->getPengeluarans()->getResultArray();
		return view('backoffice/pengeluaran/index', $data);
	}

	public function createPengeluaran()
	{
		return view('backoffice/pengeluaran/create',);
	}

	public function storePengeluaran()
	{
		$keterangan = $this->request->getPost("keterangan");
		// var_dump($keterangan);
		// die();
		$tanggal_bayar = $this->request->getPost("tanggal_bayar");
		$nominal = $this->replaceRupiah($this->request->getPost("nominal"));
		$userId = session()->get("user_id");

		$valid = $this->validateData([
			"keterangan" => $keterangan,
			"tanggal_bayar" => $tanggal_bayar,
			"nominal" => $nominal
		], $this->transaksi->rulesPengeluaran());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {
			$data = [
				"kategori" => "pengeluaran",
				"nominal" => $nominal,
				"no_transaksi" => $this->transaksi->generateKode(),
				"tanggal_bayar" => $tanggal_bayar,
				"user_id" => $userId,
				"keterangan" => $keterangan
			];

			$this->transaksi->storePengeluaran($data);

			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Tambah pengeluaran berhasil.');
			return redirect()->to('dashboard/pengeluaran');
		} catch (\Throwable $th) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Tambah pengeluaran gagal, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Tambah pengeluaran gagal, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}

	public function editPengeluaran($id)
	{
		$data['data'] = $this->transaksi->detailTransaksi($id);
		return view('backoffice/pengeluaran/edit', $data);
	}

	public function updatePengeluaran($id)
	{
		$keterangan = $this->request->getPost("keterangan");
		$tanggal_bayar = $this->request->getPost("tanggal_bayar");
		$nominal = $this->replaceRupiah($this->request->getPost("nominal"));
		$userId = session()->get("user_id");

		$valid = $this->validateData(
			[
				"keterangan" => $keterangan,
				"tanggal_bayar" => $tanggal_bayar,
				"nominal" => $nominal
			],
			$this->transaksi->rulesPengeluaran()
		);
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {
			$data = [
				"nominal" => $nominal,
				"tanggal_bayar" => $tanggal_bayar,
				"user_id" => $userId,
				"keterangan" => $keterangan
			];

			$this->transaksi->updatePendaftaran($id, $data);

			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'ubah pengeluaran berhasil.');
			return redirect()->to('dashboard/pengeluaran');
		} catch (\Throwable $th) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'ubah pengeluaran gagal, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			$this->db->transRollback();
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'ubah pengeluaran gagal, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}

	public function deletePengeluaran($id)
	{
		$this->transaksi->deletePengeluaran($id);
		session()->setFlashdata("status_success", true);
		session()->setFlashdata('message', 'Hapus pengeluaran berhasil.');
		return redirect()->to('dashboard/pengeluaran');
	}
}
