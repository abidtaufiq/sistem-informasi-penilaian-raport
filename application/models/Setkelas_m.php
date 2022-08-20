<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Setkelas_m extends CI_Model {

    public static $pk = 'idrombel';

    public static $table = 'rombel';

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }
    public function getSiswaAktif($tahun_akademik,$semester)
    {
        return $this->db->select('x3.kelas_kd,x2.nis,x2.nisn,x2.nama,x2.jk,x2.tmp_lhr,x2.tgl_lhr,x2.alamat')
        ->join('wali_kelas x1', 'x1.idwali_kelas = x.idwali_kelas', 'left')
        ->join('siswa x2', 'x2.idsiswa = x.idsiswa', 'left')
        ->join('kelas x3', 'x3.idkelas = x1.idkelas', 'left')
        ->where(['x1.idtahun_akademik'=>$tahun_akademik,'x1.semester'=>$semester,'x2.status'=>'Aktif'])
        ->get(self::$table.' x')->result();
    }
    public function getSiswa($tahun_id, $kelas_id) {
        // Get "Aktif" Student Status
        $siswa_status = 'Aktif';
        $siswa_id = $this->db
            ->select('idsiswa')
            ->from('rombel')
            ->group_by('idsiswa')
            ->get_compiled_select();
        if ($kelas_id == 'unset') {
            return $this->db
                ->select('idsiswa, nis, nama')
                ->where('idsiswa NOT IN(' . $siswa_id . ')')
                ->where('status', $siswa_status)
                ->get('siswa')->result();
        } else if ($kelas_id == 'all') {
            return $this->db
            ->select('idsiswa, nis, nama')
            ->where('idsiswa NOT IN(' . $siswa_id . ')')
            ->where('status', $siswa_status)
            ->get('siswa')->result();
        } else {
            $wali_kelas = $this->db
                ->select('idwali_kelas')
                ->where('idtahun_akademik', $tahun_id)
                ->where('idkelas', $kelas_id)
                ->get('wali_kelas');
            if ($wali_kelas->num_rows() === 1) {
                $res = $wali_kelas->row();
                $wali_kelas_id = $res->idwali_kelas;
                return $this->db
                    ->select('x1.idsiswa, x1.nis, x1.nama')
                    ->join('siswa x1', 'x.idsiswa = x1.idsiswa', 'LEFT')
                    ->where('x.idwali_kelas', $wali_kelas_id)
                    ->where('x1.status', $siswa_status)
                    ->get(self::$table.' x')->result();
            }
        }
        
    }
    public function save_to_destination_class($ids, $tahun_tujuan_id, $kelas_tujuan_id) {
        // Get Active student Status
        $siswa_status = 'Aktif';
        // Get Class Group Setting
        $walikelas_id = 0;
        $query = $this->db
            ->select('idwali_kelas')
            ->where('idtahun_akademik', $tahun_tujuan_id)
            ->where('idkelas', $kelas_tujuan_id)
            ->get('wali_kelas');
        if ($query->num_rows() === 1) {
            $res = $query->row();
            $walikelas_id = $res->idwali_kelas;
        }
        $success = 0;
        if ($walikelas_id > 0) {
            foreach ($ids as $id) {
                $dataset = [
                    'idsiswa' => $id,
                    'idwali_kelas' => $walikelas_id
                ];
                if ($this->db->insert(self::$table, $dataset)) {
                    $success++;
                }
            }
        }
        return $success > 0;
    }
    public function tes(){
        $siswa_id = $this->db
            ->select('idsiswa')
            ->from('rombel')
            ->group_by('idsiswa')
            ->get_compiled_select();
        return $this->db
            ->select('idsiswa, nis, nama')
            ->where('idsiswa NOT IN(' . $siswa_id . ')')
            ->where('status', 'Aktif')
            ->get('siswa')->result();
    }
    public function delete_permanently($ids, $tahun_tujuan, $kelas_tujuan) {
        $walikelas_id = 0;
        $query = $this->db
            ->select('idwali_kelas')
            ->where('idtahun_akademik', $tahun_tujuan)
            ->where('idkelas', $kelas_tujuan)
            ->get('wali_kelas');
        if ($query->num_rows() === 1) {
            $res = $query->row();
            $walikelas_id = $res->idwali_kelas;
        }
        return $this->db
            ->where('idwali_kelas', $walikelas_id)
            ->where_in('idsiswa', $ids)
            ->delete(self::$table);
    }

}

/* End of file Setkelas_m.php */