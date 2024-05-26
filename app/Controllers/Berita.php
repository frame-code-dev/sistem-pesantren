<?php

namespace App\Controllers;

use App\Models\BeritaModel;
use App\Models\KategoriModel;

class berita extends BaseController
{
	protected $helpers = ['form'];
	protected $berita;
	protected $kategori;
	protected $validation;
	public function __construct()
	{
		$this->berita = new BeritaModel();
		$this->kategori = new KategoriModel();
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
		$data["kategori"] = $this->kategori->getAll();;

		return view("backoffice/berita/create", $data);
	}

	public function store()
	{
		$judul = $this->request->getPost("judul");
		$kategori = $this->request->getPost("kategori");
		$gambar = $this->request->getFile("gambar");
		$keterangan = $this->request->getPost("keterangan");
		$data = [
			"judul" => $judul,
			"kategori" => $kategori,
			"gambar" => $this->storeImage($gambar),
			"keterangan" => $keterangan,
		];
		$valid = $this->validateData($data, $this->berita->rules());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}


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
		$data["kategori"] = $this->kategori->getAll();;

		return view("backoffice/berita/edit", $data);
	}

	public function update($id = null)
	{
		$judul = $this->request->getPost("judul");
		$kategori = $this->request->getPost("kategori");
		$gambar = $this->request->getFile("gambar");
		$keterangan = $this->request->getPost("keterangan");
		$data = [
			"judul" => $judul,
			"kategori" => $kategori,
			"gambar" => $gambar,
			"keterangan" => $keterangan,
		];
		$valid = $this->validateData($data, $this->berita->rules());

		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}


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


	public function storeImage($image)
	{
		return "das";
	}
}
