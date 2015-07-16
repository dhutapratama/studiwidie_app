<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
		
	}

	public function login() {
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$user =  $this->db->select("*")
			->from("administrators")
			->where("username", $username)
			->where("password", $password)
			->get();

		if ($user->num_rows() == 1) {
			$user = $user->result();
			$cache["username"] 	= $username;
			$cache["id_user"] 	= $user[0]->id;
			$cache["logged_in_admin"] = true;
			$this->session->set_userdata($cache);
			return true;
		} else {
			return false;
		}

	}

	public function logout() {
		$this->session->sess_destroy();
	}

	public function count_mapel() {
		return $this->db->select("*")
			->from("mata_pelajaran")
			->get()->num_rows();
	}

	public function count_learning() {
		return $this->db->select("*")
			->from("learning")
			->get()->num_rows();
	}

	public function count_soal() {
		return $this->db->select("*")
			->from("soal")
			->get()->num_rows();
	}

	public function count_tryout() {
		return $this->db->select("*")
			->from("log_tryout")
			->get()->num_rows();
	}

	public function count_user() {
		return $this->db->select("*")
			->from("users")
			->get()->num_rows();
	}

	public function get_mapel() {
		return $this->db->select("*")
			->from("mata_pelajaran")
			->get()->result();
	}

	public function add_mapel() {
		$data['mapel'] = $this->input->post("mata_pelajaran");
		return $this->db->insert("mata_pelajaran", $data);
	}

	public function del_mapel($id) {
		$this->db->where("id", $id);
		return $this->db->delete("mata_pelajaran");
	}

	public function get_learning() {
		return $this->db->select("*, learning.id as id_learning")
			->from("learning")
			->join("mata_pelajaran", "mata_pelajaran.id = learning.id_mapel")
			->order_by("id_mapel", "ASC")
			->get()->result();
	}

	public function add_learning() {
		$data['id_mapel'] = $this->input->post("mata_pelajaran");
		$data['materi'] = $this->input->post("materi");
		$data['isi'] = $this->input->post("isi");
		return $this->db->insert("learning", $data);
	}

	public function del_learning($id) {
		$this->db->where("id", $id);
		return $this->db->delete("learning");
	}

	public function get_soal() {
		return $this->db->select("*, soal.id as id_soal")
			->from("soal")
			->join("mata_pelajaran", "mata_pelajaran.id = soal.id_mapel")
			->order_by("id_mapel", "ASC")
			->group_by("no_seri")
			->get()->result();
	}

	public function add_soal() {
		$data['no_seri'] 	= $this->input->post("no_seri");
		$data['id_mapel'] 	= $this->input->post("mata_pelajaran");
		$data['soal'] 		= $this->input->post("soal");
		$data['jawaban_a'] 	= $this->input->post("jawaban_a");
		$data['jawaban_b'] 	= $this->input->post("jawaban_b");
		$data['jawaban_c'] 	= $this->input->post("jawaban_c");
		$data['jawaban_d'] 	= $this->input->post("jawaban_d");
		$data['jawaban_e'] 	= $this->input->post("jawaban_e");
		$data['kunci_jawaban'] = $this->input->post("kunci_jawaban");
		$data['hint_1'] 	= $this->input->post("hint_1");
		$data['hint_2'] 	= $this->input->post("hint_2");
		$data['hint_3'] 	= $this->input->post("hint_3");
		return $this->db->insert("soal", $data);
	}

	public function get_user() {
		return $this->db->select("*")
			->from("users")
			->get()->result();
	}

	public function del_user($id) {
		$this->db->where("id", $id);
		return $this->db->delete("users");
	}

	public function get_administrator() {
		return $this->db->select("*")
			->from("administrators")
			->get()->result();
	}

	public function add_administrator() {
		$data['username'] = $this->input->post("username");
		$data['password'] = $this->input->post("password");
		$data['created_date'] = date("Y-m-d H:i:s");
		$data['updated_date'] = date("Y-m-d H:i:s");;
		return $this->db->insert("administrators", $data);
	}

	public function del_administrator($id) {
		$this->db->where("id", $id);
		return $this->db->delete("administrators");
	}
}