<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
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
		$valid = $this->validateData(["nama" => $nama], [
			'nama' => 'required',
		]);
		$this->validation->setRules([
			'nama' => 'required',
		]);
		if (!$this->validation->run(["nama" => "required"])) {
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

	public function edit($id = null)
	{
		$data["title"] = "Ubah Kategori";
		$data["current_page"] = "Kategori";
		$data["data"] = $this->kategori->getById($id);
		// var_dump($data);
		// dd();
		return view("backoffice/kategori/edit", $data);
	}

	public function update($id = null)
	{
		$nama = $this->request->getPost("nama");
		$valid = $this->validateData(["nama" => $nama], [
			'nama' => 'required',
		]);
		$this->validation->setRules([
			'nama' => 'required',
		]);
		if (!$this->validation->run(["nama" => "required"])) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		$data = [
			"nama" => $nama
		];
		if ($this->kategori->update($id, $data)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Kategori berhasil diubah');
			return redirect()->to('dashboard/kategori');
		} else {

			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Kategori gagal diubah');
			return redirect()->back();
		}
	}
	public function delete($id = null)
	{

		if ($this->kategori->delete($id)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Kategori berhasil dihapus');
			return redirect()->to('dashboard/kategori');
		} else {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Kategori gagal dihapus');
			return redirect()->back();
		}
	}
}
