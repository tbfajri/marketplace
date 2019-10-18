<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slider_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	// Listing all user
	public function listing(){

		$this->db->select('*');
		$this->db->from('slider');
		$this->db->order_by('id_slider', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function tambah($data)
	{
		$this->db->insert('slider', $data);
	}

	public function delete($data)
	{
		$this->db->where('id_slider', $data['id_slider']);
		$this->db->delete('slider', $data);
	}

	public function detail($id_slider){

		$this->db->select('*');
		$this->db->from('slider');
		$this->db->where('id_slider', $id_slider);
		$this->db->order_by('id_slider', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function read($slug_slider){

		$this->db->select('*');
		$this->db->from('slider');
		$this->db->where('slug_slider', $slug_slider);
		$this->db->order_by('id_slider', 'desc');
		$query = $this->db->get();
		return $query->row();

	}

	public function edit($data){

		$this->db->where('id_slider', $data['id_slider']);
		$this->db->update('slider', $data);


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

/* End of file Slider_model.php */
/* Location: ./application/models/Slider_model.php */