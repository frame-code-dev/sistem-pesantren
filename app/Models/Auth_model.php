<?php

namespace App\Models;

use CodeIgniter\Model;

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
		return $user->id;
		// $this->session->set_userdata([self::SESSION_KEY => $user->id]);

		// return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$user_id = $this->session->userdata(self::SESSION_KEY);

		$query = $this->db->table($this->_table)->where('id', $user_id)->get();
		return $query;
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}
}
