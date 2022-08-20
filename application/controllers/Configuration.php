<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('configuration_m');
        $this->pk = configuration_m::$pk;
        $this->table = configuration_m::$table;
        
    }
    
    public function academic_year()
    {
        $data['configuration'] = $data['academic_year'] = true;
        $data['academic_year'] = $this->configuration_m->getData();
        $data['content'] = 'config/academic_year';
        $this->load->view('index',$data);
    }
    public function date_print()
    {
        $data['configuration'] = $data['date_print'] = true;
        $data['date_print'] = $this->configuration_m->getDataById(_active_years()->idtahun_akademik);
        $data['content'] = 'config/date_print';
        $this->load->view('index',$data);
    }
    public function setTanggal()
    {
        $data = [
            'tempat'=>$this->input->post('tempat', true),
            'tanggal'=>$this->input->post('tanggal', true)
        ];
        $update = $this->db->update($this->table, $data,[$this->pk=>$this->input->post('idtahun_akademik', true)])?'success':'error';
        $update == 'success' ? $this->toastr->success('Perubahan berhasil') : $this->toastr->error('Perubahan gagal');
        redirect('configuration/date_print');
    }
    /**
    * Save | Update
    * @return Object
    */
    public function save() {
        $id = _toInteger($this->input->post('idtahun_akademik', true));
        if ($this->validation()) {
            $dataset = $this->dataset();
            if (_isNaturalNumber( $id )) {
                $this->vars['status'] = $this->db->update($this->table, $dataset,[$this->pk=>$id]) ? 'success' : 'error';
                $this->vars['status'] == 'success' ? $this->toastr->success('Perubahan berhasil') : $this->toastr->error('Perubahan gagal');
                if ($this->vars['status'] == 'success' && filter_var((string) $dataset['semester_aktif'], FILTER_VALIDATE_BOOLEAN)) {
                    $this->configuration_m->deactivate_academic_years($id, 'semester_aktif');
                }
            } else {
                $cek = $this->db->get_where($this->table,['tahun_akademik'=>$dataset['tahun_akademik']]);
                if($cek->num_rows()==0){
                    if (filter_var((string) $dataset['semester_aktif'], FILTER_VALIDATE_BOOLEAN)) {
                        $this->configuration_m->deactivate_academic_years(0, 'semester_aktif');
                    }
                    $dataset['tanggal'] = date('Y-m-d');
                    $this->vars['status'] = $this->db->insert($this->table, $dataset) ? 'success' : 'error';
                    $this->vars['status'] == 'success' ? $this->toastr->success('Tambah baru berhasil') : $this->toastr->error('Tambah baru gagal');
                }else{
                    $this->toastr->error('Tahun pelajaran sudah ada');
                }
            }
        } else {
            $this->toastr->error('Terjadi kesalahan input');
            
        }
        redirect('configuration/academic_year');
    }
    /**
    * Dataset
    * @return Array
    */
    private function dataset() {
        return [
            'tahun_akademik' => $this->input->post('tahun_akademik', true),
            'semester' => $this->input->post('semester', true),
            'semester_aktif' => $this->input->post('semester_aktif', true)
        ];
    }
    /**
    * Validation Form
    * @return Boolean
    */
    private function validation() {
        $this->load->library('form_validation');
        $val = $this->form_validation;
        $val->set_rules('tahun_akademik', 'Tahun Akademik', 'trim|required|min_length[9]|max_length[9]|callback_format_check');
        $val->set_rules('semester', 'Semester', 'trim|required');
        $val->set_rules('semester_aktif', 'Semester Aktif', 'trim|required|in_list[1,0]');
        // $val->set_error_delimiters('<div>&sdot; ', '</div>');
        return $val->run();
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
    * Format Check
    * @param String $str
    * @return Boolean
    */
    public function format_check($str) {
        $year = explode('-', substr($str, 0, 9));
        if (FALSE === strpos($str, '-')) {
            $this->form_validation->set_message('format_check', 'Tahun awal dan tahun akhir harus dipisah dengan tanda strip (-)');
            return FALSE;
        } else if (strlen($str) !== 9) {
            $this->form_validation->set_message('format_check', 'Format tahun pelajaran harus 9 digit. Contoh : 2017-2018');
            return FALSE;
        } else if ((int) $year[ 0 ] === 0 || (int) $year[ 1 ] === 0) {
            $this->form_validation->set_message('format_check', 'Format tahun pelajaran harus diisi angka. Contoh : 2017-2018');
            return FALSE;
        } else if (($year[1] - $year[0]) != 1) {
            $this->form_validation->set_message('format_check', 'Tahun awal dan tahun akhir harus selisih satu !');
            return FALSE;
        } else if (strlen($year[0]) != 4 && strlen($ta[1] != 4)) {
            $this->form_validation->set_message('format_check', 'Tahun harus 4 karakter !');
            return FALSE;
        }
        return TRUE;
    }
}

/* End of file Configuration.php */