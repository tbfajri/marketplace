<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	// load model
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

	// halaman belanja
	public function index()
	{
		$keranjang = $this->cart->contents();
		$data = array(
					'title'		=> 'Keranjang Belanja',
					'keranjang'	=> $keranjang,
					'isi'		=> 'belanja/list'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// sukses belanja
	public function sukses()
	{
		
		$data = array(
					'title'		=> 'Belanja berhasil',
					
					'isi'		=> 'belanja/sukses'
				);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	// fungsi checkout
	public function checkout()
	{
		// check pelanggan sudah login atau belum jika belum redirect ke halaman register dan login
		// cek menggunakan session email
		
		// kondisi sudah login
		if ($this->session->userdata('email')) {
			# code...
			$email 				= $this->session->userdata('email');
			$nama_pelanggan 	= $this->session->userdata('nama_pelanggan');
			$pelanggan 			= $this->pelanggan_model->sudah_login($email, $nama_pelanggan);
			$id_produk 			= $this->produk_model->listing();		
			$keranjang 			= $this->cart->contents();
			$keranjang2 		= $this->cart->contents();

			//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_penerima', 'Nama Lengkap', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('telepon', 'Telepon', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('alamat', 'Alamat', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
			array('required' 		=> '%s harus di isi',
				   'valid_email' 	=> '%s tidak valid'));


		if($valid->run()===FALSE) {
			// end validasi

			$data = array(
						'title'		=> 'Checkout',
						'keranjang'	=> $keranjang,
						'keranjang2'=> $keranjang2,
						'pelanggan'	=> $pelanggan,
						'isi'		=> 'belanja/checkout'
					);
			$this->load->view('layout/wrapper', $data, FALSE);
			// masuk database
			}else {

			$i = $this->input;

			$data = array(  
							'id_pelanggan'		=> $pelanggan->id_pelanggan,
							'nama_penerima' 	=> $i->post('nama_penerima'),
							'email' 			=> $i->post('email'),
							'telepon' 			=> $i->post('telepon'),
							'alamat' 			=> $i->post('alamat'),
							'kode_transaksi'	=> $i->post('kode_transaksi'),
							'tanggal_transaksi'	=> $i->post('tanggal_transaksi'),
							'jumlah_transaksi'	=> $i->post('jumlah_transaksi'),
							'status_bayar'		=> 'Belum',
							'tanggal_post'	 	=> date('Y-m-d H:i:s')
						);

			// proses masuk ke header transaksi
			$this->header_transaksi_model->tambah($data);
			// proses masuk ke tabel transaksi
			foreach($keranjang as $keranjang){

				$sub_total = $keranjang['price'] * $keranjang['qty'];

				$data = array( 
							'id_penjual' 		=> $keranjang['id_penjual'],
							'nama_toko' 		=> $keranjang['nama_toko'],
							'id_pelanggan'		=> $pelanggan->id_pelanggan,
							'kode_transaksi' 	=> $i->post('kode_transaksi'),
							'id_produk' 		=> $keranjang['id'],
							'harga' 			=> $keranjang['price'],
							'jumlah' 			=> $keranjang['qty'],
							'total_harga'		=> $sub_total,
							'tanggal_transaksi'	=> $i->post('tanggal_transaksi')
				);

				$this->transaksi_model->tambah($data);
			}
			// end proses masuk ke tabel transaksi
			// setelah masuk ke tabel transaksi, keranjang di kosongkan kembali
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Checkout berhasil');
			redirect(base_url('belanja/sukses'),'refresh');
		}
			// end database

		} else {
			// kalau belum login. maka harus registrasi
			$this->session->set_flashdata('sukses', 'Silakan login atau registrasi terlebih dahulu');
			redirect(base_url('registrasi'), 'refresh');
		}


	}

	// tambahkan keranjang belanja
	public function add(){

		// ambil data dari form
		$id_pelanggan = $this->session->userdata('id_pelanggan');

		$id_penjual = $this->input->post('id_penjual');
		$nama_toko = $this->input->post('nama_toko');
		$id 	= $this->input->post('id');
		$qty	= $this->input->post('qty');
		$price	= $this->input->post('price');
		$name	= $this->input->post('name');
		$redirect_page = $this->input->post('redirect_page');

		// proses memasukan ke keranjang belanja
		$data = array(	'id_pelanggan' => $id_pelanggan,
						'id_penjual' => $id_penjual,
						'nama_toko'	=> $nama_toko,
				        'id'      => $id,
				        'qty'     => $qty,
				        'price'   => $price,
				        'name'    => $name
    					);
		$this->cart->insert($data);
		// redirect page
		
		redirect($redirect_page, 'refresh');
	}

	public function update_cart($rowid){

		// jika ada data row id
		if($rowid)
		{
			$data = array( 'rowid' 	=> $rowid,
							'qty'	=> $this->input->post('qty')
						);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data keranjang telah diupdate');
			redirect(base_url('belanja'), 'refresh');
		} else {
			// jika engga ada row id
			redirect(base_url('belanja'), 'refresh');
		}
	}


	public function update_cart_check($rowid){

		// jika ada data row id
		if($rowid)
		{
			$data = array( 'rowid' 	=> $rowid,
							'qty'	=> $this->input->post('qty')
						);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data keranjang telah diupdate');
			redirect(base_url('belanja/checkout'), 'refresh');
		} else {
			// jika engga ada row id
			redirect(base_url('belanja/checkout'), 'refresh');
		}
	}

	public function hapus($rowid='')
	{	
		if ($rowid) {
			// hapus per id
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data keranjang belanja telah di hapus');
			redirect(base_url('belanja'), 'refresh');
		} else {
			// hapus semua
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Data keranjang belanja telah di hapus');
			redirect(base_url('belanja'), 'refresh');

		}

	}

	// cetak	
	public function cetak($kode_transaksi){

		$id_pelanggan		= $this->session->userdata('id_pelanggan');
		$id_penjual			= $this->session->userdata('id_penjual');
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi_penjual($kode_transaksi, $id_penjual);
		$pelanggan 			= $this->pelanggan_model->detail($id_pelanggan);
		$site 				= $this->konfigurasi_model->listing();
		

		$data 	= array( 'title'				=> 'Riwayat Belanja',
						 'header_transaksi' 	=> $header_transaksi,
						 'transaksi'			=> $transaksi,
						 'site'					=> $site,
						 'pelanggan'			=> $pelanggan
						
					);
		$this->load->view('dasbor/cetak', $data, FALSE);
	}

	

}



/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */