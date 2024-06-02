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
	public function __construct()
	{
		$this->transaksi = new TransaksiModel();
		$this->santri = new Santri_model();

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{
		$year = $this->request->getGet("year");
		$data["dataTahun"] = $this->transaksi->select("tahun")
			->groupBy("tahun")->get()->getResultArray();
		$data["filter"] = false;
		if ($year) {
			$data["filter"] = true;
			$data["year"] = $year;
			$data["totalSudahMembayar"] = 0;
			$data["totalBelumMembayar"] = 0;
			$data["bulanan"] = 0;
			$data["pemasukanLain"] = 0;
			$data["pengeluaran"] = 0;
			for ($i = 1; $i <= 12; $i++) {
				$totalSantri = $this->santri->where('status_santri', 'aktif')
					->orWhere('status_santri', 'alumni')
					->where("month(tanggal_masuk) <=", $i)
					->where("year(tanggal_masuk) <=", $year)
					->where("month(tanggal_keluar) >=", $i)
					->where("year(tanggal_keluar) >=", $year)
					->get()->getResultArray();
				$sudahBayar =  $this->transaksi
					->select("count(*) as total_data,sum(nominal) as total_nominal")
					->where("jenis_id", 3)
					->where("bulan", $i)
					->where("tahun", $year)
					->groupBy("bulan")
					->groupBy("tahun")
					->get()->getResultArray();


				$totalSudahBayar = 0;
				$nominal = 0;
				if (count($sudahBayar) > 0) {
					$totalSudahBayar = $sudahBayar[0]["total_data"];
					$nominal = $sudahBayar[0]["total_nominal"];
				}

				$totalBelumBayar  = count($totalSantri) - ($totalSudahBayar);
				$data["sudahMembayar"][]  = $totalSudahBayar;
				$data["belumMembayar"][]  = $totalBelumBayar;
				$data["totalSudahMembayar"]  += $totalSudahBayar;
				$data["totalBelumMembayar"]  += $totalBelumBayar;
				$data["bulanan"]  += $nominal;
			}
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
		$data["year"] = $year;
		$totalSantri = $this->santri->getSantriAktifAlumni()->getResultArray();
		$data["totalSudahMembayar"] = 0;
		$data["totalBelumMembayar"] = 0;
		$data["bulanan"] = 0;
		$data["pemasukanLain"] = 0;
		$data["pengeluaran"] = 0;
		for ($i = 1; $i <= 12; $i++) {
			$sudahBayar =  $this->transaksi
				->select("count(*) as total_data,sum(nominal) as total_nominal")
				->where("jenis_id", 3)
				->where("bulan", $i)
				->where("tahun", $year)
				->groupBy("bulan")
				->groupBy("tahun")
				->get()->getResultArray();


			$totalSudahBayar = 0;
			$nominal = 0;
			if (count($sudahBayar) > 0) {
				$totalSudahBayar = $sudahBayar[0]["total_data"];
				$nominal = $sudahBayar[0]["total_nominal"];
			}
			$totalBelumBayar  = count($totalSantri) - ($totalSudahBayar);
			$data["sudahMembayar"][]  = $totalSudahBayar;
			$data["belumMembayar"][]  = $totalBelumBayar;
			$data["totalSudahMembayar"]  += $totalSudahBayar;
			$data["totalBelumMembayar"]  += $totalBelumBayar;
			$data["bulanan"]  += $nominal;
		}

		// load HTML content
		$dompdf->loadHtml(view('backoffice/laporan-tahunan/laporan-export', $data));

		// (optional) setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// render html as PDF
		$dompdf->render();

		// output the generated pdf
		$dompdf->stream($filename);
	}

	public function indexBulanan(){

		$month = $this->request->getGet("bulan") ?? (int) date("m");
		$year = $this->request->getGet("year") ?? date("Y");

		$data["dataBulan"] = $this->transaksi
		->select("bulan")
		->groupBy("bulan")
		->where("tahun", $year)
		->get()
		->getResultArray();
		$data["dataTahun"] = $this->transaksi->select("tahun")->groupBy("tahun")->get()->getResultArray();

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
				->getResultArray();

			$pemasukan_lain = $this->transaksi
				->select("sum(nominal) as total_nominal")
				->where("jenis_id !=", 3)
				->where("jenis_id != " , 4)
				->where('month(bulan)', $month)
				->where('year(bulan)', $year)
				->groupBy("bulan")
				->groupBy("tahun")
				->get()->getResultArray();

			$pengeluaran = $this->transaksi
				->select("sum(nominal) as total_nominal")
				->where('kategori', 'pengeluaran')
				->where("jenis_id != " , 4)
				->where('MONTH(bulan)', $month)
				->where('YEAR(bulan)', $year)
				->groupBy("bulan")
				->groupBy("tahun")
				->get()->getResultArray();
			
			$totalPemasukanLain = $pemasukan_lain["total_nominal"] ?? 0;
			$totalPengeluaran = $pengeluaran["total_nominal"] ?? 0;

			$data['sudah_membayar'] = $sudahBayar;
			$data['belum_membayar'] = $totalSantri - $sudahBayar;
			$data['syariah'] = $syariah[0]["total_nominal"];
			$data['pemasukan_lain'] = $totalPemasukanLain;
			$data['pengeluaran'] = $totalPengeluaran;
			$data['total'] = ($syariah[0]["total_nominal"] + $totalPemasukanLain) - $totalPengeluaran;
			$data['total_tabungan'] = 0;
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
			->getResultArray();

		$pemasukan_lain = $this->transaksi
			->select("sum(nominal) as total_nominal")
			->where("jenis_id !=", 3)
			->where("jenis_id != ", 4)
			->where('month(bulan)', $month)
			->where('year(bulan)', $year)
			->groupBy("bulan")
			->groupBy("tahun")
			->get()->getResultArray();

		$pengeluaran = $this->transaksi
			->select("sum(nominal) as total_nominal")
			->where('kategori', 'pengeluaran')
			->where("jenis_id != ", 4)
			->where('MONTH(bulan)', $month)
			->where('YEAR(bulan)', $year)
			->groupBy("bulan")
			->groupBy("tahun")
			->get()->getResultArray();

		$totalPemasukanLain = $pemasukan_lain["total_nominal"] ?? 0;
		$totalPengeluaran = $pengeluaran["total_nominal"] ?? 0;

		$data['month'] = $bulan[$month];
		$data['year'] = $year;
		$data['sudah_membayar'] = $sudahBayar;
		$data['belum_membayar'] = $totalSantri - $sudahBayar;
		$data['syariah'] = $syariah[0]["total_nominal"];
		$data['pemasukan_lain'] = $totalPemasukanLain;
		$data['pengeluaran'] = $totalPengeluaran;
		$data['total'] = ($syariah[0]["total_nominal"] + $totalPemasukanLain) - $totalPengeluaran;
		$data['total_tabungan'] = 0;

		// load HTML content
		$dompdf->loadHtml(view('backoffice/laporan-bulanan/laporan-export', $data));

		// (optional) setup the paper size and orientation
		$dompdf->setPaper('A4', 'landscape');

		// render html as PDF
		$dompdf->render();

		// output the generated pdf
		$dompdf->stream($filename);
	}
}
