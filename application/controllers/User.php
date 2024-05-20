<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		$this->load->library('form_validation');
		$this->load->model('auth_model');
		if(!$this->auth_model->current_user()){
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['current_user'] = $this->auth_model->current_user();
		$users = $this->User_model->getAll();
		$data['data'] = $users;
		$data['count_admin'] = $this->User_model->countData('admin');
		$data['count_doctor'] =	$this->User_model->countData('dokter');
		$data['count_perawat'] = $this->User_model->countData('perawat');
		$data['count_rm'] = $this->User_model->countData('rm');
		$this->load->view('backoffice/user/index', $data);
	}
	public function create()
	{
		$data['title'] = 'Tambah User';
		$data['current_page'] = 'List User';
		$data['current_user'] = $this->auth_model->current_user();
		$this->load->view('backoffice/user/create', $data);
	}

	public function store() {
		$data['title'] = 'Tambah User';
		$data['current_page'] = 'List User';

		$tambah = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($tambah->rules());

        if ($validation->run()) {
            $tambah->save();
            $this->session->set_flashdata('message', 'Berhasil menambahkan data.');
			redirect('user');
        }else{
			$this->load->view('backoffice/user/create', $data);
		}
	}

	public function edit($id = null) {
		if (!isset($id)) redirect('user');

		$data['title'] = 'Edit User';
		$data['current_page'] = 'List User';
		$data['current_user'] = $this->auth_model->current_user();
		$data['user'] = $this->User_model->getById($id);
		if (!$data['user']) show_404();

		$this->load->view('backoffice/user/edit', $data);
	}

	public function update($id = null)
    {
        if (!isset($id)) redirect('user');
       
        $user = $this->User_model;
        $validation = $this->form_validation;
        $validation->set_rules($user->rules_edit());

        if ($validation->run()) {
            $user->updateData($id);
            $this->session->set_flashdata('message', 'Berhasil mengganti data');
			redirect('user');
        }else{
			$data['title'] = 'Edit User';
			$data['current_page'] = 'List User';
			$data["user"] = $user->getById($id);
			
			$this->load->view("backoffice/user/edit", $data);
		}

    }
	public function delete($id = null) {
		if (!isset($id)) redirect('user');
		$user = $this->User_model;
		$user->delete($id);
		$this->session->set_flashdata('message', 'Berhasil menghapus data');
		redirect('user');
	}
}
