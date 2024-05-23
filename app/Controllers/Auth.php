<?php

namespace App\Controllers;

use App\Models\Auth_model;
use App\Models\User_model;

class Auth extends BaseController
{
	protected $helpers = ['form'];

	protected $authModel;
	protected $userModel;
	protected $session;

	public function __construct()
	{
		$this->authModel = new Auth_model();
		$this->userModel = new User_model();
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
		$session = session();
		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');
		$valid = $this->validateData(["username" => $username, "password" => $password], [
			'username' => 'required',
			'password' => 'required|max_length[255]'
		]);
		$user = $$this->userModel->where('username', $username)->first();
		// $rules = $this->authModel->rules();
		if ($valid == FALSE) {
			return view('auth/login');
		}

		if ($this->authModel->login($username, $password)) {
			$session->set('name', $user->name);
			$session->set('username', $user->username);
			return	redirect()->to("/dashboard");
		} else {
			session()->setFlashdata('message_login_error', 'Login Gagal, pastikan username dan password salah!');
			return redirect()->back();
		}
	}

	public function logout()
	{
	}
}
