<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('User_m');
		
	}
	

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login');
		} else {
			$this->_login();
		}
		
	}
	private function _login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$user = $this->db->get_where('users', ['user_name'=>$username])->row_array();
		if($user){
			if($user['is_block'] == 0){
				if(password_verify($password, $user['user_password'])){
					$data = [
						'id' => $user['idusers'],
						'username' => $user['user_name'],
						'access' => $user['user_type']
					];
					$this->session->set_userdata($data);
					if(__session('access')=='guru'){
						redirect('siswa');
					}elseif(__session('access')=='siswa'){
						redirect('siswa/biodata');
					}else{
						redirect('dashboard');
					}
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-ban"></i> Password anda salah.</div>');
				}
			}else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-ban"></i> Akun anda diblok.</div>');
			}
		}else{
			$this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-ban"></i> Username tidak terdaftar.</div>');
		}
		redirect('auth');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth','refresh');
	}

}

/* End of file Auth.php */