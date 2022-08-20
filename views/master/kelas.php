<script>
function submit(x) {
    if (x == 'add') {
        $('[name="idkelas"]').val("");
        $('[name="kelas_kd"]').val("");
        $('[name="kelas_nama"]').val("");
        $('#modal-add .modal-title').html('Tambah Kelas');
        $('#btn-tambah').show();
        $('#btn-ubah').hide();
        $('[name="kelas_kd"]').prop('readonly', false);
    } else {
        $('#modal-add .modal-title').html('Ubah Kelas')
        $('#btn-tambah').hide();
        $('#btn-ubah').show();
        $('[name="kelas_kd"]').prop('readonly', true);

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>master/kelas/view',
            dataType: 'json',
            success: function(data) {
                $('[name="idkelas"]').val(data.idkelas);
                $('[name="kelas_kd"]').val(data.kelas_kd);
                $('[name="kelas_nama"]').val(data.kelas_nama);
            }
        });
    }
}

function hapus(x) {
    $('#modal-delete').modal('show');
    $('#deleted').on('click', function() {
        var action = '<?=base_url();?>master/kelas/delete/' + x;
        $('#form-hapus').attr('action', action).submit();
    })
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Kelas
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Kelas</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="#modal-add" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" onclick="submit('add')"><i
                    class="fa fa-plus"></i> Tambah</a>
            <a href="<?=base_url('master/kelas');?>" class="btn btn-sm btn-primary btn-flat pull-right"
                data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th width="5"><i class="fa fa-edit"></i></th>
                        <th>KODE</th>
                        <th>NAMA KELAS</th>
                        <th width="5">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($kelas as $row) :?>
                    <tr>
                        <td><?=$n++.'.';?></td>
                        <td><a href="#modal-add" data-toggle="modal" onclick="submit(<?=$row->idkelas;?>)"><i
                                    class="fa fa-edit"></i></a>
                        </td>
                        <td><?=$row->kelas_kd;?></td>
                        <td><?=$row->kelas_nama;?></td>
                        <td><a href="#" class="btn btn-xs btn-default text-red" data-toggle="tooltip"
                                data-placement="top" data-title="Hapus" onclick="hapus(<?=$row->idkelas;?>)"><i
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
            <form action="<?=base_url('master/kelas/save');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelas_kd">Kode<span class="text-red">*</span></label>
                                <input type="hidden" name="idkelas">
                                <input type="text" class="form-control" id="kelas_kd" name="kelas_kd"
                                    placeholder="Ex: 1A" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="kelas_nama">Nama Kelas<span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="kelas_nama" name="kelas_nama"
                                    placeholder="Ex: Kelas Satu A" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-sm pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm" id="btn-tambah"><i
                            class="fa fa-save"></i>
                        Simpan</button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm" id="btn-ubah"><i
                            class="fa fa-save"></i>
                        Simpan Perubahan</button>
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