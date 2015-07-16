<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Model ini akan di run setiap saat user membuka aplikasi.
*/

class Initial extends CI_Model {

	public function __construct() {
		parent::__construct();

		$user_type = $this->session->userdata('user_type');

		if ($this->uri->segment(1) != $user_type) {

			switch ($user_type) {
				case '':
					
					switch ($this->uri->segment(1)) {
						case '':
							break;

						case 'home':
							if ($_SERVER['REQUEST_METHOD'] == 'POST') {
								# Jika user sedang benar2 login
							} else {
								redirect();
							}
							break;

						case 'admin':
							$data['message'] = 'Anda harus login untuk mengakses halaman ini';
							$data['message_type'] = 'danger';
							$this->session->set_flashdata($data);
							redirect();
							break;

						case 'siswa':
							$data['message'] = 'Anda harus login untuk mengakses halaman ini';
							$data['message_type'] = 'danger';
							$this->session->set_flashdata($data);
							redirect();
							break;
						
						default:
							
							break;
					}

					break;
				
				default:
					switch ($this->uri->segment(2)) {
						case 'logout':
							# code...
							break;
						
						default:
							redirect($user_type);
							break;
						}
				break;
			}
		}
	}

	public function login($data = array('username' => '', 'password' => '')) {
		$this->m_administrator->login($data);
		$this->m_users->login($data);

		$user_type = $this->session->userdata('user_type');

		if ($user_type == '') {
			redirect();
		} else {
			redirect($user_type);
		}

	}
}