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
		$id_user   = $this->session->userdata('user_id');

		$get_mapel = $this->m_mata_pelajaran->get_mata_pelajaran_by_id( $id_mapel );
		$html['mapel'] = $get_mapel->mapel;

		// Ambil seri soal
		$tryout['id_user']  = $this->encrypt->decode($id_user);
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

	public function init_ujian() {
		$id_mapel = $this->input->post('id_mapel');
		$no_seri  = $this->input->post('no_seri');
		$no_soal  = $this->input->post('nomor_soal');
		$id_user  = $this->session->userdata('user_id');

		$data_soal['id_mapel'] = $id_mapel;
		$data_soal['no_seri']  = $no_seri;
		$jumlah_soal = $this->m_soal->get_jumlah_soal_by_seri($data_soal);

		$log_tryout['id_user']	   	 = $this->encrypt->decode($id_user);
		$log_tryout['tanggal']	   	 = date("Y-m-d H:i:s");
		$log_tryout['no_seri']	   	 = $no_seri;
		$log_tryout['id_mapel'] 	 = $id_mapel;
		$log_tryout['jawaban_benar'] = 0;
		$log_tryout['jawaban_salah'] = $jumlah_soal;
		$log_tryout['jumlah_soal']   = $jumlah_soal;
		$log_tryout['nilai']   		 = 0;
		$this->m_log_tryout->insert_log_tryout($log_tryout);

		$get_soal = $this->m_soal->get_soal_by_seri($data_soal);

		foreach ($get_soal as $key => $value) {
			$log_jawab['id_user']  = $this->encrypt->decode($id_user);
			$log_jawab['id_mapel'] = $id_mapel;
			$log_jawab['no_seri']  = $no_seri;
			$log_jawab['id_soal']  = $value->id;
			$log_jawab['jawaban']  = 'Belum Dijawab';
			$this->m_log_jawaban->insert_log_jawaban($log_jawab);
		}

		$html['jumlah_soal']= $jumlah_soal;
		$html['soal'] 		= $get_soal[$no_soal]->soal;
		$html['jawaban_a'] 	= $get_soal[$no_soal]->jawaban_a;
		$html['jawaban_b'] 	= $get_soal[$no_soal]->jawaban_b;
		$html['jawaban_c'] 	= $get_soal[$no_soal]->jawaban_c;
		$html['jawaban_d'] 	= $get_soal[$no_soal]->jawaban_d;
		$html['jawaban_e'] 	= $get_soal[$no_soal]->jawaban_e;
		$html['hint_1'] 	= $get_soal[$no_soal]->hint_1;
		$html['hint_2'] 	= $get_soal[$no_soal]->hint_2;
		$html['hint_3'] 	= $get_soal[$no_soal]->hint_3;

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

	public function progress() {
		
	}
}