<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		
		$this->simple_login->cek_login();

	}

	

	public function index()
	{
	
		$header_transaksi 	= $this->header_transaksi_model->list_semua();
		$data 	= array( 'title'				=> 'Halaman Dashboard Pelanggan',
						 'header_transaksi' 	=> $header_transaksi,
						 'isi'					=> 'admin/dasbor/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function detail($kode_transaksi){

			// ambil data login id pelanggan dari session
		
			$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
			$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
			

			$data 	= array( 'title'				=> 'Riwayat Belanja',
							 'header_transaksi' 	=> $header_transaksi,
							 'transaksi'			=> $transaksi,
							 'isi'					=> 'admin/dasbor/detail'
						);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// konfirmasi pembayaran
	public function konfirmasi_admin($kode_transaksi){

		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$rekening 			= $this->rekening_model->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('status_bayar', 'Status', 'required',
			array('required' => '%s harus di isi'));

		
		


		if($valid->run()) {
			
			// proses edit produk tanpa ganti gambar
			$i = $this->input;
					$data = array(  
							'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
							'status_bayar' 			=> $i->post('status_bayar'),
							'nomor_resi' 			=> $i->post('nomor_resi')
								
						);

			$this->header_transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
			redirect(base_url('admin/dasbor'),'refresh');
		}
	

		$data = array(  'title'				=> 'Konfirmasi Pembayaran',
						'header_transaksi' 	=> $header_transaksi,
						'rekening'			=> $rekening,
						'isi'				=> 'admin/dasbor/konfirmasi'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//end masuk database

	} // masuk data base

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/admin/Dasbor.php */