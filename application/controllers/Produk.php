<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	// load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		

	}

	// listing data produk
	public function index()
	{
		$site = $this->konfigurasi_model->listing();
		$listing_kategori = $this->produk_model->listing_kategori();
		// ambil data total
		$kategori_gambar	= $this->kategori_model->listing();
		$total				= $this->produk_model->total_produk();
		// awal pagination
		
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'produk/index/';
		$config['total_rows']		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 12;
		$config['uri_segment'] 		= 3;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close']	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['firs_url']			= base_url().'/produk/';
		$this->pagination->initialize($config);
		
		// ambil data produk
		$page 		=($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$produk 	= $this->produk_model->produk_model->produk($config['per_page'],$page);

		// end pagination

		$data = array(	'title'				=> 'Produk '.$site->namaweb,
						'site'				=> $site,
						'listing_kategori'	=> $listing_kategori,
						'produk'			=> $produk,
						'kategori_gambar'	=> $kategori_gambar,
						'pagin'				=> $this->pagination->create_links(),
						'isi'				=> 'produk/list'

					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

		// listing data produk
	public function kategori($slug_kategori)
	{
		// kategori detail
		$kategori 			= $this->kategori_model->read($slug_kategori);
		$id_kategori		= $kategori->id_kategori;

		$kategori_gambar	= $this->kategori_model->listing();
		$site				= $this->konfigurasi_model->listing();
		$listing_kategori 	= $this->produk_model->listing_kategori();
		// ambil data total
		$total				= $this->produk_model->total_kategori($id_kategori);
		// awal pagination
		
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'produk/kategori/'.$slug_kategori.'/index/';
		$config['total_rows']		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 6;
		$config['uri_segment'] 		= 5;
		$config['num_links'] 		= 5;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
		$config['first_link'] 		= 'First';
		$config['first_tag_open'] 	= '<li>';
		$config['first_tag_close'] 	= '</li>';
		$config['last_link'] 		= 'Last';
		$config['last_tag_open'] 	= '<li class="disabled"><li class="active"><a href="#">';
		$config['last_tag_close'] 	= '<span class="sr-only"></a></li></li>';
		$config['next_link'] 		= '&gt;';
		$config['next_tag_open'] 	= '<div>';
		$config['next_tag_close'] 	= '</div>';
		$config['prev_link'] 		= '&lt;';
		$config['prev_tag_open'] 	= '<div>';
		$config['prev_tag_close']	= '</div>';
		$config['cur_tag_open'] 	= '<b>';
		$config['cur_tag_close'] 	= '</b>';
		$config['firs_url']			= base_url().'/produk/kategori/'.$slug_kategori;
		$this->pagination->initialize($config);
		
		// ambil data produk
		$page 		=($this->uri->segment(5)) ? ($this->uri->segment(5)-1) * $config['per_page']:0;
		$produk 	= $this->produk_model->kategori($id_kategori,$config['per_page'],$page);

		// end pagination

		$data = array(	'title'				=> $kategori->nama_kategori,
						'site'				=> $site,
						'listing_kategori'	=> $listing_kategori,
						'kategori_gambar'	=> $kategori_gambar,
						'produk'			=> $produk,
						'pagin'				=> $this->pagination->create_links(),
						'isi'				=> 'produk/list'

					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	// detail produk
	public function detail($slug_produk)
	{
		$site 			= $this->konfigurasi_model->listing();
		$produk 		= $this->produk_model->read($slug_produk);
		$id_produk		= $produk->id_produk;
		$id_pelanggan	= $this->session->userdata('id_pelanggan');
		$gambar			= $this->produk_model->gambar($id_produk);
		$produk_related	= $this->produk_model->home();

		$data = array(	'title'				=> $produk->nama_produk,
						'site'				=> $site,
						'id_pelanggan'		=> $id_pelanggan,
						'produk'			=> $produk,
						'produk_related'	=> $produk_related,
						'gambar'			=> $gambar,
						'isi'				=> 'produk/detail'

					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	// detail produk
	public function detail_keranjang($slug_produk)
	{
		$site 			= $this->konfigurasi_model->listing();
		$produk 		= $this->produk_model->read($slug_produk);
		$id_produk		= $produk->id_produk;
		$id_pelanggan	= $this->session->userdata('id_pelanggan');
		$gambar			= $this->produk_model->gambar($id_produk);
		$produk_related	= $this->produk_model->home();

		$data = array(	'title'				=> $produk->nama_produk,
						'site'				=> $site,
						'produk'			=> $produk,
						'produk_related'	=> $produk_related,
						'gambar'			=> $gambar,
						'isi'				=> 'produk/detail_keranjang'

					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}


	// gambar
	public function gambar($id_produk){
		$produk = $this->produk_model->detail($id_produk);
		$gambar = $this->produk_model->gambar($id_produk);

		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('judul_gambar', 'Judul / Nama Gambar Produk', 'required',
			array('required' => '%s harus di isi'));

		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // kilobye
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			// end validasi

		$data = array( 	'title' => 'Tambah Gambar Produk' . $produk->nama_produk,
						'produk'	=> $produk,
						'gambar'	=> $gambar,
						'eror'	=> $this->upload->display_errors(),
						'isi'	=> 'produk/gambar'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
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
			// slug produk
			
			$data = array(  'id_produk'		=> $id_produk,
							'judul_gambar'	=> $i->post('judul_gambar'),
							
							// disimpan file nama gambar
							'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							
							);

			$this->produk_model->tambah_gambar($data);
			$this->session->set_flashdata('sukses', 'Data gambar berhasil di tambah');
			redirect(base_url('produk/gambar/'.$id_produk),'refresh');
		}	
		}

		//end masuk database
		$data = array( 	'title' 	=> 'Tambah produk Produk: '.$produk->nama_produk,
						'produk'	=> $produk,
						'gambar'	=> $gambar,
						'isi'		=> 'produk/gambar' 
					);
		$this->load->view('layout/wrapper', $data, FALSE);

	}

	// tambah produk
	public function tambah()
	{


		// ambil data kategorinya
		$kategori = $this->kategori_model->listing();

		// ambil data pelanggan
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		
		$pelanggan = $this->pelanggan_model->detail($id_pelanggan);
		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('kode_produk', 'Kode Produk', 'required|is_unique[produk.kode_produk]',
			array('required' => '%s harus di isi',
				  'is_unique'	=> '%s Sudah Ada. Buat Kode Produk Baru'));


		if($valid->run()) {
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; // kilobye
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
				
			// end validasi

		$data = array( 	'title' => 'Tambah produk Produk',
						'kategori'	=> $kategori,
						'eror'	=> $this->upload->display_errors(),
						'isi'	=> 'produk/tambah'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
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
			// slug produk
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			$data = array(  'id_pelanggan' 	=> $this->session->userdata('id_pelanggan'),
							'id_penjual'	=> $i->post('id_penjual'),
							'id_kategori' 	=> $i->post('id_kategori'),
							'kode_produk' 	=> $i->post('kode_produk'),
							'nama_toko'		=> $i->post('nama_toko'),
							'nama_produk' 	=> $i->post('nama_produk'),
							'slug_produk' 	=> $slug_produk,
							'keterangan' 	=> $i->post('keterangan'),
							'keywords' 		=> $i->post('keywords'),
							'harga' 		=> $i->post('harga'),
							'harga_ikm'		=> $i->post('harga_ikm'),
							'stok' 			=> $i->post('stok'),
							// disimpan file nama gambar
							'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							'berat' 		=> $i->post('berat'),
							'ukuran' 		=> $i->post('ukuran'),
							'status_produk' => $i->post('status_produk'),
							'tanggal_post' 	=> date('Y-m-d H:i:s')
				
				);

			$this->produk_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di tambah, admin akan segera memverifikasi');
			redirect(base_url('produk/list_user'),'refresh');
		}	
		}

		//end masuk database
		$data = array( 	'title' => 'Tambah produk Produk',
						'kategori'	=> $kategori,
						'pelanggan'	=> $pelanggan,
						'isi'	=> 'produk/tambah'
					);
		$this->load->view('layout/wrapper', $data, FALSE);	
	}

	// tambah edit
	public function edit ($id_produk)
	{

		// ambil data produk yang akan di edit
		$produk = $this->produk_model->detail($id_produk);	
		// ambil data kategori
		$kategori = $this->kategori_model->listing();


		//validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk', 'Nama Produk', 'required',
			array('required' => '%s harus di isi'));

		$valid->set_rules('kode_produk', 'Kode Produk', 'required',
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

		$data = array( 	'title' => 'Tambah produk Produk',
						'kategori'	=> $kategori,
						'eror'	=> $this->upload->display_errors(),
						'isi'	=> 'produk/tambah'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
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
			// slug produk
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			$data = array(  
							'id_produk'		=> $id_produk,
							'id_pelanggan' 	=> $this->session->userdata('id_pelanggan'),
							'id_kategori' 	=> $i->post('id_kategori'),
							'kode_produk' 	=> $i->post('kode_produk'),
							'nama_produk' 	=> $i->post('nama_produk'),
							'slug_produk' 	=> $slug_produk,
							'keterangan' 	=> $i->post('keterangan'),
							'keywords' 		=> $i->post('keywords'),
							'harga_ikm' 	=> $i->post('harga_ikm'),
							'stok' 			=> $i->post('stok'),
							// disimpan file nama gambar
							'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							'berat' 		=> $i->post('berat'),
							'ukuran' 		=> $i->post('ukuran'),
							'status_produk' => $i->post('status_produk'),
						
				
				);

			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('produk/list_user'),'refresh');
		}	
		} else{
			// proses edit produk tanpa ganti gambar
			$i = $this->input;
			// slug produk
			$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
			$data = array(  
							'id_produk'		=> $id_produk,
							'id_pelanggan' 	=> $this->session->userdata('id_pelanggan'),
							'id_kategori' 	=> $i->post('id_kategori'),
							'kode_produk' 	=> $i->post('kode_produk'),
							'nama_produk' 	=> $i->post('nama_produk'),
							'slug_produk' 	=> $slug_produk,
							'keterangan' 	=> $i->post('keterangan'),
							'keywords' 		=> $i->post('keywords'),
							'harga_ikm' 	=> $i->post('harga_ikm'),
							'stok' 			=> $i->post('stok'),
							// gambar tidak di ganti
							// 'gambar' 		=> $upload_gambar['upload_data']['file_name'],
							'berat' 		=> $i->post('berat'),
							'ukuran' 		=> $i->post('ukuran'),
							'status_produk' => $i->post('status_produk'),
						
				
				);

			$this->produk_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data berhasil di edit');
			redirect(base_url('produk/list_user'),'refresh');

		}}
	

		//end masuk database
		$data = array( 	'title' 	=> 'Edit Produk :'. $produk->nama_produk,
						'kategori'	=> $kategori,
						'produk'	=> $produk,
						'isi'		=> 'produk/edit'
					);
		$this->load->view('layout/wrapper', $data, FALSE);


	}
	// function delete
	public function delete($id_produk)
	{
		// hapus gambar
		$produk = $this->produk_model->detail($id_produk);
		unlink('./assets/upload/image/'.$produk->gambar);
		unlink('./assets/upload/image/thumbs/'.$produk->gambar);
		
		// end proses hapus
		$data = array('id_produk' => $id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah di hapus');
		redirect(base_url('produk/list_user'),'refresh');

	}

	// function delete gambar
	public function delete_gambar($id_produk, $id_gambar)
	{
		// hapus gambar
		$gambar = $this->produk_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
		
		// end proses hapus
		$data = array('id_gambar' => $id_gambar);
		$this->produk_model->delete_gambar($data);
		$this->session->set_flashdata('sukses', 'Data telah di hapus');
		redirect(base_url('produk/gambar/'.$id_produk),'refresh');

	}

	public function list_user(){
		$id_pelanggan	= $this->session->userdata('id_pelanggan');
		$produk 	= $this->produk_model->listing_user($id_pelanggan);
	
		$data = array( 	'title' => 'Data produk Produk',
						'produk'	=> $produk, 
						'isi'	=> 'produk/list_user'

					);
		$this->load->view('layout/wrapper', $data, FALSE);
	
	}

	



}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */