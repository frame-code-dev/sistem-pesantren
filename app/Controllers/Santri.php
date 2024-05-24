<?php

namespace App\Controllers;

use App\Models\Santri_model;


class Santri extends BaseController
{
	protected $santriModel;
	public function __construct()
	{

		if (!session()->get("user_id")) {
			redirect('/');
		}
		$this->santriModel = new Santri_model();
	}

	public function index()
	{
		$santri = $this->santriModel->getSantriAktif();
		$data['santri'] = $santri->getResultArray();
		return view("backoffice/santri/index", $data);
	}
	public function create()
	{
	}

	public function store()
	{
	}

	public function edit($id = null)
	{
	}

	public function update($id = null)
	{
	}
	public function delete($id = null)
	{
	}
}
