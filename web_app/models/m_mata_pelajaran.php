 <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	Data ID yang masuk kedalam model ini harus terenskripsi.
*/

class M_mata_pelajaran extends CI_Model{

	// Retrieve all data from table
	public function get_mata_pelajaran () {
		$database = $this->db->select('*')
					->from('mata_pelajaran')
					->get()->result();
		return $database;
	}

	// Retrieve data by id from table
	public function get_mata_pelajaran_by_id ($id_ = '', $encrypted = true) {
		if ($encrypted) {
			$id = $this->encrypt->decode($id_);
			
			if ($id == '') {
				$id = $this->encrypt->decode(urldecode($id_));
			}
		} else {
			$id = $id_;
		}
			

		$database = $this->db->select('*')
					->from('mata_pelajaran')
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
	public function insert_mata_pelajaran ($data = array()) {
		/*
			$data['mapel'] = ;
		*/

		$database = $this->db->insert('mata_pelajaran', $data);
		return $database;
	}

	// Update data to table
	public function update_mata_pelajaran ($encrypted_id = '', $data = array()) {
		/*
			$data['mapel'] = ;
		*/

		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->update('mata_pelajaran', $data);
		return $database;
	}

	// Delete data to table by id
	public function delete_mata_pelajaran ($encrypted_id = '') {
		$id = $this->encrypt->decode($encrypted_id);
		$this->db->where('id', $id);
		$database = $this->db->delete('mata_pelajaran');
		return $database;
	}

	// ------------------------------
	// Custom Function
	// ------------------------------

}