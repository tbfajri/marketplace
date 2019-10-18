<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        // load data model kategoris
        $this->CI->load->model('kategori_model');
	}

	public function login($username, $password)
	{
		$check = $this->CI->kategori_model->login($username, $password);
		// jika ada data kategori, maka create session login

		if($check){
			$id_user		= $check->id_user;
			$nama			= $check->nama;
			$akses_level	= $check->akses_level;

			// create session
			$this->CI->session->set_userdata('id_user', $id_user);
			$this->CI->session->set_userdata('nama', $nama);
			$this->CI->session->set_userdata('username', $username);
			$this->CI->session->set_userdata('akses_level', $akses_level);

			//redirect ke halaman admin yang dproteksi
			redirect(base_url('admin/dasbor'),'refresh');
			
		} else {
			// jika gagal, maka login kembali
			$this->CI->session->set_flashdata( 'sukses', 'Username atau Password salah');
			redirect(base_url('login'),'refresh');

		}

	}

	// fun
	public function cek_login(){
			// memeriksa apakah session sudah ada atau belum, jika beleum kemabali ke halaman login
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata( 'sukses', 'Anda beleum login');
			redirect(base_url('login'),'refresh');
		} 

	}

	// fungsi logout
	public function logout(){

		// membuang session
			$this->CI->session->unset_userdata('id_user');
			$this->CI->session->unset_userdata('nama');
			$this->CI->session->unset_userdata('username');
			$this->CI->session->unset_userdata('akses_level');
			//setelah logout
			$this->CI->session->set_flashdata( 'warning', 'Anda berhasil logout');
			redirect(base_url('login'),'refresh');

	}

	

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
