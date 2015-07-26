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

		if ($data['password'] != '') {
			$data['password'] = md5($data['password']);
		} else {
			unset($data['password']);
		}

		$database = $this->db->insert('users', $data);

		$message['message'] 	 = 'Pendaftaran sukses';
		$message['message_type'] = 'success';

		return $message;
	}

	// Update data to table
	public function update_users ($encrypted_id = '', $data = array()) {
		/*
			$data['username'] = ;
			$data['password'] = ;
			$data['nama'] 	  = ;
			$data['email']	  = ;
		*/

		if ($data['password'] != '') {
			$data['password'] = md5($data['password']);
		} else {
			unset($data['password']);
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

	// Login as siswa
	public function login($data = array('username' => '', 'password' => '')) {
		$database = $this->db->select('*')
					->from('users')
					->where('username', $data['username'])
					->where('password', md5($data['password']))
					->get();

		if ($database->num_rows() > 0) {
			$database = $database->result();

			$data['user_id'] 	= $this->encrypt->encode($database[0]->id);
			$data['user_type'] 	= 'siswa';
			$data['nama'] 		= $database[0]->nama;
			$data['logged_in']  = true;

			$this->session->set_userdata($data);

			$message['message'] 	 = 'Login berhasil';
			$message['message_type'] = 'success';
		} else {
			$data['user_id'] 	= "";
			$data['user_type'] 	= "guess";
			$data['nama'] 		= "";
			$data['logged_in']  = false;

			$this->session->set_userdata($data);
			
			$message['message'] 	 = 'Username / Password anda salah!';
			$message['message_type'] = 'warning';
		}

		return $message;
	}
}