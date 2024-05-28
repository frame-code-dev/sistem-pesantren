<?php

namespace App\Controllers;

use App\Models\Santri_model;
use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
	protected $helpers = ['form'];
	protected $transaksi;
	protected $santri;
	protected $validation;
	public function __construct()
	{
		$this->transaksi = new TransaksiModel();
		$this->santri = new Santri_model();
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

	public function kode_transaksi(){
		$this->transaksi->generateKode();
	}

	public function index()
	{
		$data["tittle"] = "Pemasukan";
		$data["curennt_page"] = "Pendaftaran";
		$data["data"] = $this->transaksi->getPendaftaran()->getResultArray();
		return view("backoffice/pendaftaran/index", $data);
	}
	public function create()
	{
		$data["title"] = "Pemasukan";
		$data["current_page"] = "Pendaftaran";
		$data["santri"] = $this->santri->getSantriRegistrasi()->getResultArray();

		return view("backoffice/pendaftaran/create", $data);
	}

	public function store()
	{
		$santri_id = $this->request->getPost("santri_id");
		$tanggal_bayar = $this->request->getPost("tanggal_bayar");
		
		$pembayaran = $this->request->getPost("nominal");
		$this->replaceRupiah($pembayaran);
		$nominal = $pembayaran;

		
		$valid = $this->validateData([
			"santri" => $santri_id,
			"tanggal_bayar" => $tanggal_bayar,
			"nominal" => $nominal
		], $this->transaksi->rulesPendaftaran());
		if (!$valid) {
			return redirect()->back()->withInput()->with("validation", $this->validator->getErrors());
		}

		try {

			$data = [
				"kategori" => "pemasukan",
				"santri_id" => $santri_id,
				"nominal" => $nominal,
				"no_transaksi" => $this->transaksi->generateKode(),
				"jenis_id" => 1,
				"tanggal_bayar" => $tanggal_bayar,
				"bulan" => null,
				"tahun" => null,
				"user_id" =>  1,
				"created_at" => date("Y-m-d H:i:s"),
			];
			$status = "belum_registrasi_ulang";

			$this->santri->updateStatus($santri_id, $status);
			$this->transaksi->storePendaftaran($data);

			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Pendaftaran santri berhasil.');
			return redirect()->to('dashboard/pendaftaran');
		} catch (\Throwable $th) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Pendaftaran gagal, <br>' . $th->getMessage());
			return redirect()->back();
		} catch (\Exception $e) {
			session()->setFlashdata("status_error", true);
			session()->setFlashdata('error', 'Pendaftaran gagal, <br>' . $e->getMessage());
			return redirect()->back();
		}	
	}
}
