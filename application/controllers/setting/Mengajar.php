<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mengajar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('mengajar_m');
        $this->pk = mengajar_m::$pk;
        $this->table = mengajar_m::$table;
    }
    
    public function index()
    {
        $data['setting'] = $data['mengajar'] = true;
        $data['mengajar'] = $this->mengajar_m->getDataGroup(_active_years()->idtahun_akademik,_active_years()->semester);
        $data['content'] = 'setting/mengajar';
        $this->load->view('index',$data);
    }
    /**
    * Save | Update
    * @return Object
    */
    public function save() {
        $data = [
            'idtahun_akademik' => _active_years()->idtahun_akademik,
            'semester' => _active_years()->semester,
            // 'idguru' => $this->input->post('idguru', true),
            'idkelas' => $this->input->post('idkelas', true),
            'idmapel' => $this->input->post('idmapel', true)
        ];
        $cek = $this->mengajar_m->check($data)->num_rows();
        if($cek==0){
            $data['idguru'] = $this->input->post('idguru', true);
            $this->vars['status'] = $this->db->insert($this->table, $data) ? 'success' : 'error';
            $this->vars['status'] == 'success' ? $this->toastr->success('Tambah baru berhasil') : $this->toastr->error('Tambah baru gagal');
        }else{
            $this->toastr->error('Terdapat data yang sama');
        }
        redirect('setting/mengajar');
    }
    /**
    * View By Id
    * @return Array
    */
    public function view()
    {
        $id = $this->input->post('id', true);
        $data = $this->db->get_where($this->table,[$this->pk=>$id])->row();
        echo json_encode($data);
    }
    /**
    * Copy Data
    * @return Array
    */
    public function copy()
    {
        $idtahun_akademik = $this->input->post('idtahun_akademik', true);
        $semester = $this->input->post('semester', true);
        $data = $this->mengajar_m->getData($idtahun_akademik,$semester);
        for ($i=0; $i < count($data); $i++) { 
            $this->mengajar_m->copyData($data[$i]);
        }
        $this->toastr->success('Copy data berhasil');
        redirect('setting/mengajar');
    }
    /**
    * Delete By Id
    * @return Array
    */
    public function delete($id)
    {
        $delete = $this->db->delete($this->table,[$this->pk=>$id])?'success':'error';
        $delete == 'success' ? $this->toastr->success('Hapus data berhasil') : $this->toastr->error('Hapus data gagal');
        redirect('setting/mengajar');
    }
}

/* End of file Mengajar.php */