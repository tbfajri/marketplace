<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
	}

	public function index()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('email', 'Email', 'required|valid_email|is_unique[pelanggan.email]',
			array('required' 		=> '%s harus di isi',
				   'valid_email' 	=> '%s tidak valid',
					'is_unique'		=>'%s sudah terdaftar'));

		$valid->set_rules('id_penjual', 'User Id Toko', 'is_unique[pelanggan.id_penjual]',
			array('required' 		=> '%s harus di isi',
					'is_unique'		=>'%s sudah terdaftar'));

		$valid->set_rules('password', 'Password', 'required',
			array('required' => '%s harus di isi'));


		if($valid->run()===FALSE) {
			// end validasi

		$data 	= array( 'title'	=> 'Registrasi Pelanggan',
						 'isi'		=> 'registrasi/list'
		);
		$this->load->view('layout/wrapper', $data, FALSE);

		// masuk data base

		} else {
			
			$i = $this->input;

			$data = array(  'id_penjual'		=> $i->post('id_penjual'),
							'status_pelanggan'	=> 'Pending',
							'nama_pelanggan' 	=> $i->post('nama_pelanggan'),
							'email' 			=> $i->post('email'),
							'password' 			=> SHA1($i->post('password')),
							'telepon' 			=> $i->post('telepon'),
							'alamat' 			=> $i->post('alamat'),
							'tanggal_daftar' 	=> date('Y-m-d H:i:s')
				
				);

			$this->pelanggan_model->tambah($data);
			// create session login pelanggan
			$this->session->set_userdata('email',$i->post('email'));
			$this->session->set_userdata('nama_pelanggan', $i->post('nama_pelanggan'));
			$this->session->set_userdata('id_penjual', $i->post('id_penjual'));

			// end create session
			$this->session->set_flashdata('sukses', 'Registrasi berhasil');
			redirect(base_url('registrasi/sukses'),'refresh');
		}
	}

	public function sukses()
	{
		$data = array(	'title'	=> 'Registrasi berhasil',
						'isi'	=> 'masuk/list'	
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */