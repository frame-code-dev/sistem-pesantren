<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Transaksi extends BaseController
{
	protected $helpers = ['form'];
	protected $kategori;
	protected $validation;
	public function __construct()
	{
		$this->kategori = new KategoriModel();
		$this->validation = \Config\Services::validation();

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{
		$data["data"] = $this->kategori->getAll();
		return view("backoffice/kategori/index", $data);
	}
	public function create()
	{
		$data["title"] = "Tambah Kategori";
		$data["current_page"] = "Kategori";

		return view("backoffice/kategori/create", $data);
	}

	public function store()
	{
		$nama = $this->request->getPost("nama");
		$valid = $this->validateData(["nama" => $nama], $this->kategori->rules());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		$data = [
			"nama" => $nama
		];
		if ($this->kategori->store($data)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Kategori berhasil ditambahkan');
			return redirect()->to('dashboard/kategori');
		} else {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Kategori gagal ditambahkan');
			return redirect()->back();
		}
	}
}
