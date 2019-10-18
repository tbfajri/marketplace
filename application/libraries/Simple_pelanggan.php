<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();

        // load data model kategoris
        $this->CI->load->model('pelanggan_model');
	}

	public function login($email, $password)
	{
		$check = $this->CI->pelanggan_model->login($email, $password);
		// jika ada data kategori, maka create session login

		if($check){
			$id_pelanggan		= $check->id_pelanggan;
			$nama_pelanggan		= $check->nama_pelanggan;
			$id_penjual			= $check->id_penjual;

			// create session
			$this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
			$this->CI->session->set_userdata('id_penjual', $id_penjual);
			$this->CI->session->set_userdata('nama_pelanggan', $nama_pelanggan);
			$this->CI->session->set_userdata('email', $email);


			//redirect ke halaman admin yang dproteksi
			redirect(base_url('dasbor'),'refresh');
			
		} else {
			// jika gagal, maka login kembali
			$this->CI->session->set_flashdata( 'sukses', 'Username atau Password salah');
			redirect(base_url('masuk'),'refresh');

		}

	}

	// fun
	public function cek_login(){
			// memeriksa apakah session sudah ada atau belum, jika beleum kemabali ke halaman login
		if ($this->CI->session->userdata('email') == "") {
			$this->CI->session->set_flashdata( 'sukses', 'Anda beleum login');
			redirect(base_url('masuk'),'refresh');
		}
	}
	public function sudah_login(){
			// memeriksa apakah session sudah ada atau belum, jika beleum kemabali ke halaman login
		if ($this->CI->session->userdata('email') != "") {
			$this->CI->session->set_flashdata( 'sukses', 'Anda beleum login');
			redirect(base_url('dasbor'),'refresh');
		}
	}

	// fungsi logout
	public function logout(){

		// membuang session
			$this->CI->session->unset_userdata('id_pelanggan');
			$this->CI->session->unset_userdata('id_penjual');
			$this->CI->session->unset_userdata('nama_pelanggan');
			$this->CI->session->unset_userdata('email');
			//setelah logout
			$this->CI->session->set_flashdata( 'warning', 'Anda berhasil logout');
			redirect(base_url('masuk'),'refresh');

	}

	

}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
