<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Tanggal Cetak
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li><a href="#">Konfigurasi</a></li>
        <li class="active">Tanggal Cetak</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <div class="box-body">
            <form action="<?=base_url('configuration/setTanggal');?>" method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tempat">Tempat Cetak<span class="text-red">*</span></label>
                            <input type="hidden" name="idtahun_akademik" value="<?=$date_print->idtahun_akademik;?>">
                            <input type="text" class="form-control" id="tempat" name="tempat"
                                value="<?=$date_print->tempat;?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tanggal Cetak<span class="text-red">*</span></label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right datepicker" name="tanggal"
                                    value="<?=$date_print->tanggal;?>">
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-flat btn-sm pull-right"><i class="fa fa-save"></i>
                    Simpan Perubahan</button>
            </form>
        </div>
    </div>
</section>