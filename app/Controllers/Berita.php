<?php

namespace App\Controllers;

use App\Models\BeritaModel;

class berita extends BaseController
{
	protected $helpers = ['form'];
	protected $berita;
	protected $validation;
	public function __construct()
	{
		$this->berita = new BeritaModel();
		$this->validation = \Config\Services::validation();

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{
		$data["data"] = $this->berita->getAll();
		return view("backoffice/berita/index", $data);
	}
	public function create()
	{
		$data["title"] = "Tambah Berita";
		$data["current_page"] = "Berita";

		return view("backoffice/berita/create", $data);
	}

	public function store()
	{
		$nama = $this->request->getPost("nama");

		$this->validation->setRules([
			'nama' => 'required',
		]);
		if (!$this->validation->run($this->berita->rules())) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		$data = [
			"nama" => $nama
		];
		if ($this->berita->store($data)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Berita berhasil ditambahkan');
			return redirect()->to('dashboard/berita');
		} else {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Berita gagal ditambahkan');
			return redirect()->back();
		}
	}

	public function edit($id = null)
	{
		$data["title"] = "Ubah Berita";
		$data["current_page"] = "Berita";
		$data["data"] = $this->berita->getById($id);
		// var_dump($data);
		// dd();
		return view("backoffice/berita/edit", $data);
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
		if (!$this->validation->run($this->berita->rules())) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		$data = [
			"nama" => $nama
		];
		if ($this->berita->update($id, $data)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Berita berhasil diubah');
			return redirect()->to('dashboard/berita');
		} else {

			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Berita gagal diubah');
			return redirect()->back();
		}
	}
	public function delete($id = null)
	{

		if ($this->berita->delete($id)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Berita berhasil dihapus');
			return redirect()->to('dashboard/berita');
		} else {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'berita gagal dihapus');
			return redirect()->back();
		}
	}
}
