<?php

namespace App\Controllers;

use App\Models\Auth_model;

class Auth extends BaseController
{
	protected $helpers = ['form'];

	protected $authModel;
	protected $session;

	public function __construct()
	{
		$this->authModel = new Auth_model();
		$this->validator = \Config\Services::validation();
		$this->session = \Config\Services::session();
	}
	public function index()
	{
	}

	public function login()
	{
		$data['message_login_error'] = session()->getFlashdata('message_login_error');
		return view('auth/login', $data);
	}
	public function loginPost()
	{
		// $rules = $this->authModel->rules();
		if ($this->validateData(["username", "password"],[
			'username' => 'required',
			'password' => 'required|max_length[255]'
		]) == FALSE) {
			return view('auth/login');
		}
		$username = $this->request->getGetPost('username');
		$password = $this->request->getGetPost('password');

		if ($this->authModel->login($username, $password)) {
			redirect('dashboard');
		} else {
			session()->setFlashdata('message_login_error', 'Login Gagal, pastikan username dan password benar!');
		}
	}

	public function logout()
	{
	}
}
