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
		// data diri
		$nis = $this->request->getPost("nis");
		$nama = $this->request->getPost("nama");
		$nisn = $this->request->getPost("nisn");
		$nik_santri = $this->request->getPost("nik_santri");
		$tempat_lahir = $this->request->getPost("tempat_lahir");
		$no_kk = $this->request->getPost("no_kk");
		$gender = $this->request->getPost("gender");
		$telepon = $this->request->getPost("telepon");
		$tanggal_lahir = $this->request->getPost("tanggal_lahir");
		$alamat = $this->request->getPost("alamat");
		$tanggal_masuk = $this->request->getPost("tanggal_masuk");
		// data orang tua
		$nama_ibu = $this->request->getPost("nama_ibu");
		$nik_ibu = $this->request->getPost("nik_ibu");
		$nama_ayah = $this->request->getPost("nama_ayah");
		$nik_ayah = $this->request->getPost("nik_ayah");
		// file santri
		$image = $this->request->getFile("image");
		$foto_kk = $this->request->getFile("foto_kk");
		$foto_akte = $this->request->getFile("foto_akte");
		$foto_ijazah = $this->request->getFile("foto_ijazah");
		$foto_skhu = $this->request->getFile("foto_skhu");

		$validation = $this->validateData([
			"nis" => $nis,
			"nama" => $nama,
			"nisn" => $nisn,
			"nik_santri" => $nik_santri,
			"no_kk" => $no_kk,
			"tempat_lahir" => $tempat_lahir,
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
				// data diri
				"nis" => $nis,
				"nama" => $nama,
				"nisn" => $nisn,
				"nik_santri" => $nik_santri,
				"no_kk" => $no_kk,
				"tempat_lahir" => $tempat_lahir,
				"gender" => $gender,
				"telepon" => $telepon,
				"tanggal_lahir" => $tanggal_lahir,
				"alamat" => $alamat,
				"tanggal_masuk" => $tanggal_masuk,
				// data orang tua
				"nama_ibu" => $nama_ibu,
				"nik_ibu" => $nik_ibu,
				"nama_ayah" => $nama_ayah,
				"nik_ayah" => $nik_ayah,
				// file santri
				"foto_diri" => $image,
				"foto_kk" => $foto_kk,
				"foto_akte" => $foto_akte,
				"foto_ijazah" => $foto_ijazah,
				"foto_skhu" => $foto_skhu,

				"created_at" => date("Y-m-d H:i:s"),
			];
			$this->santriModel->saveData($data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data santri berhasil ditambahkan.');
			return redirect()->to('dashboard/santri');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal ditambahkan, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal ditambahkan, <br>' . $e->getMessage());
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
		// data diri
		$nis = $this->request->getPost("nis");
		$nama = $this->request->getPost("nama");
		$nisn = $this->request->getPost("nisn");
		$nik_santri = $this->request->getPost("nik_santri");
		$tempat_lahir = $this->request->getPost("tempat_lahir");
		$no_kk = $this->request->getPost("no_kk");
		$gender = $this->request->getPost("gender");
		$telepon = $this->request->getPost("telepon");
		$tanggal_lahir = $this->request->getPost("tanggal_lahir");
		$alamat = $this->request->getPost("alamat");
		$tanggal_masuk = $this->request->getPost("tanggal_masuk");
		// data orang tua
		$nama_ibu = $this->request->getPost("nama_ibu");
		$nik_ibu = $this->request->getPost("nik_ibu");
		$nama_ayah = $this->request->getPost("nama_ayah");
		$nik_ayah = $this->request->getPost("nik_ayah");
		// file santri
		$image = $this->request->getFile("image");
		$foto_kk = $this->request->getFile("foto_kk");
		$foto_akte = $this->request->getFile("foto_akte");
		$foto_ijazah = $this->request->getFile("foto_ijazah");
		$foto_skhu = $this->request->getFile("foto_skhu");
		
		$validation = $this->validateData([
			"nis" => $nis,
			"nama" => $nama,
			"nisn" => $nisn,
			"nik_santri" => $nik_santri,
			"no_kk" => $no_kk,
			"tempat_lahir" => $tempat_lahir,
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
			$data = [
				// data diri
				"nis" => $nis,
				"nama" => $nama,
				"nisn" => $nisn,
				"nik_santri" => $nik_santri,
				"no_kk" => $no_kk,
				"tempat_lahir" => $tempat_lahir,
				"gender" => $gender,
				"telepon" => $telepon,
				"tanggal_lahir" => $tanggal_lahir,
				"alamat" => $alamat,
				"tanggal_masuk" => $tanggal_masuk,
				// data orang tua
				"nama_ibu" => $nama_ibu,
				"nik_ibu" => $nik_ibu,
				"nama_ayah" => $nama_ayah,
				"nik_ayah" => $nik_ayah,
				// file santri
				"foto_diri" => $image,
				"foto_kk" => $foto_kk,
				"foto_akte" => $foto_akte,
				"foto_ijazah" => $foto_ijazah,
				"foto_skhu" => $foto_skhu,
				"created_at" => date("Y-m-d H:i:s"),
			];
			$this->santriModel->updateData($id, $data);
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Data santri berhasil diubah.');
			return redirect()->to('dashboard/santri');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal diubah');
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal diubah');
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
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal dihapus, <br>' . $th->getMessage());
			return redirect()->to('dashboard/santri');
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Data santri gagal dihapus, <br>' . $e->getMessage());
			return redirect()->to('dashboard/santri');
		}
	}

	public function alumni()
	{
		$alumni = $this->santriModel->getSantriAlumni();
		$santri = $this->santriModel->getSantriAktif();
		$data['alumni'] = $alumni->getResultArray();
		$data['santri'] = $santri->getResultArray();
		return view("backoffice/alumni/index", $data);
	}

	public function addAlumni()
	{
		$id_santri = $this->request->getPost("santri");
		$tanggal_keluar = $this->request->getPost("tanggal_keluar");
		$motto = $this->request->getPost("motto");
		$validation = $this->validateData([
			"santri" => $id_santri,
			"tanggal_keluar" => $tanggal_keluar,
			"motto" => $motto
		], $this->santriModel->rulesAlumni());
		if (!$validation) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}
		try {
			$data = [
				"tanggal_keluar" => $tanggal_keluar,
				"status_santri" => 'alumni',
				"motto" => $motto,
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
				"motto" => null,
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
