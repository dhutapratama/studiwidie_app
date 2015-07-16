<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("m_admin");

		if ($this->session->userdata('logged_in_admin') == false) {

		} else {
			redirect(site_url("admin"));
		}
	}

	public function index()
	{
		$output = "";
		if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
			if($this->m_admin->login()) {
				redirect(site_url("admin"));
			} else {
				$output["warning_login"] = "Username / Password anda salah!";
			}
		}

		$this->load->view('login', $output);
	}

	public function logout(){
		$this->m_admin->logout();
		redirect(site_url());
	}
    
}