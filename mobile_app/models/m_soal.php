<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
	Validasi data form dihandle oleh html5
*/

class M_soal extends CI_Model{

	// Retrieve all data from table
	public function get_soal () {
		$database = $this->db->select('*')
					->from('soal')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_soal_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('soal')
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
	public function insert_soal ($data = array()) {
		/*
			$data['no_seri']	   = ;
			$data['id_mapel']	   = ;
			$data['soal']		   = ;
			$data['jawaban_a']	   = ;
			$data['jawaban_b']	   = ;
			$data['jawaban_c']	   = ;
			$data['jawaban_d']	   = ;
			$data['jawaban_e']	   = ;
			$data['kunci_jawaban'] = ;
			$data['hint_1']		   = ;
			$data['hint_2']		   = ;
			$data['hint_3']		   = ;

		*/

		$database = $this->db->insert('soal', $data);
		return $database;
	}

	// Update data to table
	public function update_soal ($encrypted_id = '', $data = array()) {
		/*
			$data['no_seri']	   = ;
			$data['id_mapel']	   = ;
			$data['soal']		   = ;
			$data['jawaban_a']	   = ;
			$data['jawaban_b']	   = ;
			$data['jawaban_c']	   = ;
			$data['jawaban_d']	   = ;
			$data['jawaban_e']	   = ;
			$data['kunci_jawaban'] = ;
			$data['hint_1']		   = ;
			$data['hint_2']		   = ;
			$data['hint_3']		   = ;
		*/

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('soal', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_soal ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('soal');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	public function get_soal_seri ($encrypted_id) {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('soal')
					->where('id_mapel', $id)
					->group_by('no_seri')
					->get()->result();
		return $database;
	}

	public function get_jumlah_soal_by_seri ($no_seri = 0) {
		$database = $this->db->select('*')
					->from('soal')
					->where('no_seri', $no_seri)
					->get()->num_rows();
		return $database;
	}

	public function get_soal_by_seri ($encrypted_id = 0) {
		$no_seri  = $this->encrypt->decode($encrypted_id);
		$database = $this->db->select('*')
					->from('soal')
					->where('no_seri', $no_seri)
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();
			return $database;
		} else {
			return false;
		}
	}

	// Delete data to table by id
	public function delete_soal_by_seri ($encrypted_id = '') {
		$no_seri = $this->encrypt->decode($encrypted_id);
		$this->db->where('no_seri', $no_seri);
		$database = $this->db->delete('soal');
		return $database;
	}

		// Update data to table
	public function update_seri ($encrypted_id = '', $data = array()) {
		/*
			$data['no_seri']	   = ;
		*/

		$no_seri = $this->encrypt->decode($encrypted_id);
		$this->db->where('no_seri', $no_seri);
		$database = $this->db->update('soal', $data);
		return $database;
	}
}