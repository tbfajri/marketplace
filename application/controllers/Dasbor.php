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
		$this->load->model('produk_model');
		// halaman ini di proteksi bagi yang sudah login
		$this->simple_pelanggan->cek_login();


	}
	public function index()
	{
		// ambil data login id pelanggan dari session
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi 	= $this->header_transaksi_model->pelanggan($id_pelanggan);
		$data 	= array( 'title'				=> 'Halaman Dashboard Pelanggan',
						 'header_transaksi' 	=> $header_transaksi,
						 'isi'					=> 'dasbor/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function belanja(){

		// ambil data login id pelanggan dari session
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$header_transaksi 	= $this->header_transaksi_model->pelanggan($id_pelanggan);


		$data 	= array( 'title'				=> 'Riwayat Belanja',
						 'header_transaksi' 	=> $header_transaksi,
						 'isi'					=> 'dasbor/belanja'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function detail($kode_transaksi){

			// ambil data login id pelanggan dari session
			$id_pelanggan 		= $this->session->userdata('id_pelanggan');
			$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
			$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
			// pastikan bahwa pelanggan hanya mengakses data transaksisnya
			if($header_transaksi->id_pelanggan != $id_pelanggan){
				$this->session->set_flashdata('warning', 'Anda mencoba mengakses data transaksi orang lain');
				redirect(base_url('masuk'));
			}

			$data 	= array( 'title'				=> 'Riwayat Belanja',
							 'header_transaksi' 	=> $header_transaksi,
							 'transaksi'			=> $transaksi,
							 'isi'					=> 'dasbor/detail'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		}

	// detai penjualan
	public function detail_penjualan($kode_transaksi){

		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$data 	= array( 'title'				=> 'Riwayat Belanja',
						 'header_transaksi' 	=> $header_transaksi,
						 'transaksi'			=> $transaksi,
						 'isi'					=> 'dasbor/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// detail transaksi
	public function detail_transaksi($kode_transaksi){

			$id_penjual 		= $this->session->userdata('id_penjual');
			$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
			$transaksi 			= $this->transaksi_model->kode_transaksi_penjual($kode_transaksi, $id_penjual);
		
			

			$data 	= array( 'title'				=> 'Riwayat Belanja',
							 'header_transaksi' 	=> $header_transaksi,
							 'transaksi'			=> $transaksi,
							 'isi'					=> 'dasbor/detail_transaksi'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		}


	public function profil()
	{
		// ambil data pelanggan dari session
		$id_pelanggan	= $this->session->userdata('id_pelanggan');
		$pelanggan 		= $this->pelanggan_model->detail($id_pelanggan);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama Lengkap', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('alamat', 'Alamat Lengkap', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('telepon', 'No Telepon', 'required',
			array('required' => '%s harus di isi'));


		if($valid->run()===FALSE) {
			// end validasi


		$data = array(  'title'		=> 'Profil Saya',
						'pelanggan'	=> $pelanggan,
						'isi'		=> 'dasbor/profil'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
		// masuk data base

		} else {

			$i = $this->input;
			if(strlen($i->post('password'))>= 6){
			$data = array(  'id_pelanggan'		=> $id_pelanggan,
							'nama_pelanggan' 	=> $i->post('nama_pelanggan'),
							'password' 			=> SHA1($i->post('password')),
							'no_rekening'		=> $i->post('no_rekening'),
							'nama_pemilik'		=> $i->post('nama_pemilik'),
							'telepon' 			=> $i->post('telepon'),
							'alamat' 			=> $i->post('alamat'),
				
				);
		} else{
			$data = array(  'id_pelanggan'		=> $id_pelanggan,
							'nama_pelanggan' 	=> $i->post('nama_pelanggan'),
							'no_rekening'		=> $i->post('no_rekening'),
							'nama_pemilik'		=> $i->post('nama_pemilik'),
							'telepon' 			=> $i->post('telepon'),
							'alamat' 			=> $i->post('alamat'),
						);
					
		}
			$this->pelanggan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Update berhasil');
			redirect(base_url('dasbor/profil'),'refresh');
		}
	} 

	// konfirmasi pembayaran
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

	} // masuk data base

	public function list_penjualan(){
	
		$id_penjual = $this->session->userdata('id_penjual');
		$header_transaksi 	= $this->header_transaksi_model->list_penjualan($id_penjual);
		$data 	= array( 'title'				=> 'Halaman Dashboard Pelanggan',
						 'header_transaksi' 	=> $header_transaksi,
						 'isi'					=> 'dasbor/list_penjualan'
					);
		$this->load->view('layout/wrapper', $data, FALSE);

	}	


	// konfirmasi pembayaran
	public function konfirmasi_penjualan($kode_transaksi){

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

	// konfirmasi pembayaran
	public function update_status($kode_transaksi){

		$id_penjual 		= $this->session->userdata('id_penjual');
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$rekening 			= $this->rekening_model->listing();
		$transaksi_penjual 	= $this->transaksi_model->kode_transaksi_penjual($kode_transaksi, $id_penjual);
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('status_barang', 'Status', 'required',
			array('required' => '%s harus di isi'));



		if($valid->run()) {
			
			// proses edit produk tanpa ganti gambar
			$i = $this->input;
					$data = array(  
							'id_penjual'		=> $i->post('id_penjual'),
							'kode_transaksi'	=> $i->post('kode_transaksi'),
							'status_barang' 	=> $i->post('status_barang'),
							'no_resi' 			=> $i->post('no_resi')
								
						);

			$this->transaksi_model->edit_resi($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi Pembayaran Berhasil');
			redirect(base_url('dasbor/list_penjualan'),'refresh');
		}
	

		$data = array(  'title'				=> 'Konfirmasi Pembayaran',
						'header_transaksi' 	=> $header_transaksi,
						'transaksi_penjual'	=> $transaksi_penjual,
						'rekening'			=> $rekening,
						'isi'				=> 'dasbor/update_status'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
		//end masuk database

	} // masuk data base

	// 

// konfirmasi pembayaran
	public function diterima($kode_transaksi){


		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$rekening 			= $this->rekening_model->listing();
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi, $id_pelanggan);
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('status_barang', 'Status', 'required',
			array('required' => '%s harus di isi'));



		if($valid->run()) {
			
			// proses edit produk tanpa ganti gambar
			$i = $this->input;
					$data = array(  
							'id_transaksi'		=> $i->post('id_transaksi'),
							'status_barang' 	=> $i->post('status_barang'),			
						);

			$this->transaksi_model->edit($data);
			$this->session->set_flashdata('sukses', 'Konfirmasi Penerimaan Berhasil');
			redirect(base_url('dasbor/detail/'. $kode_transaksi),'refresh');
		}
	
			$data 	= array( 'title'				=> 'Riwayat Belanja',
							 'header_transaksi' 	=> $header_transaksi,
							 'transaksi'			=> $transaksi,
							 'isi'					=> 'dasbor/detail'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		//end masuk database*/

	} 

	


}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */