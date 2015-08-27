<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_log_jawaban_latihan extends CI_Model{

	// Retrieve all data from table
	public function get_log_jawaban () {
		$database = $this->db->select('*')
					->from('log_jawaban_latihan')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_log_jawaban_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('log_jawaban_latihan')
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
	public function insert_log_jawaban ($data = array()) {
		/*
			$data['id_user']  = ;
			$data['id_mapel'] = ;
			$data['no_seri']  = ;
			$data['id_soal']  = ;
			$data['jawaban']  = ;
			$data['hint']  	  = ;
		*/

		$database = $this->db->insert('log_jawaban_latihan', $data);
		return $database;
	}

	// Update data to table
	public function update_log_jawaban ($encrypted_id = '', $data = array()) {
		/*
			$data['id_user']  = ;
			$data['id_mapel'] = ;
			$data['no_seri']  = ;
			$data['id_soal']  = ;
			$data['jawaban']  = ;
			$data['hint']  	  = ;
		*/

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('log_jawaban_latihan', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_log_jawaban ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('log_jawaban_latihan');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------
	// Update data to table
	public function update_log_jawaban_by_ujian ($data = array()) {
		/*
			$data['id_user']  = ;
			$data['id_mapel'] = ;
			$data['no_seri']  = ;
			$data['id_soal']  = ;
			$data['jawaban']  = ;
		*/

		$this->db->where('id_user', $data['id_user']);
		$this->db->where('id_mapel', $data['id_mapel']);
		$this->db->where('no_seri', $data['no_seri']);
		$this->db->where('id_soal', $data['id_soal']);
		$database = $this->db->update('log_jawaban_latihan', $data);
		return $database;
	}

	public function get_log_jawaban_by_soal ($data = array('id_user' => '', 'id_mapel' => '', 'no_seri' => '', 'id_soal' => '')) {
		$database = $this->db->select('*')
					->from('log_jawaban_latihan')
					->where('id_user', $data['id_user'])
					->where('id_mapel', $data['id_mapel'])
					->where('no_seri', $data['no_seri'])
					->where('id_soal', $data['id_soal'])
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database[0];
		} else {
			return false;
		}
	}

	public function get_log_jawaban_by_no_seri ($data = array('id_user' => '', 'id_mapel' => '', 'no_seri' => '')) {

		$database = $this->db->select('*')
					->from('log_jawaban_latihan')
					->where('id_user', $data['id_user'])
					->where('id_mapel', $data['id_mapel'])
					->where('no_seri', $data['no_seri'])
					->get()->result();

		return $database;
	}
}