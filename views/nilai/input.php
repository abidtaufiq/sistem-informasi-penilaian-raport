<script>
$(document).ready(function() {
    infoKKM();
    $('#modal-info').modal('show');
})

function saveKKM(x) {
    // alert(x);
    $.ajax({
        type: "POST",
        data: {
            id: x
        },
        url: '<?=base_url();?>nilai/save_kkm/' + x,
        dataType: 'json',
        success: function(data) {
            alert('KKM berhasil di simpan');
        }
    });
}

function ptsval(x) {
    $('[name="pts' + x + '"]').prop('readonly', true);
    $('[name="uas' + x + '"]').val("");
}

function nilai1(s, x) {
    var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
    $('[name="rata_' + s + '' + x + '"]').val(n1);
    $('[name="' + s + '2' + x + '"]').val("");
    dropreadonly(s + '2' + x);
    $('[name="' + s + '1' + x + '"]').prop('readonly', true);
}

function nilai2(s, x) {
    var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
    var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
    var hasil = (n1 + n2) / 2;

    $('[name="rata_' + s + '' + x + '"]').val(hasil);
    $('[name="' + s + '3' + x + '"]').val("");
    dropreadonly(s + '3' + x);
    $('[name="' + s + '2' + x + '"]').prop('readonly', true);
}

function nilai3(s, x) {
    var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
    var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
    var n3 = parseInt($('[name="' + s + '3' + x + '"]').val());
    var hasil = (n1 + n2 + n3) / 3;

    $('[name="rata_' + s + '' + x + '"]').val(hasil);
    $('[name="' + s + '4' + x + '"]').val("");
    dropreadonly(s + '4' + x);
    $('[name="' + s + '3' + x + '"]').prop('readonly', true);
}

function nilai4(s, x) {
    var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
    var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
    var n3 = parseInt($('[name="' + s + '3' + x + '"]').val());
    var n4 = parseInt($('[name="' + s + '4' + x + '"]').val());
    var hasil = (n1 + n2 + n3 + n4) / 4;

    $('[name="rata_' + s + '' + x + '"]').val(hasil);
    $('[name="' + s + '5' + x + '"]').val("");
    dropreadonly(s + '5' + x);
    $('[name="' + s + '4' + x + '"]').prop('readonly', true);
}

function nilai5(s, x) {
    var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
    var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
    var n3 = parseInt($('[name="' + s + '3' + x + '"]').val());
    var n4 = parseInt($('[name="' + s + '4' + x + '"]').val());
    var n5 = parseInt($('[name="' + s + '5' + x + '"]').val());
    var hasil = (n1 + n2 + n3 + n4 + n5) / 5;

    $('[name="rata_' + s + '' + x + '"]').val(hasil);
    $('[name="' + s + '6' + x + '"]').val("");
    dropreadonly(s + '6' + x);
    $('[name="' + s + '5' + x + '"]').prop('readonly', true);
}

function nilai6(s, x) {
    var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
    var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
    var n3 = parseInt($('[name="' + s + '3' + x + '"]').val());
    var n4 = parseInt($('[name="' + s + '4' + x + '"]').val());
    var n5 = parseInt($('[name="' + s + '5' + x + '"]').val());
    var n6 = parseInt($('[name="' + s + '6' + x + '"]').val());
    var hasil = (n1 + n2 + n3 + n4 + n5 + n6) / 6;

    $('[name="rata_' + s + '' + x + '"]').val(hasil);
    $('[name="' + s + '7' + x + '"]').val("");
    dropreadonly(s + '7' + x);
    $('[name="' + s + '6' + x + '"]').prop('readonly', true);
}

function nilai7(s, x) {
    var n1 = parseInt($('[name="' + s + '1' + x + '"]').val());
    var n2 = parseInt($('[name="' + s + '2' + x + '"]').val());
    var n3 = parseInt($('[name="' + s + '3' + x + '"]').val());
    var n4 = parseInt($('[name="' + s + '4' + x + '"]').val());
    var n5 = parseInt($('[name="' + s + '5' + x + '"]').val());
    var n6 = parseInt($('[name="' + s + '6' + x + '"]').val());
    var n7 = parseInt($('[name="' + s + '7' + x + '"]').val());
    var hasil = (n1 + n2 + n3 + n4 + n5 + n6 + n7) / 7;

    $('[name="rata_' + s + '' + x + '"]').val(hasil);
    $('[name="' + s + '7' + x + '"]').prop('readonly', true);
}

function nilaiAkhir(x) {
    var kkm = parseInt($('[name="kkm"]').val());
    var rtp = parseInt($('[name="rata_tp' + x + '"]').val());
    var rnu = parseInt($('[name="rata_uh' + x + '"]').val());
    var pts = parseInt($('[name="pts' + x + '"]').val());
    var uas = parseInt($('[name="uas' + x + '"]').val());
    var na = (rtp + rnu + pts + uas) / 4;

    $('[name="akhir' + x + '"]').val(na);
    var selisih_kkm = (100 - kkm) / 3;
    if (parseInt(na) < kkm) {
        $('[name="grade' + x + '"]').val("D");
        $('[name="deskripsi' + x + '"]').val("Kurang Baik");
    } else if (parseInt(na) >= kkm && parseInt(na) <= Math.round(kkm + selisih_kkm) - 1) {
        $('[name="grade' + x + '"]').val("C");
        $('[name="deskripsi' + x + '"]').val("Cukup Baik");
    } else if (parseInt(na) >= Math.round(kkm + selisih_kkm) && parseInt(na) <= Math.round(kkm + (selisih_kkm * 2)) -
        1) {
        $('[name="grade' + x + '"]').val("B");
        $('[name="deskripsi' + x + '"]').val("Baik");
    } else if (parseInt(na) >= Math.round(kkm + (selisih_kkm * 2)) && parseInt(na) <= (kkm + (selisih_kkm *
            3))) {
        $('[name="grade' + x + '"]').val("A");
        $('[name="deskripsi' + x + '"]').val("Sangat Baik");
    }
}

function infoKKM() {
    var kkm = parseInt($('[name="kkm"]').val());
    var selisih_kkm = (100 - kkm) / 3;
    var html = 'Predikat : [D = < ' + kkm + '] [C = ' + kkm + ' - ' + Math.round(kkm + (selisih_kkm - 1)) + '] [B = ' +
        Math.round(kkm + selisih_kkm) + ' - ' + Math.round(kkm + (selisih_kkm * 2) - 1) + '] [A = ' + Math.round(kkm + (
            selisih_kkm * 2)) + ' - ' + (kkm + (selisih_kkm * 3)) + ']';
    $('#infoKKM').html(html);
}

function dropreadonly(value) {
    $('[name="' + value + '"]').prop('readonly', false);
}

function minmax(value, min, max) {
    if (parseInt(value) < min)
        return min;
    else if (parseInt(value) > max)
        return max;
    else return value;
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Input Nilai
    </h1>
    <?php if(__session('access')=='super_user'):?>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="<?=base_url('nilai');?>">Nilai</a></li>
        <li class="active">Input Nilai</li>
    </ol>
    <?php endif;?>
</section>

<!-- Main content -->
<section class="content">
    <div class="info-box bg-green">
        <a href="#modal-info" data-toggle="modal" style="color:white;">
            <span class="info-box-icon"><i class="fa fa-edit"></i></span>
        </a>
        <div class="info-box-content">
            <span class="info-box-text"><?=$rowI->kelas_kd.' - '.$rowI->kelas_nama;?></span>
            <span class="info-box-number"><?=$rowI->mapel_nama;?></span>
            <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
            </div>
            <span class="progress-description">
                <?=$rowI->nama;?>
            </span>
        </div>
    </div>
    <div class="box box-primary">
        <div class="box-header with-border">
            <div class="pull-left" id="infoKKM">
            </div>
            <div class="pull-right">
                <form class="form-horizontal" action="<?=base_url('nilai/save_kkm/').$rowI->idmengajar;?>"
                    method="post">
                    <div class="form-group">
                        <label for="kkm" class="col-xs-2 control-label">KKM</label>
                        <div class="col-xs-4">
                            <input type="hidden" name="current_url"
                                value="<?=base_url('nilai/input/').$rowI->kelas_kd.'/'.$rowI->mapel_kd;?>">
                            <input type="hidden" name="idkelas" value="<?=$rowI->idkelas;?>">
                            <input type="hidden" name="idmapel" value="<?=$rowI->idmapel;?>">
                            <input type="number" class="form-control" id="kkm" name="kkm" value="<?=$rowI->kkm;?>"
                                max="100" placeholder="0" onkeyup="this.value = minmax(this.value,0,100)">
                        </div>
                        <button type="submit" class="btn btn-success btn-flat col-sm-2">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-body" style="overflow-x:scroll;">
            <form action="<?=base_url('nilai/save/').$rowI->kelas_kd;?>" method="post">
                <table class="table table-bordered table-hover" style="table-layout:fixed;">
                    <thead>
                        <tr>
                            <th rowspan="2" class="text-center" width="35" style="line-height:55px;">NO</th>
                            <th rowspan="2" class="text-center" width="85" style="line-height:55px;">NIS</th>
                            <th rowspan="2" class="text-center" width="300" style="line-height:55px;">NAMA LENGKAP</th>
                            <th colspan="7" class="text-center" width="550">NILAI TUGAS</th>
                            <th rowspan="2" class="text-center" width="95" style="line-height:55px;">RNT</th>
                            <th colspan="7" class="text-center" width="550">NILAI ULANGAN</th>
                            <th rowspan="2" class="text-center" width="95" style="line-height:55px;">RNU</th>
                            <th rowspan="2" class="text-center" width="95" style="line-height:55px;">PTS</th>
                            <th rowspan="2" class="text-center" width="95" style="line-height:55px;">UAS</th>
                            <th rowspan="2" class="text-center" width="95" style="line-height:55px;">NA</th>
                            <th rowspan="2" class="text-center" width="85" style="line-height:55px;">GRADE</th>
                            <th rowspan="2" class="text-center" width="250" style="line-height:55px;">DESKRIPSI</th>
                        </tr>
                        <tr>
                            <th class="text-center">1</th>
                            <th class="text-center">2</th>
                            <th class="text-center">3</th>
                            <th class="text-center">4</th>
                            <th class="text-center">5</th>
                            <th class="text-center">6</th>
                            <th class="text-center">7</th>
                            <th class="text-center">1</th>
                            <th class="text-center">2</th>
                            <th class="text-center">3</th>
                            <th class="text-center">4</th>
                            <th class="text-center">5</th>
                            <th class="text-center">6</th>
                            <th class="text-center">7</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $n=1;
                        foreach (siswa_by_kelas(_active_years()->idtahun_akademik,_active_years()->semester,$rowI->idkelas) as $row) :?>
                        <?php foreach (nilai_by_siswa(_active_years()->idtahun_akademik,_active_years()->semester,$rowI->idkelas,$rowI->idmapel,$row->idsiswa) as $nilai) :?>
                        <tr>
                            <td><?=$n++.'.';?></td>
                            <td><?=$row->nis;?></td>
                            <td><?=$row->nama;?></td>
                            <td width="100">
                                <input type="hidden" name="idnilai<?=$row->idsiswa;?>" value="<?=$nilai->idnilai;?>">
                                <input type="number" class="form-control" id="tp1" name="tp1<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_tp1;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai1('tp',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('tp1<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="tp2" name="tp2<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_tp2;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai2('tp',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('tp2<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="tp3" name="tp3<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_tp3;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai3('tp',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('tp3<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="tp4" name="tp4<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_tp4;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai4('tp',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('tp4<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="tp5" name="tp5<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_tp5;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai5('tp',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('tp5<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="tp6" name="tp6<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_tp6;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai6('tp',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('tp6<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="tp7" name="tp7<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_tp7;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai7('tp',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('tp7<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="rata_tp" name="rata_tp<?=$row->idsiswa;?>"
                                    min="0" max="100" placeholder="0" value="<?=$nilai->rata_tp;?>" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="uh1" name="uh1<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_uh1;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai1('uh',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('uh1<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="uh2" name="uh2<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_uh2;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai2('uh',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('uh2<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="uh3" name="uh3<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_uh3;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai3('uh',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('uh3<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="uh4" name="uh4<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_uh4;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai4('uh',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('uh4<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="uh5" name="uh5<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_uh5;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai5('uh',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('uh5<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="uh6" name="uh6<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_uh6;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai6('uh',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('uh6<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="uh7" name="uh7<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_uh7;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilai7('uh',<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('uh7<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="rata_uh" name="rata_uh<?=$row->idsiswa;?>"
                                    min="0" max="100" placeholder="0" value="<?=$nilai->rata_uh;?>" readonly>
                            </td>
                            <td>
                                <input type="number" class="form-control" id="pts" name="pts<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_pts;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="ptsval(<?=$row->idsiswa;?>)"
                                    onclick="dropreadonly('pts<?=$row->idsiswa;?>')">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="uas" name="uas<?=$row->idsiswa;?>" min="0"
                                    max="100" placeholder="0" value="<?=$nilai->nilai_uas;?>"
                                    onkeyup="this.value = minmax(this.value,0,100)"
                                    onchange="nilaiAkhir(<?=$row->idsiswa;?>)">
                            </td>
                            <td>
                                <input type="number" class="form-control" id="akhir" name="akhir<?=$row->idsiswa;?>"
                                    min="0" max="100" placeholder="0" value="<?=$nilai->nilai_akhir;?>" readonly>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="grade" name="grade<?=$row->idsiswa;?>"
                                    value="<?=$nilai->nilai_huruf;?>" readonly>
                            </td>
                            <td>
                                <input type="text" class="form-control" id="deskripsi"
                                    name="deskripsi<?=$row->idsiswa;?>" value="<?=$nilai->deskripsi;?>" readonly>
                            </td>
                        </tr>
                        <?php endforeach;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
                <?php if($rowI->kkm!=0 || $rowI->kkm!=null):?>
                <button type="submit" class="btn btn-success btn-sm btn-flat" style="float:right;"><i
                        class="fa fa-save"></i> SIMPAN NILAI</button>
                <?php endif;?>
            </form>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-info" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Panduan Input Nilai</h4>
            </div>
            <div class="modal-body">
                <ol>
                    <li>Sebelum anda melakukan input nilai pastikan anda telah menginput <strong>KKM</strong> agar
                        daftar siswa tampil.</li>
                    <li>Penginputan nilai dilakukan secara berurutan agar pehitungan dapat berjalan dengan benar.</li>
                    <li>Sebelum anda menekan tombol <strong>SIMPAN NILAI</strong> pastikan semua nilai telah terisi
                        dengan benar.</li>
                    <li><strong>RNT</strong> adalah Rata-rata Nilai Tugas, <strong>RNU</strong> adalah Rata-rata Nilai
                        Ulangan, <strong>NA</strong> adalah Nilai Akhir dan <strong>GRADE</strong> adalah Predikat yang
                        dibagi jadi A, B, C dan D.</li>
                    <li>Untuk menutup informasi ini silahkan klik Tutup dan untuk membuka kembali anda bisa klik icon <i
                            class="fa fa-edit"></i> atau Refresh browser anda</li>
                </ol>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat btn-sm pull-right" data-dismiss="modal"><i
                        class="fa fa-remove"></i> Tutup</button>
            </div>
        </div>
    </div>
</div>