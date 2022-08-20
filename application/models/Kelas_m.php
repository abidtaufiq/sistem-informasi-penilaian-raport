<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Kelas_m extends CI_Model {

    public static $pk = 'idkelas';

    public static $table = 'kelas';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function getData()
    {
        return $this->db->get(self::$table)->result();
    }

}

/* End of file Kelas_m.php */