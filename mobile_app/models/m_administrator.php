<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_administrator extends CI_Model{

	// Retrieve all data from table
	public function get_administrator () {
		$database = $this->db->select('*')
					->from('administrators')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_administrator_by_id ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);

		$database = $this->db->select('*')
					->from('administrators')
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

		if ($data['password'] != '') {
			$data['password'] = md5($data['password']);
		} else {
			unset($data['password']);
		}

		$data['created_date'] = date('Y-m-d H:i:s');
		$data['updated_date'] = date('Y-m-d H:i:s');
		$database = $this->db->insert('administrators', $data);
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

		if ($data['password'] != '') {
			$data['password'] = md5($data['password']);
		} else {
			unset($data['password']);
		}
		
		$this->db->where('id', $id);
		$database = $this->db->update('administrators', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_administrator ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('administrators');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

	// Login as administrator
	public function login($data = array('username' => '', 'password' => '')) {
		$database = $this->db->select('*')
					->from('administrators')
					->where('username', $data['username'])
					->where('password', md5($data['password']))
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();

			$data['user_id'] 	= $this->encrypt->encode($database[0]->id);
			$data['user_type'] 	= 'admin';
			$data['nama'] 		= $database[0]->username;

			$this->session->set_userdata($data);
		}
	}
}