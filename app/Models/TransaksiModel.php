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
		'keterangan',
		// 'created_at',
		// 'updated_at'
	];

	public function rulesPendaftaran()
	{
		return [
			'santri' => 'required',
			'tanggal_bayar' => 'required',
			'nominal' => 'required',
		];
	}
	public function rulesUpdatePendaftaran()
	{
		return [
			'tanggal_bayar' => 'required',
			'nominal' => 'required',
		];
	}
	public function rulesPengeluaran()
	{
		return [
			'keterangan' => 'required',
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
	public function getPengeluaranById($id)
	{
		return  $this->select("transaksi.*, jenis_transaksi.nama as jenis, santri.nama as santri, santri.nis as nis")
			->join("jenis_transaksi", "transaksi.jenis_id = jenis_transaksi.id", "array")
			->join("santri", "transaksi.santri_id = santri.id", "array")
			->where("transaksi.jenis_id", 4)
			->where("transaksi.kategori", "pengeluaran")
			->where("santri_id", $id)
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
	public function getPemasukanById($id)
	{
		return  $this->select("transaksi.*, jenis_transaksi.nama as jenis, santri.nama as santri, santri.nis as nis")
			->join("jenis_transaksi", "transaksi.jenis_id = jenis_transaksi.id", "array")
			->join("santri", "transaksi.santri_id = santri.id", "array")
			->where("transaksi.jenis_id", 4)
			->where("transaksi.kategori", "pemasukan")
			->where("santri_id", $id)
			->orderBy("id", "desc")
			->get();
	}

	public function getTotalTabungan()
	{
		return	$this->db->query('SELECT 
			COALESCE(SUM(t1.nominal), 0) - 
			COALESCE((SELECT SUM(t2.nominal) FROM transaksi t2 WHERE t2.kategori = "pengeluaran" AND t2.jenis_id is null), 0) AS totalTabungan FROM transaksi t1 WHERE t1.jenis_id <> 4 AND t1.kategori = "pemasukan";')
			->getRow();
	}
	public function getTotalTabunganIgnore($idPengeluaran)
	{
		return	$this->db->query("SELECT 
			COALESCE(SUM(t1.nominal), 0) - 
			COALESCE((SELECT SUM(t2.nominal) FROM transaksi t2 WHERE t2.kategori = 'pengeluaran' AND t2.jenis_id is null  AND id <> $idPengeluaran), 0) AS totalTabungan FROM transaksi t1 WHERE t1.jenis_id <> 4 AND t1.kategori = 'pemasukan';")
			->getRow();
	}
	public function getTotalTabunganSantri($idSantri)
	{
		return	$this->db->query("SELECT 
			COALESCE(SUM(t1.nominal), 0) - 
			COALESCE((SELECT SUM(t2.nominal) FROM transaksi t2 WHERE t2.kategori = 'pengeluaran' AND t2.jenis_id = 4 AND santri_id = $idSantri), 0) AS totalTabungan FROM transaksi t1 WHERE santri_id = $idSantri AND t1.jenis_id = 4 AND t1.kategori = 'pemasukan'")
			->getRow();
	}
	//
	public function getTotalTabunganSantriIgnore($idSantri, $idPengeluaran)
	{
		return	$this->db->query("SELECT 
			COALESCE(SUM(t1.nominal), 0) - 
			COALESCE((SELECT SUM(t2.nominal) FROM transaksi t2 WHERE t2.kategori = 'pengeluaran' AND t2.jenis_id = 4 AND id <> $idPengeluaran), 0) AS totalTabungan FROM transaksi t1 WHERE santri_id = $idSantri AND t1.jenis_id = 4 AND t1.kategori = 'pemasukan'")
			->getRow();
	}


	public function storePendaftaran($data)
	{

		return  $this->insert($data);
	}

	public function storePengeluaran($data)
	{
		return $this->insert($data);
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
			->orderBy("id", "desc")
			->get();
	}

	public function storeBulanan($data)
	{
		return  $this->insert($data);
	}
	public function updateBulanan($data, $id)
	{
		return  $this->update($id, $data);
	}
	public function updatePengeluaran($data, $id)
	{
		return  $this->update($id, $data);
	}

	public function getPengeluarans()
	{
		return  $this->where('kategori', 'pengeluaran')
			->orderBy("id", "desc")
			->get();
	}

	public function getPengeluaranPesantren()
	{
		return  $this->where('kategori', 'pengeluaran')
			->where('jenis_id ', null)
			->orderBy("id", "desc")
			->get();
	}

	public function updatePendaftaran($id, $data)
	{
		return  $this->update($id, $data);
	}



	public function deletePengeluaran($id)
	{
		return $this->delete($id);
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
