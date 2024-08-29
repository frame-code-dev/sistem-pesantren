<?php


namespace App\Controllers;

use App\Models\Auth_model;
use App\Models\BeritaModel;
use App\Models\Santri_model;

class Dashboard extends BaseController
{
	public function index()
	{
		$param['title'] = 'Dashboard';
		$santri = new Santri_model;
		$berita = new BeritaModel;
		$param['total_santri'] = $santri->countSantri('aktif');
		$param['total_alumni'] = $santri->countSantri('alumni');
		$param['total_berita'] = $berita->countData();
		$param['santri_aktif'] = $santri->getSantriAktifChart();
		$param['gender_santri'] = $santri->getGenderSantriChart();
		return view('dashboard',$param);
	}

	// ... ada kode lain di sini ...
}
