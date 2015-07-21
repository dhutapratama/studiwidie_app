<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Model ini akan di run setiap saat user membuka aplikasi.
*/

class Render extends CI_Model {

	public function view($view = 'public/login', $data = array()) {
		if(!isset($data['use_table'])) {
			$data['use_table'] = false;
		}
		if(!isset($data['use_editor'])) {
			$data['use_editor'] = false;
		}
		$this->load->view($this->session->userdata('user_type').'/header', $data);
		$this->load->view($this->session->userdata('user_type').'/'.$view);
		$this->load->view($this->session->userdata('user_type').'/footer');
	}

}