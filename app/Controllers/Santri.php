<?php

namespace App\Controllers;

use App\Models\Santri_model;


class Santri extends BaseController
{
	protected $helpers = ['form'];
	protected $santriModel;
	protected $validation;

	public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->santriModel = new Santri_model();
		if (!session()->get("user_id")) {
			redirect('/');
		}
		
	}

	public function index()
	{
		$santri = $this->santriModel->getSantriAktif();
		$data['santri'] = $santri->getResultArray();
		return view("backoffice/santri/index", $data);
	}
	public function create()
	{
		return view("backoffice/santri/create");
	}

	public function store()
	{
		$nis = $this->request->getPost("nis");
		$nama = $this->request->getPost("nama");
		$gender = $this->request->getPost("gender");
		$telepon = $this->request->getPost("telepon");
		$tanggal_lahir = $this->request->getPost("tanggal_lahir");
		$alamat = $this->request->getPost("alamat");
		$status = 'aktif';
		$tanggal_masuk = $this->request->getPost("tanggal_masuk");

		$validation = $this->validateData([
			"nis" => $nis,
			"nama" => $nama,
			"gender" => $gender,
			"telepon" => $telepon,
			"tanggal_lahir" => $tanggal_lahir,
			"alamat" => $alamat,
			"tanggal_masuk" => $tanggal_masuk,
		], $this->santriModel->rules());
		if (!$validation) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {
			$nisExist = $this->santriModel->getByNis($nis);
			if ($nisExist) {
				session()->setFlashdata("status_error", true);
				session()->setFlashdata('error', 'Data santri gagal ditambahkan, Nis sudah terdaftar.');
				return redirect()->back();
			}
	
			$data = [
				"nis" => $nis,
				"nama" => $nama,
				"gender" => $gender,
				"telepon" => $telepon,
				"tanggal_masuk" => $tanggal_masuk,
				"tanggal_lahir" => $tanggal_lahir,
				"alamat" => $alamat,
				"status_santri" => $status,
				"created_at" => date("Y-m-d H:i:s"),
			];
			$this->santriModel->saveData($data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data santri berhasil ditambahkan.');
			return redirect()->to('dashboard/santri');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal ditambahkan, <br>'.$th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal ditambahkan, <br>'.$e->getMessage());
			return redirect()->back();
		}
	}

	public function edit($id = null)
	{
		$data = $this->santriModel->getById($id);
		return view("backoffice/santri/edit", compact("data"));
	}

	public function update($id = null)
	{
		$nis = $this->request->getPost("nis");
		$nama = $this->request->getPost("nama");
		$gender = $this->request->getPost("gender");
		$telepon = $this->request->getPost("telepon");
		$tanggal_lahir = $this->request->getPost("tanggal_lahir");
		$alamat = $this->request->getPost("alamat");
		$status = 'aktif';
		$tanggal_masuk = $this->request->getPost("tanggal_masuk");

		$validation = $this->validateData([
			"nis" => $nis,
			"nama" => $nama,
			"gender" => $gender,
			"telepon" => $telepon,
			"tanggal_lahir" => $tanggal_lahir,
			"alamat" => $alamat,
			"tanggal_masuk" => $tanggal_masuk,
		], $this->santriModel->rules());
		if (!$validation) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {
			$nisExist = $this->santriModel->getByNisUpdate($id, $nis);
			if ($nisExist) {
				session()->setFlashdata("status_error", true);
				session()->setFlashdata('error', 'Data santri gagal ditambahkan, Nis sudah terdaftar.');
				return redirect()->back();
			}

			$data = [
				"nis" => $nis,
				"nama" => $nama,
				"gender" => $gender,
				"telepon" => $telepon,
				"tanggal_masuk" => $tanggal_masuk,
				"tanggal_lahir" => $tanggal_lahir,
				"alamat" => $alamat,
				"status_santri" => $status,
				"created_at" => date("Y-m-d H:i:s"),
			];
			$this->santriModel->updateData($id, $data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data santri berhasil diubah.');
			return redirect()->to('dashboard/santri');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal diubah, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal diubah, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}
	public function delete($id = null)
	{
		try {
			$this->santriModel->deleteData($id);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'santri berhasil dihapus');
			return redirect()->to('dashboard/santri');
		} catch (\Throwable $th) {
			if ($th->getCode() == 1451) { // cek jika data ini digunakan di tabel lain
				session()->setFlashdata("status_error", true);
				session()->setFlashdata('error', 'Data santri gagal dihapus, Data ini sudah digunakan.');
				return redirect()->to('dashboard/santri');
			}
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal dihapus, <br>' . $e->getMessage());
			return redirect()->to('dashboard/santri');
		}
	}

	public function alumni(){
		$alumni = $this->santriModel->getSantriAlumni();
		$santri = $this->santriModel->getSantriAktif();
		$data['alumni'] = $alumni->getResultArray();
		$data['santri'] = $santri->getResultArray();
		return view("backoffice/alumni/index", $data);
	}

	public function addAlumni(){
		$id_santri = $this->request->getPost("santri");
		$tanggal_keluar = $this->request->getPost("tanggal_keluar");
		$validation = $this->validateData([
			"santri" => $id_santri,
			"tanggal_keluar" => $tanggal_keluar,
		], $this->santriModel->rulesAlumni());
		if (!$validation) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}
		try {
			$data = [
				"tanggal_keluar" => $tanggal_keluar,
				"status_santri" => 'alumni',
				"updated_at" => date("Y-m-d H:i:s"),
			];
			$this->santriModel->updateData($id_santri, $data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data alumni berhasil ditambah.');
			return redirect()->to('dashboard/alumni');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data alumni berhasil gagal ditambah, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data alumni berhasil gagal ditambah, <br>' . $e->getMessage());
			return redirect()->back();
		}
	}

	public function updateAktif($id = null)
	{
		try {
			$data = [
				"tanggal_keluar" => null,
				"status_santri" => 'aktif',
				"updated_at" => date("Y-m-d H:i:s"),
			];
			$this->santriModel->updateData($id, $data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'santri berhasil diaktifkan kembali');
			return redirect()->to('dashboard/alumni');
		} catch (\Throwable $th) {	
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal diaktifkan kembali, <br>' . $th->getMessage());
			return redirect()->to('dashboard/alumni');
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal diaktifkan kembali, <br>' . $e->getMessage());
			return redirect()->to('dashboard/alumni');
		}
	}
}
