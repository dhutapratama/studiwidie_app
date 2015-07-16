<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function index($idmapel)
	{
        // Insert Model (MVC)
        $this->load->model("soal_m");
        $pelajaran = $this->soal_m->soal($idmapel);

        // Output
        $var["output"] = $pelajaran;
        
        // Render Output
		$this->load->view('json', $var);
	}

    public function jawab($idmapel, $no_seri, $id_soal, $jawaban)
    {
        // Insert Model (MVC)
        $this->load->model("soal_m");
        $pelajaran[0] = $this->soal_m->jawab($idmapel, $no_seri, $id_soal, $jawaban);

        // Output
        $var["output"] = $pelajaran;
        
        // Render Output
        $this->load->view('json', $var);
    }

    public function getjawaban($idmapel, $no_seri, $id_soal)
    {
        // Insert Model (MVC)
        $this->load->model("soal_m");
        $pelajaran = $this->soal_m->getjawaban($idmapel, $no_seri, $id_soal);

        // Output
        $var["output"] = $pelajaran[0];
        
        // Render Output
        $this->load->view('json', $var);
    }

    public function selesai($idmapel, $no_seri)
    {
        // Insert Model (MVC)
        $this->load->model("soal_m");
        $pelajaran = $this->soal_m->score($idmapel, $no_seri);

        // Output
        $var["output"] = $pelajaran[0];
        
        // Render Output
        $this->load->view('json', $var);
    }

    public function pembahasan($id_mapel, $no_seri)
    {
        // Insert Model (MVC)
        $this->load->model("soal_m");
        $soal = $this->soal_m->pembahasan($id_mapel, $no_seri);

        // Output
        $var["output"] = $soal;
        
        // Render Output
        $this->load->view('json', $var);
    }
}