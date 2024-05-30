<?php


namespace App\Controllers;

use App\Models\Auth_model;

class Dashboard extends BaseController
{
	public function index()
	{
		
		return view('dashboard');
	}

	// ... ada kode lain di sini ...
}
