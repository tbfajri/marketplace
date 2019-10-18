<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all user
	public function listing(){

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('kategori', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->delete('kategori', $data);
	}

	public function detail($id_kategori){

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('id_kategori', $id_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function read($slug_kategori){

		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->where('slug_kategori', $slug_kategori);
		$this->db->order_by('id_kategori', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function edit($data){

		$this->db->where('id_kategori', $data['id_kategori']);
		$this->db->update('kategori', $data);


	}

		public function login($username, $password){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array(	'username'		=> $username,
								'password'	=> SHA1($password)
							));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();

	}



}

/* End of file Kategori_model.php */
/* Location: ./application/models/Kategori_model.php */