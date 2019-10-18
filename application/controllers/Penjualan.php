<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		// load helper random string
		$this->load->helper('string');
	}
	public function index()
	{
		
		$id_penjual = $this->session->userdata('id_penjual');
		$header_transaksi 	= $this->header_transaksi_model->list_penjualan($id_penjual);
		$data 	= array( 'title'				=> 'Halaman Dashboard Pelanggan',
						 'header_transaksi' 	=> $header_transaksi,
						 'isi'					=> 'dasbor/list_penjualan'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

	}


	public function detail ($kode_transaksi){

		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$data 	= array( 'title'				=> 'Riwayat Belanja',
						 'header_transaksi' 	=> $header_transaksi,
						 'transaksi'			=> $transaksi,
						 'isi'					=> 'dasbor/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	// cetak	
	public function cetak($kode_transaksi){

		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();
		

		$data 	= array( 'title'				=> 'Riwayat Belanja',
						 'header_transaksi' 	=> $header_transaksi,
						 'transaksi'			=> $transaksi,
						 'site'					=> $site,
						
					);
		$this->load->view('dasbor/cetak', $data, FALSE);
	}
// konfirmasi penjualan
	public function konfirmasi($kode_transaksi){

		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$rekening 			= $this->rekening_model->listing();

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank', 'Nama Bank', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('rekening_pembayaran', 'Nomor Rekening', 'required',
			array('required' => '%s harus di isi'
				  ));
		$valid->set_rules('rekening_pelanggan', 'Nama Pemilik Rekening', 'required',
			array('required' => '%s harus di isi'
						  ));

		$valid->set_rules('tanggal_bayar', 'Tanggal Pembayaran', 'required',
			array('required' => '%s harus di isi'
						  ));

		$valid->set_rules('jumlah_bayar', 'Jumlah Pembayaran', 'required',
			array('required' => '%s harus di isi'
						  ));


		if($valid->run()) {
			// Check jika gambar di gantii
			if(!empty($_FILES['bukti_bayar']['name'])){
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // kilobye
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('bukti_bayar')){
				
			// end validasi

		$data = array(  'title'				=> 'Konfirmasi Pembayaran',
						'header_transaksi' 	=> $header_transaksi,
						'eror'	=> $this->upload->display_errors(),
						'rekening'			=> $rekening,
						'isi'				=> 'dasbor/konfirmasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
		} else {

			$upload_gambar = array('upload_data' => $this->upload->data());

			// create thumbnail gambar
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= './assets/upload/image/' . $upload_gambar['upload_data']['file_name'];
			// lokasi folder thumbail
			$config['new_image']		= './assets/upload/image/thumbs/';
			$config['create_thumb'] 	= TRUE;
			$config['maintain_ratio'] 	= TRUE;
			$config['width']         	= 250; // ukuran pixel
			$config['height']       	= 250; // ukuran pixel
			$config['thumb_marker']		= '';

			$this->load->library('image_lib', $config);

			$this->image_lib->resize();

			// end create thumbnail


			$i = $this->input;
			
			$data = array(  
							'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
							'status_bayar' 			=> 'Menunggu Konfirmasi',
							'jumlah_bayar' 			=> $i->post('jumlah_bayar'),
							'rekening_pembayaran' 	=> $i->post('rekening_pembayaran'),
							'rekening_pelanggan' 	=> $i->post('rekening_pelanggan'),
							'bukti_bayar' 			=> $upload_gambar['upload_data']['file_name'],
							'id_rekening' 			=> $i->post('id_rekening'),
							'tanggal_bayar' 		=> $i->post('tanggal_bayar'),
							'nama_bank'				=> $i->post('nama_bank')		
						);

			$this->header_transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
			redirect(base_url('dasbor'),'refresh');
		}	
		} else{
			// proses edit produk tanpa ganti gambar
			$i = $this->input;
					$data = array(  
							'id_header_transaksi'	=> $header_transaksi->id_header_transaksi,
							'status_bayar' 			=> 'Konfirmasi',
							'jumlah_bayar' 			=> $i->post('jumlah_bayar'),
							'rekening_pembayaran' 	=> $i->post('rekening_pembayaran'),
							'rekening_pelanggan' 	=> $i->post('rekening_pelanggan'),
							//'bukti_bayar' 			=> $upload_gambar['upload_data']['file_name'],
							'id_rekening' 			=> $i->post('id_rekening'),
							'tanggal_bayar' 		=> $i->post('tanggal_bayar'),
							'nama_bank'				=> $i->post('nama_bank')		
						);

			$this->header_transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
			redirect(base_url('dasbor'),'refresh');
		}}
	

		$data = array(  'title'				=> 'Konfirmasi Pembayaran',
						'header_transaksi' 	=> $header_transaksi,
						'rekening'			=> $rekening,
						'isi'				=> 'dasbor/konfirmasi'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
		//end masuk database

	}


}

/* End of file Penjualan.php */
/* Location: ./application/controllers/Penjualan.php */