<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Model ini akan di run setiap saat user membuka aplikasi.
*/

class Render extends CI_Model {

	public function view($view = 'public/login', $data = array()) {
		$this->load->view('static/header', $data);
		$this->load->view($view);
		$this->load->view('static/footer');
	}

}