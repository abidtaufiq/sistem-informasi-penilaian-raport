<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_m extends CI_Model {
    
    public static $pk = 'idguru';

    public static $table = 'guru';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function getData()
    {
        return $this->db->get(self::$table)->result();
    }
    public function getById($key)
    {
        return $this->db->get_where(self::$table,[self::$pk=>$key])->row();
    }
    public function isValExist($nip)
    {
        return $this->db->get_where(self::$table,['nip'=>$nip])->row();
    }
    public function account($row)
	{
        $cek = $this->db->get_where('users',['user_name'=>$row->nip])->num_rows();
        if($cek==0){
            $data = [
                'user_name' => htmlspecialchars($row->nip),
                'user_password' => password_hash(htmlspecialchars($row->nip), PASSWORD_DEFAULT),
                'user_fullname' => htmlspecialchars($row->nama),
                'user_type' => 'guru',
                'is_block' => 0,
                'create_at' => time(),
                'create_by' => __session('id')
            ];
            $this->db->insert('users', $data);
        }
	}
}

/* End of file Guru_m.php */