<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table = "transaksi";
	protected $primaryKey = "id";
	protected $useAutoIncrement = true;
	protected $allowedFields = [];


	public function getPendaftaran()
	{
		return  $this->select("transaksi.*, jenis_transaksi.nama as jenis, santri.nama as santri, santri.nis as nis")
			->join("jenis_transaksi", "transaksi.jenis_id = jenis_transaksi.id", "array")
			->join("santri", "transaksi.santri_id = santri.id", "array")
			->where("transaksi.jenis_id", 1)
			->where("transaksi.kategori", "pemasukan")
			->findAll();
	}
	public function detailTransaksi($id)
	{
		return  $this->where("id", $id)->first();
	}
}
