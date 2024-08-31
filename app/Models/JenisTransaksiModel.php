<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisTransaksiModel extends Model
{
	protected $table = "jenis_transaksi";
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
		return  $this->findAll();
	}
	
	public function getJenisPemasukanLainnya(){
		return  $this->where("id", 5)
					->orWhere("id", 6)
					->orWhere("id", 7)
					->orderBy("id", "desc")
					->get();
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
