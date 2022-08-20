<script>
function preview_foto(event) {

    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('viewfoto');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Selamat Datang, <b><?=__session('username');?></b>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?=count(list_guru());?></h3>

                    <p>Guru</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?=count(list_siswa());?></h3>

                    <p>Siswa</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?=count(list_kelas());?></h3>

                    <p>Kelas</p>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?=count(list_pengguna());?></h3>

                    <p>Pengguna</p>
                </div>
                <div class="icon">
                    <i class="fa fa-key"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Data Profil Sekolah</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                    title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <form class="form-horizontal" action="<?=base_url('dashboard/save_profil');?>" method="post"
            enctype="multipart/form-data">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="col-sm-4 control-label">NAMA SEKOLAH</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="idprofil_sekolah"
                                    value="<?=$school_profil->idprofil_sekolah;?>">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?=$school_profil->nama;?>" placeholder="Nama sekolah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="npsn" class="col-sm-4 control-label">NPSN</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="npsn" name="npsn"
                                    value="<?=$school_profil->npsn;?>" placeholder="NPSN">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-4 control-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" style="width: 100%;" name="status"
                                    value="<?=$school_profil->status;?>">
                                    <option value="Negeri" <?=$school_profil->status=='Negeri'?'selected':'';?>>Negeri
                                    </option>
                                    <option value="Swasta" <?=$school_profil->status=='Swasta'?'selected':'';?>>Swasta
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_kepsek" class="col-sm-4 control-label">Nama Kepala Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_kepsek" name="nama_kepsek"
                                    value="<?=$school_profil->nama_kepsek;?>" placeholder="Kepala sekolah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nip_kepsek" class="col-sm-4 control-label">NIP Kepala Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nip_kepsek" name="nip_kepsek"
                                    value="<?=$school_profil->nip_kepsek;?>" placeholder="NIP Kepala sekolah">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-4 control-label">Akreditasi</label>
                            <div class="col-sm-8">
                                <select class="form-control select2" style="width: 100%;" name="akreditasi"
                                    value="<?=$school_profil->akreditasi;?>">
                                    <option value="kosong" <?=$school_profil->akreditasi=='kosong'?'selected':'';?>>
                                        Belum Ada</option>
                                    <option value="A" <?=$school_profil->akreditasi=='A'?'selected':'';?>>A</option>
                                    <option value="B" <?=$school_profil->akreditasi=='B'?'selected':'';?>>B</option>
                                    <option value="C" <?=$school_profil->akreditasi=='C'?'selected':'';?>>C</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="logo" class="col-sm-4 control-label">Logo Sekolah</label>
                            <div class="col-sm-8">
                                <img src="<?=base_url('uploads/').$school_profil->logo;?>" alt="view foto"
                                    style="border:1px dashed;width:75px;height:75px;" id="viewfoto">
                                <input type="file" class="form-control" id="logo" name="logo"
                                    value="<?=$school_profil->logo;?>" onchange="preview_foto(event)">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="provinsi" class="col-sm-4 control-label">Provinsi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="provinsi" name="provinsi"
                                    value="<?=$school_profil->provinsi;?>" placeholder="Dusun">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten" class="col-sm-4 control-label">Kabupaten</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kabupaten" name="kabupaten"
                                    value="<?=$school_profil->kabupaten;?>" placeholder="Dusun">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan" class="col-sm-4 control-label">Kecamatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                                    value="<?=$school_profil->kecamatan;?>" placeholder="Dusun">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan" class="col-sm-4 control-label">Desa / Kelurahan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kelurahan" name="kelurahan"
                                    value="<?=$school_profil->kelurahan;?>" placeholder="Dusun">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="dusun" class="col-sm-4 control-label">Dusun</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="dusun" name="dusun"
                                    value="<?=$school_profil->dusun;?>" placeholder="Dusun">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">RT / RW</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="rt" name="rt"
                                    value="<?=$school_profil->rt;?>" placeholder="RT">
                            </div>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="rw" name="rw"
                                    value="<?=$school_profil->rw;?>" placeholder="RW">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="<?=$school_profil->alamat;?>" placeholder="Alamat">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-4 control-label">Kodepos / Lintang / Bujur</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kodepos" name="kodepos"
                                    value="<?=$school_profil->kodepos;?>" placeholder="Kodepos">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="lintang" name="lintang"
                                    value="<?=$school_profil->lintang;?>" placeholder="Lintang">
                            </div>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" id="bujur" name="bujur"
                                    value="<?=$school_profil->bujur;?>" placeholder="Bujur">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-sm btn-success btn-flat pull-right"><i class="fa fa-save"></i>
                    Simpan Profil</button>
            </div>
        </form>
    </div>
    <!-- /.box -->

</section>
<!-- /.content -->