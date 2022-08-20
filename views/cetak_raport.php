<?php
error_reporting(0);
?>
<html>

<head>
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="<?=base_url('assets/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <script src="<?=base_url('assets/');?>bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <title>Cetak Raport</title>
</head>

<body>

    <div style="page-break-after:always;">
        <br />
        <img src="<?=base_url('uploads/')._school_profile()->logo;?>" alt="Logo Sekolah"
            style="width:70px;height:70px;float:left;margin-bottom:10px;">
        <h3 style="line-height:5px;text-align:right;"><?=_school_profile()->nama;?></h3>
        <h3 style="line-height:5px;text-align:right;">Akreditasi <?=_school_profile()->akreditasi;?></h3>
        <hr style="border:1px solid;margin-right:0px;width:800px;">
        <hr style="border:0.5px solid;margin-top:-15px;margin-right:0px;width:750px;">
        <p style="line-height:5px;text-align:right;margin-top:-10px;">Alamat : <?=_school_profile()->alamat;?> RT
            <?=_school_profile()->rt;?> / RW
            <?=_school_profile()->rw;?>
            <?=_school_profile()->dusun;?>, Kel. <?=_school_profile()->kelurahan;?>, <?=_school_profile()->kecamatan;?>,
            <?=_school_profile()->kabupaten;?> - <?=_school_profile()->provinsi;?></p>
        <br>
        <h4 class="text-center">DATA HASIL BELAJAR SISWA</h4>
        <h4 class="text-center">RAPORT SISWA</h4>
        <br>
        <table style="padding:15px;">
            <tr>
                <td width="150"><b>NIS</b></td>
                <td width="20">:</td>
                <td width="350"><?=$raport_data['nis'];?></td>
                <td width="125"><b>Tahun Ajaran</b></td>
                <td width="20">:</td>
                <td><?=$raport_data['tahun_akademik'];?></td>
            </tr>
            <tr>
                <td width="150"><b>Nama Siswa</b></td>
                <td width="20">:</td>
                <td width="350"><?=$raport_data['nama'];?></td>
                <td width="125"><b>Semester</b></td>
                <td width="20">:</td>
                <td><?=$raport_data['semester'];?></td>
            </tr>
            <tr>
                <td width="150"><b>Kelas</b></td>
                <td width="20">:</td>
                <td width="350"><?=$raport_data['kelas_kd'].' - '.$raport_data['kelas_nama'];?></td>
                <!-- <td width="125"><b>Tanggal Cetak</b></td>
                <td width="20">:</td>
                <td><?=$raport_data['tanggal'];?></td> -->
            </tr>
        </table>
        <br>
        <table class="table table-bordered table-striped" style="font-size:12pt;">
            <thead>
                <tr>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">MATA PELAJARAN
                    </th>
                    <th colspan="4" style="text-align:center;padding:0px;">NILAI</th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">NILAI AKHIR
                    </th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">PREDIKAT</th>
                    <th rowspan="2" style="text-align:center;line-height:30px;padding:0px 0px 15px 0px;">KETERANGAN</th>
                </tr>
                <tr>
                    <th style="text-align:center;line-height:30px;padding:0px;">RTP</th>
                    <th style="text-align:center;line-height:30px;padding:0px;">RNU</th>
                    <th style="text-align:center;line-height:30px;padding:0px;">PTS</th>
                    <th style="text-align:center;line-height:30px;padding:0px;">UAS</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($raport_nilai as $row) :?>
                <tr>
                    <td><?=$row['mapel_nama'];?></td>
                    <td class="text-center"><?=$row['rata_tp'];?></td>
                    <td class="text-center"><?=$row['rata_uh'];?></td>
                    <td class="text-center"><?=$row['nilai_pts'];?></td>
                    <td class="text-center"><?=$row['nilai_uas'];?></td>
                    <td class="text-center"><?=$row['nilai_akhir'];?></td>
                    <td class="text-center"><?=$row['nilai_huruf'];?></td>
                    <td><?=$row['deskripsi'];?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <p>
            Keterangan :
            <br>
            <b>RTP</b> : Rata-rata nilai Tugas/PR
            <br>
            <b>RNU</b> : Rata-rata nilau Ulangan Harian
            <br>
            <b>PTS</b> : Penilaian Tengah Semester
            <br>
            <b>UAS</b> : Ujian Akhir Semester
        </p>
        <p style="text-align:right;margin-right:125px;"><?=$raport_data['tempat'];?>,
            <?=date('d M Y',strtotime($raport_data['tanggal']));?></p>
        <table>
            <tr>
                <td class="text-center" width="500">
                    Kepala Sekolah
                    <br>
                    <?=_school_profile()->nama;?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <u><?=_school_profile()->nama_kepsek;?></u>
                    <br>
                    NIP. <?=_school_profile()->nip_kepsek;?>
                </td>
                <td class="text-center" width="500">
                    Wali Kelas
                    <br>
                    <br>
                    <br>
                    <br>
                    <u><?=$raport_wali['nama'];?></u>
                    <br>
                    NIP. <?=$raport_wali['nip'];?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>

<script>
window.print();
</script>