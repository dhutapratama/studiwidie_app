<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_administrator extends CI_Model{

	// Retrieve all data from table
	public function get_administrator () {
		$database = $this->db->select('*')
					->from('administrator')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_administrator_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('administrator')
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
	public function insert_administrator ($data = array()) {
		/*
			$data['username'] 	  = ;
			$data['password'] 	  = ;
			$data['created_date'] = ;
			$data['updated_date'] = ;
		*/

		if (isset($data['password'])) {
			$data['password'] = md5($data['password']);
		}

		$data['created_date'] = date('Y-m-d H:i:s');
		$data['updated_date'] = date('Y-m-d H:i:s');
		$database = $this->db->insert('administrator', $data);
		return $database;
	}

	// Update data to table
	public function update_administrator ($encrypted_id = '', $data = array()) {
		/*
			$data['username'] 	  = ;
			$data['password'] 	  = ;
			$data['created_date'] = ;
			$data['updated_date'] = ;
		*/

		$data['updated_date'] = date('Y-m-d H:i:s');
		$id = $this->encrypt->decode($encrypted_id);

		if (isset($data['password'])) {
			$data['password'] = md5($data['password']);
		}
		
		$this->db->where('id', $id);
		$database = $this->db->update('administrator', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_administrator ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('administrator');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}