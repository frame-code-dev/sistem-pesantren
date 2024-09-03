<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Santri_model;
use CodeIgniter\HTTP\ResponseInterface;

class PSBController extends BaseController
{
    protected $helpers = ['form'];
	protected $santriModel;
	protected $validation;

    public function __construct()
	{
		$this->validation = \Config\Services::validation();
		$this->santriModel = new Santri_model();
	}
    public function index()
    {
        $param['title'] = 'Penerimaan Peserta Didik Baru';
        return view('frontend/psb/index',$param);
    }

    public function create()
    {
        $param['title'] = 'Form Penerimaan Peserta Didik Baru';
        return view('frontend/psb/create',$param);
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

        // validasi
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
			return redirect()->to('psb');
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
}
