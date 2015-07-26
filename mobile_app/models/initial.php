<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Model ini akan di run setiap saat user membuka aplikasi.
*/

class Initial extends CI_Model {

	public function __construct() {
		parent::__construct();

		if ($_SERVER['REQUEST_METHOD'] != 'POST') {
			redirect('http://studiwidie.com');
			exit();
		}
	}

	public function login($data = array('username' => '', 'password' => '')) {
		$this->m_users->login($data);
	}
}