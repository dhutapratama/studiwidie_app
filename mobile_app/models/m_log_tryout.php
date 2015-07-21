<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_log_tryout extends CI_Model{

	// Retrieve all data from table
	public function get_log_tryout () {
		$database = $this->db->select('*')
					->from('log_tryout')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_log_tryout_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('log_tryout')
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

		$database = $this->db->insert('log_tryout', $data);
		return $database;
	}

	// Update data to table
	public function update_log_tryout ($encrypted_id = '', $data = array()) {
		/*
			$data['id_user']	   = ;
			$data['tanggal']	   = ;
			$data['no_seri']	   = ;
			$data['id_mapel'] 	   = ;
			$data['jawaban_benar'] = ;
			$data['jawaban_salah'] = ;
			$data['jumlah_soal']   = ;
		*/

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('log_tryout', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_log_tryout ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('log_tryout');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}