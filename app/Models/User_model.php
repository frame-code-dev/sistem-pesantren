<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'users';
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
        return $this->db->table($this->_table)->where("id", $id)->get();
    }

    public function countData($role)
    {
        $query = $this->db->table($this->_table)->where("role", $role)->countAll();
        return $query;
    }


    public function saveData()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->role = $post["role"];
        $this->created_at = date('Y-m-d H:i:s');
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        //data user 
        $data = [
            "nama" => $post["nama"],
            "username" => $post["username"],
            "role" => $post["role"],
            "created_at" => date('Y-m-d H:i:s')
        ];
        return $this->db->table($this->_table)->insert($data);
    }

    public function updateData($id)
    {
        $post = $this->input->post();
        if ($post["password"] != "") {
            return $this->db->table($this->_table)->update([
                'nama' => $post['nama'],
                'username' => $post['username'],
                'role' => $post['role'],
                'password' => password_hash($post["password"], PASSWORD_DEFAULT),
                'updated_at' => date('Y-m-d H:i:s')
            ], array('id' => $id));
        } else {
            return $this->db->table($this->_table)->update([
                'nama' => $post['nama'],
                'username' => $post['username'],
                'role' => $post['role'],
                'updated_at' => date('Y-m-d H:i:s')
            ], array('id' => $id));
        }
    }

    public function deleteData($id)
    {
        return $this->db->table($this->_table)->delete(array("id" => $id));
    }
}
