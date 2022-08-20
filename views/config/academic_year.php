<script>
function submit(x) {
    if (x == 'add') {
        $('[name="idtahun_akademik"]').val("");
        $('[name="tahun_akademik"]').val("");
        $('[name="semester"]').val("").trigger('change');
        $('[name="semester_aktif"]').val("").trigger('change');
        $('#modal-add .modal-title').html('Tambah Tahun Pelajaran');
        $('#btn-tambah').show();
        $('#btn-ubah').hide();
        $('[name="tahun_akademik"]').prop('readonly', false);
        // $('[name="semester"]').prop('disabled', false);
    } else {
        $('#modal-add .modal-title').html('Ubah Tahun Pelajaran')
        $('#image').hide();
        $('#btn-tambah').hide();
        $('#btn-ubah').show();
        $('[name="tahun_akademik"]').prop('readonly', true);
        // $('[name="semester"]').prop('disabled', true);

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>configuration/view',
            dataType: 'json',
            success: function(data) {
                $('[name="idtahun_akademik"]').val(data.idtahun_akademik);
                $('[name="tahun_akademik"]').val(data.tahun_akademik);
                $('[name="semester"]').val(data.semester).trigger('change');
                $('[name="semester_aktif"]').val(data.semester_aktif).trigger('change');
            }
        });
    }
}

// function saveNew() {
//     var tahun_akademik = $('[name="tahun_akademik"]').val();
//     var semester = $('[name="semester"]').val();
//     var semester_aktif = $('[name="semester_aktif"]').val();
//     $.ajax({
//         type: "POST",
//         data: {
//             tahun_akademik: tahun_akademik,
//             semester: semester,
//             semester_aktif: semester_aktif
//         },
//         url: '<?=base_url();?>configuration/save',
//         success: function(data) {
//             $('#modal-add').modal('hide');
//             if (data) {
//                 toastr.error(data);
//             }
//             setTimeout(() => {
//                 window.location =
//                     "<?=site_url();?>configuration/academic_year";
//             }, 1500);
//         }
//     });
// }
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tahun Pelajaran
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Konfigurasi</a></li>
        <li class="active">Tahun Pelajaran</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="#modal-add" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" onclick="submit('add')"><i
                    class="fa fa-plus"></i> Tambah</a>
            <a href="<?=base_url('configuration/academic_year');?>" class="btn btn-sm btn-primary btn-flat pull-right"
                data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th width="5"><i class="fa fa-edit"></i></th>
                        <th>TAHUN PELAJARAN</th>
                        <th>SEMESTER</th>
                        <th>AKTIF?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($academic_year as $row) :?>
                    <tr>
                        <td><?=$n++.'.';?></td>
                        <td><a href="#modal-add" data-toggle="modal" onclick="submit(<?=$row->idtahun_akademik;?>)"><i
                                    class="fa fa-edit"></i></a>
                        </td>
                        <td><?=$row->tahun_akademik;?></td>
                        <td><?=$row->semester;?></td>
                        <td><?=$row->semester_aktif==0?'<i class="fa fa-close"></i>':'<i class="fa fa-check"></i>';?>
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
            <form action="<?=base_url('configuration/save');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tahun-pelajaran">Tahun Pelajaran<span class="text-red">*</span></label>
                                <input type="hidden" name="idtahun_akademik">
                                <input type="text" class="form-control" id="tahun-pelajaran" name="tahun_akademik"
                                    placeholder="Ex: 2019-2020">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Semester<span class="text-red">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="semester">
                                    <option value="Ganjil">Ganjil</option>
                                    <option value="Genap">Genap</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Aktif ?<span class="text-red">*</span></label>
                                <select class="form-control select2" style="width: 100%;" name="semester_aktif">
                                    <option value="1">Ya</option>
                                    <option value="0">Tidak</option>
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