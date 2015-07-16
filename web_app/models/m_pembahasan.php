<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_pembahasan extends CI_Model{

	// Retrieve all data from table
	public function get_pembahasan () {
		$database = $this->db->select('*')
					->from('pembahasan')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_pembahasan_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('pembahasan')
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
	public function insert_pembahasan ($data = array()) {
		/*
			$data['id_mapel'] 	= ;
			$data['materi'] 	= ;
			$data['pembahasan'] = ;
		*/

		$database = $this->db->insert('pembahasan', $data);
		return $database;
	}

	// Update data to table
	public function update_pembahasan ($encrypted_id = '', $data = array()) {
		/*
			$data['id_mapel'] 	= ;
			$data['materi'] 	= ;
			$data['pembahasan'] = ;
		*/

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('pembahasan', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_pembahasan ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('pembahasan');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}