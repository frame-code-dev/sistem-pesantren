<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class Santri_model extends Model
{
    private $_table = 'santri';


    public function rules()
    {
        return [
            'nama' => 'required',
            'nis' => 'required|min_length[10]|max_length[10]',
            'gender' => 'required',
            'telepon' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required',
        ];
    }
    public function rulesAlumni()
    {
        return [
            'santri' => 'required',
            'tanggal_keluar' => 'required',
        ];
    }

    // semua santri
    public function getAll()
    {
        return  $this->findAll();
    }

    //santri yg belum melakukan registrasi
    public function getSantriRegistrasi()
    {
        return  $this->db->table($this->_table)->where('status_santri', 'belum_registrasi')->get();
    }

    // santri yg blum registrasi ulang
    public function getSantriRegistrasiUlang()
    {
        return  $this->db->table($this->_table)->where('status_santri', 'belum_registrasi_ulang')->get();
    }

    // semua santri kecuali alumni
    public function getSantriAktif()
    {
        return  $this->db->table($this->_table)->where('status_santri', 'aktif')->orWhere('status_santri', 'belum_registrasi')->orWhere('status_santri', 'belum_registrasi_ulang')->get();
    }

    // santri alumni
    public function getSantriAlumni()
    {
        return  $this->db->table($this->_table)->where('status_santri', 'alumni')->get();
    }

    // detail santri by id
    public function getById($id)
    {
        return  $this->db->table($this->_table)->where("id", $id)->get()->getRow();
    }

    // detail santri by nis
    public function getByNis($nis)
    {
        return  $this->db->table($this->_table)->where("nis", $nis)->get()->getRow();
    }

    // get santri by nis update
    public function getByNisUpdate($id, $nis)
    {
        return  $this->db->table($this->_table)->where('id', '!=', $id)->where("nis", $nis)->get()->getRow();
    }

    // update status santri
    public function updateStatus($id, $status)
    {
        return $this->db->table($this->_table)->where('id', $id)->update([
            'status_santri' => $status
        ]);
    }

    public function saveData($data)
    {
        return  $this->db->table($this->_table)->insert($data);
    }

    public function updateData($id, $data)
    {
        return $this->db->table($this->_table)->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return $this->db->table($this->_table)->where('id', $id)->delete();
    }
}
