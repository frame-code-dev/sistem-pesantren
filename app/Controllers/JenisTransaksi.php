<?php

namespace App\Controllers;

use App\Models\JenisTransaksiModel;

class JenisTransaksi extends BaseController
{
	protected $helpers = ['form'];
	protected $jenisTransaksi;
	protected $validation;
	public function __construct()
	{
		$this->jenisTransaksi = new JenisTransaksiModel();
		$this->validation = \Config\Services::validation();

		if (!session()->get("user_id")) {
			redirect('/login');
		}
	}

	public function index()
	{
		$data["data"] = $this->jenisTransaksi->getAll();
		return view("backoffice/jenis-transaksi/index", $data);
	}
	public function create()
	{
		$data["title"] = "Tambah Jenis Transaksi";
		$data["current_page"] = "Jenis Transaksi";

		return view("backoffice/jenis-transaksi/create", $data);
	}

	public function store()
	{
		$nama = $this->request->getPost("nama");
		$valid = $this->validateData(["nama" => $nama], $this->jenisTransaksi->rules());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		$data = [
			"nama" => $nama
		];
		if ($this->jenisTransaksi->store($data)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Jenis Transaksi berhasil ditambahkan');
			return redirect()->to('dashboard/jenis-transaksi');
		} else {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Jenis Transaksi gagal ditambahkan');
			return redirect()->back();
		}
	}

	public function edit($id = null)
	{
		$data["title"] = "Ubah Jenis Transaksi";
		$data["current_page"] = "Jenis Transaksi";
		$data["data"] = $this->jenisTransaksi->getById($id);
		// var_dump($data);
		// dd();
		return view("backoffice/jenis-transaksi/edit", $data);
	}

	public function update($id = null)
	{
		$nama = $this->request->getPost("nama");
		$valid = $this->validateData(["nama" => $nama], $this->jenisTransaksi->rules());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		$data = [
			"nama" => $nama
		];
		if ($this->jenisTransaksi->updateData($id, $data)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Jenis Transaksi berhasil diubah');
			return redirect()->to('dashboard/jenis-transaksi');
		} else {

			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Jenis Transaksi gagal diubah');
			return redirect()->back();
		}
	}
	public function delete($id = null)
	{
		try {
			if ($this->jenisTransaksi->deleteData($id)) {
				session()->setFlashdata("status_success", true);
				session()->setFlashdata('message', 'Jenis Transaksi berhasil dihapus');
				return redirect()->to('dashboard/jenis-transaksi');
			} else {
				session()->setFlashdata("status_error", true);
				session()->setFlashdata('error', 'Jenis Transaksi gagal dihapus');
				return redirect()->back();
			}
		} catch (\Throwable $th) {
			//handle error contrain table
			if ($th->getCode() == 1451) {
				session()->setFlashdata("status_error", true);
				session()->setFlashdata('error', 'Jenis Transaksi gagal dihapus, Data sedang digunakan di bagian lain sistem');
				return redirect()->to('dashboard/jenis-transaksi');
			}
		}
	}
}
