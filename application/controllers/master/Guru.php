<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('guru_m');
        $this->pk = guru_m::$pk;
        $this->table = guru_m::$table;
    }
    
    public function index()
    {
        $data['master'] = $data['guru'] = true;
        $data['guru'] = $this->guru_m->getData();
        $data['content'] = 'master/guru';
        $this->load->view('index',$data);
    }
    public function import()
    {
        $rows = explode("\n",$this->input->post('guru'));
        $success = 0;
        $failed = 0;
        $exist = 0;
        foreach ($rows as $row) {
            $exp = explode("\t", $row);
            if (count($exp) != 6) continue;
            $fill_data = [];
            $fill_data['nip'] = trim($exp[0]);
            $fill_data['nama'] = trim($exp[1]);
            $fill_data['tmp_lhr'] = trim($exp[2]);
            $fill_data['tgl_lhr'] = trim($exp[3]);
            $fill_data['jk'] = trim($exp[4]);
            $fill_data['alamat'] = trim($exp[5]);
            $cek = $this->guru_m->isValExist(trim($exp[0]));
            if(!$cek){
                $this->db->insert($this->table,$fill_data)?$success++:$failed++;
            }else{
                $exist++;
            }
        }
        $this->toastr->info($success.' Success. '.$failed.' Failed. '.$exist.' Exist. ');
        redirect('master/guru');
    }
    /**
    * Save | Update
    * @return Object
    */
    public function save() {
        $id = _toInteger($this->input->post('idguru', true));
        $dataset = $this->dataset();
        if (_isNaturalNumber( $id )) {
            $this->vars['status'] = $this->db->update($this->table, $dataset,[$this->pk=>$id]) ? 'success' : 'error';
            $this->vars['status'] == 'success' ? $this->toastr->success('Perubahan berhasil') : $this->toastr->error('Perubahan gagal');
        } else {
            $cek = $this->db->get_where($this->table,['nip'=>$dataset['nip']]);
            if($cek->num_rows()==0){
                $this->vars['status'] = $this->db->insert($this->table, $dataset) ? 'success' : 'error';
                $this->vars['status'] == 'success' ? $this->toastr->success('Tambah baru berhasil') : $this->toastr->error('Tambah baru gagal');
            }else{
                $this->toastr->error('NIP telah digunakan');
            }
        }
        redirect('master/guru');
    }
    /**
    * Dataset
    * @return Array
    */
    private function dataset() {
        return [
            'nip' => $this->input->post('nip', true),
            'nama' => $this->input->post('nama', true),
            'tmp_lhr' => $this->input->post('tmp_lhr', true),
            'tgl_lhr' => $this->input->post('tgl_lhr', true),
            'jk' => $this->input->post('jk', true),
            'alamat' => $this->input->post('alamat', true)
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
    * Aktifkan akun
    * @return Array
    */
    public function key($key)
    {
        $data = $this->guru_m->getById($key);
        $this->guru_m->account($data);
        $this->toastr->success('Akun telah diaktifkan');
        redirect('master/guru');
    }
    /**
    * Aktifkan semua akun
    * @return Array
    */
    public function keyAll()
    {
        $data = $this->guru_m->getData();
        for ($i=0; $i < count($data); $i++) { 
            $this->guru_m->account($data[$i]);
        }
        $this->toastr->success('Semua akun telah diaktifkan');
        redirect('master/guru');
    }
    /**
    * Delete By Id
    * @return Array
    */
    public function delete($id)
    {
        $delete = $this->db->delete($this->table,[$this->pk=>$id])?'success':'error';
        $delete == 'success' ? $this->toastr->success('Hapus data berhasil') : $this->toastr->error('Hapus data gagal');
        redirect('master/guru');
    }

}

/* End of file Guru.php */