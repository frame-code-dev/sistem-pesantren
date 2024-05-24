<?php

namespace App\Models;

use CodeIgniter\Model;

class Santri_model extends Model
{
    private $_table = 'santri';

    public function rules()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'nis',
                'label' => 'Nis',
                'rules' => 'required'
            ],
            [
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ],
            [
                'field' => 'telepon',
                'label' => 'Telepon',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_masuk',
                'label' => 'Tanggal masuk',
                'rules' => 'required'
            ],
        ];
    }

    public function rules_edit()
    {
        return [
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'nis',
                'label' => 'Nis',
                'rules' => 'required'
            ],
            [
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
            ],
            [
                'field' => 'telepon',
                'label' => 'Telepon',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal lahir',
                'rules' => 'required'
            ],
            [
                'field' => 'alamat',
                'label' => 'alamat',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_keluar',
                'label' => 'Tanggal keluar',
                'rules' => 'required'
            ],
        ];
    }

    public function getAll()
    {
        return  $this->db->table($this->_table)->get();
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
        return  $this->db->table($this->_table)->where("id", $id)->get();
    }

    public function saveData()
    {
        $post = $this->input->post();
        //data user 
        $data = [
            "nama" => $post["nama"],
            "nis" => $post["nis"],
            "gender" => $post["gender"],
            "telepon" => $post["telepon"],
            "tanggal_lahir" => $post["tanggal_lahir"],
            "alamat" => $post["alamat"],
            "status_santri" => 'aktif',
            "tanggal_masuk" => $post["tanggal_masuk"],
            "created_at" => date('Y-m-d H:i:s')
        ];
        return  $this->db->table($this->_table)->insert($data);
    }

    public function updateData($id)
    {
        $post = $this->input->post();
            return  $this->db->table($this->_table)->update([
                "nama" => $post["nama"],
                "nis" => $post["nis"],
                "gender" => $post["gender"],
                "telepon" => $post["telepon"],
                "tanggal_lahir" => $post["tanggal_lahir"],
                "alamat" => $post["alamat"],
                "tanggal_masuk" => $post["tanggal_masuk"],
                'updated_at' => date('Y-m-d H:i:s')
            ], array('id' => $id));
    }
    public function saveAlumni($id)
    {
        $post = $this->input->post();
            return  $this->db->table($this->_table)->update([
                "status_santri" => 'alumni',
                "tanggal_keluar" => $post["tanggal_keluar"],
                'updated_at' => date('Y-m-d H:i:s')
            ], array('id' => $id));
    }

    public function saveBackAktif($id)
    {
        $post = $this->input->post();
            return  $this->db->table($this->_table)->update([
                "status_santri" => 'aktif',
                "tanggal_keluar" => null,
                'updated_at' => date('Y-m-d H:i:s')
            ], array('id' => $id));
    }

    public function deleteData($id)
    {
        return  $this->db->table($this->_table)->delete(array("id" => $id));
    }
}
