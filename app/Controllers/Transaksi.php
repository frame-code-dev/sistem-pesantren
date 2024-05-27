<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
	protected $helpers = ['form'];
	protected $transaksi;
	protected $validation;
	public function __construct()
	{
		$this->transaksi = new TransaksiModel();
		$this->validation = \Config\Services::validation();

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function replaceRupiah($rupiah)
	{
		$nominal = str_replace(['Rp.', '.', ' '], '', $rupiah);
		return $nominal;
	}

	public function index()
	{
		$data["tittle"] = "Pemasukan";
		$data["curennt_page"] = "Pendaftaran";
		$data["data"] = $this->transaksi->getPendaftaran();
		return view("backoffice/pendaftaran/index", $data);
	}
	public function create()
	{
		$data["title"] = "Tambah Pendaftaran";
		$data["current_page"] = "Pendaftaran";

		return view("backoffice/pendafataran/create", $data);
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
