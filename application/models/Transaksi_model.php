<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all user
	public function listing(){

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
// Listing all transaksi berdasarkan header
	public function kode_transaksi($kode_transaksi){

		$this->db->select('transaksi.*, 
						produk.nama_produk,
						produk.kode_produk');
		$this->db->from('transaksi');
		// join dengan produk
		$this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		// end join
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all transaksi berdasarkan header
	public function kode_transaksi_penjual($kode_transaksi, $id_penjual){

		$this->db->select('transaksi.*,

						produk.nama_produk,
						produk.kode_produk');
		$this->db->from('transaksi');
		// join dengan produk
		$this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
		// end join
		$this->db->where('kode_transaksi', $kode_transaksi);
		$this->db->where('transaksi.id_penjual', $id_penjual);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('transaksi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->delete('transaksi', $data);
	}

	public function detail($id_transaksi){

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('id_transaksi', $id_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function read($slug_transaksi){

		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->where('slug_transaksi', $slug_transaksi);
		$this->db->order_by('id_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function edit($data){

		$this->db->where('id_transaksi', $data['id_transaksi']);
		$this->db->update('transaksi', $data);


	}


	public function edit_resi($data){

		$this->db->where('kode_transaksi', $data['kode_transaksi']);
		$this->db->where('id_penjual', $data['id_penjual']);
		$this->db->update('transaksi', $data);
	}


	public function edit_barang($data){

		$this->db->where('kode_transaksi', $data['kode_transaksi']);
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('transaksi', $data);


	}



}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */