<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('setkelas_m');
        $this->load->model('siswa_m');
        
    }
    

    public function index()
    {
        $data['student'] = true;
        $data['students'] = $this->setkelas_m->getSiswaAktif(_active_years()->idtahun_akademik,_active_years()->semester);
        $data['content'] = 'siswa';
        $this->load->view('index',$data);
    }
    public function biodata()
    {
        $siswa = $this->db->select('idsiswa')
        ->where('nis',__session('username'))
        ->get('siswa')->row();
        $id = $siswa->idsiswa;
        $data['biodata'] = true;
        $data['row'] = $this->siswa_m->getById($id);
        $data['content'] = 'biodata';
        $this->load->view('index',$data);
    }
    /**
    * Save | Update
    * @return Object
    */
    public function save() {
        $id = _toInteger($this->input->post('idsiswa', true));
        $dataset = $this->dataset();
        $this->vars['status'] = $this->db->update('siswa', $dataset,['idsiswa'=>$id]) ? 'success' : 'error';
        $this->vars['status'] == 'success' ? $this->toastr->success('Perubahan berhasil') : $this->toastr->error('Perubahan gagal');
        redirect('siswa/biodata');
    }
    /**
    * Dataset
    * @return Array
    */
    private function dataset() {
        return [
            'nis' => $this->input->post('nis', true),
            'nisn' => $this->input->post('nisn', true),
            'nik' => $this->input->post('nik', true),
            'nama' => $this->input->post('nama', true),
            'tmp_lhr' => $this->input->post('tmp_lhr', true),
            'tgl_lhr' => $this->input->post('tgl_lhr', true),
            'jk' => $this->input->post('jk', true),
            'hobi' => $this->input->post('hobi', true),
            'citacita' => $this->input->post('citacita', true),
            'sts_anak' => $this->input->post('sts_anak', true),
            'jml_sdr' => $this->input->post('jml_sdr', true),
            'anak_ke' => $this->input->post('anak_ke', true),
            'alamat' => $this->input->post('alamat', true),
            'nik_ayah' => $this->input->post('nik_ayah', true),
            'nama_ayah' => $this->input->post('nama_ayah', true),
            'pend_ayah' => $this->input->post('pend_ayah', true),
            'pekr_ayah' => $this->input->post('pekr_ayah', true),
            'nik_ibu' => $this->input->post('nik_ibu', true),
            'nama_ibu' => $this->input->post('nama_ibu', true),
            'pend_ibu' => $this->input->post('pend_ibu', true),
            'pekr_ibu' => $this->input->post('pekr_ibu', true),
            'alamat_ortu' => $this->input->post('alamat_ortu', true),
        ];
    }
}

/* End of file Siswa.php */