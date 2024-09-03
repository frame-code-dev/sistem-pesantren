<?php

namespace App\Models;

use CodeIgniter\Model;

class PeraturanModel extends Model
{
	private $_table = "peraturan";


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
			$PeraturanExist = $this->db->table($this->_table)->get()->getRow();
			//cek data  exist
			if ($PeraturanExist) {
				$this->db->table($this->_table)->update(["text" => $konten], ["id" => $PeraturanExist->id]);
			} else {
				$this->db->table($this->_table)->insert(["text" => $konten]);
			}
			return true;
		} catch (\Throwable $th) {
			return false;
		}
	}
}
