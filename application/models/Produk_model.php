<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all user
	public function listing(){

		$this->db->select('produk.*,
						pelanggan.id_pelanggan,
						pelanggan.nama_pelanggan,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');

		// Join Database
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = produk.id_pelanggan', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

		public function listing_user($id_pelanggan){

		$this->db->select('produk.*,
						pelanggan.id_pelanggan,
						pelanggan.id_penjual,
						pelanggan.nama_pelanggan,
						users.nama,
						users.id_user,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');

		// Join Database
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = produk.id_pelanggan', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->where('produk.id_pelanggan', $id_pelanggan);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// listing all produk
	public function home(){

		$this->db->select('produk.*,
						users.nama,
						pelanggan.id_pelanggan,
						pelanggan.nama_pelanggan,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');

		// Join Database
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = produk.id_pelanggan', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

// listing all produk
	public function read($slug_produk){

		$this->db->select('produk.*,
						users.nama,
						pelanggan.id_pelanggan,
						pelanggan.nama_pelanggan,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');

		// Join Database
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = produk.id_pelanggan', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');

		$query = $this->db->get();
		return $query->row();
	}

	// listing all produk
	public function produk($limit, $start){

		$this->db->select('produk.*,
						users.nama,
						pelanggan.id_pelanggan,
						pelanggan.nama_pelanggan,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');

		// Join Database
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = produk.id_pelanggan', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('rand()');
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		return $query->result();
	}

	public function total_produk()
	{
		$this->db->select('COUNT(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}
	// kategori produk
		public function kategori($id_kategori,$limit, $start){

			$this->db->select('produk.*,
							users.nama,
							pelanggan.id_pelanggan,
							pelanggan.nama_pelanggan,
							kategori.nama_kategori,
							kategori.slug_kategori,
							COUNT(gambar.id_gambar) AS total_gambar');
			$this->db->from('produk');

			// Join Database
			$this->db->join('users', 'users.id_user = produk.id_user', 'left');
			$this->db->join('pelanggan', 'pelanggan.id_pelanggan = produk.id_pelanggan', 'left');
			$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
			$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
			// end join
			$this->db->where('produk.status_produk', 'Publish');
			$this->db->where('produk.id_kategori', $id_kategori);
			$this->db->group_by('produk.id_produk');
			$this->db->order_by('id_produk', 'desc');
			$this->db->limit($limit, $start);
			$query = $this->db->get();
			return $query->result();
		}
 		// total kategori
		public function total_kategori($id_kategori)
		{
			$this->db->select('COUNT(*) AS total');
			$this->db->from('produk');
			$this->db->where('status_produk', 'Publish');
			$this->db->where('id_kategori', $id_kategori);
			$query = $this->db->get();
			return $query->row();
		}

	public function tambah($data)
	{
		$this->db->insert('produk', $data);
	}

	public function tambah_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk', $data);
	}

	public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar', $data);
	}

	public function detail($id_produk){

		$this->db->select('produk.*,
							pelanggan.id_pelanggan,
							pelanggan.nama_pelanggan,');
		$this->db->from('produk');
		
		
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = produk.id_pelanggan', 'left');
		$this->db->where('id_produk', $id_produk);
		
		$this->db->order_by('id_produk', 'desc');

		$query = $this->db->get();
		return $query->row();

	}

	


	// listing kategori
	public function listing_kategori(){
		$this->db->select('produk.*,
						users.nama,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');

		// Join Database
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

	public function detail_gambar($id_gambar){

		$this->db->select('produk.*,
						  pelanggan.id_pelanggan,
						  pelanggan.nama_pelanggan,');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function gambar($id_produk){
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function edit($data){

		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk', $data);


	}

	// listing all produk
	public function cari($cari){

		$this->db->select('produk.*,
						users.nama,
						pelanggan.id_pelanggan,
						pelanggan.nama_pelanggan,
						kategori.nama_kategori,
						kategori.slug_kategori,
						COUNT(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');

		// Join Database
		$this->db->join('users', 'users.id_user = produk.id_user', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = produk.id_pelanggan', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 'gambar.id_produk = produk.id_produk', 'left');
		// end join
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->like('nama_produk', $cari);

		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */