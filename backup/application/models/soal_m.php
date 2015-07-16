<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soal_m extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
		
	}

	public function soal($idmapel) {
        //Ambil Soal

		$jawab["id_user"] = $this->session->userdata('id_user');
        $tryout_count = $this->db->select("*")
			->from("log_tryout")
			->where("id_user", $jawab["id_user"])
			->where("id_mapel", $idmapel)
			->get()->num_rows();

		$tryout_result = $this->db->select("*")
			->from("log_tryout")
			->where("id_user", $jawab["id_user"])
			->where("id_mapel", $idmapel)
			->get()->result();

		$count = $this->db->select("*")
			->from("soal")
			->where("id_mapel", $idmapel)
			->group_by("no_seri")
			->get()->num_rows();

		if ($count - $tryout_count == 0) {
			return false;
		} else {
			for($i; 1 == 1; $i++) {
				$get_soal = true;
				$no_seri = rand(1, $count);
				return $this->db->select("*")
				->from("soal")
				->where("id_mapel", $idmapel)
				->where("no_seri", $no_seri)
				->get()->result();

				foreach ($tryout_result as $value) {
					if ($value->id == $no_seri) {
						$get_soal = false;
					}
				}
				if ($get_soal == true) {
					break;
				}
			}
		}
	}
 	
 	public function jawab($idmapel, $no_seri, $id_soal, $jawaban) {
        // Jawab soal
		
		$jawab["id_user"] = $this->session->userdata('id_user');
		$jawab["id_mapel"] = $idmapel;
		$jawab["no_seri"] = $no_seri;
		$jawab["id_soal"] = $id_soal;
		$jawab["jawaban"] = $jawaban;

		$insert_jawaban = $this->db->select("*")
			->from("log_jawaban")
			->where("id_user", $jawab["id_user"])
			->where("id_mapel", $idmapel)
			->where("no_seri", $no_seri)
			->where("id_soal", $id_soal)
			->get()->result();

		if ($insert_jawaban) {
			$this->db->where("id_user", $jawab["id_user"])
			->where("id_mapel", $idmapel)
			->where("no_seri", $no_seri)
			->where("id_soal", $id_soal);
			return  $this->db->update("log_jawaban", $jawab);
		} else {
			return  $this->db->insert("log_jawaban", $jawab);
		}
	}

	public function getjawaban($idmapel, $no_seri, $id_soal) {
        // Jawab soal
		
		$jawab["id_user"] = $this->session->userdata('id_user');

		 return $this->db->select("*")
			->from("log_jawaban")
			->where("id_user", $jawab["id_user"])
			->where("id_mapel", $idmapel)
			->where("no_seri", $no_seri)
			->where("id_soal", $id_soal)
			->get()->result();
	}

	public function score($idmapel, $no_seri) {
        
        $jawab["id_user"] = $this->session->userdata('id_user');

        $go = $this->db->select("*")
			->from("log_tryout")
			->where("id_user", $jawab["id_user"])
			->where("id_mapel", $idmapel)
			->where("no_seri", $no_seri)
			->get()->result();

		if (!$go) {
			 $jawaban = $this->db->select("*")
				->from("log_jawaban")
				->where("id_user", $jawab["id_user"])
				->where("id_mapel", $idmapel)
				->where("no_seri", $no_seri)
				->get()->result();

			$soal = $this->db->select("*")
				->from("soal")
				->where("id_mapel", $idmapel)
				->where("no_seri", $no_seri)
				->get()->result();

			$jawaban_benar = 0;
			$jawaban_salah = 0;
			$jumlah_soal = 0;
			foreach ($soal as $rows_soal) {
				foreach ($jawaban as $rows_jawaban) {
					if($rows_soal->id == $rows_jawaban->id_soal) {
						if ($rows_soal->kunci_jawaban == $rows_jawaban->jawaban) {
							$jawaban_benar += 1;
						}
					}
				}
				$jumlah_soal += 1;
			}

			$jawaban_salah = $jumlah_soal - $jawaban_benar;

			$log_tryout["id_user"] = $jawab["id_user"];
			$log_tryout["tanggal"] = date("Y-m-d H:i:s");
			$log_tryout["no_seri"] = $no_seri;
			$log_tryout["id_mapel"] = $idmapel;
			$log_tryout["jawaban_benar"] = $jawaban_benar;
			$log_tryout["jawaban_salah"] = $jawaban_salah;
			$log_tryout["jumlah_soal"] = $jumlah_soal;
			$log_tryout["nilai"] = 100 / $jumlah_soal * $jawaban_benar;

			$this->db->insert("log_tryout", $log_tryout);
		}
		return $this->db->select("*")
			->from("log_tryout")
			->where("id_user", $jawab["id_user"])
			->where("id_mapel", $idmapel)
			->where("no_seri", $no_seri)
			->get()->result();
	}

	public function pembahasan($id_mapel, $no_seri) {
        
        $jawab["id_user"] = $this->session->userdata('id_user');

        return $this->db->select("*")
			->from("log_jawaban")
			->where("log_jawaban.id_user", $jawab["id_user"])
			->where("log_jawaban.id_mapel", $id_mapel)
			->where("log_jawaban.no_seri", $no_seri)
			->join("soal", "soal.id = log_jawaban.id_soal", "right")
			->get()->result();

		}
}