<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
		$this->render->view('home');
	}

	public function mapel($action = '', $id = '')
	{
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
}
