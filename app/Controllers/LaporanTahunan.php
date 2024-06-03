<?php

namespace App\Controllers;

use App\Models\Santri_model;
use App\Models\TransaksiModel;
use Dompdf\Dompdf;

class LaporanTahunan extends BaseController
{
	protected $helpers = ['form'];

	private $transaksi;
	private $santri;
	private $db;
	public function __construct()
	{
		$this->transaksi = new TransaksiModel();
		$this->santri = new Santri_model();
		$this->db = \Config\Database::connect();


		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{

		$year = $this->request->getGet("year");
		$data = [
			"filter" => false,
			"year" => $year,
			"sudahMembayar" => [],
			"belumMembayar" => [],
			"totalSudahMembayar" => 0,
			"totalBelumMembayar" => 0,
			"tahunan" => 0,
			"pemasukanLain" => 0,
			"pengeluaran" => 0,
			"totalTahunIni" => 0,
			"totalTabungan" => 0,
		];
		$data["dataTahun"] = $this->transaksi->select("tahun")
			->groupBy("tahun")
			->get()->getResultArray();
		if ($year) {
			$data["filter"] = true;


			for ($i = 1; $i <= 12; $i++) {
				$totalSantri = $this->santri
					->where('status_santri', 'aktif')
					->orWhere('status_santri', 'alumni')
					->where("month(tanggal_masuk) <=", $i)
					->where("year(tanggal_masuk) <=", $year)
					->where("month(tanggal_keluar) >=", $i)
					->where("year(tanggal_keluar) >=", $year)
					->countAllResults();

				$sudahBayar = $this->transaksi
					->select("count(*) as total_data, sum(nominal) as total_nominal")
					->where("jenis_id", 3)
					->where("bulan", $i)
					->where("tahun", $year)
					->get()->getRowArray();

				$totalSudahBayar = $sudahBayar['total_data'] ?? 0;
				$nominalBulanan = $sudahBayar['total_nominal'] ?? 0;
				$totalBelumBayar = $totalSantri - $totalSudahBayar;

				$data["sudahMembayar"][] = $totalSudahBayar;
				$data["belumMembayar"][] = $totalBelumBayar;
				$data["totalSudahMembayar"] += $totalSudahBayar;
				$data["totalBelumMembayar"] += $totalBelumBayar;
			}

			$pemasukanLain = $this->transaksi
				->select("sum(nominal) as total_nominal")
				->where("jenis_id <>", 3)
				->where("jenis_id <>", 4)
				->where("year(tanggal_bayar)", $year)
				->get()->getRowArray();
			$tahunan = $this->transaksi
				->select("sum(nominal) as total_nominal")
				->where("jenis_id", 3)
				->where("year(tanggal_bayar)", $year)
				->get()->getRowArray();

			$pengeluaranTahunIni = $this->transaksi
				->select("sum(nominal) as nominal")
				->where("jenis_id", 4)
				->where("kategori", "pengeluaran")
				->where("year(tanggal_bayar)", $year)
				->get()->getRowArray();
			$totalTabungan = $this->db->query('SELECT SUM(nominal)- (SELECT SUM(nominal) FROM transaksi WHERE kategori = "pengeluaran" GROUP BY kategori) as totalTabungan FROM transaksi WHERE jenis_id <> 4 AND kategori = "pemasukan" group BY kategori;')
				->getRow();
			$data["tahunan"] += $tahunan["total_nominal"];
			$data["pemasukanLain"] = $pemasukanLain['total_nominal'] ?? 0;
			$data["pengeluaran"] = $pengeluaranTahunIni['nominal'] ?? 0;
			$data["totalTahunIni"] = ($data["tahunan"] + $data["pemasukanLain"]) - $data["pengeluaran"];
			$data["totalTabungan"] = $totalTabungan->totalTabungan ?? 0;
		}
		return view("backoffice/laporan-tahunan/index", $data);
	}


	public function download()
	{
		$year = $this->request->getGet("year");
		$filename = "Laporan Tahun $year";

		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$data["filter"] = true;
		$totalSantri = $this->santri->getSantriAktifAlumni()->getResultArray();
		$data = [
			"filter" => true,
			"year" => $year,
			"sudahMembayar" => [],
			"belumMembayar" => [],
			"totalSudahMembayar" => 0,
			"totalBelumMembayar" => 0,
			"tahunan" => 0,
			"pemasukanLain" => 0,
			"pengeluaran" => 0,
			"totalTahunIni" => 0,
			"totalTabungan" => 0,
		];
		$data["dataTahun"] = $this->transaksi->select("tahun")
			->groupBy("tahun")
			->get()->getResultArray();

		for ($i = 1; $i <= 12; $i++) {
			$totalSantri = $this->santri
				->where('status_santri', 'aktif')
				->orWhere('status_santri', 'alumni')
				->where("month(tanggal_masuk) <=", $i)
				->where("year(tanggal_masuk) <=", $year)
				->where("month(tanggal_keluar) >=", $i)
				->where("year(tanggal_keluar) >=", $year)
				->countAllResults();

			$sudahBayar = $this->transaksi
				->select("count(*) as total_data, sum(nominal) as total_nominal")
				->where("jenis_id", 3)
				->where("bulan", $i)
				->where("tahun", $year)
				->get()->getRowArray();

			$totalSudahBayar = $sudahBayar['total_data'] ?? 0;
			$nominalBulanan = $sudahBayar['total_nominal'] ?? 0;
			$totalBelumBayar = $totalSantri - $totalSudahBayar;

			$data["sudahMembayar"][] = $totalSudahBayar;
			$data["belumMembayar"][] = $totalBelumBayar;
			$data["totalSudahMembayar"] += $totalSudahBayar;
			$data["totalBelumMembayar"] += $totalBelumBayar;
		}

		$pemasukanLain = $this->transaksi
			->select("sum(nominal) as total_nominal")
			->where("jenis_id <>", 3)
			->where("jenis_id <>", 4)
			->where("year(tanggal_bayar)", $year)
			->get()->getRowArray();
		$tahunan = $this->transaksi
			->select("sum(nominal) as total_nominal")
			->where("jenis_id", 3)
			->where("year(tanggal_bayar)", $year)
			->get()->getRowArray();

		$pengeluaranTahunIni = $this->transaksi
			->select("sum(nominal) as nominal")
			->where("jenis_id", 4)
			->where("kategori", "pengeluaran")
			->where("year(tanggal_bayar)", $year)
			->get()->getRowArray();
		$totalTabungan = $this->db->query('SELECT SUM(nominal)- (SELECT SUM(nominal) FROM transaksi WHERE kategori = "pengeluaran" GROUP BY kategori) as totalTabungan FROM transaksi WHERE jenis_id <> 4 AND kategori = "pemasukan" group BY kategori;')
			->getRow();
		$data["tahunan"] += $tahunan["total_nominal"];
		$data["pemasukanLain"] = $pemasukanLain['total_nominal'] ?? 0;
		$data["pengeluaran"] = $pengeluaranTahunIni['nominal'] ?? 0;
		$data["totalTahunIni"] = ($data["tahunan"] + $data["pemasukanLain"]) - $data["pengeluaran"];
		$data["totalTabungan"] = $totalTabungan->totalTabungan ?? 0;

		// load HTML content
		$dompdf->loadHtml(view('backoffice/laporan-tahunan/laporan-export', $data));

		// (optional) setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// render html as PDF
		$dompdf->render();

		// output the generated pdf
		$dompdf->stream($filename);
	}
}
