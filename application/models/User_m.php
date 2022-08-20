<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model {

	public static $pk = 'idusers';

	public static $table = 'users';
	
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	public function register()
	{
		$data = [
			'user_name' => htmlspecialchars($this->input->post('username', true)),
			'user_password' => password_hash(htmlspecialchars($this->input->post('password1', true)), PASSWORD_DEFAULT),
			'user_fullname' => htmlspecialchars($this->input->post('fullname', true)),
			'user_email' => htmlspecialchars($this->input->post('email', true)),
			'user_type' => settings('general','new_user_default_access'),
			'is_active' => 1,
			'is_block' => 0,
			'create_at' => time(),
			'create_by' => 1
		];
		$this->db->insert('users', $data);
		
	}
	public function getUserById($id){
		return $this->db->get_where('users',['idusers'=>$id])->row();
	}
	public function getData(){
		return $this->db->get('users')->result();
	}

}

/* End of file User_m.php */