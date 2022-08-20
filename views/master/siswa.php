<script>
function submit(x) {
    if (x == 'add') {
        $('[name="idsiswa"]').val("");
        $('[name="nis"]').val("");
        $('[name="nisn"]').val("");
        $('[name="nama"]').val("");
        $('[name="tmp_lhr"]').val("");
        $('[name="tgl_lhr"]').val("");
        $('[name="jk"]').val("").trigger('change');
        $('[name="alamat"]').val("");
        $('[name="nik"]').val("");
        $('[name="hobi"]').val("");
        $('[name="citacita"]').val("");
        $('[name="sts_anak"]').val("").trigger('change');
        $('[name="jml_sdr"]').val("");
        $('[name="anak_ke"]').val("");
        $('[name="nik_ayah"]').val("");
        $('[name="nik_ibu"]').val("");
        $('[name="nama_ayah"]').val("");
        $('[name="nama_ibu"]').val("");
        $('[name="pend_ayah"]').val("").trigger('change');
        $('[name="pend_ibu"]').val("").trigger('change');
        $('[name="pekr_ayah"]').val("");
        $('[name="pekr_ibu"]').val("");
        $('[name="alamat_ortu"]').val("");
        $('#modal-add .modal-title').html('Tambah Data Siswa');
        $('#btn-tambah').show();
        $('#btn-ubah').hide();
    } else {
        $('#modal-add .modal-title').html('Ubah Data Siswa');
        $('#btn-tambah').hide();
        $('#btn-ubah').show();

        $.ajax({
            type: "POST",
            data: {
                id: x
            },
            url: '<?=base_url();?>master/siswa/view',
            dataType: 'json',
            success: function(data) {
                $('[name="idsiswa"]').val(data.idsiswa);
                $('[name="nis"]').val(data.nis);
                $('[name="nisn"]').val(data.nisn);
                $('[name="nama"]').val(data.nama);
                $('[name="tmp_lhr"]').val(data.tmp_lhr);
                $('[name="tgl_lhr"]').val(data.tgl_lhr);
                $('[name="jk"]').val(data.jk).trigger('change');
                $('[name="alamat"]').val(data.alamat);
                $('[name="nik"]').val(data.nik);
                $('[name="hobi"]').val(data.hobi);
                $('[name="citacita"]').val(data.citacita);
                $('[name="sts_anak"]').val(data.sts_anak).trigger('change');
                $('[name="jml_sdr"]').val(data.jml_sdr);
                $('[name="anak_ke"]').val(data.anak_ke);
                $('[name="nik_ayah"]').val(data.nik_ayah);
                $('[name="nik_ibu"]').val(data.nik_ibu);
                $('[name="nama_ayah"]').val(data.nama_ayah);
                $('[name="nama_ibu"]').val(data.nama_ibu);
                $('[name="pend_ayah"]').val(data.pend_ayah).trigger('change');
                $('[name="pend_ibu"]').val(data.pend_ibu).trigger('change');
                $('[name="pekr_ayah"]').val(data.pekr_ayah);
                $('[name="pekr_ibu"]').val(data.pekr_ibu);
                $('[name="alamat_ortu"]').val(data.alamat_ortu);
            }
        });
    }
}

function view(x) {
    $('#modal-view').modal('show');
    $.ajax({
        type: "POST",
        data: {
            id: x
        },
        url: '<?=base_url();?>master/siswa/view',
        dataType: 'json',
        success: function(data) {
            $('[name="idsiswa"]').val(data.idsiswa);
            $('[name="nis"]').val(data.nis);
            $('[name="nisn"]').val(data.nisn);
            $('[name="nama"]').val(data.nama);
            $('[name="tmp_lhr"]').val(data.tmp_lhr);
            $('[name="tgl_lhr"]').val(data.tgl_lhr);
            $('[name="jk"]').val(data.jk).trigger('change');
            $('[name="alamat"]').val(data.alamat);
            $('[name="nik"]').val(data.nik);
            $('[name="hobi"]').val(data.hobi);
            $('[name="citacita"]').val(data.citacita);
            $('[name="sts_anak"]').val(data.sts_anak).trigger('change');
            $('[name="jml_sdr"]').val(data.jml_sdr);
            $('[name="anak_ke"]').val(data.anak_ke);
            $('[name="nik_ayah"]').val(data.nik_ayah);
            $('[name="nik_ibu"]').val(data.nik_ibu);
            $('[name="nama_ayah"]').val(data.nama_ayah);
            $('[name="nama_ibu"]').val(data.nama_ibu);
            $('[name="pend_ayah"]').val(data.pend_ayah).trigger('change');
            $('[name="pend_ibu"]').val(data.pend_ibu).trigger('change');
            $('[name="pekr_ayah"]').val(data.pekr_ayah);
            $('[name="pekr_ibu"]').val(data.pekr_ibu);
            $('[name="alamat_ortu"]').val(data.alamat_ortu);
        }
    });
}

function change_image(x) {
    $('#modal-image').modal('show');
    $.ajax({
        type: "POST",
        data: {
            id: x
        },
        url: '<?=base_url();?>master/siswa/view',
        dataType: 'json',
        success: function(data) {
            if (data.foto != '') {
                var img = data.foto
            } else {
                var img = 'default.jpg'
            }
            var html = '<img src="<?=base_url();?>uploads/' + img +
                '" alt="' + data.foto + '" width="100%" height="300">';
            $('[name="idsiswa"]').val(data.idsiswa);
            $('#view_gambar').html(html);
        }
    });
}

function preview_foto(event) {

    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('viewfoto');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

function modal_import() {
    $('#modal-import').modal('show');
}

function change_sts(x) {
    $('#modal-status').modal('show');
    $.ajax({
        type: "POST",
        data: {
            id: x
        },
        url: '<?=base_url();?>master/siswa/view',
        dataType: 'json',
        success: function(data) {
            $('[name="idsiswa"]').val(data.idsiswa);
            $('[name="status"]').val(data.status).trigger('change');
        }
    });
}

function hapus(x) {
    $('#modal-delete').modal('show');
    $('#deleted').on('click', function() {
        var action = '<?=base_url();?>master/siswa/delete/' + x;
        $('#form-hapus').attr('action', action).submit();
    })
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Data Siswa
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Data Master</a></li>
        <li class="active">Siswa</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
            <a href="#modal-add" class="btn btn-sm btn-primary btn-flat" data-toggle="modal" onclick="submit('add')"><i
                    class="fa fa-plus"></i> Tambah</a>
            <a href="<?=base_url('master/siswa');?>" class="btn btn-sm btn-primary btn-flat pull-right"
                data-toggle="tooltip" data-placement="top" title="Refresh"><i class="fa fa-refresh"></i></a>
            <a href="<?=base_url('master/siswa/keyAll');?>" class="btn btn-sm btn-primary btn-flat pull-right"
                data-toggle="tooltip" data-toggle="tooltip" data-placement="top" title="Aktifkan akun"><i
                    class="fa fa-key"></i></a>
            <a href="#" class="btn btn-sm btn-primary btn-flat pull-right" data-toggle="tooltip" data-toggle="tooltip"
                data-placement="top" title="Import" onclick="modal_import()"><i class="fa fa-upload"></i></a>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th width="5"><i class="fa fa-edit"></i></th>
                        <th>FOTO</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>NAMA LENGKAP</th>
                        <th>TTL</th>
                        <th>JK</th>
                        <th>ALAMAT</th>
                        <th>STATUS</th>
                        <th width="65">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($siswa as $row) :?>
                    <tr>
                        <td><?=$n++.'.';?></td>
                        <td><a href="#modal-add" data-toggle="modal" onclick="submit(<?=$row->idsiswa;?>)"><i
                                    class="fa fa-edit"></i></a>
                        </td>
                        <td><a href="#" data-toggle="tooltip" data-placement="top" data-title="Klik untuk mengubah foto"
                                onclick="change_image(<?=$row->idsiswa;?>)">
                                <img src="<?=base_url('uploads/');?><?=($row->foto!='')?$row->foto:'default.jpg';?>"
                                    alt="<?=$row->foto;?>" style="width:50px;height:50px;border:1px dashed;"></a>
                        </td>
                        <td><?=$row->nis;?></td>
                        <td><?=$row->nisn;?></td>
                        <td><?=$row->nama;?></td>
                        <td><?=$row->tmp_lhr.', '.date('d M Y',strtotime($row->tgl_lhr));?></td>
                        <td><?=$row->jk=='L'?'Laki-Laki':'Perempuan';?></td>
                        <td><?=$row->alamat;?></td>
                        <td><a href="#"
                                class="label <?php if($row->status=='Aktif'){echo 'bg-green';}elseif($row->status=='Nonaktif'){echo 'bg-blue';}elseif($row->status=='Pindah'){echo 'bg-aqua';}elseif($row->status=='Keluar'){echo 'bg-red';}else{echo 'bg-gray';}?>"
                                data-toggle="tooltip" data-placement="top" data-title="Klik untuk ubah"
                                onclick="change_sts(<?=$row->idsiswa;?>)"><?=$row->status;?></a>
                        </td>
                        <td>
                            <?php if(check_user($row->nis)==0):?>
                            <a href="<?=base_url('master/siswa/key/').$row->idsiswa;?>"
                                class="btn btn-xs btn-default text-aqua" data-toggle="tooltip" data-placement="top"
                                data-title="Aktifkan pengguna"><i class="fa fa-key"></i></a>
                            <?php endif;?>
                            <a href="#" class="btn btn-xs btn-default text-aqua" data-toggle="tooltip"
                                data-placement="top" data-title="Lihat detail" onclick="view(<?=$row->idsiswa;?>)"><i
                                    class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-xs btn-default text-red" data-toggle="tooltip"
                                data-placement="top" data-title="Hapus" onclick="hapus(<?=$row->idsiswa;?>)"><i
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
            <form action="<?=base_url('master/siswa/save');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p class="text-red" id="note">* Wajib diisi <br>Note: Jika belum memiliki NIP harap diisi dengan NIK
                    </p>
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab">Data Induk</a></li>
                            <li><a href="#tab_2" data-toggle="tab">Data Lainnya</a></li>
                            <li><a href="#tab_3" data-toggle="tab">Data Orang Tua</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="nis">NIS<span class="text-red">*</span></label>
                                            <input type="hidden" name="idsiswa">
                                            <input type="text" class="form-control" id="nis" name="nis"
                                                placeholder="Ex: 2020" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nisn">NISN<span class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="nisn" name="nisn"
                                                placeholder="Ex: 0012389567" maxlength="10" required>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap<span
                                                    class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama"
                                                placeholder="Ex: John Andy" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir<span
                                                    class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tmp_lhr"
                                                placeholder="Ex: Manokwari" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanggal Lahir<span class="text-red">*</span></label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker"
                                                    name="tgl_lhr" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Jenis Kelamin<span class="text-red">*</span></label>
                                            <select class="form-control select2" style="width: 100%;" name="jk"
                                                required>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Alamat Lengkap<span class="text-red">*</span></label>
                                            <textarea class="form-control" name="alamat" rows="5" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" id="nik" name="nik"
                                                placeholder="Ex: 9206111027990001">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="hobi">Hobi</label>
                                            <input type="text" class="form-control" id="hobi" name="hobi"
                                                placeholder="Ex: Bulu tangkis">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="citacita">Cita-Cita</label>
                                            <input type="text" class="form-control" id="citacita" name="citacita"
                                                placeholder="Ex: Polisi">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status Dalam Keluarga</label>
                                            <select class="form-control select2" style="width: 100%;" name="sts_anak">
                                                <option value="Anak Kandung">Anak Kandung</option>
                                                <option value="Anak Tiri">Anak Tiri</option>
                                                <option value="Anak Angkat">Anak Angkat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jml_sdr">Jumlah Saudara</label>
                                            <input type="text" class="form-control" id="jml_sdr" name="jml_sdr"
                                                placeholder="Ex: 4">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="anak_ke">Anak Ke Berapa</label>
                                            <input type="text" class="form-control" id="anak_ke" name="anak_ke"
                                                placeholder="Ex: 2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nik_ayah">NIK Ayah</label>
                                            <input type="text" class="form-control" id="nik_ayah" name="nik_ayah"
                                                placeholder="Ex: 9206111027990001">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nik_ibu">NIK Ibu</label>
                                            <input type="text" class="form-control" id="nik_ibu" name="nik_ibu"
                                                placeholder="Ex: 9206111027990001">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_ayah">Nama Ayah</label>
                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                                placeholder="Ex: Father John">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_ibu">Nama Ibu</label>
                                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                                placeholder="Ex: Mother John">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pendidikan Ayah</label>
                                            <select class="form-control select2" style="width: 100%;" name="pend_ayah">
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD/Sederajat">SD/Sederajat</option>
                                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pendidikan Ibu</label>
                                            <select class="form-control select2" style="width: 100%;" name="pend_ibu">
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD/Sederajat">SD/Sederajat</option>
                                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pekr_ayah">Pekerjaan Ayah</label>
                                            <input type="text" class="form-control" id="pekr_ayah" name="pekr_ayah"
                                                placeholder="Ex: Polisi">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pekr_ibu">Pekerjaan Ibu</label>
                                            <input type="text" class="form-control" id="pekr_ibu" name="pekr_ibu"
                                                placeholder="Ex: PNS">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Alamat Lengkap Orang Tua</label>
                                            <textarea class="form-control" name="alamat_ortu" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>
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
<div class="modal fade" id="modal-import" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=base_url('master/siswa/import');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Import Data Siswa</h4>
                </div>
                <div class="modal-body">
                    <h5>Panduan Import :</h5>
                    <ol>
                        <li>Copy dan paste <strong>[NIS] [NISN] [NAMA LENGKAP] [TEMPAT LAHIR] [TANGGAL LAHIR] [JENIS
                                KELAMIN]
                                [ALAMAT]</strong> dari Ms. Excel pada Text Area dibawah.</li>
                        <!-- <li>Kolom <strong>NIP</strong> dapat diisi dengan <strong>NIK</strong> jika belum memiliki
                            <strong>NIP</strong>.</li> -->
                        <li>Kolom <strong>JENIS KELAMIN</strong> diisi huruf <strong>"L"</strong> jika Laki-laki dan
                            <strong>"P"</strong> jika Perempuan.</li>
                        <li>Kolom <strong>TANGGAL LAHIR</strong> diisi dengan format <strong>"YYYY-MM-DD"</strong>.
                            Contoh : <strong>1991-03-15</strong></li>
                    </ol>
                    <div class="form-group">
                        <textarea class="form-control" rows="15" name="siswa" placeholder="Paste here..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat btn-sm pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button type="submit" class="btn btn-success btn-flat btn-sm"><i class="fa fa-save"></i>
                        Import Data</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-status" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?=base_url('master/siswa/status');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah Status Siswa</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Status Siswa</label>
                                <input type="hidden" name="idsiswa">
                                <select class="form-control select2" style="width: 100%;" name="status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                    <option value="Pindah">Pindah</option>
                                    <option value="Keluar">Keluar</option>
                                    <option value="Alumni">Alumni</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button type="submit" class="btn btn-sm btn-success btn-flat"><i class="fa fa-save"></i>
                        Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-view" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="<?=base_url('master/siswa/status');?>" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Detail Siswa</h4>
                </div>
                <div class="modal-body">

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#v_1" data-toggle="tab">Data Induk</a></li>
                            <li><a href="#v_2" data-toggle="tab">Data Lainnya</a></li>
                            <li><a href="#v_3" data-toggle="tab">Data Orang Tua</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="v_1">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="nis">NIS</label>
                                            <input type="hidden" name="idsiswa">
                                            <input type="text" class="form-control" id="nis" name="nis" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="nisn">NISN</label>
                                            <input type="text" class="form-control" id="nisn" name="nisn" maxlength="10"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap<span
                                                    class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="nama_lengkap" name="nama"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="tempat_lahir">Tempat Lahir<span
                                                    class="text-red">*</span></label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tmp_lhr"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right datepicker"
                                                    name="tgl_lhr" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control select2" style="width: 100%;" name="jk"
                                                disabled>
                                                <option value="L">Laki-Laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Alamat Lengkap</label>
                                            <textarea class="form-control" name="alamat" rows="5" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="v_2">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" id="nik" name="nik" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="hobi">Hobi</label>
                                            <input type="text" class="form-control" id="hobi" name="hobi" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="citacita">Cita-Cita</label>
                                            <input type="text" class="form-control" id="citacita" name="citacita"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Status Dalam Keluarga</label>
                                            <select class="form-control select2" style="width: 100%;" name="sts_anak"
                                                disabled>
                                                <option value="Anak Kandung">Anak Kandung</option>
                                                <option value="Anak Tiri">Anak Tiri</option>
                                                <option value="Anak Angkat">Anak Angkat</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="jml_sdr">Jumlah Saudara</label>
                                            <input type="text" class="form-control" id="jml_sdr" name="jml_sdr"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="anak_ke">Anak Ke Berapa</label>
                                            <input type="text" class="form-control" id="anak_ke" name="anak_ke"
                                                disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="v_3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nik_ayah">NIK Ayah</label>
                                            <input type="text" class="form-control" id="nik_ayah" name="nik_ayah"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nik_ibu">NIK Ibu</label>
                                            <input type="text" class="form-control" id="nik_ibu" name="nik_ibu"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_ayah">Nama Ayah</label>
                                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_ibu">Nama Ibu</label>
                                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pendidikan Ayah</label>
                                            <select class="form-control select2" style="width: 100%;" name="pend_ayah"
                                                disabled>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD/Sederajat">SD/Sederajat</option>
                                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pendidikan Ibu</label>
                                            <select class="form-control select2" style="width: 100%;" name="pend_ibu"
                                                disabled>
                                                <option value="Tidak Sekolah">Tidak Sekolah</option>
                                                <option value="SD/Sederajat">SD/Sederajat</option>
                                                <option value="SMP/Sederajat">SMP/Sederajat</option>
                                                <option value="SMA/Sederajat">SMA/Sederajat</option>
                                                <option value="D1">D1</option>
                                                <option value="D2">D2</option>
                                                <option value="D3">D3</option>
                                                <option value="D4">D4</option>
                                                <option value="S1">S1</option>
                                                <option value="S2">S2</option>
                                                <option value="S3">S3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pekr_ayah">Pekerjaan Ayah</label>
                                            <input type="text" class="form-control" id="pekr_ayah" name="pekr_ayah"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="pekr_ibu">Pekerjaan Ibu</label>
                                            <input type="text" class="form-control" id="pekr_ibu" name="pekr_ibu"
                                                disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Alamat Lengkap Orang Tua</label>
                                            <textarea class="form-control" name="alamat_ortu" rows="5"
                                                disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-default btn-flat pull-right" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Ubah Gambar -->
<div class="modal fade" id="modal-image" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <form action="<?=base_url('master/siswa/change_img');?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ubah Foto Siswa</h4>
                </div>
                <div class="modal-body">
                    <div id="view_gambar" style="margin-bottom:15px;padding:15px;border:1px solid;">

                    </div>
                    <img src="" alt="view foto" style="border:1px dashed;width:75px;height:75px;" id="viewfoto">
                    <div class="form-group">
                        <label for="foto">Foto Siswa</label>
                        <input type="hidden" name="idsiswa">
                        <input type="file" class="form-control" id="foto" name="foto" onchange="preview_foto(event)"
                            required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default btn-flat pull-left" data-dismiss="modal"><i
                            class="fa fa-remove"></i> Batal</button>
                    <button class="btn btn-sm btn-success btn-flat pull-right"><i class="fa fa-save"></i> Ubah
                        Foto</button>
                </div>
            </div>
        </form>
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