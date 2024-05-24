<?php

namespace App\Controllers;

class Kategori extends BaseController
{
	protected $helpers = ['form'];
	public function __construct()
	{

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{
		return view("backoffice/kategori/index");
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
