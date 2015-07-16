<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel_m extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
		
	}

	public function getmapel() {
        //Ambil Mata Pelajaran
		return $this->db->select("*")
			->from("mata_pelajaran")
			->get()->result();
	}
    
    public function getmateri($id) {
        //Ambil Mata Pelajaran
		return $this->db->select("*")
			->from("learning")
			->where("id_mapel", $id)
			->get()->result_array();
	}

	public function getisi($idmapel, $idmateri) {
        //Ambil Mata Pelajaran
		return $this->db->select("*")
			->from("learning")
			->where("id_mapel", $idmapel)
			->where("id", $idmateri)
			->get()->result_array();
	}
}