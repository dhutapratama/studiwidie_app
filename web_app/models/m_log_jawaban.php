<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_log_jawaban extends CI_Model{

	// Retrieve all data from table
	public function get_log_jawaban () {
		$database = $this->db->select('*')
					->from('log_jawaban')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_log_jawaban_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('log_jawaban')
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
		*/

		$database = $this->db->insert('log_jawaban', $data);
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
		*/

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('log_jawaban', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_log_jawaban ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('log_jawaban');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}