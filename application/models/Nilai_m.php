<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Nilai_m extends CI_Model {

    public static $pk = 'idnilai';

    public static $table = 'nilai';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function getData($idtahun_akademik,$semester)
    {
        return $this->db->select('*')
        ->where('idtahun_akademik',$idtahun_akademik)
        ->where('semester',$semester)
        ->get(self::$table)->result();
    }
    public function getDataWali($idtahun_akademik,$semester,$idkelas)
    {
        // $idguru = $this->db->select('idguru')
        // ->get('wali_kelas')
        return $this->db->select('x4.nip,x4.nama')
        ->join('tahun_akademik x1', 'x1.idtahun_akademik = x.idtahun_akademik', 'left')
        ->join('kelas x2', 'x2.idkelas = x.idkelas', 'left')
        ->join('guru x4', 'x4.idguru = x.idguru', 'left')
        ->where(['x.idtahun_akademik'=>$idtahun_akademik,'x.semester'=>$semester,'x.idkelas'=>$idkelas])
        ->get('wali_kelas x')->row_array();
    }
    public function getDataRaport($idtahun_akademik,$semester,$idkelas,$idsiswa)
    {
        return $this->db->select('x.semester,x4.nis,x4.nama,x2.kelas_kd,x2.kelas_nama,x1.tahun_akademik,x1.tempat,x1.tanggal')
        ->join('tahun_akademik x1', 'x1.idtahun_akademik = x.idtahun_akademik', 'left')
        ->join('kelas x2', 'x2.idkelas = x.idkelas', 'left')
        ->join('siswa x4', 'x4.idsiswa = x.idsiswa', 'left')
        ->where(['x.idtahun_akademik'=>$idtahun_akademik,'x.semester'=>$semester,'x.idkelas'=>$idkelas,'x.idsiswa'=>$idsiswa])
        ->group_by('x.idsiswa')
        ->get(self::$table.' x')->row_array();
    }
    public function getDataNilai($idtahun_akademik,$semester,$idkelas,$idsiswa)
    {
        return $this->db->select('x.*,x1.mapel_nama')
        ->join('mapel x1', 'x1.idmapel = x.idmapel', 'left')
        ->where(['x.idtahun_akademik'=>$idtahun_akademik,'x.semester'=>$semester,'x.idkelas'=>$idkelas,'x.idsiswa'=>$idsiswa])
        ->get(self::$table.' x')->result_array();
    }
    public function saveSiswa($data)
    {
        $cek = $this->db->get_where(self::$table,$data)->num_rows();
        if($cek==0){
            $this->db->insert(self::$table, $data);
        }
    }
    public function saveNilai($data,$idnilai)
    {
        $this->db->where(self::$pk, $idnilai);
        $this->db->update(self::$table, $data);
    }
}

/* End of file Nilai_m.php */