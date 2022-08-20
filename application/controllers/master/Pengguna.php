<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('user_m');
        $this->pk = user_m::$pk;
        $this->table = user_m::$table;
    }
    
    public function index()
    {
        $data['master'] = $data['pengguna'] = true;
        $data['pengguna'] = $this->user_m->getData();
        $data['content'] = 'master/pengguna';
        $this->load->view('index',$data);
    }
    /**
    * Save | Update
    * @return Object
    */
    public function save() {
        $id = _toInteger($this->input->post('idusers', true));
        $dataset = $this->dataset();
        if (_isNaturalNumber( $id )) {
            $dataset['update_at'] = time();
            $dataset['update_by'] = __session('id');
            $this->vars['status'] = $this->db->update($this->table, $dataset,[$this->pk=>$id]) ? 'success' : 'error';
            $this->vars['status'] == 'success' ? $this->toastr->success('Perubahan berhasil') : $this->toastr->error('Perubahan gagal');
        } else {
            $cek = $this->db->get_where($this->table,['user_name'=>$dataset['user_name']]);
            if($cek->num_rows()==0){
                $dataset['user_password'] = password_hash(htmlspecialchars($dataset['user_name']), PASSWORD_DEFAULT);
                $dataset['is_block'] = 0;
                $dataset['create_at'] = time();
                $dataset['create_by'] = __session('id');
                $this->vars['status'] = $this->db->insert($this->table, $dataset) ? 'success' : 'error';
                $this->vars['status'] == 'success' ? $this->toastr->success('Tambah baru berhasil') : $this->toastr->error('Tambah baru gagal');
            }else{
                $this->toastr->error('Kode pengguna sudah ada');
            }
        }
        redirect('master/pengguna');
    }
    /**
    * Dataset
    * @return Array
    */
    private function dataset() {
        return [
            'user_name' => $this->input->post('user_name', true),
            'user_fullname' => $this->input->post('user_fullname', true),
            'user_type' => $this->input->post('user_type', true)
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
    * Change Password By Id
    * @return Array
    */
    public function change_password()
    {
        $id = $this->input->post('id',true);
        $url = $this->input->post('url',true);
        $data = [
            'user_password'=>password_hash(htmlspecialchars($this->input->post('user_password', true)), PASSWORD_DEFAULT),
            'update_at' => time(),
            'update_by' => __session('id')
        ];
        $change = $this->db->update('users',$data,['idusers'=>$id])?'success':'error';
        $change == 'success' ? $this->toastr->success('Password telah berubah') : $this->toastr->error('Password gagal dirubah');
        redirect($url);
    }
    /**
    * Delete By Id
    * @return Array
    */
    public function delete($id)
    {
        $delete = $this->db->delete($this->table,[$this->pk=>$id])?'success':'error';
        $delete == 'success' ? $this->toastr->success('Hapus data berhasil') : $this->toastr->error('Hapus data gagal');
        redirect('master/pengguna');
    }

}

/* End of file Pengguna.php */