<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$login['username'] = $this->input->post('username');
		$login['password'] = $this->input->post('password');
		$result_login = $this->m_users->login($login);

		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= $this->session->userdata('user_type');
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = $result_login['message'];
		$output['notif_type'] 	= $result_login['message_type'];
		$output['data'] 		= array();

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

	public function register() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|min_length[6]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		if ($this->form_validation->run() == FALSE)
		{
			$result_registration['message']		 = validation_errors(' ', '<br />');
			$result_registration['message_type'] = 'error';
		} else {
			$register['username'] = $this->input->post('username');
			$register['password'] = $this->input->post('password');
			$register['nama'] 	  = $this->input->post('nama');
			$register['email'] 	  = $this->input->post('email');
			$result_registration  = $this->m_users->insert_users($register);
			$result_login		  = $this->m_users->login($register);
		}

		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= $this->session->userdata('user_type');
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = $result_registration['message'];
		$output['notif_type'] 	= $result_registration['message_type'];
		$output['data'] 		= array();

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

	public function logout () {
		$this->session->sess_destroy();

		//$this->session->set_userdata(array('user_type' => 'guess'));

		$logout['message']		 = 'Anda telah keluar.';
		$logout['message_type']  = 'success';

		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= 'guess';
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = $logout['message'];
		$output['notif_type'] 	= $logout['message_type'];
		$output['data'] 		= array();

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}
}