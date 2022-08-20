<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Nilai
    </h1>
    <?php if(__session('access')=='super_user'):?>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Nilai</li>
    </ol>
    <?php endif;?>
</section>

<!-- Main content -->
<section class="content">
    <?php if(__session('access')=='super_user'):?>
    <div class="row">
        <?php foreach ($class as $row) :?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?=base_url('nilai/input/').$row->kelas_kd.'/'.$row->mapel_kd;?>">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-building"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-number"><?=$row->mapel_nama;?></span>
                    <span class="info-box-text"><?=$row->kelas_kd.' - '.$row->kelas_nama;?></span>
                    <span class="info-box-text"><?=$row->nama;?></span>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <?php endif;?>
    <?php if(__session('access')=='guru'):?>
    <div class="row">
        <?php foreach (list_mapel_by_guru(_active_years()->idtahun_akademik,_active_years()->semester,__session('username')) as $row) :?>
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="<?=base_url('nilai/input/').$row->kelas_kd.'/'.$row->mapel_kd;?>">
                    <span class="info-box-icon bg-green"><i class="fa fa-building"></i></span>
                </a>
                <div class="info-box-content">
                    <span class="info-box-number"><?=$row->mapel_nama;?></span>
                    <span class="info-box-text"><?=$row->kelas_kd.' - '.$row->kelas_nama;?></span>
                </div>
            </div>
        </div>
        <?php endforeach;?>
    </div>
    <?php endif;?>
</section>