<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index(){

		$output['data'] 		= "Download aplikasi studiwidie! Gratis!";

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

	public function get_mapel() {

		echo $this->session->userdata('logged_in');

		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= $this->session->userdata('user_type');
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = "";
		$output['notif_type'] 	= "";
		$output['data'] 		= array();

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

}