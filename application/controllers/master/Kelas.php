<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('kelas_m');
        $this->pk = kelas_m::$pk;
        $this->table = kelas_m::$table;
    }
    
    public function index()
    {
        $data['master'] = $data['kelas'] = true;
        $data['kelas'] = $this->kelas_m->getData();
        $data['content'] = 'master/kelas';
        $this->load->view('index',$data);
    }
    /**
    * Save | Update
    * @return Object
    */
    public function save() {
        $id = _toInteger($this->input->post('idkelas', true));
        $dataset = $this->dataset();
        if (_isNaturalNumber( $id )) {
            $this->vars['status'] = $this->db->update($this->table, $dataset,[$this->pk=>$id]) ? 'success' : 'error';
            $this->vars['status'] == 'success' ? $this->toastr->success('Perubahan berhasil') : $this->toastr->error('Perubahan gagal');
        } else {
            $cek = $this->db->get_where($this->table,['kelas_kd'=>$dataset['kelas_kd']]);
            if($cek->num_rows()==0){
                $this->vars['status'] = $this->db->insert($this->table, $dataset) ? 'success' : 'error';
                $this->vars['status'] == 'success' ? $this->toastr->success('Tambah baru berhasil') : $this->toastr->error('Tambah baru gagal');
            }else{
                $this->toastr->error('Kode kelas sudah ada');
            }
        }
        redirect('master/kelas');
    }
    /**
    * Dataset
    * @return Array
    */
    private function dataset() {
        return [
            'kelas_kd' => $this->input->post('kelas_kd', true),
            'kelas_nama' => $this->input->post('kelas_nama', true)
        ];
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
    * Delete By Id
    * @return Array
    */
    public function delete($id)
    {
        $delete = $this->db->delete($this->table,[$this->pk=>$id])?'success':'error';
        $delete == 'success' ? $this->toastr->success('Hapus data berhasil') : $this->toastr->error('Hapus data gagal');
        redirect('master/kelas');
    }
}

/* End of file Kelas.php */