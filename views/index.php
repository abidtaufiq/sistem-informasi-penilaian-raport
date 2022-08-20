<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Raport</title>
    <!-- Favicons -->
    <link rel="shortcut icon" type="image/png" href="assets/log.png"/>
    <link rel="icon" href="<?=base_url('uploads/')._school_profile()->logo;?>" type="image/x-icon" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSS CDN  -->
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?=base_url('assets/');?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="<?=base_url('assets/');?>bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?=base_url('assets/');?>dist/css/skins/_all-skins.min.css">

    <!-- JAVASCRIPT CDN  -->
    <!-- jQuery 3 -->
    <script src="<?=base_url('assets/');?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?=base_url('assets/');?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?=base_url('assets/');?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/');?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- bootstrap datepicker -->
    <script src="<?=base_url('assets/');?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <!-- Select2 -->
    <script src="<?=base_url('assets/');?>bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_url('assets/');?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?=base_url('assets/');?>bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/');?>dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_url('assets/');?>dist/js/demo.js"></script>
    <script>
    $(document).ready(function() {
        $('.select2').select2();
        $('.datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
        $('.datatable').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': false
        });
        // $('#check_all').on('click', function() {
        //     if (this.checked) {
        //         $('.check').each(function() {
        //             this.checked = true;
        //         });
        //     } else {
        //         $('.check').each(function() {
        //             this.checked = false;
        //         });
        //     }
        // });

        // $('.check').on('click', function() {
        //     if ($('.check:checked').length == $('.check').length) {
        //         $('#check_all').prop('checked', true);
        //     } else {
        //         $('#check_all').prop('checked', false);
        //     }
        // });
    })

    function change_pass(url, x) {
        $('#modal-password').modal('show');
        $('[name="url"]').val(url);
        $('[name="id"]').val(x);
    }
    </script>

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <?php $this->load->view('alert'); ?>
    <!-- Site wrapper -->
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?=base_url('assets/');?>index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>E</b>R</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>E</b>-Raport</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="hidden-xs"
                    style="color:white;font-size:12pt;width:auto;float:left;height:50px;line-height:50px;">
                    TAHUN PELAJARAN : <?=_active_years()->tahun_akademik.' / '._active_years()->semester;?>
                </div>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li data-toggle="tooltip" data-placement="bottom" title="Change Password">
                            <a href="#" data-toggle="modal"
                                onclick="change_pass('<?=uri_string();?>','<?=__session('id');?>')">
                                <i class="fa fa-key"></i> UBAH PASSWORD
                            </a>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu" style="background-color:red;">
                            <a href="<?=base_url('auth/logout');?>">
                                <i class="fa fa-power-off"></i>
                                <span class="hidden-xs">KELUAR</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=base_url('assets/');?>dist/img/avatar.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?=user(__session('id'))->user_fullname;?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <?php if(__session('access')=='super_user'):?>
                    <li <?=isset($dashboard)?'class="active"':'';?>>
                        <a href="<?=base_url('dashboard');?>">
                            <i class="fa fa-home"></i> <span>Beranda</span>
                        </a>
                    </li>
                    <li class="treeview <?=isset($configuration)?'active':'';?>">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>Konfigurasi</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?=isset($academic_year)?'class="active"':'';?>><a
                                    href="<?=base_url('configuration/academic_year');?>"><i
                                        class="fa fa-angle-double-right"></i> Tahun
                                    Pelajaran</a></li>
                            <li <?=isset($date_print)?'class="active"':'';?>><a
                                    href="<?=base_url('configuration/date_print');?>"><i
                                        class="fa fa-angle-double-right"></i> Tanggal Cetak</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview <?=isset($master)?'active':'';?>">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>Data Master</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?=isset($guru)?'class="active"':'';?>><a href="<?=site_url('master/guru');?>"><i
                                        class="fa fa-angle-double-right"></i>
                                    Guru</a></li>
                            <li <?=isset($siswa)?'class="active"':'';?>><a href="<?=site_url('master/siswa');?>"><i
                                        class="fa fa-angle-double-right"></i>
                                    Siswa</a></li>
                            <li <?=isset($kelas)?'class="active"':'';?>><a href="<?=site_url('master/kelas');?>"><i
                                        class="fa fa-angle-double-right"></i>
                                    Kelas</a></li>
                            <li <?=isset($mapel)?'class="active"':'';?>><a href="<?=site_url('master/mapel');?>"><i
                                        class="fa fa-angle-double-right"></i>
                                    Mata Pelajaran</a>
                            </li>
                            <li <?=isset($pengguna)?'class="active"':'';?>><a
                                    href="<?=site_url('master/pengguna');?>"><i class="fa fa-angle-double-right"></i>
                                    Pengguna</a></li>
                        </ul>
                    </li>
                    <li class="treeview <?=isset($setting)?'active':'';?>">
                        <a href="#">
                            <i class="fa fa-cog"></i>
                            <span>Pengaturan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li <?=isset($mengajar)?'class="active"':'';?>><a
                                    href="<?=site_url('setting/mengajar');?>"><i class="fa fa-angle-double-right"></i>
                                    Mengajar</a></li>
                            <li <?=isset($wali_kelas)?'class="active"':'';?>><a
                                    href="<?=base_url('setting/wali_kelas');?>"><i class="fa fa-angle-double-right"></i>
                                    Wali Kelas</a></li>
                            <li <?=isset($sett_kelas)?'class="active"':'';?>><a
                                    href="<?=base_url('setting/set_kelas');?>"><i class="fa fa-angle-double-right"></i>
                                    Rombongan Belajar</a></li>
                        </ul>
                    </li>
                    <?php endif;?>
                    <?php if(__session('access')=='super_user' || __session('access')=='guru'):?>
                    <li <?=isset($student)?'class="active"':'';?>>
                        <a href="<?=base_url('siswa');?>">
                            <i class="fa fa-users"></i> <span>Siswa Aktif</span>
                        </a>
                    </li>
                    <li <?=isset($nilai)?'class="active"':'';?>>
                        <a href="<?=base_url('nilai');?>">
                            <i class="fa fa-edit"></i> <span>Input Nilai</span>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(__session('access')=='super_user'):?>
                    <li <?=isset($report)?'class="active"':'';?>>
                        <a href="<?=base_url('raport');?>">
                            <i class="fa fa-print"></i> <span>Cetak Raport</span>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(__session('access')=='siswa'):?>
                    <li <?=isset($biodata)?'class="active"':'';?>>
                        <a href="<?=base_url('siswa/biodata');?>">
                            <i class="fa fa-edit"></i> <span>Biodata</span>
                        </a>
                    </li>
                    <li <?=isset($report_siswa)?'class="active"':'';?>>
                        <a href="<?=base_url('raport/siswa');?>">
                            <i class="fa fa-print"></i> <span>Raport</span>
                        </a>
                    </li>
                    <?php endif;?>
                    <?php if(__session('access')=='administrator'):?>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-wrench"></i> <span>Maintenance</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=base_url('maintenance/backup_database');?>"><i
                                        class="fa fa-angle-double-right"></i> Backup
                                    Database</a></li>
                            <li><a href="<?=base_url('maintenance/backup_apps');?>"><i
                                        class="fa fa-angle-double-right"></i> Backup
                                    Application</a>
                            </li>
                        </ul>
                    </li>
                    <?php endif;?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <?php $this->load->view($content);?>
        </div>
        <!-- /.content-wrapper -->

        <div class="modal fade" id="modal-password" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="<?=base_url();?>master/pengguna/change_password" method="post">
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
                                        <input type="hidden" name="id">
                                        <input type="hidden" name="url">
                                        <input type="password" class="form-control" id="user_password"
                                            name="user_password" placeholder="Ex: admin" min="3" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-flat btn-sm pull-left"
                                data-dismiss="modal"><i class="fa fa-remove"></i> Batal</button>
                            <button type="submit" class="btn btn-success btn-flat btn-sm"><i class="fa fa-save"></i>
                                Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Page rendered in <strong>{elapsed_time}</strong> seconds.
            </div> Copyright &copy; <?=date('Y');?> - Abid Taufiqur Rohman</a>
            
        </footer>
    </div>
    <!-- ./wrapper -->

</body>

</html>