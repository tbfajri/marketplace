<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	// load model

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('kategori_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// data user

	public function index()
	{
		$kategori = $this->kategori_model->listing();

		$data = array( 	'title' => 'Data Kategori Produk',
						'kategori'	=> $kategori,
						'isi'	=> 'admin/kategori/list'

					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// tambah user
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]',
			array('required' => '%s harus di isi',
				  'is_unique' => '%s Kategori Sudah Ada, buat kategori baru !!'));

		


		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // kilobye
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			// end validasi

		$data = array( 	'title' => 'Tambah kategori Produk',
						'eror'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/kategori/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

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


			$i 		= $this->input;
			$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
			$data = array(  
							'slug_kategori'		=> $slug_kategori,
							'nama_kategori' 	=> $i->post('nama_kategori'),
							'gambar' 			=> $upload_gambar['upload_data']['file_name'],
							'urutan'			=> $i->post('urutan')				
				);

			$this->kategori_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di tambah');
			redirect(base_url('admin/kategori'),'refresh');
		}		
	}
		$data = array( 	'title' => 'Tambah kategori Produk',
						'isi'	=> 'admin/kategori/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

}

	// tambah edit
	public function edit ($id_kategori)
	{

		// ambil data kategori yang akan di edit
		$kategori = $this->kategori_model->detail($id_kategori);	
	

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori', 'Nama Kategori', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('urutan', 'Urutan Kategori', 'required',
			array('required' => '%s harus di isi'
				  ));


		if($valid->run()) {
			// Check jika gambar di gantii
			if(!empty($_FILES['gambar']['name'])){
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // kilobye
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			// end validasi

		$data = array( 	'title' => 'Edit kategori Kategori',
						'eror'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/kategori/edit',
						'kategori'	=> $kategori
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk data base

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
			// slug kategori
			$slug_kategori = url_title($this->input->post('nama_kategori').'-'.$this->input->post('urutan'), 'dash', TRUE);
			$data = array(  
							'id_kategori'		=> $id_kategori,
							'slug_kategori'		=> $slug_kategori,
							'nama_kategori' 	=> $i->post('nama_kategori'),
							'gambar' 			=> $upload_gambar['upload_data']['file_name'],
							'urutan'			=> $i->post('urutan')	
						
				
				);

			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('admin/kategori'),'refresh');
		}	
		} else{
			// proses edit kategori tanpa ganti gambar
			$i = $this->input;
			// slug kategori
			$slug_kategori = url_title($this->input->post('nama_kategori').'-'.$this->input->post('kode_kategori'), 'dash', TRUE);
			$data = array(  
							'id_kategori'		=> $id_kategori,
							'slug_kategori'		=> $slug_kategori,
							'nama_kategori' 	=> $i->post('nama_kategori'),
							'urutan'			=> $i->post('urutan')	
						
				
				);

			$this->kategori_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('admin/kategori'),'refresh');

		}}
	

		//end masuk database
		$data = array( 	'title' 	=> 'Edit Kategori',
						'kategori'	=> $kategori,
						'isi'		=> 'admin/kategori/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);


	}
	// function delete


	public function delete($id_kategori)
	{
		$data = array('id_kategori' => $id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah di hapus');
		redirect(base_url('admin/kategori'),'refresh');
	}

}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */