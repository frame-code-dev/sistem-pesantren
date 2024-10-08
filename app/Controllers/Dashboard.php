<?php


namespace App\Controllers;

use App\Models\Auth_model;
use App\Models\BeritaModel;
use App\Models\Santri_model;
use App\Models\TransaksiModel;

class Dashboard extends BaseController
{
	public function index()
	{
		$param['title'] = 'Dashboard';
		$santri = new Santri_model;
		$berita = new BeritaModel;
		$transaksi = new TransaksiModel();
		$param['total_santri'] = $santri->countSantri('aktif');
		$param['total_alumni'] = $santri->countSantri('alumni');
		$param['total_berita'] = $berita->countData();
		$param['santri_aktif'] = $santri->getSantriAktifChart();
		$param['gender_santri'] = $santri->getGenderSantriChart();
		$param['total_pendaftaran'] = $transaksi->getTotalPendaftaran();
		$param['total_pendaftaran_ulang'] = $transaksi->getTotalPendaftaranUlang();
		$param['total_pengeluaran'] = $transaksi->getTotalPengeluaran();
		$param['chartPendaftaran'] = $transaksi->getTotalPengeluaran();
		$param['getChartPendaftaran'] = $transaksi->getChartPendaftaran();
		$param['getChartPemasukanPengeluaran'] = $transaksi->getChartPemasukanPengeluaran();
		// return var_dump($param["getChartPendaftaran"]);
		// exit();
		return view('dashboard', $param);
	}

	// ... ada kode lain di sini ...
}
