<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		$this->load->model('User_m','m');
		
	}
	

	public function index()
	{
		$data['dashboard'] = true;
		$data['school_profil'] = $this->db->get('profil_sekolah')->row();
		$data['content'] = 'dashboard';
		$this->load->view('index',$data);
	}

	public function save_profil()
	{
		$id = $this->input->post('idprofil_sekolah', true);
		$data = [
			'nama'=>$this->input->post('nama', true),
			'npsn'=>$this->input->post('npsn', true),
			'status'=>$this->input->post('status', true),
			'nama_kepsek'=>$this->input->post('nama_kepsek', true),
			'nip_kepsek'=>$this->input->post('nip_kepsek', true),
			'akreditasi'=>$this->input->post('akreditasi', true),
			'provinsi'=>$this->input->post('provinsi', true),
			'kabupaten'=>$this->input->post('kabupaten', true),
			'kecamatan'=>$this->input->post('kecamatan', true),
			'kelurahan'=>$this->input->post('kelurahan', true),
			'dusun'=>$this->input->post('dusun', true),
			'rt'=>$this->input->post('rt', true),
			'rw'=>$this->input->post('rw', true),
			'alamat'=>$this->input->post('alamat', true),
			'kodepos'=>$this->input->post('kodepos', true),
			'lintang'=>$this->input->post('lintang', true),
			'bujur'=>$this->input->post('bujur', true)
		];
		$config['upload_path']          = './uploads/';
		$config['allowed_types']        = 'jpg|jpeg|png|bmp';
		$config['max_size']             = 2024000;
		$config['overwrite']             = TRUE;
		$config['file_name']             = 'logo-sekolah';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('logo')){
			// $this->toastr->error($this->upload->display_errors());
			$row = $this->db->get_where('profil_sekolah',['idprofil_sekolah'=>$id])->row();
			$data['logo'] = $row->logo;
		}else{
			$gbr = $this->upload->data();
			$data['logo'] = $gbr['file_name'];
		}
		$this->db->update('profil_sekolah', $data,['idprofil_sekolah'=>$id]);
		$this->toastr->success('Data profil sekolah berhasil di update');
		redirect('dashboard');
	}

	public function user_profile()
	{
		$id = _toInteger($this->uri->segment(3));
		$data['title'] = 'User Profile';
		$data['profil'] = $this->m->getUserById($id);
		$data['content'] = 'backend/user_profile';
		$this->load->view('index', $data);
	}

}

/* End of file Dashboard.php */