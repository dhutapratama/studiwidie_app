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
				$data['use_table'] = true;

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

	// Start Soal Function
	public function soal($action = '', $id = '', $action2 = '') {
		switch ($action) {
			case 'mapel':
				$this->_pilih_seri($id, $action2);
				break;

			case 'add':
				$this->_soal_add();
				break;

			case 'edit':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->_soal_update();
				} else {
					$id = $this->input->get('id');
					$data['id']		  = $id;
					$data['get_soal'] = $this->m_soal->get_soal_by_id($id);
					if ($data['get_soal'] == false) {
						$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
						$message['message_type'] = 'warning';
						$this->session->set_flashdata($message);
						redirect('admin/soal');
					} else {
						$data['use_editor']  = true;
						$data['use_checker'] = true;
						$this->render->view('soal_edit', $data);
					}
				}
				break;

			case 'delete':
				$this->_soal_delete();
				break;
			
			default:
				$data['get_mata_pelajaran'] = $this->m_mata_pelajaran->get_mata_pelajaran();
				$data['use_table'] 			= true;

				$this->render->view('soal_pilih_mapel', $data);
				break;
		}
	}

	private function _pilih_seri($id = '', $action2) {
		switch ($id) {
			case 'seri':
				$this->_soal_view($action2);
				break;

			default:
				$id_mapel = $this->input->get('id_mapel');
				$data['get_mapel'] = $this->m_mata_pelajaran->get_mata_pelajaran_by_id($id_mapel);

				if ($data['get_mapel'] != false) {
					$data['get_seri'] = $this->m_soal->get_soal_seri($id_mapel);
					$data['use_table'] = true;
					$this->render->view('soal_pilih_seri', $data);
				} else {
					$message['message'] 	 = 'Soal yang anda cari tidak ada, silahkan ulangi pilih mata pelajaran.';
					$message['message_type'] = 'danger';
					$this->session->set_flashdata($message);
					redirect('admin/soal');
				}
				break;
		}
	}

	private function _soal_view ($action2) {
		switch ($action2) {
			case 'add':
				$this->_seri_add();
				break;
			
			default:
				$data['no_seri']  = dehash_id($this->input->get('id_seri_soal'));
				$no_seri 		  = $this->input->get('id_seri_soal');
				$data['get_soal'] = $this->m_soal->get_soal_by_seri($no_seri);
				$data['id_mapel'] = $data['get_soal'][0]->id_mapel;

				if ($data['get_soal'] != false) {
					$data['use_table'] 	 = true;
					$data['use_checker'] = true;
					$this->render->view('soal', $data);
				} else {
					$message['message'] 	 = 'Nomor Seri Soal yang anda cari tidak ada, silahkan ulangi pilih mata pelajaran.';
					$message['message_type'] = 'danger';
					$this->session->set_flashdata($message);
					redirect('admin/soal');
				}
				break;
		}
	}

	private function _soal_add () {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['id_mapel'] 	   = $this->input->post('id_mapel');
			$data['no_seri'] 	   = $this->input->post('no_seri');
			$data['soal'] 		   = $this->input->post('soal');
			$data['jawaban_a'] 	   = $this->input->post('jawaban_a');
			$data['jawaban_b'] 	   = $this->input->post('jawaban_b');
			$data['jawaban_c'] 	   = $this->input->post('jawaban_c');
			$data['jawaban_d'] 	   = $this->input->post('jawaban_d');
			$data['jawaban_e']	   = $this->input->post('jawaban_e');
			$data['kunci_jawaban'] = $this->input->post('kunci_jawaban');
			$data['hint_1'] 	   = $this->input->post('hint_1');
			$data['hint_2'] 	   = $this->input->post('hint_2');
			$data['hint_3'] 	   = $this->input->post('hint_3');
			$this->m_soal->insert_soal($data);

			$message['message'] 	 = 'Sukses menambah data soal';
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);

			redirect(base_url('admin/soal/mapel/seri.html').'?id_seri_soal='.hash_id($data['no_seri']));
		} else {
			$data['id_mapel'] 	= dehash_id($this->input->get('id_mapel'));
			$data['no_seri'] 	= dehash_id($this->input->get('no_seri'));
			$data['use_editor'] = true;
			$data['use_checker'] = true;
			$this->render->view('soal_add', $data);
		}
	}

	private function _seri_add() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['no_seri']  = $this->input->post('no_seri');
			$data['get_soal'] = array();
			$data['id_mapel'] = $this->input->post('id_mapel');
			$data['use_table'] = true;
			$this->render->view('soal', $data);
		} else {
			redirect('admin/soal');
		}
	}

	private function _soal_update () {
		$id 		   	   	   = $this->input->post('id');
		$data['no_seri'] 	   = $this->input->post('no_seri');
		$data['soal'] 		   = $this->input->post('soal');
		$data['jawaban_a'] 	   = $this->input->post('jawaban_a');
		$data['jawaban_b'] 	   = $this->input->post('jawaban_b');
		$data['jawaban_c'] 	   = $this->input->post('jawaban_c');
		$data['jawaban_d'] 	   = $this->input->post('jawaban_d');
		$data['jawaban_e']	   = $this->input->post('jawaban_e');
		$data['kunci_jawaban'] = $this->input->post('kunci_jawaban');
		$data['hint_1'] 	   = $this->input->post('hint_1');
		$data['hint_2'] 	   = $this->input->post('hint_2');
		$data['hint_3'] 	   = $this->input->post('hint_3');
		$this->m_soal->update_soal($id, $data);

		$message['message'] 	 = 'Sukses update data soal (ID : '.dehash_id($id).')';
		$message['message_type'] = 'success';
		$this->session->set_flashdata($message);

		redirect(base_url('admin/soal/mapel/seri.html').'?id_seri_soal='.hash_id($data['no_seri']));
	}

	private function _soal_delete () {
		$id = $this->input->get('id');
		$get_soal = $this->m_soal->get_soal_by_id($id);
		$no_seri  = $get_soal->no_seri;
		$this->m_soal->delete_soal($id);

		if ($get_soal == true) {
			$message['message'] 	 = 'Sukses menghapus data soal (ID : '.dehash_id($id).')'.$respon;
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);
			redirect(base_url('admin/soal/mapel/seri.html').'?id_seri_soal='.hash_id($no_seri));
		} else {
			$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
			$message['message_type'] = 'warning';
			$this->session->set_flashdata($message);
			redirect('admin/soal');
		}
	}
	// End Soal Function

	// Start function Seri
	public function seri($action = '', $id = '') {
		switch ($action) {
			case 'edit':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->_seri_update();
				} else {
					$id = $this->input->get('id');
					$data['id']		   = $id;
					$data['get_soal'] = $this->m_soal->get_soal_by_seri($id);
					if ($data['get_soal'] == false) {
						$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
						$message['message_type'] = 'warning';
						$this->session->set_flashdata($message);
						redirect('admin/soal');
					} else {
						$this->render->view('seri_edit', $data);
					}
				}
				
				break;

			case 'delete':
				$this->_seri_delete();
				break;
			
			default:
				redirect('admin/soal');
				break;
		}
	}

	private function _seri_update () {
		$id 		   	 = $this->input->post('id');
		$data['no_seri'] = $this->input->post('no_seri');
		$this->m_soal->update_seri($id, $data);

		$message['message'] 	 = 'Sukses update nomor seri soal (ID : '.dehash_id($id).' -> '.$data['no_seri'].')';
		$message['message_type'] = 'success';
		$this->session->set_flashdata($message);

		redirect(base_url('admin/soal/mapel/seri.html').'?id_seri_soal='.hash_id($data['no_seri']));
	}

	private function _seri_delete () {
		$id 	  = $this->input->get('id');
		$get_soal = $this->m_soal->get_soal_by_seri($id);

		$this->m_soal->delete_soal_by_seri($id);

		if ($get_soal == true) {
			$message['message'] 	 = 'Sukses menghapus data seri dan semua soal (ID : '.dehash_id($id).')'.$respon;
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);
		} else {
			$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
			$message['message_type'] = 'warning';
			$this->session->set_flashdata($message);
		}

		redirect(base_url('admin/soal/mapel.html').'?id_mapel='.hash_id($get_soal[0]->id_mapel));
	}
	// End function Seri

	// Start Learning Function
	public function learning($action = '', $id = '') {
		switch ($action) {
			case 'mapel':
				$this->_learning_by_mapel();
				break;

			case 'add':
				$this->_learning_add();
				break;

			case 'edit':
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$this->_learning_update();
				} else {
					$id 				  = $this->input->get('id');
					$data['id']		   	  = $id;
					$data['get_learning'] = $this->m_learning->get_learning_by_id($id);
					if ($data['get_learning'] == false) {
						$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
						$message['message_type'] = 'warning';
						$this->session->set_flashdata($message);
						redirect('admin/learning');
					} else {
						$data['use_editor'] = true;
						$this->render->view('learning_edit', $data);
					}
				}
				
				break;

			case 'delete':
				$this->_learning_delete();
				break;
			
			default:
				$data['get_mata_pelajaran'] = $this->m_mata_pelajaran->get_mata_pelajaran();
				$data['use_table'] 			= true;

				$this->render->view('learning_pilih_mapel', $data);
				break;
		}
	}

	private function _learning_by_mapel () {
		$data['id_mapel'] 	  = $this->input->get('id_mapel');

		$data['get_learning'] = $this->m_learning->get_learning_by_id_mapel($data['id_mapel']);
		//print_r($data);exit();
		$this->render->view('learning', $data);
	}

	private function _learning_add () {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data['materi'] = $this->input->post('materi');
			$data['isi'] 	= $this->input->post('isi');
			$data['id_mapel'] = $this->encrypt->decode($this->input->post('id_mapel'));

			$this->m_learning->insert_learning($data);

			$message['message'] 	 = 'Sukses menambah Materi Learning';
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);

			redirect(base_url('admin/learning/mapel.html').'?id_mapel='.hash_id($data['id_mapel']));
		} else {
			$data['id_mapel'] 	  = $this->input->get('id_mapel');
			$data['get_learning'] = $this->m_learning->get_learning_by_id_mapel($data['id_mapel']);
			$data['use_editor']   = true;
			//print_r( $data); exit();
			$this->render->view('learning_add', $data);
		}
	}

	private function _learning_update () {
		$id 		   	= $this->input->post('id');
		$data['materi'] = $this->input->post('materi');
		$data['isi'] 	= $this->input->post('isi');
		$data['id_mapel'] = $this->input->post('id_mapel');
		$this->m_learning->update_learning($id, $data);

		$message['message'] 	 = 'Sukses update data learning (ID : '.dehash_id($id).')';
		$message['message_type'] = 'success';
		$this->session->set_flashdata($message);

		redirect(base_url('admin/learning/mapel.html').'?id_mapel='.hash_id($data['id_mapel']));
	}

	private function _learning_delete () {
		$id = $this->input->get('id');
		$get_learning = $this->m_learning->get_learning_by_id($id);
		$this->m_learning->delete_learning($id);

		if ($get_learning == true) {
			$message['message'] 	 = 'Sukses menghapus data Learning (ID : '.dehash_id($id).')'.$respon;
			$message['message_type'] = 'success';
			$this->session->set_flashdata($message);
		} else {
			$message['message'] 	 = 'ID tidak ditemukan! Silahkan coba kembali.';
			$message['message_type'] = 'warning';
			$this->session->set_flashdata($message);
		}

		redirect(base_url('admin/learning/mapel.html').'?id_mapel='.hash_id($get_learning->id_mapel));
	}
	// End Mapel Function

	// Start Administrator Function
	public function tryouts($action = '', $id = '') {
		switch ($action) {
			case 'view':
				$data['use_table']	= true;
				$this->_tryout_by_user();
				break;

			default:
				$data['get_siswa'] = $this->m_users->get_users();
				$data['use_table'] = true;

				$this->render->view('tryouts', $data);
				break;
		}
	}

	private function _tryout_by_user () {
		$data['id_user'] 	  = $this->input->get('id');

		$data['get_tryout'] = $this->m_log_tryout->get_log_tryout_by_id_user($data['id_user']);

		$this->render->view('tryouts_view', $data);
	}
}
