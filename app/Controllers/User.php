<?php

namespace App\Controllers;

class User extends BaseController
{

	public function __construct()
	{

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{
		return view("backoffice/user/index");
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
