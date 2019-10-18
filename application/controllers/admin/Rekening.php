<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	// load model

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('rekening_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// data user

	public function index()
	{
		$rekening = $this->rekening_model->listing();

		$data = array( 	'title' => 'Data rekening',
						'rekening'	=> $rekening,
						'isi'	=> 'admin/rekening/list'

					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// tambah user
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank', 'Nama rekening', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('nama_pemilik', 'Nama Pemilik', 'required',
			array('required' => '%s harus di isi'));
		

		$valid->set_rules('nomor_rekening', 'Nomor rekening', 'required|is_unique[rekening.nomor_rekening]',
			array('required' => '%s harus di isi',
				  'is_unique' => '%s Sudah Ada, buat nomor rekening baru !!'));


		if($valid->run()===FALSE) {
			// end validasi

		$data = array( 	'title' => 'Tambah user ',
						'isi'	=> 'admin/rekening/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk data base
		} else {

			$i 		= $this->input;
			$data = array(  'nama_bank' 		=> $i->post('nama_bank'),
							'nomor_rekening' 	=> $i->post('nomor_rekening'),
							'nama_pemilik'		=> $i->post('nama_pemilik')				
				);

			$this->rekening_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di tambah');
			redirect(base_url('admin/rekening'),'refresh');
		}		
	}

	// tambah edit
	public function edit ($id_rekening)
	{

		$rekening = $this->rekening_model->detail($id_rekening);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank', 'Nama rekening', 'required',
			array('required' => '%s harus di isi'));


		if($valid->run()===FALSE) {
			// end validasi

		$data = array( 	'title' => 'Edit rekening ',
						'rekening'	=> $rekening,
						'isi'	=> 'admin/rekening/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk data base

		} else {

			$i 				= $this->input;

			$data = array(  'id_rekening'		=> $id_rekening,
							'nama_bank' 		=> $i->post('nama_bank'),
							'nomor_rekening' 	=> $i->post('nomor_rekening'),
							'nama_pemilik'		=> $i->post('nama_pemilik')	
					);

			$this->rekening_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('admin/rekening'),'refresh');
		}		
	}
	// function delete


	public function delete($id_rekening)
	{
		$data = array('id_rekening' => $id_rekening);
		$this->rekening_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah di hapus');
		redirect(base_url('admin/rekening'),'refresh');
	}

}

/* End of file rekening.php */
/* Location: ./application/controllers/admin/rekening.php */