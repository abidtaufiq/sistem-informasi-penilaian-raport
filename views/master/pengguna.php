<script>
function submit(x) {
    if (x == 'add') {
        $('[name="idusers"]').val("");
        $('[name="user_name"]').val("");
        $('[name="user_fullname"]').val("");
        $('[name="user_type"]').val("").trigger('change');
        $('#modal-add .modal-title').html('Tambah Pengguna');
        $('#note').show();
        $('#btn-tambah').show();
        $('#btn-ubah').hide();
        $('[name="user_name"]').prop('readonly', false);
    } else {
        $('#modal-add .modal-title').html('Ubah Pengguna');
        $('#note').hide();
        $('#btn-tambah').hide();
        $('#btn-ubah').show();
        $('[name="user_name"]').prop('readonly', true);

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>master/pengguna/view',
            dataType: 'json',
            success: function(data) {
                $('[name="idusers"]').val(data.idusers);
                $('[name="user_name"]').val(data.user_name);
                $('[name="user_fullname"]').val(data.user_fullname);
                $('[name="user_type"]').val(data.user_type).trigger('change');
                if (data.user_type == 'super_user') {
                    $('[name="user_type"]').prop('disabled', true);
                } else {
                    $('[name="user_type"]').prop('disabled', false);
                }
            }
        });
    }
}

function hapus(x) {
    $('#modal-delete').modal('show');
    $('#deleted').on('click', function() {
        var action = '<?=base_url();?>master/pengguna/delete/' + x;
        $('#form-hapus').attr('action', action).submit();
    })
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Pengguna
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Pengguna</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="#modal-add" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" onclick="submit('add')"><i
                    class="fa fa-plus"></i> Tambah</a>
            <a href="<?=base_url('master/pengguna');?>" class="btn btn-sm btn-primary btn-flat pull-right"
                data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th width="5"><i class="fa fa-edit"></i></th>
                        <th width="5"><i class="fa fa-key"></i></th>
                        <th>NAMA LENGKAP</th>
                        <th>USERNAME</th>
                        <th>LEVEL</th>
                        <th width="5">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($pengguna as $row) :?>
                    <tr>
                        <td><?=$n++.'.';?></td>
                        <td>
                        <?php if($row->user_type!='super_user'):?>
                        <a href="#modal-add" data-toggle="modal" onclick="submit(<?=$row->idusers;?>)"><i
                                    class="fa fa-edit"></i></a>
                            <?php endif;?>
                        </td>
                        <td><a href="#" data-toggle="tooltip" data-placement="top" title="Ubah password"
                                onclick="change_pass('<?=uri_string();?>','<?=$row->idusers;?>')"><i
                                    class="fa fa-key"></i></a>
                        </td>
                        <td><?=$row->user_fullname;?></td>
                        <td><?=$row->user_name;?></td>
                        <td><?=$row->user_type;?></td>
                        <td>
                            <?php if($row->user_type!='super_user'):?>
                            <a href="#" class="btn btn-xs btn-default text-red" data-toggle="tooltip"
                                data-placement="top" data-title="Hapus" onclick="hapus(<?=$row->idusers;?>)"><i
                                    class="fa fa-trash"></i></a>
                            <?php endif;?>
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
            <form action="<?=base_url('master/pengguna/save');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p class="text-red" id="note">Note: Username tidak dapat diubah dan username akan menjadi password
                        bawaan</p>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="user_name">Username<span class="text-red">*</span></label>
                                <input type="hidden" name="idusers">
                                <input type="text" class="form-control" id="user_name" name="user_name"
                                    placeholder="Ex: admin" required>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="user_fullname">Nama Lengkap<span class="text-red">*</span></label>
                                <input type="text" class="form-control" id="user_fullname" name="user_fullname"
                                    placeholder="Ex: Nama Lengkap" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Level<span class="text-red">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="user_type" required>
                                    <option value="guru">Guru</option>
                                    <option value="siswa">Siswa</option>
                                </select>
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
<!-- <div class="modal fade" id="modal-password" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post" id="form-change-pass">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah Password</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="user_password">Pasword Baru<span class="text-red">*</span></label>
                                <input type="password" class="form-control" id="user_password" name="user_password"
                                    placeholder="Ex: admin" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-sm pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm" id="change_pass"><i
                            class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
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