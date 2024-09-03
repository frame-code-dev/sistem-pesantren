<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Session\Session;

class Auth_model extends Model
{
	private $_table = "users";
	const SESSION_KEY = 'user_id';


	public function rules()
	{
		return [
			[
				'username' => 'required',
				'password' => 'required|max_length[255]'
			],
		];
	}

	public function login($username, $password)
	{
		$query = $this->db->table($this->_table)->where("username", $username)->get()->getRow();
		$user = $query;
		// cek apakah user sudah terdaftar?
		if (!$user) {
			return FALSE;
		}
		// cek apakah password-nya benar?
		if (!password_verify($password, $user->password)) {
			return FALSE;
		}

		// bikin session
		session()->set(self::SESSION_KEY, $user->id);
		session()->set("username", $user->username);
		session()->set("name", $user->nama);
		session()->set("role", $user->role);
		session()->set("image", $user->image);
		session()->set("isLogin", true);
		return $user->id;
		// $this->session->set_userdata([self::SESSION_KEY => $user->id]);

		// return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{

		$session = session();

        if (!$session->has(self::SESSION_KEY)) {
            return null;
        }

        $user_id = $session->get(self::SESSION_KEY);
        
        $db = \Config\Database::connect();
        $query = $db->table($this->_table)->getWhere(['id' => $user_id]);
        
        return $query->getRow();
	}

	public function logout()
	{
	  // Memulai session
	  $session = session();
        
	  // Menghapus semua data session
	  return $session->destroy();
	  
	}
}
