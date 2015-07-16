<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
	Validasi data form dihandle oleh html5
*/

class M_users extends CI_Model{

	// Retrieve all data from table
	public function get_users () {
		$database = $this->db->select('*')
					->from('users')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_users_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('users')
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
	public function insert_users ($data = array()) {
		/*
			$data['username'] = ;
			$data['password'] = ;
			$data['nama'] 	  = ;
			$data['email']	  = ;
		*/

		if (isset($data['password'])) {
			$data['password'] = md5($data['password']);
		}

		$database = $this->db->insert('users', $data);
		return $database;
	}

	// Update data to table
	public function update_users ($encrypted_id = '', $data = array()) {
		/*
			$data['username'] = ;
			$data['password'] = ;
			$data['nama'] 	  = ;
			$data['email']	  = ;
		*/

		if (isset($data['password'])) {
			$data['password'] = md5($data['password']);
		}

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('users', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_users ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('users');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}