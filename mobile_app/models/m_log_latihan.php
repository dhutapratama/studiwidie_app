<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_log_latihan extends CI_Model{

	// Retrieve all data from table
	public function get_log_tryout () {
		$database = $this->db->select('*')
					->from('log_latihan')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_log_tryout_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('log_latihan')
					->where('id', $id)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
		
	}

	// Insert data to table
	public function insert_log_tryout ($data = array()) {
		/*
			$data['id_user']	   = ;
			$data['tanggal']	   = ;
			$data['no_seri']	   = ;
			$data['id_mapel'] 	   = ;
			$data['jawaban_benar'] = ;
			$data['jawaban_salah'] = ;
			$data['jumlah_soal']   = ;
		*/

		$database = $this->db->insert('log_latihan', $data);
		return $database;
	}

	// Update data to table
	public function update_log_tryout ($id = '', $data = array()) {
		/*
			$data['id_user']	   = ;
			$data['tanggal']	   = ;
			$data['no_seri']	   = ;
			$data['id_mapel'] 	   = ;
			$data['jawaban_benar'] = ;
			$data['jawaban_salah'] = ;
			$data['jumlah_soal']   = ;
		*/

		$this->db->where('id', $id);
		$database = $this->db->update('log_latihan', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_log_tryout ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('log_latihan');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	public function get_seri_tryout ($data = array('id_user' => '', 'id_mapel' => '')) {
		/*
			jika return = false maka tryout belum dilaksanakan.
		*/
		$id_user  = $data['id_user'];
		$id_mapel = $data['id_mapel'];
		$no_seri  = false;

		$get_soal = $this->m_soal->get_soal_seri($id_mapel);

		foreach ($get_soal as $key => $value) {
			$database = $this->db->select('*')
					->from('log_latihan')
					->where('id_user', $id_user)
					->where('no_seri', $value->no_seri)
					->where('id_mapel', $id_mapel)
					->get();
			if ($database->num_rows() > 0) {
				$no_seri = false;	
			} else {
				$no_seri = $value->no_seri;
				break;
			}
		}
		
		return $no_seri;
	}

	public function get_log_tryout_inprogress ($data = array('id_user' => '', 'id_mapel' => '', 'no_seri' => '')) {
		$id_user  = $data['id_user'];
		$id_mapel = $data['id_mapel'];
		$no_seri  = $data['no_seri'];

		$database = $this->db->select('*')
				->from('log_latihan')
				->where('id_user', $id_user)
				->where('no_seri', $no_seri)
				->where('id_mapel', $id_mapel)
				->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
		} else {
			$database = false;
		}

		return $database[0];
	}

	// Retrieve data by id from table
	public function get_log_tryout_by_id_user ($encrypted_id = '') {
		$id_user = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('log_latihan')
					->where('id_user', $id_user)
					->order_by('tanggal', 'DESC')
					->get()->result();

		return $database;
	}

	public function get_seri_tryout_latihan ($data = array('id_user' => '', 'id_mapel' => '')) {
		/*
			jika return = false maka tryout belum dilaksanakan.
		*/
		$id_user  = $data['id_user'];
		$id_mapel = $data['id_mapel'];
		$no_seri  = false;

		$get_soal = $this->m_soal->get_soal_seri($id_mapel);

		$get_soal = shuffle($get_soal);

		return $get_soal[0]->no_seri;
	}
}