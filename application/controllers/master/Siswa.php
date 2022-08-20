<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('siswa_m');
        $this->pk = siswa_m::$pk;
        $this->table = siswa_m::$table;
    }
    
    public function index()
    {
        $data['master'] = $data['siswa'] = true;
        $data['siswa'] = $this->siswa_m->getData();
        $data['content'] = 'master/siswa';
        $this->load->view('index',$data);
    }
    public function import()
    {
        $rows = explode("\n",$this->input->post('siswa'));
        $success = 0;
        $failed = 0;
        $exist = 0;
        foreach ($rows as $row) {
            $exp = explode("\t", $row);
            if (count($exp) != 7) continue;
            $fill_data = [];
            $fill_data['nis'] = trim($exp[0]);
            $fill_data['nisn'] = trim($exp[1]);
            $fill_data['nama'] = trim($exp[2]);
            $fill_data['tmp_lhr'] = trim($exp[3]);
            $fill_data['tgl_lhr'] = trim($exp[4]);
            $fill_data['jk'] = trim($exp[5]);
            $fill_data['alamat'] = trim($exp[6]);
            $cek = $this->siswa_m->isValExist(trim($exp[0]));
            if(!$cek){
                $this->db->insert($this->table,$fill_data)?$success++:$failed++;
            }else{
                $exist++;
            }
        }
        $this->toastr->info($success.' Success. '.$failed.' Failed. '.$exist.' Exist. ');
        redirect('master/siswa');
    }
    public function change_img()
    {
        $id = $this->input->post('idsiswa', true);
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpg|jpeg|png|bmp';
        $config['max_size']             = 2024000;
        $config['overwrite']             = TRUE;
        $config['file_name']             = 'siswa-'.$id;
        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('foto')){
            // $this->upload->display_errors();die;
            $this->toastr->error($this->upload->display_errors());
        }else{
            $gbr = $this->upload->data();
            $data = [
                "foto" => $gbr['file_name']
            ];
            $this->db->update($this->table, $data,[$this->pk=>$id]);
            $this->toastr->success('Foto berhasil di upload');
            
        }
        redirect('master/siswa');
    }
    /**
    * Save | Update
    * @return Object
    */
    public function save() {
        $id = _toInteger($this->input->post('idsiswa', true));
        $dataset = $this->dataset();
        if (_isNaturalNumber( $id )) {
            $this->vars['status'] = $this->db->update($this->table, $dataset,[$this->pk=>$id]) ? 'success' : 'error';
            $this->vars['status'] == 'success' ? $this->toastr->success('Perubahan berhasil') : $this->toastr->error('Perubahan gagal');
        } else {
            $cek = $this->db->get_where($this->table,['nis'=>$dataset['nis']]);
            if($cek->num_rows()==0){
                $dataset['tgl_masuk'] = date('Y-m-d');
                $dataset['status'] = 'Aktif';
                $this->vars['status'] = $this->db->insert($this->table, $dataset) ? 'success' : 'error';
                $this->vars['status'] == 'success' ? $this->toastr->success('Tambah baru berhasil') : $this->toastr->error('Tambah baru gagal');
            }else{
                $this->toastr->error('NIS telah digunakan');
            }
        }
        redirect('master/siswa');
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
        $data = $this->siswa_m->getById($key);
        $this->siswa_m->account($data);
        $this->toastr->success('Akun telah diaktifkan');
        redirect('master/siswa');
    }
    /**
    * Aktifkan semua akun
    * @return Array
    */
    public function keyAll()
    {
        $data = $this->siswa_m->getData();
        for ($i=0; $i < count($data); $i++) { 
            $this->siswa_m->account($data[$i]);
        }
        $this->toastr->success('Semua akun telah diaktifkan');
        redirect('master/siswa');
    }
    /**
    * Update Status By Id
    * @return Array
    */
    public function status()
    {
        $data = [
            'status'=>$this->input->post('status', true)
        ];
        $status = $this->db->update($this->table,$data,[$this->pk=>$this->input->post('idsiswa', true)])?'success':'error';
        $status == 'success' ? $this->toastr->success('Status telah berubah') : $this->toastr->error('Status tidak berubah');
        redirect('master/siswa');
    }
    /**
    * Delete By Id
    * @return Array
    */
    public function delete($id)
    {
        $delete = $this->db->delete($this->table,[$this->pk=>$id])?'success':'error';
        $delete == 'success' ? $this->toastr->success('Hapus data berhasil') : $this->toastr->error('Hapus data gagal');
        redirect('master/siswa');
    }

}

/* End of file Siswa.php */