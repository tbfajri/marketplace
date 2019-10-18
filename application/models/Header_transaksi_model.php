<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Header_transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all user
	public function listing(){

		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join database
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// end join database
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all user
	public function pelanggan($id_pelanggan){

		$this->db->select('header_transaksi.*,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		$this->db->where('header_transaksi.id_pelanggan', $id_pelanggan);
		// Join database
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');

		// end join database
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all user
	public function list_semua(){

		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join database
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// end join database
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing penjualan
	public function list_penjualan($id_penjual){

		$this->db->select('header_transaksi.*,
							SUM(transaksi.jumlah) AS total_item,
							transaksi.id_penjual,
							(transaksi.harga * transaksi.jumlah) AS total_bayar,
							pelanggan.nama_pelanggan,
							pelanggan.alamat');
		$this->db->from('header_transaksi');
		$this->db->where('transaksi.id_penjual', $id_penjual);
		// Join database
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_penjual = transaksi.id_penjual', 'left');
		// end join database
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('header_transaksi', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
		$this->db->delete('header_transaksi', $data);
	}

	public function kode_transaksi($kode_transaksi){

		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							rekening.nama_bank AS bank,
							rekening.nomor_rekening,
							rekening.nama_pemilik,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join database
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		$this->db->join('rekening', 'rekening.id_rekening = header_transaksi.id_rekening', 'left');
		
		// end join database
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->where('transaksi.kode_transaksi', $kode_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function detail($id_header_transaksi){

		$this->db->select('header_transaksi.*,
							pelanggan.nama_pelanggan,
							SUM(transaksi.jumlah) AS total_item');
		$this->db->from('header_transaksi');
		// Join database
		$this->db->join('transaksi', 'transaksi.kode_transaksi = header_transaksi.kode_transaksi', 'left');
		$this->db->join('pelanggan', 'pelanggan.id_pelanggan = header_transaksi.id_pelanggan', 'left');
		// end join database
		$this->db->group_by('header_transaksi.id_header_transaksi');
		$this->db->where('id_header_transaksi', $id_header_transaksi);
		$this->db->order_by('id_header_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function edit($data){

		$this->db->where('id_header_transaksi', $data['id_header_transaksi']);
		$this->db->update('header_transaksi', $data);

	}


}

/* End of file Header_transaksi_model.php */
/* Location: ./application/models/Header_transaksi_model.php */