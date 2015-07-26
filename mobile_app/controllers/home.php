<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$output['message'] = "please download the apps";

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}
}