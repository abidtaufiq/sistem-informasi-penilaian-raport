<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Siswa Aktif
    </h1>
    <?php if(__session('access')=='super_user'):?>
    <ol class="breadcrumb">
        <li><a href="<?=base_url('dashboard');?>"><i class="fa fa-home"></i> Beranda</a></li>
        <li class="active">Siswa Aktif</li>
    </ol>
    <?php endif;?>
</section>

<!-- Main content -->
<section class="content">
    <div class="box box-primary">
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="5">NO</th>
                        <th>KELAS</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>NAMA LENGKAP</th>
                        <th>TTL</th>
                        <th>JK</th>
                        <th>ALAMAT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $n=1;
                    foreach ($students as $row) :?>
                    <tr>
                        <td><?=$n++.'.';?></td>
                        <td><?=$row->kelas_kd;?></td>
                        <td><?=$row->nis;?></td>
                        <td><?=$row->nisn;?></td>
                        <td><?=$row->nama;?></td>
                        <td><?=$row->tmp_lhr.', '.date('d M Y',strtotime($row->tgl_lhr));?></td>
                        <td><?=$row->jk=='L'?'Laki-Laki':'Perempuan';?></td>
                        <td><?=$row->alamat;?></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</section>