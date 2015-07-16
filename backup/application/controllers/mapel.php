<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mapel extends CI_Controller {

	public function index()
	{
        // Insert Model (MVC)
        $this->load->model("mapel_m");
        $pelajaran = $this->mapel_m->getmapel();

        foreach ($pelajaran as $rows) {
            $output[$rows->id] = $rows->mapel;
        }
        
        // Output
        $var["output"] = $output;
        
        // Render Output
		$this->load->view('json', $var);
	}

    public function materi($id)
    {
        // Insert Model (MVC)
        $this->load->model("mapel_m");
        $materi = $this->mapel_m->getmateri($id);
        
        // Output
        $var["output"] = $materi;
        
        // Render Output
        $this->load->view('json', $var);
    }

    public function isi($idmapel, $idmateri)
    {
        // Insert Model (MVC)
        $this->load->model("mapel_m");
        $materi = $this->mapel_m->getisi($idmapel, $idmateri);
        
        // Output
        $var["output"] = $materi;
        
        // Render Output
        $this->load->view('json', $var);
    }
}