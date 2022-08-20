<script>
function printContent(el) {
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Cetak Raport
    </h1>
    <?php if(__session('access')=='super_user'):?>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Cetak Raport</li>
    </ol>
    <?php endif;?>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <form action="<?=base_url('raport/cetak_siswa/').__session('username');?>" method="post">
            <div class="box-header">
                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Tahun Pelajaran<span class="text-red">*</span></label>
                            <select class="form-control select2" style="width: 100%;" name="idtahun_akademik">
                                <?php foreach(list_academic_year() as $row):?>
                                <option value="<?=$row->idtahun_akademik;?>"><?=$row->tahun_akademik;?>
                                </option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>Semester<span class="text-red">*</span></label>
                            <select class="form-control select2" style="width: 100%;" name="semester" required>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 text-center" style="padding-top:25px;">
                        <button type="submit" class="btn btn-success btn-flat btn-sm" formtarget="_blank"><i
                                class="fa fa-print"></i> Cetak Raport</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>