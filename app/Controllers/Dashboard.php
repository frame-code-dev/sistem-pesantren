<?php


namespace App\Controllers;

class Dashboard extends BaseController
{
	public function __construct()
	{
	}

	public function index()
	{
		return view('dashboard');
	}

	// ... ada kode lain di sini ...
}
