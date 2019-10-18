<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider extends CI_Controller {

	// load model

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model('slider_model');
		// proteksi halaman
		$this->simple_login->cek_login();
	}

	// data user

	public function index()
	{
		$slider = $this->slider_model->listing();

		$data = array( 	'title' => 'Data Slider Slider',
						'slider'	=> $slider,
						'isi'	=> 'admin/slider/list'

					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// tambah user
	public function tambah()
	{
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_slider', 'Nama Slider', 'required|is_unique[slider.nama_slider]',
			array('required' => '%s harus di isi',
				  'is_unique' => '%s Slider Sudah Ada, buat slider baru !!'));

		


		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // kilobye
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			// end validasi

		$data = array( 	'title' => 'Tambah slider Slider',
						'eror'	=> $this->upload->display_errors(),
						'isi'	=> 'admin/slider/tambah'
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
			$slug_slider = url_title($this->input->post('nama_slider'), 'dash', TRUE);
			$data = array(  
							'slug_slider'		=> $slug_slider,
							'nama_slider' 	=> $i->post('nama_slider'),
							'gambar' 			=> $upload_gambar['upload_data']['file_name'],
							'urutan'			=> $i->post('urutan')				
				);

			$this->slider_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di tambah');
			redirect(base_url('admin/slider'),'refresh');
		}		
	}
		$data = array( 	'title' => 'Tambah slider Slider',
						'isi'	=> 'admin/slider/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

}
	// tambah edit
	public function edit ($id_slider)
	{

		// ambil data slider yang akan di edit
		$slider = $this->slider_model->detail($id_slider);	
	

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_slider', 'Nama Slider', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('urutan', 'Urutan Slider', 'required',
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

		$data = array( 	'title' => 'Edit slider Slider',
						'eror'	=> $this->upload->display_errors(),
						'slider'	=> $slider,
						'isi'	=> 'admin/slider/edit'
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
			// slug slider
			$slug_slider = url_title($this->input->post('nama_slider').'-'.$this->input->post('urutan'), 'dash', TRUE);
			$data = array(  
							'id_slider'			=> $id_slider,
							'slug_slider'		=> $slug_slider,
							'nama_slider' 		=> $i->post('nama_slider'),
							'gambar' 			=> $upload_gambar['upload_data']['file_name'],
							'urutan'			=> $i->post('urutan')	
						
				
				);

			$this->slider_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('admin/slider'),'refresh');
		}	
		} else{
			// proses edit slider tanpa ganti gambar
			$i = $this->input;
			// slug slider
			$slug_slider = url_title($this->input->post('nama_slider').'-'.$this->input->post('kode_slider'), 'dash', TRUE);
			$data = array(  
							'id_slider'			=> $id_slider,
							'slug_slider'		=> $slug_slider,
							'nama_slider' 		=> $i->post('nama_slider'),
							'urutan'			=> $i->post('urutan')	
						
				
				);

			$this->slider_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('admin/slider'),'refresh');

		}}
	

		//end masuk database
		$data = array( 	'title' 	=> 'Edit Slider',
						'slider'	=> $slider,
						'isi'		=> 'admin/slider/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);


	}
	// function delete


	public function delete($id_slider)
	{
		$data = array('id_slider' => $id_slider);
		$this->slider_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah di hapus');
		redirect(base_url('admin/slider'),'refresh');
	}

}

/* End of file Slider.php */
/* Location: ./application/controllers/admin/Slider.php */