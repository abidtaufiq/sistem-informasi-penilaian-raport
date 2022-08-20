<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Configuration_m extends CI_Model {

    public static $pk = 'idtahun_akademik';

    public static $table = 'tahun_akademik';

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function getData()
    {
        return $this->db
        ->order_by('idtahun_akademik','desc')
        ->get_where(self::$table)->result();
    }
    public function getDataById($id)
    {
        return $this->db->get_where(self::$table,[$this->pk=>$id])->row();
    }
    public function addNew($data)
    {
        $this->db->insert(self::$table,$data);
    }
    public function update($id, $table, $data)
    {
        $this->db->where('idtahun_akademik', $id);
        $this->db->update($table,$data);
    }
    /**
    * Deactivate Academic Years
    * @param Integer
    * @return Boolean
    */
    public function deactivate_academic_years($id = 0, $field = 'semester_aktif') {
        if ($id > 0) $this->db->where(self::$pk . ' !=', $id);
        return $this->db->update(self::$table, [$field => 0]);
    }
}

/* End of file Configuration_m.php */