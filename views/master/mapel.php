<script>
function submit(x) {
    if (x == 'add') {
        $('[name="idmapel"]').val("");
        $('[name="mapel_kd"]').val("");
        $('[name="mapel_nama"]').val("");
        $('#modal-add .modal-title').html('Tambah Mata Pelajaran');
        $('#btn-tambah').show();
        $('#btn-ubah').hide();
        $('[name="mapel_kd"]').prop('readonly', false);
    } else {
        $('#modal-add .modal-title').html('Ubah Kelas')
        $('#btn-tambah').hide();
        $('#btn-ubah').show();
        $('[name="mapel_kd"]').prop('readonly', true);

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>master/mapel/view',
            dataType: 'json',
            success: function(data) {
                $('[name="idmapel"]').val(data.idmapel);
                $('[name="mapel_kd"]').val(data.mapel_kd);
                $('[name="mapel_nama"]').val(data.mapel_nama);
            }
        });
    }
}

function hapus(x) {
    $('#modal-delete').modal('show');
    $('#deleted').on('click', function() {
        var action = '<?=base_url();?>master/mapel/delete/' + x;
        $('#form-hapus').attr('action', action).submit();
    })
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Mata Pelajaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Mata Pelajaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="#modal-add" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" onclick="submit('add')"><i
                    class="fa fa-plus"></i> Tambah</a>
            <a href="<?=base_url('master/mapel');?>" class="btn btn-sm btn-primary btn-flat pull-right"
                data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th width="5"><i class="fa fa-edit"></i></th>
                        <th>KODE</th>
                        <th>MATA PELAJARAN</th>
                        <th width="5">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($mapel as $row) :?>
                    <tr>
                        <td><?=$n++.'.';?></td>
                        <td><a href="#modal-add" data-toggle="modal" onclick="submit(<?=$row->idmapel;?>)"><i
                                    class="fa fa-edit"></i></a>
                        </td>
                        <td><?=$row->mapel_kd;?></td>
                        <td><?=$row->mapel_nama;?></td>
                        <td><a href="#" class="btn btn-xs btn-default text-red" data-toggle="tooltip"
                                data-placement="top" data-title="Hapus" onclick="hapus(<?=$row->idmapel;?>)"><i
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
            <form action="<?=base_url('master/mapel/save');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mapel_kd">Kode<span class="text-red">*</span></label>
                                <input type="hidden" name="idmapel">
                                <input type="text" class="form-control" id="mapel_kd" name="mapel_kd"
                                    placeholder="Ex: MTK" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="mapel_nama">Mata Pelajaran<span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="mapel_nama" name="mapel_nama"
                                    placeholder="Ex: Matematika" required>
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