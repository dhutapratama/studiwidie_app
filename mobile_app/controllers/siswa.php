<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index(){

		$output['data'] 		= "Download aplikasi studiwidie! Gratis!";

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

	public function get_mapel() {
		$get_mapel = $this->m_mata_pelajaran->get_mata_pelajaran();

		$html['get_mapel'] = '';

		foreach ($get_mapel as $key => $value) {
			$html['get_mapel'] .= '<li><a id="open-learning" data-id_mapel="'.$value->id.'">'.$value->mapel.'</a></li>';
		}

		if ($html['get_mapel'] == '') {
			$html['get_mapel'] .= '<li>Tidak ada mata pelajaran.</li>';
		}
		
		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= $this->session->userdata('user_type');
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = 'Mengambil data mata pelajaran.';
		$output['notif_type'] 	= 'success';
		$output['data'] 		= $html;

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

	public function get_learning() {
		$id_mapel 	  = $this->input->post('id_mapel');
		$get_learning = $this->m_learning->get_learning_by_id_mapel( $id_mapel );

		$html['get_learning'] = '';

		foreach ($get_learning as $key => $value) {
			$html['get_learning'] .= '<li><a id="open-materi" data-id_materi="'.$value->id.'">'.$value->materi.'</a></li>';
		}

		if ($html['get_learning'] == '') {
			$html['get_learning'] .= '<li>Tidak ada materi learning</li>';
		}
		
		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= $this->session->userdata('user_type');
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = 'Mengambil data learning.';
		$output['notif_type'] 	= 'success';
		$output['data'] 		= $html;

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

	public function get_materi() {
		$id 	  	  = $this->input->post('id');
		$materi 	  = $this->m_learning->get_learning_by_id( $id );

		$html['get_materi'] = '';
		$html['get_materi'] = $materi->isi;

		if ($html['get_materi'] == '') {
			$html['get_materi'] .= 'Materi kosong harap hubungi admin@studiwidie.com';
		}
		
		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= $this->session->userdata('user_type');
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = 'Mengambil data materi.';
		$output['notif_type'] 	= 'success';
		$output['data'] 		= $html;

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

	public function get_mapel_ujian() {
		$get_mapel = $this->m_mata_pelajaran->get_mata_pelajaran();

		$html['get_mapel'] = '';

		foreach ($get_mapel as $key => $value) {
			$html['get_mapel'] .= '<li><a id="open-ujian" data-id_mapel="'.$value->id.'">'.$value->mapel.'</a></li>';
		}

		if ($html['get_mapel'] == '') {
			$html['get_mapel'] .= '<li>Tidak ada mata pelajaran.</li>';
		}
		
		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= $this->session->userdata('user_type');
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = 'Mengambil data mata pelajaran.';
		$output['notif_type'] 	= 'success';
		$output['data'] 		= $html;

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

	public function get_ujian() {
		$id_mapel  = $this->input->post('id_mapel');

		$get_mapel = $this->m_mata_pelajaran->get_mata_pelajaran_by_id( $id_mapel );
		$html['mapel'] = $get_mapel->mapel;

		// Ambil seri soal
		$tryout['id_user']  = $this->session->userdata('id_user');
		$tryout['id_mapel'] = $id_mapel;

		$html['seri'] = $this->m_log_tryout->get_seri_tryout($tryout);

		$output['time']  		= time();
		$output['user_id'] 		= $this->session->userdata('user_id');
		$output['user_type'] 	= $this->session->userdata('user_type');
		$output['nama'] 		= $this->session->userdata('nama');
		$output['logged_in'] 	= $this->session->userdata('logged_in');
		$output['notification'] = 'Mengambil data materi.';
		$output['notif_type'] 	= 'success';
		$output['data'] 		= $html;

		$data['data'] = $output;
		$this->load->view('parse_json', $data);
	}

}