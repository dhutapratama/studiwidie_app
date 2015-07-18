<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		$this->render->view('home');
	}

	// Start Mapel Function
	public function mapel($action = '', $id = '') {
		switch ($action) {
			case 'add':
				$this->_mapel_add();
				break;

			case 'edit':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->_mapel_update();
				} else {
					$id = $this->input->get('id');
					$data['id']		   = $id;
					$data['get_mapel'] = $this->m_mata_pelajaran->get_mata_pelajaran_by_id($id);
					if ($data['get_mapel'] == false) {
						$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
						$message['message_type'] = 'warning';
						$this->session->set_flashdata($message);
						redirect('admin/mapel');
					} else {
						$this->render->view('mapel_edit', $data);
					}
					
				}
				
				break;

			case 'delete':
				$this->_mapel_delete();
				break;
			
			default:
				$data['get_mata_pelajaran'] = $this->m_mata_pelajaran->get_mata_pelajaran();
				$data['use_table'] 			= true;

				$this->render->view('mapel', $data);
				break;
		}
	}

	private function _mapel_add () {
		$data['mapel'] = $this->input->post('mapel');
		$this->m_mata_pelajaran->insert_mata_pelajaran($data);

		$message['message'] 	 = 'Sukses menambah data mata pelajaran';
		$message['message_type'] = 'success';
		$this->session->set_flashdata($message);

		redirect('admin/mapel');
	}

	private function _mapel_update () {
		$id 		   = $this->input->post('id');
		$data['mapel'] = $this->input->post('mapel');
		$this->m_mata_pelajaran->update_mata_pelajaran($id, $data);

		$message['message'] 	 = 'Sukses update data mata pelajaran (ID : '.dehash_id($id).')';
		$message['message_type'] = 'success';
		$this->session->set_flashdata($message);

		redirect('admin/mapel');
	}

	private function _mapel_delete () {
		$id = $this->input->get('id');
		$get_mapel = $this->m_mata_pelajaran->get_mata_pelajaran_by_id($id);
		$this->m_mata_pelajaran->delete_mata_pelajaran($id);

		if ($get_mapel == true) {
			$message['message'] 	 = 'Sukses menghapus data mata pelajaran (ID : '.dehash_id($id).')'.$respon;
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);
		} else {
			$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
			$message['message_type'] = 'warning';
			$this->session->set_flashdata($message);
		}

		redirect('admin/mapel');
	}
	// End Mapel Function

	// Start Administrator Function
	public function administrator($action = '', $id = '') {
		switch ($action) {
			case 'add':
				$this->_administrator_add();
				break;

			case 'edit':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->_administrator_update();
				} else {
					$id = $this->input->get('id');
					$data['id']		   		   = $id;
					$data['get_administrator'] = $this->m_administrator->get_administrator_by_id($id);
					if ($data['get_administrator'] == false) {
						$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
						$message['message_type'] = 'warning';
						$this->session->set_flashdata($message);
						redirect('admin/administrator');
					} else {
						$this->render->view('administrator_edit', $data);
					}
				}
				
				break;

			case 'delete':
				$this->_administrator_delete();
				break;
			
			default:
				$data['get_administrator'] = $this->m_administrator->get_administrator();
				$data['use_table'] 			= true;

				$this->render->view('administrator', $data);
				break;
		}
	}

	private function _administrator_add () {
		$data['username'] 	  = $this->input->post('username');
		$data['password'] 	  = $this->input->post('password');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[administrators.username]|min_length[5]');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$message['message'] 	 = validation_errors('', '');
			$message['message_type'] = 'danger';
			$this->session->set_flashdata($message);

			redirect('admin/administrator');
		} else {
			$this->m_administrator->insert_administrator($data);

			$message['message'] 	 = 'Sukses menambah user administrator';
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);

			redirect('admin/administrator');
		}
	}

	private function _administrator_update () {
		$id 		   = $this->input->post('id');
		$data['username'] 	  = $this->input->post('username');
		$data['password'] 	  = $this->input->post('password');
		$this->m_administrator->update_administrator($id, $data);

		$message['message'] 	 = 'Sukses update data administrator (ID : '.dehash_id($id).')';
		$message['message_type'] = 'success';
		$this->session->set_flashdata($message);

		redirect('admin/administrator');
	}

	private function _administrator_delete () {
		$id = $this->input->get('id');
		$get_administrator = $this->m_administrator->get_administrator_by_id($id);
		$this->m_administrator->delete_administrator($id);

		if ($get_administrator == true) {
			$message['message'] 	 = 'Sukses menghapus data administrator (ID : '.dehash_id($id).')'.$respon;
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);
		} else {
			$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
			$message['message_type'] = 'warning';
			$this->session->set_flashdata($message);
		}

		redirect('admin/administrator');
	}
	// End Administrator Function

	// Start Siswa Function
	public function siswa($action = '', $id = '') {
		switch ($action) {
			case 'add':
				$this->_siswa_add();
				break;

			case 'edit':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->_siswa_update();
				} else {
					$id = $this->input->get('id');
					$data['id']		   		   = $id;
					$data['get_siswa'] = $this->m_users->get_users_by_id($id);
					if ($data['get_siswa'] == false) {
						$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
						$message['message_type'] = 'warning';
						$this->session->set_flashdata($message);
						redirect('admin/siswa');
					} else {
						$this->render->view('siswa_edit', $data);
					}
				}
				
				break;

			case 'delete':
				$this->_siswa_delete();
				break;
			
			default:
				$data['get_siswa'] = $this->m_users->get_users();
				$data['use_table'] 			= true;

				$this->render->view('siswa', $data);
				break;
		}
	}

	private function _siswa_add () {
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['nama'] 	  = $this->input->post('nama');
		$data['email'] 	  = $this->input->post('email');

		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]|min_length[5]');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$message['message'] 	 = validation_errors('', '');
			$message['message_type'] = 'danger';
			$this->session->set_flashdata($message);

			redirect('admin/siswa');
		} else {
			$this->m_users->insert_users($data);

			$message['message'] 	 = 'Sukses menambah user siswa';
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);

			redirect('admin/siswa');
		}
	}

	private function _siswa_update () {
		$id 		      = $this->input->post('id');
		$data['username'] = $this->input->post('username');
		$data['password'] = $this->input->post('password');
		$data['nama'] 	  = $this->input->post('nama');
		$data['email'] 	  = $this->input->post('email');
		$this->m_users->update_users($id, $data);

		$message['message'] 	 = 'Sukses update data siswa (ID : '.dehash_id($id).')';
		$message['message_type'] = 'success';
		$this->session->set_flashdata($message);

		redirect('admin/siswa');
	}

	private function _siswa_delete () {
		$id = $this->input->get('id');
		$get_user = $this->m_users->get_users_by_id($id);
		$this->m_users->delete_users($id);

		if ($get_user == true) {
			$message['message'] 	 = 'Sukses menghapus data siswa (ID : '.dehash_id($id).')'.$respon;
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);
		} else {
			$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
			$message['message_type'] = 'warning';
			$this->session->set_flashdata($message);
		}

		redirect('admin/siswa');
	}
	// End Siswa Function
}
