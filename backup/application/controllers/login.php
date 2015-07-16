<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index($username, $password)
	{
        // Insert Model (MVC)
        $this->load->model("login_m");
        
        // Deklarasi variabel
        $output["session"] = $this->session->userdata('session_id');
        
        // Program
        if($username && $password) {
            $status_login = $this->login_m->login($username, $password);
            
            if($status_login != false){
                $output["login"] = "true";
                $output["nama"] = $status_login[0]->nama;
                $output["pesan"] = "Berhasil login!";
                
                $newdata = array(
                   'id_user'  => $status_login[0]->id,
                   'username'  => $username,
                   'nama'      => $status_login[0]->nama,
                   'logged_in' => TRUE
                );

                $this->session->set_userdata($newdata);

            } else {
                $output["login"] = "false";
                $output["pesan"] = "Username dan Password anda salah!";
            }
            
        } else {
            $output["login"] = "false";
            $output["pesan"] = "Harap isi Username & Password";
        }
        
        // Output
        $var["output"] = $output;
        
        // Render Output
		$this->load->view('json', $var);
	}
    
    public function registrasi()
	{
        // Insert Model (MVC)
        $this->load->model("login_m");
        
        // Deklarasi variabel
        $username = $this->input->get("username");
        $password = $this->input->get("password");
        $repassword = $this->input->get("repassword");
        $nama = $this->input->get("nama");
        $email = $this->input->get("email");
        $output["session"] = $this->session->userdata('session_id');
        
        // Program
        if($username && $password && $nama && $email) {
            if($password == $repassword) {
                $status_register = $this->login_m->registrasi($username, $password, $nama, $email);
            
                if($status_register["registrasi"] != false){
                    $output["registrasi"] = "true";
                    $output["pesan"] = "Berhasil mendaftar!";
                } else {
                    $output["registrasi"] = "false";
                    $output["pesan"] = $status_register['error']. " telah digunakan.";
                }
            } else {
                $output["registrasi"] = "false";
                $output["pesan"] = "Password tidak sama!";   
            }
            
        } else {
            $output["registrasi"] = "false";
            $output["pesan"] = "Harap isi semua data anda";
        }
        
        // Output
        $var["output"] = $output;
        
        // Render Output
		$this->load->view('json', $var);
	}
    
    public function lupa_password()
	{
        // Insert Model (MVC)
        $this->load->model("login_m");
        
        // Deklarasi variabel
        $email = $this->input->get("email");
        
        // Program
        $status_password = $this->login_m->lupa_password($email);
        if($status_password["ganti"] == true) {
            $this->load->library('email');
            $config['protocol']    = 'smtp';
            $config['smtp_host']    = 'ssl://smtp.gmail.com';
            $config['smtp_port']    = '465';
            $config['smtp_timeout'] = '7';
            $config['smtp_user']    = 'dhutacoc@gmail.com';
            $config['smtp_pass']    = 'gheasafferina';
            $config['charset']    = 'utf-8';
            $config['newline']    = "\r\n";
            $config['mailtype'] = 'text'; // or html
            $config['validation'] = TRUE; // bool whether to validate email or not 
            
            $this->email->initialize($config);
            $this->email->from('dhutacoc@gmail.com', 'Admin Traveloba');
            $this->email->to($email);

            $this->email->subject('Password Studiwidie');
            $this->email->message('Password : '.$status_password["password"]);

            $this->email->send();
            
            $output["password"] = "true";
            $output["pesan"] = "Password baru telah dikirim ke email anda.";
        } else {
            $output["password"] = "false";
            $output["pesan"] = "Email anda tidak terhubung dengan akun Studiwidie.";
        }
        
        // Output
        $var["output"] = $output;
        
        // Render Output
		$this->load->view('json', $var);
	}
    
    public function default_app()
	{
        // Insert Model (MVC)
        $this->load->model("login_m");
        
        // Deklarasi variabel
        $email = $this->input->post("email");
        
        // Program
        $status_register = $this->login_m->lupa_password($email);
        
        // Output
        $var["output"] = $output;
        
        // Render Output
		$this->load->view('json', $var);
	}
    
}