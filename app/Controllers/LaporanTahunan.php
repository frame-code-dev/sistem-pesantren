<?php

namespace App\Controllers;

use App\Models\Santri_model;
use App\Models\TransaksiModel;
use Dompdf\Dompdf;
use App\Helpers\Helpers;

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
		$data["dataTahun"] = $this->transaksi->select("year(tanggal_bayar) as tahun")
			->groupBy("year(tanggal_bayar) ")
			->get()
			->getResultArray();
		if ($year) {
			$data["filter"] = true;
			for ($i = 1; $i <= 12; $i++) {
				$totalSantri = $this->santri
					->groupStart() // Start grouping for OR conditions
					->where('status_santri', 'aktif')
					->orWhere('status_santri', 'alumni')
					->groupEnd() // End grouping for OR conditions
					->where("MONTH(tanggal_masuk) <=", $i)
					->where("YEAR(tanggal_masuk) <=", $year)
					->groupStart() // Start grouping for tanggal_keluar conditions
					->groupStart() // Nested grouping for OR condition
					->where("MONTH(tanggal_keluar) >=", $i)
					->where("YEAR(tanggal_keluar) >=", $year)
					->groupEnd()
					->orWhere("tanggal_keluar", NULL)
					->groupEnd()
					->countAllResults();



				$sudahBayar = $this->transaksi
					->select("count(*) as total_data, sum(nominal) as total_nominal")
					->where("jenis_id", 3)
					->where("bulan", $i)
					->where("tahun", $year)
					->get()->getRowArray();
				$totalSudahBayar = $sudahBayar['total_data'] ?? 0;
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
				->where("tahun", $year)
				->get()->getRowArray();

			$pengeluaranTahunIni = $this->transaksi
				->select("sum(nominal) as nominal")
				->where("jenis_id ", null)
				->where("kategori", "pengeluaran")
				->where("year(tanggal_bayar)", $year)
				->get()->getRowArray();

			$totalTabungan = $this->transaksi->getTotalTabungan()->totalTabungan ?? 0;
			$data["tahunan"] += $tahunan["total_nominal"] ?? 0;
			$data["pemasukanLain"] = $pemasukanLain['total_nominal'] ?? 0;
			$data["pengeluaran"] = $pengeluaranTahunIni['nominal'] ?? 0;
			$data["totalTahunIni"] = ($data["tahunan"] + $data["pemasukanLain"]) - $data["pengeluaran"];
			$data["totalTabungan"] = $totalTabungan;
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
				->groupStart() // Start grouping for OR conditions
				->where('status_santri', 'aktif')
				->orWhere('status_santri', 'alumni')
				->groupEnd() // End grouping for OR conditions
				->where("MONTH(tanggal_masuk) <=", $i)
				->where("YEAR(tanggal_masuk) <=", $year)
				->groupStart() // Start grouping for tanggal_keluar conditions
				->groupStart() // Nested grouping for OR condition
				->where("MONTH(tanggal_keluar) >=", $i)
				->where("YEAR(tanggal_keluar) >=", $year)
				->groupEnd()
				->orWhere("tanggal_keluar", NULL)
				->groupEnd()
				->countAllResults();


			$sudahBayar = $this->transaksi
				->select("count(*) as total_data, sum(nominal) as total_nominal")
				->where("jenis_id", 3)
				->where("bulan", $i)
				->where("tahun", $year)
				->get()->getRowArray();

			$totalSudahBayar = $sudahBayar['total_data'] ?? 0;
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
			->where("tahun", $year)
			->get()->getRowArray();

		$pengeluaranTahunIni = $this->transaksi
			->select("sum(nominal) as nominal")
			->where("jenis_id ", null)
			->where("kategori", "pengeluaran")
			->where("year(tanggal_bayar)", $year)
			->get()->getRowArray();
		$totalTabungan = $this->transaksi->getTotalTabungan()->totalTabungan ?? 0;

		$data["tahunan"] += $tahunan["total_nominal"] ?? 0;
		$data["pemasukanLain"] = $pemasukanLain['total_nominal'] ?? 0;
		$data["pengeluaran"] = $pengeluaranTahunIni['nominal'] ?? 0;
		$data["totalTahunIni"] = ($data["tahunan"] + $data["pemasukanLain"]) - $data["pengeluaran"];
		$data["totalTabungan"] = $totalTabungan;

		// load HTML content
		$dompdf->loadHtml(view('backoffice/laporan-tahunan/laporan-export', $data));

		// (optional) setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// render html as PDF
		$dompdf->render();

		// output the generated pdf
		ob_clean();
		$dompdf->stream($filename, ["Attachment" => true]);
		exit();
	}

	public function indexBulanan()
	{

		$month = $this->request->getGet("bulan") ?? null;
		$year = $this->request->getGet("year") ?? null;

		$data["dataBulan"] = $this->transaksi->select("month(tanggal_bayar) as bulan")
			->groupBy("month(tanggal_bayar)")
			->orderBy("month(tanggal_bayar)", "ASC")
			->get()
			->getResultArray();
		$data["dataTahun"] = $this->transaksi->select("year(tanggal_bayar) as tahun")
			->groupBy("year(tanggal_bayar) ")
			->get()
			->getResultArray();

		$data['month'] = $month;
		$data['year'] = $year;

		$data["filter"] = false;

		if ($month && $year) {
			$data["filter"] = true;
			$sudahBayar =  $this->transaksi
				->where("jenis_id", 3)
				->where("bulan", $month)
				->where("tahun", $year)
				->countAllResults();

			$totalSantri = $this->santri->where('status_santri', 'aktif')
				->orWhere('status_santri', 'alumni')
				->where("month(tanggal_masuk) <=", $month)
				->where("year(tanggal_masuk) <=", $year)
				->where("month(tanggal_keluar) >=", $month)
				->where("year(tanggal_keluar) >=", $year)
				->countAllResults();

			$syariah = $this->transaksi
				->select("SUM(nominal) as total_nominal")
				->where("jenis_id", 3)
				->where("bulan", $month)
				->where("tahun", $year)
				->groupBy("bulan")
				->groupBy("tahun")
				->get()
				->getRowArray();

			$pemasukan_lain = $this->transaksi
				->select("sum(nominal) as total_nominal")
				->where("jenis_id !=", 3)
				->where("jenis_id != ", 4)
				->where('month(tanggal_bayar)', $month)
				->where('year(tanggal_bayar)', $year)
				->groupBy("tanggal_bayar")
				->get()->getRowArray();

			$pengeluaran = $this->transaksi
				->select("sum(nominal) as total_nominal")
				->where("jenis_id ", null)
				->where("kategori", "pengeluaran")
				->where('MONTH(tanggal_bayar)', $month)
				->where("year(tanggal_bayar)", $year)
				->get()->getRowArray();

			$totalPemasukanLain = $pemasukan_lain["total_nominal"] ?? 0;
			$totalPengeluaran = $pengeluaran["total_nominal"] ?? 0;
			$totalTabungan = $this->transaksi->getTotalTabungan()->totalTabungan ?? 0;
			$data['sudah_membayar'] = $sudahBayar;
			$data['belum_membayar'] = $totalSantri - $sudahBayar;
			$data['syariah'] = $syariah["total_nominal"] ?? 0;
			$data['pemasukan_lain'] = $totalPemasukanLain;
			$data['pengeluaran'] = $totalPengeluaran;
			$data['total'] = (($syariah["total_nominal"] ?? 0) + $totalPemasukanLain) - $totalPengeluaran;
			$data['total_tabungan'] = $totalTabungan;
		}
		return view("backoffice/laporan-bulanan/index", $data);
	}

	public function downloadBulanan()
	{
		$bulan = [
			1 => "Januari",
			2 => "Februari",
			3 => "Maret",
			4 => "April",
			5 => "Mei",
			6 => "Juni",
			7 => "Juli",
			8 => "Agustus",
			9 => "September",
			10 => "Oktober",
			11 => "November",
			12 => "Desember"
		];
		$month = $this->request->getGet("bulan") ?? (int) date("m");
		$year = $this->request->getGet("year") ?? date("Y");
		$filename = "Laporan Bulan $bulan[$month] Tahun $year";

		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$data["filter"] = true;
		$sudahBayar =  $this->transaksi
			->where("jenis_id", 3)
			->where("bulan", $month)
			->where("tahun", $year)
			->countAllResults();

		$totalSantri = $this->santri->where('status_santri', 'aktif')
			->orWhere('status_santri', 'alumni')
			->where("month(tanggal_masuk) <=", $month)
			->where("year(tanggal_masuk) <=", $year)
			->where("month(tanggal_keluar) >=", $month)
			->where("year(tanggal_keluar) >=", $year)
			->countAllResults();

		$syariah = $this->transaksi
			->select("SUM(nominal) as total_nominal")
			->where("jenis_id", 3)
			->where("bulan", $month)
			->where("tahun", $year)
			->groupBy("bulan")
			->groupBy("tahun")
			->get()
			->getRowArray();

		$pemasukan_lain = $this->transaksi
			->select("sum(nominal) as total_nominal")
			->where("jenis_id !=", 3)
			->where("jenis_id != ", 4)
			->where('month(bulan)', $month)
			->where('year(bulan)', $year)
			->groupBy("bulan")
			->groupBy("tahun")
			->get()->getRowArray();

		$pengeluaran = $this->transaksi
			->select("sum(nominal) as total_nominal")
			->where("jenis_id ", null)
			->where("kategori", "pengeluaran")
			->where('MONTH(tanggal_bayar)', $month)
			->where("year(tanggal_bayar)", $year)
			->get()->getRowArray();

		$totalPemasukanLain = $pemasukan_lain["total_nominal"] ?? 0;
		$totalPengeluaran = $pengeluaran["total_nominal"] ?? 0;
		$totalTabungan = $this->transaksi->getTotalTabungan()->totalTabungan ?? 0;

		$data['month'] = $bulan[$month];
		$data['year'] = $year;
		$data['sudah_membayar'] = $sudahBayar;
		$data['belum_membayar'] = $totalSantri - $sudahBayar;
		$data['syariah'] = $syariah["total_nominal"] ?? 0;
		$data['pemasukan_lain'] = $totalPemasukanLain;
		$data['pengeluaran'] = $totalPengeluaran;
		$data['total'] = (($syariah["total_nominal"] ?? 0) + $totalPemasukanLain) - $totalPengeluaran;
		$data['total_tabungan'] = $totalTabungan;

		// load HTML content
		$dompdf->loadHtml(view('backoffice/laporan-bulanan/laporan-export', $data));

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
