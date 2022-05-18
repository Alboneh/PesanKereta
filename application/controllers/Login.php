<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->template->load('asset', 'login');
	}
	public function Register()
	{
		$this->template->load('asset', 'register');
	}
	public function aksi_login(){
		$e= $this->input->post('email');
        $p= $this->input->post('password');
		$this->load->model('Mlogin');
		//data
		$data = $this->Mlogin->cek_login($e,$p)->row_array();
		$data2 = $this->Mlogin->cek_login_member($e,$p)->row_array();
		//cek
		$cek = $this->Mlogin->cek_login($e,$p)->num_rows();
		$cek2 = $this->Mlogin->cek_login_member($e,$p)->num_rows();
		if($cek == 1){
			$data_session = array(
                'email' => $e,
				'id' => $data['id'],
				'username' => $data['username'],
				'namalengkap' => $data['namalengkap'],
				'status' => 'admin',
				'login' => true
            );
            $this -> session -> set_userdata($data_session);
            redirect('admin'); 
		}
		else {
            if($cek2 == 1){
                $data_session = array(
                   'email' => $e,
				   'id' => $data2['id'],
				   'username' => $data2['username'],
				   'namalengkap' => $data2['namalengkap'],
				   'status' => 'pelanggan',
				   'login' => true
                );
                $this -> session -> set_userdata($data_session);
                redirect('pelanggan'); 
            }
            else{
				$this->session->set_flashdata('flash','Gagal');
                redirect('login');
            }
           
        }
	}
	public function aksi_register(){
		$this->load->model('Mlogin');
		$email = $this->input->post("email");
		$cek = $this->Mlogin->cek_data_logins($email)->num_rows();
		$data = array(
			"username" => $this->input->post("username"),
			"namalengkap" => $this->input->post("namalengkap"),
			"email" => $email,
            "password" => $this->input->post("password"),
			"no_telpon" => $this->input->post("no_telpon"),
		);
		if($cek >  1){
			$this->session->set_flashdata('flash','email already exist');
			redirect('login/register'); 
		}
		if($cek < 1){
			$result = $this ->Mlogin->register($data);
				$this->session->set_flashdata('flash','registrasi_berhasil');
				redirect('login'); 
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
    }
}
