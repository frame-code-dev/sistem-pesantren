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
		$data["filter"] = false;
		if ($year) {
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
}
