<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// Halaman Login
	public function index()
	{
		// validasi
		$this->form_validation->set_rules('username', 'username', 'required',
			array('required' => '%s harus diisi'));

		$this->form_validation->set_rules('password', 'Password', 'required',
			array('required' => '%s harus diisi'));

		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			// proses ke simpel login
			$this->simple_login->login($username, $password);
		}

		// end validasi	
		$data = array( 'title' => 'Login Adminstrator');
		$this->load->view('login/list', $data, FALSE);
		
	}

	// function logout
	public function logout(){

		// ambil fungsi logout dari simple login
		$this->simple_login->logout();
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */