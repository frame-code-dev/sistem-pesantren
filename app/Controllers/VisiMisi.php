<?php

namespace App\Controllers;

use App\Models\VisiMisiModel;

class VisiMisi extends BaseController
{
	protected $helpers = ['form'];

	private $visiMisi;
	public function __construct()
	{
		$this->visiMisi = new VisiMisiModel();

		if (!session()->get("user_id")) {
			redirect('/');
		}
	}

	public function index()
	{

		$data["data"] = $this->visiMisi->getData();
		return view("backoffice/visi-misi/index", $data);
	}
	public function create()
	{
	}

	public function store()
	{
		$konten = $this->request->getPost("konten");
		if ($this->visiMisi->store($konten)) {
			session()->setFlashdata('message_visiMisi_success', 'Berhasil menyimpan visi misi');
			return redirect()->to("/dashboard/visi-misi");
		}
		session()->setFlashdata('message_visiMisi_error', 'Gagal menyimpan visi misi');
		return redirect()->back();
	}

	public function edit($id = null)
	{
	}

	public function update($id = null)
	{
	}
	public function delete($id = null)
	{
	}
}
