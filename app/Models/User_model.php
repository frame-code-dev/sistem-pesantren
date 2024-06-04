<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $_table = 'users';
    protected $primaryKey = 'id';
    public $id;
    public $nama;
    public $username;
    public $password;
    public $role;
    public $created_at;

    protected $allowedFields = ['username', 'email', 'password'];
    protected $returnType = 'array';



    public function rules()
    {
        return [
            'nama' => 'required',
            'username' => 'required',
            'role' => 'required',
            'password' => 'required'
        ];
    }
    public function rules_edit()
    {
        return [
            'nama' => 'required',
            'username' => 'required',
            'role' => 'required',
        ];
    }
    public function rules_profile()
    {
        return [
            'nama' => 'required',
            'username' => 'required',
        ];
    }

    public function getAll()
    {
        return $this->db->table($this->_table)->orderBy("created_at", "desc")->get();
    }

    public function getById($id)
    {
        return $this->db->table($this->_table)->where("id", $id)->get()->getRow();
    }

    public function saveProfile($id, $data)
    {
        if (is_uploaded_file($data["gambar"])) {
            $nameFile = $data["gambar"]->getRandomName();
            $data["image"] = $nameFile;
            $imageFile  = $data["gambar"];
            unset($data["gambar"]);
            $this->storeImage($id, $nameFile, $imageFile);
        } else {
            $data["image"] = null;
        }
        try {
            $this->db->table($this->_table)->where("id", $id)->update($data);
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function countData($role)
    {
        $query = $this->db->table($this->_table)->where("role", $role)->countAll();
        return $query;
    }


    public function saveData($data)
    {
        return $this->db->table($this->_table)->insert($data);
    }

    public function updateData($id, $data)
    {
        return $this->db->table($this->_table)->where('id', $id)->update($data);
    }

    public function deleteData($id)
    {
        return $this->db->table($this->_table)->delete(array("id" => $id));
    }

    public function storeImage($id, $name, $image)
    {
        $image->move("../public/upload/profile/$id/", $name);
    }
}
