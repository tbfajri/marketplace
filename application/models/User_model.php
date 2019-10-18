<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all user
	public function listing(){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	// Listing all user
	public function listing_ikm(){

		$this->db->select('*');
		$this->db->from('pelanggan');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('users', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('users', $data);
	}

	public function detail($id_user){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function edit($data){

		$this->db->where('id_user', $data['id_user']);
		$this->db->update('users', $data);


	}

	public function login($username, $password){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('username' 	=> $username,
								'password' 	=> SHA1($password)));	
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */