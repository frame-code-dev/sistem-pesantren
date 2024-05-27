<?php

namespace App\Models;

use CodeIgniter\Model;

class VisiMisiModel extends Model
{
	private $_table = "visi_misi";


	public function rules()
	{
		return [
			[
				'text' => 'required',
			],
		];
	}


	public function getData()
	{
		return  $this->db->table($this->_table)->get()->getRow();
	}


	public function store($konten)
	{
		try {
			//get data visi misi
			$visiMisiExist = $this->db->table($this->_table)->get()->getRow();
			//cek data  exist
			if ($visiMisiExist) {
				$this->db->table($this->_table)->update(["text" => $konten], ["id" => $visiMisiExist->id]);
			} else {
				$this->db->table($this->_table)->insert(["text" => $konten]);
			}
			return true;
		} catch (\Throwable $th) {
			return false;
		}
	}
}
