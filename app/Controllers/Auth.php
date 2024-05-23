<?php

namespace App\Controllers;

use App\Models\Auth_model;

class Auth extends BaseController
{
	protected $helpers = ['form'];

	protected $authModel;
	public function __construct()
	{
		$this->authModel = new Auth_model();
		$this->validator = \Config\Services::validation();
	}
	public function index()
	{
	}

	public function login()
	{
		$rules = $this->authModel->rules();;
		// $this->validator->setRules($rules);

		if ($this->validateData(["username", "password"], $rules) == FALSE) {
			return view('auth/login');
		}
		$username = $this->request->getGetPost('username');
		$password = $this->request->getGetPost('password');


		if ($this->authModel->login($username, $password)) {
			redirect('dashboard');
		} else {
			session()->setFlashdata('message_login_error', 'Login Gagal, pastikan username dan password benar!');
		}

		return view('auth/login');
	}

	public function logout()
	{
	}
}
