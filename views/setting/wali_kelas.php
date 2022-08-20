<script>
function add() {
    $('[name="idguru"]').val("").trigger('change');
    $('[name="idkelas"]').val("").trigger('change');
}

function copy() {
    $('[name="idtahun_akademik"]').val("").trigger('change');
    $('[name="semester"]').val("").trigger('change');
}

function hapus(x) {
    $('#modal-delete').modal('show');
    $('#deleted').on('click', function() {
        var action = '<?=base_url();?>setting/wali_kelas/delete/' + x;
        $('#form-hapus').attr('action', action).submit();
    })
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Wali Kelas
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Pengaturan</a></li>
        <li class="active">Wali Kelas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="#modal-add" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" onclick="add()"><i
                    class="fa fa-plus"></i> Tambah</a>
            <a href="#modal-copy" class="btn btn-sm btn-default btn-flat" data-toggle="modal" onclick="copy()"><i
                    class="fa fa-copy"></i>
                Copy Data</a>
            <a href="<?=base_url('setting/wali_kelas');?>" class="btn btn-sm btn-primary btn-flat pull-right"
                data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th width="300">KELAS</th>
                        <th>WALI KELAS</th>
                        <th>JUMLAH SISWA</th>
                        <th width="5">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($wali_kelas as $row) :?>
                    <tr>
                        <td><?=$n++.'.';?></td>
                        <td><?=$row->kelas_kd.' - '.$row->kelas_nama;?></td>
                        <td><?=$row->nama;?></td>
                        <td><?='<b>'.count_rombel($row->idwali_kelas).'</b> Orang';?></td>
                        <td><a href="#" class="btn btn-xs btn-default text-red" data-toggle="tooltip"
                                data-placement="top" data-title="Hapus" onclick="hapus(<?=$row->idwali_kelas;?>)"><i
                                    class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-add" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=base_url('setting/wali_kelas/save');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Tambah Wali Kelas</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
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
            <form action="<?=base_url('setting/wali_kelas/copy');?>" method="post">
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
<!-- Modal konfirmasi delete -->
<div class="modal fade" id="modal-delete" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="form-hapus">
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
            </form>
        </div>
    </div>
</div>