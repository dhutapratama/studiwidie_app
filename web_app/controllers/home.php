<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$this->load->view('public/login');
	}

	public function error_404() {
		$this->load->view('public/error_404');
	}

	public function login() {
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');

		$this->initial->login($data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect();
	}
}
