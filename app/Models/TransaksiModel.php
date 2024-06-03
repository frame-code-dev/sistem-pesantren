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
			'santri' => 'required',
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
			->orderBy("id", "desc")
			->get();
	}

	public function getPendaftaranUlang()
	{
		return  $this->select("transaksi.*, jenis_transaksi.nama as jenis, santri.nama as santri, santri.nis as nis")
			->join("jenis_transaksi", "transaksi.jenis_id = jenis_transaksi.id", "array")
			->join("santri", "transaksi.santri_id = santri.id", "array")
			->where("transaksi.jenis_id", 2)
			->where("transaksi.kategori", "pemasukan")
			->orderBy("id", "desc")
			->get();
	}
	public function getPengeluaran()
	{
		return  $this->select("transaksi.*, jenis_transaksi.nama as jenis, santri.nama as santri, santri.nis as nis")
			->join("jenis_transaksi", "transaksi.jenis_id = jenis_transaksi.id", "array")
			->join("santri", "transaksi.santri_id = santri.id", "array")
			->where("transaksi.jenis_id", 4)
			->where("transaksi.kategori", "pengeluaran")
			->orderBy("id", "desc")
			->get();
	}

	public function getPemasukan()
	{
		return  $this->select("transaksi.*, jenis_transaksi.nama as jenis, santri.nama as santri, santri.nis as nis")
			->join("jenis_transaksi", "transaksi.jenis_id = jenis_transaksi.id", "array")
			->join("santri", "transaksi.santri_id = santri.id", "array")
			->where("transaksi.jenis_id", 4)
			->where("transaksi.kategori", "pemasukan")
			->orderBy("id", "desc")
			->get();
	}


	public function storePendaftaran($data)
	{
		return  $this->insert($data);
	}

	public function storePengeluaran($data)
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
			->orderBy("tanggal_bayar", "desc")
			->get();
	}


	public function storeBulanan($data)
	{
		return  $this->insert($data);
	}
	public function updatePengeluaran($data, $id)
	{
		return  $this->update($id, $data);
	}
	public function generateKode()
	{
		$prefix = 'KT';
		$date = date('dmy');
		$kode = $prefix . $date;
		$countData = $this->like("no_transaksi", "%$kode%")->countAllResults();
		$counter = sprintf('%03d', $countData + 1);
		return $prefix . $date . $counter;
	}
}
