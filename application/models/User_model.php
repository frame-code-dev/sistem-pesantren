<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
   private $_table = "users";

   public $id;
   public $nama;
   public $username;
   public $password;
   public $role;
   public $created_at;

    public function rules(){
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

	public function rules_edit(){
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

    public function getAll(){
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

	public function countData($role)
    {
        $query = $this->db->get_where($this->_table, ["role" => $role]);
		if ($query) {
			// Mengembalikan jumlah baris yang sesuai dengan kriteria
			return $query->num_rows();
		} else {
			// Mengembalikan 0 jika ada kesalahan
			return 0;
		}
    }


    public function save()
    {
        $post = $this->input->post();
        $this->nama = $post["nama"];
        $this->username = $post["username"];
        $this->role = $post["role"];
		$this->created_at = date('Y-m-d H:i:s');
        $this->password = password_hash($post["password"], PASSWORD_DEFAULT);
        return $this->db->insert($this->_table, $this);
    }

	public function updateData($id)
    {
        $post = $this->input->post();
		if ($post["password"] != "") {
			return $this->db->update($this->_table, [
				'nama' => $post['nama'],
				'username' => $post['username'],
				'role' => $post['role'],
				'password' => password_hash($post["password"], PASSWORD_DEFAULT),
				'updated_at' => date('Y-m-d H:i:s')
			], array('id' => $id));
		}else{
			return $this->db->update($this->_table, [
				'nama' => $post['nama'],
				'username' => $post['username'],
				'role' => $post['role'],
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			], array('id' => $id));

		}
    }

	public function delete($id)
    {
        return $this->db->delete($this->_table, array("id" => $id));
    }
}
