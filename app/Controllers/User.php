<?php

namespace App\Controllers;

use App\Models\User_model;

class User extends BaseController
{
	protected $helpers = ['form'];
	protected $userModel;
	protected $validation;
	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->userModel = new User_model();
		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{
		$data['data'] = $this->userModel->getAll()->getResultArray();
		return view("backoffice/user/index", $data);
	}
	public function create()
	{
		return view("backoffice/user/create");
	}

	public function store()
	{
		$nama = $this->request->getPost("nama");
		$username = $this->request->getPost("username");
		$password = (string) $this->request->getPost('password');
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$role = $this->request->getPost("role");

		$validation = $this->validateData([
			"nama" => $nama,
			"username" => $username,
			"password" => $password,
			"role" => $role,
		], $this->userModel->rules());
		if (!$validation) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {
			$data = [
				"nama" => $nama,
				"username" => $username,
				"password" => $hashedPassword,
				"role" => $role,
			];
			$this->userModel->saveData($data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data user berhasil ditambahkan.');
			return redirect()->to('dashboard/user');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal ditambahkan, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal ditambahkan, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}

	public function edit($id = null)
	{
		$data["data"] = $this->userModel->getById($id);
		return view("backoffice/user/edit", $data);
	}

	public function update($id = null)
	{
		$nama = $this->request->getPost("nama");
		$username = $this->request->getPost("username");
		$password = (string) $this->request->getPost('password');
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$role = $this->request->getPost("role");

		$validation = $this->validateData([
			"nama" => $nama,
			"username" => $username,
			"role" => $role,
		], $this->userModel->rules_edit());
		if (!$validation) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {
			$data = [
				"nama" => $nama,
				"username" => $username,
				"role" => $role,
			];
			$this->userModel->updateData($id, $data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data user berhasil diubah.');
			return redirect()->to('dashboard/user');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal diubah, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal diubah, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}
	public function delete($id = null)
	{
		try {
			$this->userModel->deleteData($id);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data user berhasil dihapus');
			return redirect()->to('dashboard/user');
		} catch (\Throwable $th) {
			if ($th->getCode() == 1451) { // cek jika data ini digunakan di tabel lain
				session()->setFlashdata("status_error", true);
				session()->setFlashdata('error', 'Data user gagal dihapus, Data ini sudah digunakan.');
				return redirect()->to('dashboard/user');
			}
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data user gagal dihapus, <br>' . $e->getMessage());
			return redirect()->to('dashboard/user');
		}
	}
}
