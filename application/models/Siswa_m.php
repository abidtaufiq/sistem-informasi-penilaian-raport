<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa_m extends CI_Model {

    public static $pk = 'idsiswa';

    public static $table = 'siswa';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function getData()
    {
        return $this->db->get(self::$table)->result();
    }
    public function getById($id)
    {
        return $this->db->get_where(self::$table,[self::$pk=>$id])->row();
    }
    public function isValExist($nis)
    {
        return $this->db->get_where(self::$table,['nis'=>$nis])->row();
    }
    public function account($row)
    {
        $cek = $this->db->get_where('users',['user_name'=>$row->nis])->num_rows();
        if($cek==0){
            $data = [
                'user_name' => htmlspecialchars($row->nis),
                'user_password' => password_hash(htmlspecialchars($row->nis), PASSWORD_DEFAULT),
                'user_fullname' => htmlspecialchars($row->nama),
                'user_type' => 'siswa',
                'is_block' => 0,
                'create_at' => time(),
                'create_by' => __session('id')
            ];
            $this->db->insert('users', $data);
        }
    }

}

/* End of file Siswa_m.php */