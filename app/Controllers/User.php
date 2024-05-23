<?php

namespace App\Controllers;

defined('BASEPATH') or exit('No direct script access allowed');

class User extends BaseController
{

	public function __construct()
	{

		if (!session()->get("user_id")) {
			redirect('auth/login');
		}
	}

	public function index()
	{
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
