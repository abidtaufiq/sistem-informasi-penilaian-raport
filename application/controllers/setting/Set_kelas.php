<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Set_kelas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('setkelas_m');
        $this->pk = setkelas_m::$pk;
        $this->table = setkelas_m::$table;
    }
    
    public function index()
    {
        $data['setting'] = $data['sett_kelas'] = true;
        $data['content'] = 'setting/set_kelas';
        $this->load->view('index',$data);
    }
    public function get_siswa_asal() {
        $tahun_id = $this->input->post('tahun_asal', true);
        $kelas_id = $this->input->post('kelas_asal', true);
        $data = $this->setkelas_m->getSiswa($tahun_id, $kelas_id);
        $this->table($data,'asal');
    }
    public function get_siswa_tujuan() {
        $tahun_id = $this->input->post('tahun_tujuan', true);
        $kelas_id = $this->input->post('kelas_tujuan', true);
        $data = $this->setkelas_m->getSiswa($tahun_id, $kelas_id);
        $this->table($data,'tujuan');
    }
    private function table($data,$id)
    {
        if(isset($data)){
            $str ='';
            $str .= '<thead>';
            $str .= '<tr>';
            $str .=
                '<th width="5"><input type="checkbox" onclick="check_all(this.checked, \''.$id.'\')" /></th>';
            $str .= '<th width="5">NO</th>';
            $str .= '<th>NIS</th>';
            $str .= '<th>NAMA LENGKAP</th>';
            $str .= '</tr>';
            $str .= '</thead>';
            $str .= '<tbody>';
            $n=1;
            foreach ($data as $row) {
                $str .= '<tr>';
                $str .= '<td><input type="checkbox" name="'.$id.'" value="'.$row->idsiswa.'"></td>';
                $str .= '<td>' .$n++.'.'. '</td>';
                $str .= '<td>' .$row->nis. '</td>';
                $str .= '<td>' .$row->nama. '</td>';
                $str .= '</tr>';
            }
            $str .= '</tbody>';
            echo json_encode($str);
        }
    }
    /**
    * Save to Destination Class
    */
    public function save_siswa_to_class() {
            $siswa_id = $this->input->post('siswa_id', true);
            $ids = [];
            foreach (explode(',', $siswa_id) as $student_id) {
                array_push($ids, trim($student_id));
            }
            $tahun_tujuan_id = _toInteger($this->input->post('tahun_tujuan', true));
            $kelas_tujuan_id = _toInteger($this->input->post('kelas_tujuan', true));
            $query = $this->setkelas_m->save_to_destination_class($ids, $tahun_tujuan_id, $kelas_tujuan_id);
            $this->vars['status'] = $query ? 'success' : 'error';
            $this->vars['status'] == 'success' ? $this->toastr->success('Data sudah disipman') : $this->toastr->error('Data tidak tersimpan. Kemungkinan terjadi duplikasi data, pengaturan wali kelas belum diatur, atau server bermasalah, silahkan periksa kembali data Anda.');
            
    }
    
    /**
    * Delete By Id
    * @return Array
    */
    public function delete() {
            $siswa_id = $this->input->post('siswa_id', true);
            $ids = [];
            foreach (explode(',', $siswa_id) as $student_id) {
                array_push($ids, trim($student_id));
            }
            $tahun_tujuan = _toInteger($this->input->post('tahun_tujuan', true));
            $kelas_tujuan = _toInteger($this->input->post('kelas_tujuan', true));
            $query = $this->setkelas_m->delete_permanently($ids, $tahun_tujuan, $kelas_tujuan);
            $this->vars['status'] = $query ? 'success' : 'error';
            $this->vars['status'] == 'success' ? $this->toastr->success('Hapus data berhasil') : $this->toastr->error('Hapus data gagal');
        }

}

/* End of file Set_kelas.php */