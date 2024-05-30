<?php

namespace App\Controllers;

use App\Models\PeraturanModel;

class Peraturan extends BaseController
{
	protected $helpers = ['form'];

	private $Peraturan;
	public function __construct()
	{
		$this->Peraturan = new PeraturanModel();

		if (!session()->get("user_id")) {
			redirect('/login');
		}
	}

	public function index()
	{

		$data["data"] = $this->Peraturan->getData();
		return view("backoffice/peraturan/index", $data);
	}

	public function store()
	{
		$konten = $this->request->getPost("konten");
		if ($this->Peraturan->store($konten)) {
			session()->setFlashdata("status_success", true);
			session()->setFlashdata('message', 'Berhasil menyimpan peraturan.');
			return redirect()->to("/dashboard/peraturan");
		}
		session()->setFlashdata("status_error", true);
		session()->setFlashdata('error', 'Gagal menyimpan peraturan.');
		return redirect()->back();
	}
}
