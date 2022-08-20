<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('mengajar_m');
        $this->load->model('nilai_m');
    }
    

    public function index()
    {
        $data['nilai'] = true;
        $data['class'] = $this->mengajar_m->getData(_active_years()->idtahun_akademik,_active_years()->semester);
        $data['content'] = 'nilai/list';
        $this->load->view('index',$data);
    }
    public function input($kelas_kd,$mapel_kd)
    {
        // var_dump($kelas_kd);
        // var_dump($mapel_kd);die;
        $data['nilai'] = true;
        $data['rowI'] = $this->mengajar_m->getDataByMapel(_active_years()->idtahun_akademik,_active_years()->semester,$kelas_kd,$mapel_kd);
        $data['content'] = 'nilai/input';
        $this->load->view('index',$data);
    }
    public function save_kkm($id)
    {
        $idkelas = $this->input->post('idkelas',true);
        foreach (siswa_by_kelas(_active_years()->idtahun_akademik,_active_years()->semester,$idkelas) as $row){
            $siswa = [
                'idtahun_akademik'=>_active_years()->idtahun_akademik,
                'semester'=>_active_years()->semester,
                'idkelas'=>$this->input->post('idkelas',true),
                'idmapel'=>$this->input->post('idmapel',true),
                'idsiswa'=>$row->idsiswa
            ];
            $this->nilai_m->saveSiswa($siswa);
        }
        $data = [
            'kkm'=>$this->input->post('kkm', true)
        ];
        $this->db->where('idmengajar', $id);
        $update = $this->db->update('mengajar',$data);
        if($update){
            $this->toastr->success('KKM berhasil di simpan');
        }else{
            $this->toastr->error('KKM gagal di simpan');
        }
        redirect($this->input->post('current_url', true));
    }
    public function save($kelas_kd)
    {
        $kelas = $this->db->select('idkelas')
        ->where('kelas_kd',$kelas_kd)
        ->get('kelas')->row();
        $idkelas = $kelas->idkelas;
        foreach (siswa_by_kelas(_active_years()->idtahun_akademik,_active_years()->semester,$idkelas) as $row){
            $idnilai = $this->input->post('idnilai'.$row->idsiswa,true);
            $data = [
                'nilai_tp1'=>$this->input->post('tp1'.$row->idsiswa,true),
                'nilai_tp2'=>$this->input->post('tp2'.$row->idsiswa,true),
                'nilai_tp3'=>$this->input->post('tp3'.$row->idsiswa,true),
                'nilai_tp4'=>$this->input->post('tp4'.$row->idsiswa,true),
                'nilai_tp5'=>$this->input->post('tp5'.$row->idsiswa,true),
                'nilai_tp6'=>$this->input->post('tp6'.$row->idsiswa,true),
                'nilai_tp7'=>$this->input->post('tp7'.$row->idsiswa,true),
                'rata_tp'=>$this->input->post('rata_tp'.$row->idsiswa,true),
                'nilai_uh1'=>$this->input->post('uh1'.$row->idsiswa,true),
                'nilai_uh2'=>$this->input->post('uh2'.$row->idsiswa,true),
                'nilai_uh3'=>$this->input->post('uh3'.$row->idsiswa,true),
                'nilai_uh4'=>$this->input->post('uh4'.$row->idsiswa,true),
                'nilai_uh5'=>$this->input->post('uh5'.$row->idsiswa,true),
                'nilai_uh6'=>$this->input->post('uh6'.$row->idsiswa,true),
                'nilai_uh7'=>$this->input->post('uh7'.$row->idsiswa,true),
                'rata_uh'=>$this->input->post('rata_uh'.$row->idsiswa,true),
                'nilai_pts'=>$this->input->post('pts'.$row->idsiswa,true),
                'nilai_uas'=>$this->input->post('uas'.$row->idsiswa,true),
                'nilai_akhir'=>$this->input->post('akhir'.$row->idsiswa,true),
                'nilai_huruf'=>$this->input->post('grade'.$row->idsiswa,true),
                'deskripsi'=>$this->input->post('deskripsi'.$row->idsiswa,true)
            ];
            $this->nilai_m->saveNilai($data,$idnilai);
        }
        $this->toastr->success('Nilai berhasil di simpan');
        redirect('nilai');
    }

}

/* End of file Nilai.php */