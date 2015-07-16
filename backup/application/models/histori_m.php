<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Histori_m extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
		
	}
	public function get_history() {

		$jawab["id_user"] = $this->session->userdata('id_user');
		return $this->db->select("*, log_tryout.id as histori_id")
			->from("log_tryout")
			->where("id_user", $jawab["id_user"])
			->join("mata_pelajaran", "mata_pelajaran.id = log_tryout.id_mapel")
			->get()->result();
	}
}