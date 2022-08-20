<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Mengajar_m extends CI_Model {

    public static $pk = 'idmengajar';

    public static $table = 'mengajar';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    
    public function check($data)
    {
        return $this->db->get_where(self::$table,$data);
    }
    public function getData($tahun_akademik,$semester)
    {
        return $this->db->select('x.idmengajar,x.idtahun_akademik,x.semester,x.idguru,x1.nama,x.idmapel,x.idkelas,x2.kelas_kd,x2.kelas_nama,x3.mapel_kd,x3.mapel_nama')
        ->join('guru x1', 'x1.idguru = x.idguru', 'left')
        ->join('kelas x2', 'x2.idkelas = x.idkelas', 'left')
        ->join('mapel x3', 'x3.idmapel = x.idmapel', 'left')
        ->where(['x.idtahun_akademik'=>$tahun_akademik,'x.semester'=>$semester])
        ->get(self::$table.' x')->result();
        
    }
    public function getDataByMapel($tahun_akademik,$semester,$kelas_kd,$mapel_kd)
    {
        $mapel = $this->db->select('idmapel,idkelas')
        ->where('kelas_kd',$kelas_kd)
        ->where('mapel_kd',$mapel_kd)
        ->get('mapel,kelas')->row();
        $idkelas = $mapel->idkelas;
        $idmapel = $mapel->idmapel;
        return $this->db->select('x.idmengajar,x1.nama,x.idmapel,x.idkelas,x2.kelas_kd,x2.kelas_nama,x3.mapel_kd,x3.mapel_nama,x.kkm')
        ->join('guru x1', 'x1.idguru = x.idguru', 'left')
        ->join('kelas x2', 'x2.idkelas = x.idkelas', 'left')
        ->join('mapel x3', 'x3.idmapel = x.idmapel', 'left')
        ->where(['x.idtahun_akademik'=>$tahun_akademik,'x.semester'=>$semester,'x.idkelas'=>$idkelas,'x.idmapel'=>$idmapel])
        ->get(self::$table.' x')->row();
        
    }
    // public function getDataByKelas($tahun_akademik,$semester,$mapel_kd)
    // {
    //     $mapel = $this->db->select('idmapel')
    //     ->where('mapel_kd',$mapel_kd)
    //     ->get('mapel')->row();
    //     $idmapel = $mapel->idmapel;
    //     return $this->db->select('x1.nama,x.idmapel,x.idkelas,x2.kelas_kd,x2.kelas_nama,x3.mapel_kd,x3.mapel_nama,x.kkm')
    //     ->join('guru x1', 'x1.idguru = x.idguru', 'left')
    //     ->join('kelas x2', 'x2.idkelas = x.idkelas', 'left')
    //     ->join('mapel x3', 'x3.idmapel = x.idmapel', 'left')
    //     ->where(['x.idtahun_akademik'=>$tahun_akademik,'x.semester'=>$semester,'x.idmapel'=>$idmapel])
    //     ->get(self::$table.' x')->row();
        
    // }
    public function getDataGroup($tahun_akademik,$semester)
    {
        return $this->db->select('x.idmengajar,x.idtahun_akademik,x.semester,x.idguru,x1.nama')
        ->join('guru x1', 'x1.idguru = x.idguru', 'left')
        ->join('kelas x2', 'x2.idkelas = x.idkelas', 'left')
        ->join('mapel x3', 'x3.idmapel = x.idmapel', 'left')
        ->where(['x.idtahun_akademik'=>$tahun_akademik,'x.semester'=>$semester])
        ->group_by('x.idguru')
        ->order_by('idmengajar', 'desc')
        ->get(self::$table.' x')->result();
        
    }
    public function getById($id)
    {
        return $this->db->get_where(self::$table,[self::$pk=>$id])->row();
    }
    public function copyData($row)
    {
        $data = [
            'idtahun_akademik' => _active_years()->idtahun_akademik,
            'semester' => _active_years()->semester,
            'idguru' => $row->idguru,
            'idmapel' => $row->idmapel,
            'idkelas' => $row->idkelas
        ];
        $this->db->insert(self::$table, $data);
    }

}

/* End of file Mengajar_m.php */