<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('slider_model');
	}

	// halaman utama website - homepage
	public function index()
	{
		$total				= $this->produk_model->total_produk();
		// awal pagination
		
		$this->load->library('pagination');
		
		$config['base_url'] 		= base_url().'produk/index/';
		$config['total_rows']		= $total->total;
		$config['use_page_numbers']	= TRUE;
		$config['per_page'] 		= 9;
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

		$slider 			= $this->slider_model->listing();
		$listing_kategori 	= $this->produk_model->listing_kategori();
		$site 				= $this->konfigurasi_model->listing();
		$kategori 			= $this->konfigurasi_model->nav_produk();
		$produk 			= $this->produk_model->home();
		$page 				=($this->uri->segment(3)) ? ($this->uri->segment(3)-1) * $config['per_page']:0;
		$produk_list 		= $this->produk_model->produk($config['per_page'],$page);
		$data 				= array( 	'title' 		=> $site->namaweb. ' | '.$site->tagline,
									'keywords'			=> $site->keywords,
									'deskripsi'			=> $site->deskripsi,
									'site'				=> $site,
									'kategori'			=> $kategori,
									'produk'			=> $produk,
									'slider'			=> $slider,
									'produk_list' 		=> $produk_list,
									'listing_kategori' 	=> $listing_kategori,
									'pagin'				=> $this->pagination->create_links(),
									'isi'				=> 'home/list',
									
									);
		$this->load->view('layout/wrapper', $data, FALSE);
	}



	// halaman cari barang
	public function cari()
	{
		$cari = $this->input->post('cari');
		$site 	= $this->konfigurasi_model->listing();
		$kategori 	= $this->konfigurasi_model->nav_produk();
		$produk 	= $this->produk_model->cari($cari);

		$data = array( 	'title' 	=> $site->namaweb. ' | '.$site->tagline,
						'keywords'	=> $site->keywords,
						'deskripsi'	=> $site->deskripsi,
						'site'		=> $site,
						'kategori'	=> $kategori,
						'produk'	=> $produk,
						'isi'		=> 'home/hasil_cari'

						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}



	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */