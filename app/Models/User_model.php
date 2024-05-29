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
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
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
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required'
            ],

        ];
    }

    public function getAll()
    {
        return $this->db->table($this->_table)->get();
    }

    public function getById($id)
    {
        return $this->db->table($this->_table)->where("id", $id)->get()->getRow();
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
}
