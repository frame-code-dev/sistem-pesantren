<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
	protected $table = "ketegori_berita";
	protected $primaryKey = "id";
	protected $useAutoIncrement = true;
	protected $allowedFields = ['nama'];


	public function rules()
	{
		return [
			'nama' => 'required',
		];
	}


	public function getAll()
	{
		return  $this->orderBy("id", "desc")->findAll();
	}
	public function getById($id)
	{
		return  $this->where("id", $id)->first();
	}

	public function store($data)
	{
		try {
			return  $this->insert($data);
		} catch (\Throwable $th) {
			return false;
		}
	}
	public function updateData($id, $data)
	{
		try {
			return  $this->update($id, $data);
		} catch (\Throwable $th) {
			return false;
		}
	}

	public function deleteData($id)
	{
		return  $this->delete($id);
	}
}
