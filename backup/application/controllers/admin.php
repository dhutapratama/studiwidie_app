<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("m_admin");

		if ($this->session->userdata('logged_in_admin') == false) {
			redirect(site_url());
		}
	}

	public function index() {
		$count_mapel 	= $this->m_admin->count_mapel();
		$count_learning = $this->m_admin->count_learning();
		$count_tryout 	= $this->m_admin->count_tryout();
		$count_soal 	= $this->m_admin->count_soal();
		$count_user 	= $this->m_admin->count_user();

		$output["status"]["mata_pelajaran"] = $count_mapel;
		$output["status"]["soal"] 			= $count_soal;
		$output["status"]["learning"] 		= $count_learning;
		$output["status"]["tryout"]		 	= $count_tryout;
		$output["status"]["user"]		 	= $count_user;

		$this->load->view("header", $output);
		$this->load->view("dashboard");
	}

	public function logout()
	{
		$this->m_admin->logout();
		redirect(site_url());
	}

	public function mapel($action = "", $do = "") {

		if ($action == "add") {
			$this->_mapel_add($do);
		} elseif ($action == "delete") {
			$this->_mapel_delete($do);
		} else {
			$get_mapel 	= $this->m_admin->get_mapel();

			$output["mapel"] = $get_mapel;

			$this->load->view("header", $output);
			$this->load->view("mata_pelajaran");

		}
	}

	public function _mapel_add($do = "") {
		if ($do != "") {
			$this->m_admin->add_mapel();
			redirect("admin/mapel");
		}
		$get_mapel 	= $this->m_admin->get_mapel();

		$output["mapel"] = $get_mapel;

		$this->load->view("header", $output);
		$this->load->view("mata_pelajaran_add");
	}

	public function _mapel_delete($id = "") {
		if ($id != "") {
			$this->m_admin->del_mapel($id);
			
		}
		redirect("admin/mapel");
	}

	public function learning($action = "", $do = "") {
		if ($action == "add") {
			$this->_learning_add($do);
		} elseif ($action == "delete") {
			$this->_learning_delete($do);
		} else {
			$get_learning 	= $this->m_admin->get_learning();

			$output["learning"] = $get_learning;

			$this->load->view("header", $output);
			$this->load->view("learning");
		}
	}

	public function _learning_add($do = "") {
		if ($do != "") {
			$this->m_admin->add_learning();
			redirect("admin/learning");
		}

		$get_mapel 	= $this->m_admin->get_mapel();

		$output["mapel"] = $get_mapel;

		$this->load->view("header", $output);
		$this->load->view("learning_add");
	}

	public function _learning_delete($id = "") {
		if ($id != "") {
			$this->m_admin->del_learning($id);
			
		}
		redirect("admin/learning");
	}

	public function soal($action = "", $do = "") {

		if ($action == "add") {
			$this->_soal_add($do);
		} else {

			$get_soal 	= $this->m_admin->get_soal();

			$output["soal"] = $get_soal;

			$this->load->view("header", $output);
			$this->load->view("soal");
		}
	}

	public function _soal_add($do = "") {
		if ($do != "") {
			$this->m_admin->add_soal();
			redirect("admin/soal");
		}
		$get_mapel 	= $this->m_admin->get_mapel();

		$output["mapel"] = $get_mapel;

		$this->load->view("header", $output);
		$this->load->view("soal_add");
	}

	public function administrator($action = "", $do = "") {

		if ($action == "add") {
			$this->_administrator_add($do);
		} elseif ($action == "delete") {
			$this->_administrator_delete($do);
		} else {
			$get_administrator 	= $this->m_admin->get_administrator();

			$output["administrator"] = $get_administrator;

			$this->load->view("header", $output);
			$this->load->view("administrators");
		}
	}

	public function _administrator_add($do = "") {
		if ($do != "") {
			$this->m_admin->add_administrator();
			redirect("admin/administrator");
		}
		$get_administrator 	= $this->m_admin->get_administrator();

		$output["administrator"] = $get_administrator;
		$this->load->view("header", $output);
		$this->load->view("administrators_add");
	}

	public function _administrator_delete($id = "") {
		if ($id != "") {
			$this->m_admin->del_administrator($id);
			
		}
		redirect("admin/administrator");
	}

	public function user($action = "", $id = "") {
		if ($action == "delete") {
			$this->_user_delete($id);
		} else {
			$get_user 	= $this->m_admin->get_user();

			$output["user"] = $get_user;

			$this->load->view("header", $output);
			$this->load->view("users");
		}
	}

	public function _user_delete($id = "") {
		if ($id != "") {
			$this->m_admin->del_user($id);
			
		}
		redirect("admin/user");
	}
    
}