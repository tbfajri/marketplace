<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	// load model

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('user_model');

		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// data user

	public function index()
	{
		$user = $this->user_model->listing();

		$data = array( 	'title' => 'Data user Produk',
						'user'	=> $user,
						'isi'	=> 'admin/user/list'

					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function ikm()
	{
		$ikm = $this->user_model->listing_ikm();

		$data = array( 	'title' => 'Data IKM Produk',
						'ikm'	=> $ikm,
						'isi'	=> 'admin/user/list_ikm'

					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// tambah user
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
			array('required' => '%s harus di isi',
				   'valid_email' => '%s tidak valid'));

		$valid->set_rules('username', 'username', 'required|min_length[6]|max_length[32]|is_unique[users.username]',
			array('required' 	=> '%s harus di isi',
				  'min_length'	=> '%s minimal 6 karakter',
				  'max_length'	=> '%s maksimal 32 karakter',
				  'is_unique'	=> '%s sudah ada. Buat username baru'
					));

		$valid->set_rules('password', 'Password', 'required',
			array('required' => '%s harus di isi'));


		if($valid->run()===FALSE) {
			// end validasi

		$data = array( 	'title' => 'Tambah user Produk',
						'isi'	=> 'admin/user/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk data base

		} else {

			$i = $this->input;
			$data = array(  'nama' 	=> $i->post('nama'),
							'email' 	=> $i->post('email'),
							'username' 	=> $i->post('username'),
							'password' 	=> SHA1($i->post('password')),
							'akses_level' 	=> $i->post('akses_level'),
				
				);

			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di tambah');
			redirect(base_url('admin/user'),'refresh');
		}		
	}

	// tambah edit
	public function edit ($id_user)
	{

		$user = $this->user_model->detail($id_user);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama Lengkap', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
			array('required' => '%s harus di isi',
				   'valid_email' => '%s tidak valid'));


		$valid->set_rules('password', 'Password', 'required',
			array('required' => '%s harus di isi'));


		if($valid->run()===FALSE) {
			// end validasi

		$data = array( 	'title' => 'Edit Kategori Produk',
						'user'	=> $user,
						'isi'	=> 'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk data base

		} else {

			$i = $this->input;

			$data = array(  'id_user'		=> $id_user,
							'nama' 			=> $i->post('nama'),
							'email' 		=> $i->post('email'),
							'username' 		=> $i->post('username'),
							'password' 		=> SHA1($i->post('password')),
							'akses_level' 	=> $i->post('akses_level'),
				
				);

			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('admin/user'),'refresh');
		}		
	}
	// function delete
	public function delete($id_user)
	{
		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah di hapus');
		redirect(base_url('admin/user'),'refresh');
	}


	// tambah edit
	public function edit_ikm ($id_pelanggan)
	{

		$user = $this->user_model->detail($id_pelanggan);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
			array('required' => '%s harus di isi',
				   'valid_email' => '%s tidak valid'));


		$valid->set_rules('password', 'Password', 'required',
			array('required' => '%s harus di isi'));


		if($valid->run()===FALSE) {
			// end validasi

		$data = array( 	'title' => 'Edit Kategori Produk',
						'ikm'	=> $ikm,
						'isi'	=> 'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk data base

		} else {

			$i = $this->input;

			$data = array(  'id_pelanggan'	=> $id_pelanggan,
							'nama_pelanggan'=> $i->post('nama_pelanggan'),
							'email' 		=> $i->post('email'),
							'username' 		=> $i->post('username'),
							'password' 		=> SHA1($i->post('password')),
							'akses_level' 	=> $i->post('akses_level'),
				
				);

			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('admin/user'),'refresh');
		}		
	}
	// function delete
	public function delete_ikm($id_user)
	{
		$data = array('id_user' => $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah di hapus');
		redirect(base_url('admin/user'),'refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */