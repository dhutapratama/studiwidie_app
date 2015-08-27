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

	public function get_soal() {
		$id_user  = $this->session->userdata('user_id');
		$id_mapel = $this->input->post('id_mapel');
		$no_seri  = $this->input->post('no_seri');
		$no_soal  = $this->input->post('nomor_soal');

		$data_soal['id_mapel'] = $id_mapel;
		$data_soal['no_seri']  = $no_seri;
		$data_soal['id_user']  = $this->encrypt->decode($id_user);
		$get_soal	 = $this->m_soal->get_soal_by_seri($data_soal);
		$get_jawaban = $this->m_log_jawaban->get_log_jawaban_by_no_seri($data_soal);
		//print_r($id_user);
		
		if ($get_soal == false) {
			$html['soal'] = false;
		}

		if (!isset($get_soal[$no_soal]->soal)) {
			$html['soal'] = false;
		} else {
			$html['soal'] 		= $get_soal[$no_soal]->soal;
			$html['jawaban_a'] 	= $get_soal[$no_soal]->jawaban_a;
			$html['jawaban_b'] 	= $get_soal[$no_soal]->jawaban_b;
			$html['jawaban_c'] 	= $get_soal[$no_soal]->jawaban_c;
			$html['jawaban_d'] 	= $get_soal[$no_soal]->jawaban_d;
			$html['jawaban_e'] 	= $get_soal[$no_soal]->jawaban_e;
			$html['hint_1'] 	= $get_soal[$no_soal]->hint_1;
			$html['hint_2'] 	= $get_soal[$no_soal]->hint_2;
			$html['hint_3'] 	= $get_soal[$no_soal]->hint_3;
			$html['jawaban']	= $get_jawaban[$no_soal]->jawaban;
			$html['hint']		= $get_jawaban[$no_soal]->hint;
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

	public function update_ujian() {
		$id_user		   = $this->session->userdata('user_id');
		$ujian['id_user']  = $this->encrypt->decode($id_user);
		$ujian['id_mapel'] = $this->input->post('id_mapel');
		$ujian['no_seri']  = $this->input->post('no_seri');
		$no_soal  		   = $this->input->post('nomor_soal');
		$ujian['jawaban']  = $this->input->post('jawaban');
		$ujian['hint']  	= $this->input->post('hint');

		$data_soal['id_mapel'] = $ujian['id_mapel'];
		$data_soal['no_seri']  = $ujian['no_seri'];

		$get_soal = $this->m_soal->get_soal_by_seri($data_soal);
		$ujian['id_soal'] = $get_soal[$no_soal]->id;
		
		$update_ujian = $this->m_log_jawaban->update_log_jawaban_by_ujian( $ujian );

		// Update nilai
		$tryout_inprogress = $this->m_log_tryout->get_log_tryout_inprogress( $ujian );

		$tryout['jawaban_benar'] = 0;
		$tryout['jawaban_salah'] = 0;
		
		foreach ($get_soal as $key => $value) {
			$ujian['id_soal'] = $value->id;
			$get_jawaban = $this->m_log_jawaban->get_log_jawaban_by_soal( $ujian );

			if ($value->kunci_jawaban == $get_jawaban->jawaban) {
				$tryout['jawaban_benar']++;
			} else {
				$tryout['jawaban_salah']++;
			}
		}

		$tryout['nilai'] = $tryout['jawaban_benar'] /$tryout_inprogress->jumlah_soal * 100;

		$this->m_log_tryout->update_log_tryout( $tryout_inprogress->id, $tryout );

		$html['update'] = 'Update Jawaban!';

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

	public function get_hasil() {
		$id_user  = $this->session->userdata('user_id');
		$id_mapel = $this->input->post('id_mapel');
		$no_seri  = $this->input->post('no_seri');

		$data_hasil['id_mapel'] = $id_mapel;
		$data_hasil['no_seri']  = $no_seri;
		$data_hasil['id_user']  = $this->encrypt->decode($id_user);;
		$get_hasil				= $this->m_log_tryout->get_log_tryout_inprogress($data_hasil);
		$get_mapel 				= $this->m_mata_pelajaran->get_mata_pelajaran_by_id($id_mapel);
		
		if ($get_hasil == false) {
			$html['nomor_seri'] = false;
		}

		if (!isset($get_hasil->no_seri)) {
			$html['no_seri'] = false;
		} else {
			$html['id_mapel']		= $id_mapel;
			$html['mata_pelajaran'] = $get_mapel->mapel;
			$html['no_seri'] 		= $get_hasil->no_seri;
			$html['tanggal'] 		= $get_hasil->tanggal;
			$html['jumlah_soal'] 	= $get_hasil->jumlah_soal;
			$html['jawaban_benar'] 	= $get_hasil->jawaban_benar;
			$html['jawaban_salah'] 	= $get_hasil->jawaban_salah;
			$html['nilai'] 			= $get_hasil->nilai;
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

	public function init_review() {
		$id_mapel = $this->input->post('id_mapel');
		$no_seri  = $this->input->post('no_seri');
		$no_soal  = $this->input->post('nomor_soal');
		$id_user  = $this->session->userdata('user_id');

		$data_soal['id_mapel'] 	= $id_mapel;
		$data_soal['no_seri']  	= $no_seri;
		$data_soal['id_user']  	= $this->encrypt->decode($id_user);
		$jumlah_soal 			= $this->m_soal->get_jumlah_soal_by_seri($data_soal);
		$get_soal 				= $this->m_soal->get_soal_by_seri($data_soal);
		$get_mapel 				= $this->m_mata_pelajaran->get_mata_pelajaran_by_id($id_mapel);

		$html['mata_pelajaran'] = $get_mapel->mapel;
		$html['jumlah_soal']	= $jumlah_soal;
		$html['soal'] 			= $get_soal[$no_soal]->soal;
		$html['jawaban_a'] 		= $get_soal[$no_soal]->jawaban_a;
		$html['jawaban_b'] 		= $get_soal[$no_soal]->jawaban_b;
		$html['jawaban_c'] 		= $get_soal[$no_soal]->jawaban_c;
		$html['jawaban_d'] 		= $get_soal[$no_soal]->jawaban_d;
		$html['jawaban_e'] 		= $get_soal[$no_soal]->jawaban_e;
		$html['kunci_jawaban'] 	= $get_soal[$no_soal]->kunci_jawaban;
		$data_soal['id_soal']	= $get_soal[$no_soal]->id;
		$html['jawaban'] 		= $this->m_log_jawaban->get_log_jawaban_by_soal($data_soal)->jawaban;

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

	public function get_review() {
		$id_user  = $this->session->userdata('user_id');
		$id_mapel = $this->input->post('id_mapel');
		$no_seri  = $this->input->post('no_seri');
		$no_soal  = $this->input->post('nomor_soal');

		$data_soal['id_mapel'] = $id_mapel;
		$data_soal['no_seri']  = $no_seri;
		$data_soal['id_user']  = $this->encrypt->decode($id_user);;
		$get_soal	 = $this->m_soal->get_soal_by_seri($data_soal);
		$get_jawaban = $this->m_log_jawaban->get_log_jawaban_by_no_seri($data_soal);
		
		if ($get_soal == false) {
			$html['soal'] = false;
		}

		if (!isset($get_soal[$no_soal]->soal)) {
			$html['soal'] = false;
		} else {
			$html['soal'] 			= $get_soal[$no_soal]->soal;
			$html['jawaban_a'] 		= $get_soal[$no_soal]->jawaban_a;
			$html['jawaban_b'] 		= $get_soal[$no_soal]->jawaban_b;
			$html['jawaban_c'] 		= $get_soal[$no_soal]->jawaban_c;
			$html['jawaban_d'] 		= $get_soal[$no_soal]->jawaban_d;
			$html['jawaban_e'] 		= $get_soal[$no_soal]->jawaban_e;
			$html['kunci_jawaban'] 	= $get_soal[$no_soal]->kunci_jawaban;
			$html['jawaban']		= $get_jawaban[$no_soal]->jawaban;
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

	public function get_history() {
		$id_user 		= $this->session->userdata('user_id');
		$get_history	= $this->m_log_tryout->get_log_tryout_by_id_user($id_user);

		$html['history'] = '';
		
		if ($get_history == false) {
			$html['history'] = false;
		} else {
			foreach ($get_history as $key => $value) {
				$html['history'] .= '<li><a href="#page-hasil" data-id_mapel="'.$value->id_mapel.'" data-no_seri="'.$value->no_seri.'" id="open-history_nilai">' . $this->m_mata_pelajaran->get_mata_pelajaran_by_id($value->id_mapel)->mapel . ' | ' . $value->no_seri . '</a></li>';
			}
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

	public function get_profil() {
		$id_user 	= $this->session->userdata('user_id');
		$get_profil	= $this->m_users->get_users_by_id($id_user);
		
		$html['nama'] 		= $get_profil->nama;
		$html['email'] 		= $get_profil->email;
		$html['username'] 	= $get_profil->username;

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

	public function update_profil() {
		$id_user 	= $this->session->userdata('user_id');

		$profil['nama']		= $this->input->post('nama');
		$profil['email']	= $this->input->post('email');
		$profil['password']	= $this->input->post('password');
		$profil['passconf']	= $this->input->post('passconf');

		$update_profil	= $this->m_users->update_users($id_user, $profil);
		
		$html['nama'] 		= $profil['nama'];
		$html['email'] 		= $profil['email'];

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


	public function get_mapel_latihan() {
		$get_mapel = $this->m_mata_pelajaran->get_mata_pelajaran();

		$html['get_mapel'] = '';

		foreach ($get_mapel as $key => $value) {
			$html['get_mapel'] .= '<li><a id="open-ujian_latihan" data-id_mapel="'.$value->id.'">'.$value->mapel.'</a></li>';
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

	public function get_mapel_ujian_latihan() {
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

	public function get_ujian_latihan() {
		$id_mapel  = $this->input->post('id_mapel');
		$id_user   = $this->session->userdata('user_id');

		$get_mapel = $this->m_mata_pelajaran->get_mata_pelajaran_by_id( $id_mapel );
		$html['mapel'] = $get_mapel->mapel;

		// Ambil seri soal
		$tryout['id_user']  = $this->encrypt->decode($id_user);
		$tryout['id_mapel'] = $id_mapel;

		$html['seri'] = $this->m_log_latihan->get_seri_tryout($tryout);

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

	public function init_ujian_latihan() {
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
		$this->m_log_latihan->insert_log_tryout($log_tryout);

		$get_soal = $this->m_soal->get_soal_by_seri($data_soal);

		foreach ($get_soal as $key => $value) {
			$log_jawab['id_user']  = $this->encrypt->decode($id_user);
			$log_jawab['id_mapel'] = $id_mapel;
			$log_jawab['no_seri']  = $no_seri;
			$log_jawab['id_soal']  = $value->id;
			$log_jawab['jawaban']  = 'Belum Dijawab';
			$this->m_log_jawaban_latihan->insert_log_jawaban($log_jawab);
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

	public function update_ujian_latihan() {
		$id_user		   = $this->session->userdata('user_id');
		$ujian['id_user']  = $this->encrypt->decode($id_user);
		$ujian['id_mapel'] = $this->input->post('id_mapel');
		$ujian['no_seri']  = $this->input->post('no_seri');
		$no_soal  		   = $this->input->post('nomor_soal');
		$ujian['jawaban']  = $this->input->post('jawaban');
		$ujian['hint']  	= $this->input->post('hint');

		$data_soal['id_mapel'] = $ujian['id_mapel'];
		$data_soal['no_seri']  = $ujian['no_seri'];

		$get_soal = $this->m_soal->get_soal_by_seri($data_soal);
		$ujian['id_soal'] = $get_soal[$no_soal]->id;
		
		$update_ujian = $this->m_log_jawaban_latihan->update_log_jawaban_by_ujian( $ujian );

		// Update nilai
		$tryout_inprogress = $this->m_log_latihan->get_log_tryout_inprogress( $ujian );

		$tryout['jawaban_benar'] = 0;
		$tryout['jawaban_salah'] = 0;
		
		foreach ($get_soal as $key => $value) {
			$ujian['id_soal'] = $value->id;
			$get_jawaban = $this->m_log_jawaban_latihan->get_log_jawaban_by_soal( $ujian );

			if ($value->kunci_jawaban == $get_jawaban->jawaban) {
				$tryout['jawaban_benar']++;
			} else {
				$tryout['jawaban_salah']++;
			}
		}

		$tryout['nilai'] = $tryout['jawaban_benar'] /$tryout_inprogress->jumlah_soal * 100;

		$this->m_log_latihan->update_log_tryout( $tryout_inprogress->id, $tryout );

		$html['update'] = 'Update Jawaban!';

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

	public function get_hasil_latihan() {
		$id_user  = $this->session->userdata('user_id');
		$id_mapel = $this->input->post('id_mapel');
		$no_seri  = $this->input->post('no_seri');

		$data_hasil['id_mapel'] = $id_mapel;
		$data_hasil['no_seri']  = $no_seri;
		$data_hasil['id_user']  = $this->encrypt->decode($id_user);;
		$get_hasil				= $this->m_log_latihan->get_log_tryout_inprogress($data_hasil);
		$get_mapel 				= $this->m_mata_pelajaran->get_mata_pelajaran_by_id($id_mapel);
		
		if ($get_hasil == false) {
			$html['nomor_seri'] = false;
		}

		if (!isset($get_hasil->no_seri)) {
			$html['no_seri'] = false;
		} else {
			$html['id_mapel']		= $id_mapel;
			$html['mata_pelajaran'] = $get_mapel->mapel;
			$html['no_seri'] 		= $get_hasil->no_seri;
			$html['tanggal'] 		= $get_hasil->tanggal;
			$html['jumlah_soal'] 	= $get_hasil->jumlah_soal;
			$html['jawaban_benar'] 	= $get_hasil->jawaban_benar;
			$html['jawaban_salah'] 	= $get_hasil->jawaban_salah;
			$html['nilai'] 			= $get_hasil->nilai;
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
}

