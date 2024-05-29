<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
	protected $table = 'transaksi';
	protected $allowedFields = [
		'kategori',
		'santri_id',
		'nominal',
		'no_transaksi',
		'jenis_id',
		'tanggal_bayar',
		'bulan',
		'tahun',
		'user_id',
		'created_at',
		'updated_at'
	];

	public function rulesPendaftaran()
	{
		return [
			'tanggal_bayar' => 'required',
			'nominal' => 'required',
		];
	}
	public function rulesBulanan()
	{
		return [
			'santri' => 'required',
			'nominal' => 'required',
			'bulan' => 'required',
			'tahun' => 'required',
		];
	}

	public function getPendaftaran()
	{
		return  $this->select("transaksi.*, jenis_transaksi.nama as jenis, santri.nama as santri, santri.nis as nis")
			->join("jenis_transaksi", "transaksi.jenis_id = jenis_transaksi.id", "array")
			->join("santri", "transaksi.santri_id = santri.id", "array")
			->where("transaksi.jenis_id", 1)
			->where("transaksi.kategori", "pemasukan")
			->get();
	}

	public function storePendaftaran($data)
	{
		return  $this->insert($data);
	}

	public function detailTransaksi($id)
	{
		return  $this->where("id", $id)->get()->getRow();
	}

	public function getBulanan()
	{
		return  $this->select("transaksi.*, jenis_transaksi.nama as jenis, santri.nama as santri, santri.nis as nis")
			->join("jenis_transaksi", "transaksi.jenis_id = jenis_transaksi.id", "array")
			->join("santri", "transaksi.santri_id = santri.id", "array")
			->where("transaksi.jenis_id", 3)
			->where("transaksi.kategori", "pemasukan")
			->get();
	}


	public function storeBulanan($data)
	{
		return  $this->insert($data);
	}
	public function generateKode()
	{
		$prefix = 'KT';
		$date = date('dmy');
		$kode = $prefix . $date;
		$countData = $this->like("no_transaksi", "%$kode%")->countAll();
		$counter = sprintf('%03d', $countData + 1);
		return $prefix . $date . $counter;
	}
}
