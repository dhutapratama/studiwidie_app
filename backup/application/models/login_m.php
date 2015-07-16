<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_m extends CI_Model
{
	
	public function __construct() {
		parent::__construct();
		
	}

	public function login($username, $password) {
        //Cek Username & Password
		$user =  $this->db->select("*")
			->from("users")
			->where("username", $username)
            ->where("password", $password)
			->get()->result();
        
        $email =  $this->db->select("*")
			->from("users")
			->where("email", $username)
            ->where("password", $password)
			->get()->result();
        
        if($user != false) {
            return $user;
        } elseif($email != false) {
            return $email;
        } else {
            return false;
        }
        
	}
    
    public function registrasi($username, $password, $nama, $email) {
        // Cek apakah ada username / email yang Sama
		$cek_user = $this->db->select("*")
			->from("users")
			->where("username", $username)
            ->or_where("email", $email)
			->get()->result();
        
        // Jika tidak ada duplikasi
        if(!$cek_user) {
            $users["username"] = $username;
            $users["password"] = $password;
            $users["nama"] = $nama;
            $users["email"] = $email;
            
            //Masukkan kedalam database
            $this->db->insert("users", $users);
            $status['registrasi'] = true;
            return $status;
            
        } else {
            if($cek_user[0]->username == $username) {
                $status["error"] = "Username";
                $status["registrasi"] = false;
            } else {
                $status["error"] = "Email";
                $status["registrasi"] = false;
            }
            return $status;
            
        }
	}
    
    public function lupa_password($email) {
        //Cek Username & Password
		$cek_email =  $this->db->select("*")
			->from("users")
			->where("email", $email)
			->get()->result();
        
        if(!$cek_email) {
            $status["ganti"] = false;
        } else {
            $password_baru = rand(1000000, 9999999);
            $data = array('password' => $password_baru);

            $this->db->where('email', $email);
            $this->db->update('users', $data);
            
            $status["ganti"] = true;
            $status["password"] = $password_baru;
        }
        return $status;
	}
}