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

    public function getAll()
    {
        return  $this->findAll();
    }

    public function getSantriAktif()
    {
        return  $this->db->table($this->_table)->where('status_santri', 'aktif')->get();
    }

    public function getSantriAlumni()
    {
        return  $this->db->table($this->_table)->where('status_santri', 'alumni')->get();
    }

    public function getById($id)
    {
        return  $this->db->table($this->_table)->where("id", $id)->get()->getRow();
    }
    public function getByNis($nis)
    {
        return  $this->db->table($this->_table)->where("nis", $nis)->get()->getRow();
    }

    public function getByNisUpdate($id, $nis)
    {
        return  $this->db->table($this->_table)->where('id', '!=', $id)->where("nis", $nis)->get()->getRow();
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
