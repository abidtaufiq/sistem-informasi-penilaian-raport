<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Raport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('nilai_m');
    }
    

    public function index()
    {
        $data['report'] = true;
        $data['content'] = 'raport';
        $this->load->view('index',$data);
    }
    public function cetak()
    {
        $idtahun_akademik = $this->input->post('idtahun_akademik',true);
        $semester = $this->input->post('semester',true);
        $idkelas = $this->input->post('idkelas',true);
        $idsiswa = $this->input->post('idsiswa',true);
        $data['raport_data'] = $this->nilai_m->getDataRaport($idtahun_akademik,$semester,$idkelas,$idsiswa);
        $data['raport_wali'] = $this->nilai_m->getDataWali($idtahun_akademik,$semester,$idkelas);
        $data['raport_nilai'] = $this->nilai_m->getDataNilai($idtahun_akademik,$semester,$idkelas,$idsiswa);
        $this->load->view('cetak_raport',$data);
    }
    public function siswa()
    {
        $data['report_siswa'] = true;
        $data['content'] = 'raport_siswa';
        $this->load->view('index',$data);
    }
    public function cetak_siswa($nis)
    {
        $idtahun_akademik = $this->input->post('idtahun_akademik',true);
        $semester = $this->input->post('semester',true);
        $row = $this->db->select('x.idkelas,x1.idsiswa')
        ->join('rombel x1', 'x1.idwali_kelas = x.idwali_kelas', 'left')
        ->join('siswa x2', 'x2.idsiswa = x1.idsiswa', 'left')
        ->where(['x.idtahun_akademik'=>$idtahun_akademik,'x.semester'=>$semester,'x2.nis'=>$nis])
        ->get('wali_kelas x')->row();
        if($row==null){
            redirect('raport/siswa','refresh');
        }
        $idkelas = $row->idkelas;
        $idsiswa = $row->idsiswa;
        $data['raport_data'] = $this->nilai_m->getDataRaport($idtahun_akademik,$semester,$idkelas,$idsiswa);
        $data['raport_wali'] = $this->nilai_m->getDataWali($idtahun_akademik,$semester,$idkelas);
        $data['raport_nilai'] = $this->nilai_m->getDataNilai($idtahun_akademik,$semester,$idkelas,$idsiswa);
        $this->load->view('cetak_raport',$data);
    }

}

/* End of file Raport.php */