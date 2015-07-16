<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class histori extends CI_Controller {

	public function index()
	{
        // Insert Model (MVC)
        $this->load->model("histori_m");
        $history = $this->histori_m->get_history();

        // Output
        $var["output"] = $history;
        
        // Render Output
		$this->load->view('json', $var);
	}
}