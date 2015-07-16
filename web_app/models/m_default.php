<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_ extends CI_Model
{
	// Retrieve all data from table
	public function get_ () {
		$database = $this->db->select('*')
					->from('')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get__by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('')
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
	public function insert_ ($data = array()) {
		/*
			$data['nama_field'] = ;
		*/

		$database = $this->db->insert('', $data);
		return $database;
	}

	// Update data to table
	public function update_ ($encrypted_id = '', $data = array()) {
		/*
			$data['nama_field'] = ;
		*/

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_ ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}