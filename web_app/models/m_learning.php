<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_learning extends CI_Model{

	// Retrieve all data from table
	public function get_learning () {
		$database = $this->db->select('*')
					->from('learning')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_learning_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('learning')
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
	public function insert_learning ($data = array()) {
		/*
			$data['id_mapel'] = ;
			$data['meteri']   = ;
			$data['isi']      = ;
		*/

		$database = $this->db->insert('learning', $data);
		return $database;
	}

	// Update data to table
	public function update_learning ($encrypted_id = '', $data = array()) {
		/*
			$data['id_mapel'] = ;
			$data['meteri']   = ;
			$data['isi']      = ;
		*/

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('learning', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_learning ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('learning');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Get Learning by id mata pelajaran
	public function get_learning_by_id_mapel ($encrypted_id = '') {
		$id_mapel = $this->encrypt->decode($encrypted_id);
		if ($id_mapel == '') {
			$id_mapel = $this->encrypt->decode(urldecode($encrypted_id));
		}

		$database = $this->db->select('*')
					->from('learning')
					->where('id_mapel', $id_mapel)
					->get()->result();
		return $database;
	}
}