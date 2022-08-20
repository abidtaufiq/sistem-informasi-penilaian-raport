<script>
$(document).ready(function() {
    showAcademicYear();
    getFromSourceList();
    getFromTargetList();
})

function check_all(checked, el) {
    $('input[name="' + el + '"]').prop('checked', checked);
}

function showAcademicYear() {
    $('table.from-source').empty();
    if ($('[name="kelas_asal"]').val() !== 'all' && $('[name="kelas_asal"]').val() !== 'unset') {
        $('#tahun_asal').show();
    } else {
        $('#tahun_asal').hide();
    }
    getFromSourceList();
}

/**
 * Mengambil data asal dari wali_kelas
 */
function getFromSourceList() {
    $('table.from-source').empty();
    $('.origin-class-overlay').show();
    var tahun_asal = $('[name="tahun_asal"]').val();
    var kelas_asal = $('[name="kelas_asal"]').val();
    $.ajax({
        type: "POST",
        data: {
            tahun_asal: tahun_asal,
            kelas_asal: kelas_asal
        },
        url: '<?=base_url();?>setting/set_kelas/get_siswa_asal',
        dataType: 'json',
        success: function(data) {
            $('table.from-source').empty().html(data);
            $('.origin-class-overlay').hide();
        }
    });
}
/**
 * Mengambil data tujuan dari wali_kelas
 */
function getFromTargetList() {
    $('table.destination-source').empty();
    $('.destination-class-overlay').show();
    var tahun_tujuan = $('[name="tahun_tujuan"]').val();
    var kelas_tujuan = $('[name="kelas_tujuan"]').val();
    $.ajax({
        type: "POST",
        data: {
            tahun_tujuan: tahun_tujuan,
            kelas_tujuan: kelas_tujuan
        },
        url: '<?=base_url();?>setting/set_kelas/get_siswa_tujuan',
        dataType: 'json',
        success: function(data) {
            console.log(data);
            $('table.destination-source').empty().html(data);
            $('.destination-class-overlay').hide();
        }
    });
}
// Save To Destination Class
function saveToDestinationClass() {
    var kelas_asal = $('[name="kelas_asal"]').val();
    var kelas_tujuan = $('[name="kelas_tujuan"]').val();
    var tahun_asal = $('[name="tahun_asal"]').val();
    var tahun_tujuan = $('[name="tahun_tujuan"]').val();
    if (kelas_asal == kelas_tujuan && tahun_asal == tahun_tujuan) {
        alert('Kelas dan Tahun Pelajaran tujuan tidak boleh sama dengan Kelas dan Tahun Pelajaran asal');
    } else {
        var rows = $('input[name="asal"]:checked');
        var siswa_id = [];
        rows.each(function() {
            siswa_id.push($(this).val());
        });
        if (siswa_id.length) {
            $('#modal-confirm').modal('show');
            $('#confirm').on('click', function() {
                $('.origin-class-overlay').show();
                $.ajax({
                    type: "POST",
                    data: {
                        siswa_id: siswa_id.join(','),
                        tahun_tujuan: tahun_tujuan,
                        kelas_tujuan: kelas_tujuan
                    },
                    url: '<?=base_url();?>setting/set_kelas/save_siswa_to_class',
                    dataType: 'json',
                    success: function() {
                        alert('Data gagal dipindahkan');
                    },
                    error: function() {
                        $('#modal-confirm').modal('hide');
                        getFromSourceList();
                        getFromTargetList();
                        $('.origin-class-overlay').hide();
                    }
                });
            });
        } else {
            alert('Tidak ada data yang dipilih');
        }
    }
}
// Delete Permanent Data
function DeleteFromDestinationClass() {
    var kelas_tujuan = $('[name="kelas_tujuan"]').val();
    var tahun_tujuan = $('[name="tahun_tujuan"]').val();
    var rows = $('input[name="tujuan"]:checked');
    var siswa_id = [];
    rows.each(function() {
        siswa_id.push($(this).val());
    });
    if (siswa_id.length) {
        $('#modal-delete').modal('show');
        $('#deleted').on('click', function() {
            $('.destination-class-overlay').show();
            $.ajax({
                type: "POST",
                data: {
                    siswa_id: siswa_id.join(','),
                    tahun_tujuan: tahun_tujuan,
                    kelas_tujuan: kelas_tujuan
                },
                url: '<?=base_url();?>setting/set_kelas/delete',
                dataType: 'json',
                success: function() {
                    alert('Data gagal dipindahkan');
                },
                error: function() {
                    $('#modal-delete').modal('hide');
                    getFromSourceList();
                    getFromTargetList();
                    $('.destination-class-overlay').hide();
                }
            });
        });
    } else {
        alert('Tidak ada data yang terpilih');
    }
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Atur Kelas
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Pengaturan</a></li>
        <li class="active">Atur Kelas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- <form action="<?=base_url('setting/set_kelas/save');?>" method="get"> -->
    <div class="row">
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <button type="submit" class="btn btn-sm btn-primary btn-flat pull-right"
                        onclick="saveToDestinationClass()"><i class="fa fa-arrow-right"></i>
                        PINDAH KE KELAS TUJUAN</button>
                    <br>
                    <br>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label id="kelas_asal">Pilih Kelas Asal</label>
                                    <select class="form-control select2" style="width: 100%;" name="kelas_asal"
                                        onchange="showAcademicYear()">
                                        <option value="unset">Belum Diatur</option>
                                        <option value="all">Tampilkan Semua</option>
                                        <?php foreach(list_kelas() as $row):?>
                                        <option value="<?=$row->idkelas;?>"><?=$row->kelas_kd.' - '.$row->kelas_nama;?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6" id="tahun_asal">
                                <div class="form-group">
                                    <label>Tahun Pelajaran</label>
                                    <select class="form-control select2" style="width: 100%;" name="tahun_asal"
                                        onchange="getFromSourceList()">
                                        <?php foreach(list_academic_year() as $row):?>
                                        <option value="<?=$row->idtahun_akademik;?>"><?=$row->tahun_akademik;?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped table-hover from-source">
                    </table>
                    <div class="overlay origin-class-overlay" style="display: none;">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <button class="btn btn-sm btn-danger btn-flat pull-right" onclick="DeleteFromDestinationClass()"><i
                            class="fa fa-trash"></i> HAPUS</button>
                    <br>
                    <br>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tahun Pelajaran</label>
                                    <select class="form-control select2" style="width: 100%;" name="tahun_tujuan"
                                        onchange="getFromTargetList()">
                                        <?php foreach(list_academic_year() as $row):?>
                                        <option value="<?=$row->idtahun_akademik;?>"><?=$row->tahun_akademik;?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Kelas Tujuan</label>
                                    <select class="form-control select2" style="width: 100%;" name="kelas_tujuan"
                                        onchange="getFromTargetList()">
                                        <?php foreach(list_kelas() as $row):?>
                                        <option value="<?=$row->idkelas;?>"><?=$row->kelas_kd.' - '.$row->kelas_nama;?>
                                        </option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped table-hover destination-source">
                    </table>
                    <div class="overlay destination-class-overlay" style="display: none;">
                        <i class="fa fa-refresh fa-spin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </form> -->
</section>
<div class="modal fade" id="modal-add" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=base_url('setting/mengajar/save');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Mengajar</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Guru<span class="text-red">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="idguru" required>
                                    <?php foreach(list_guru() as $row):?>
                                    <option value="<?=$row->idguru;?>"><?=$row->nip.' - '.$row->nama;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kelas<span class="text-red">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="idkelas" required>
                                    <?php foreach(list_kelas() as $row):?>
                                    <option value="<?=$row->idkelas;?>"><?=$row->kelas_kd.' - '.$row->kelas_nama;?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Mata Pelajaran<span class="text-red">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="idmapel" required>
                                    <?php foreach(list_mapel() as $row):?>
                                    <option value="<?=$row->idmapel;?>"><?=$row->mapel_kd.' - '.$row->mapel_nama;?>
                                    </option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-sm pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-copy" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=base_url('setting/mengajar/copy');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Copy Data</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tahun Pelajaran<span class="text-red">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="idtahun_akademik"
                                    required>
                                    <?php foreach(list_academic_year() as $row):?>
                                    <option value="<?=$row->idtahun_akademik;?>"><?=$row->tahun_akademik;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Semester<span class="text-red">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="semester" required>
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-sm pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm"><i class="fa fa-copy"></i>
                        Oke, Copy</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-confirm" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin data yang terceklis akan dipindahkan ke Kelas dan Tahun Pelajaran tujuan ? </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-remove"></i> Batal</button>
                <button class="btn btn-sm btn-success btn-flat" id="confirm"><i class="fa fa-arrow-right"></i> Iya,
                    Pindahkan</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal konfirmasi delete -->
<div class="modal fade" id="modal-delete" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body bg-red">
                <p>Anda yakin ingin menghapus data ini ? </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default btn-flat pull-left" data-dismiss="modal"><i
                        class="fa fa-remove"></i> Batal</button>
                <button class="btn btn-sm btn-danger btn-flat" id="deleted"><i class="fa fa-trash"></i> Iya,
                    Hapus</button>
            </div>
        </div>
    </div>
</div>