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
		$param['total_santri'] = $santri->countData('aktif');
		$param['total_alumni'] = $santri->countData('aktif');
		$param['total_berita'] = $berita->countData('aktif');
		return view('dashboard',$param);
	}

	// ... ada kode lain di sini ...
}
