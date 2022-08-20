<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mapel_m extends CI_Model {

    public static $pk = 'idmapel';

    public static $table = 'mapel';

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

/* End of file Mapel_m.php */