<!DOCTYPE html>
<html lang="en">
<?php
$config['sess_expire_on_close'] = true;
date_default_timezone_set('Asia/Bangkok');
include 'connect_db.php';

session_start();





if ($_SESSION['user_name'] == '') {
    echo "<script> window.location.href ='login.php';</script>";
}

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Louis Adhesive</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100&family=Mitr:wght@200;400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">



    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <!-- <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css"> -->
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- Google Font: Source Sans Pro -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css"> -->
    <!-- daterange picker -->
    <!-- <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css"> -->
    <!-- iCheck for checkboxes and radio inputs -->
    <!-- <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
    <!-- Bootstrap Color Picker -->
    <!-- <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css"> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <!-- Select2 -->
    <!-- <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css"> -->
    <!-- <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"> -->
    <!-- Bootstrap4 Duallistbox -->
    <!-- <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css"> -->
    <!-- BS Stepper -->
    <!-- <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css"> -->
    <!-- dropzonejs -->
    <!-- <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css"> -->
    <!-- Theme style -->
    <!-- <link rel="stylesheet" href="../../dist/css/adminlte.min.css"> -->

    <script src="https://kit.fontawesome.com/12591b126c.js" crossorigin="anonymous"></script>

    <!-- sweet alert js & css -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/solid.css" integrity="sha384-Tv5i09RULyHKMwX0E8wJUqSOaXlyu3SQxORObAI08iUwIalMmN5L6AvlPX2LMoSE" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/fontawesome.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    
</head>
<style>
    /* * {
        font-family: 'Kanit', sans-serif;
        font-family: 'Mitr', sans-serif;
    } */
</style>

<body class="hold-transition sidebar-mini layout-fixed">
<!-- sweet alert https://sweetalert.js.org/guides/-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
//กำหนดเวลาที่สามารถอยู่ในระบบ
$sessionlifetime = 120; //กำหนดเป็นนาที
 
if(isset($_SESSION["settime"])){
	$seclogin = (time()-$_SESSION["settime"])/60;
	//หากไม่ได้ Active ในเวลาที่กำหนด
	if($seclogin>$sessionlifetime){
		echo "<script>swal({
            title: 'SESSION หมดเวลา!',
            text: 'กรุณาเข้าสู่ระบบใหม่อีกครั้ง!',
            icon: 'warning',
            //  buttons: true,
            //  dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                window.location.href='logout.php',
              swal('ออกจากระบบเรียบร้อย!', {
                icon: 'success',
              });
             } else {
               
              swal('คุณต้องการอยู่ในระบบต่อไป!');
            
             }
          });</script>";
		//  header("location:logout.php");
		exit;
	}else{
		$_SESSION["settime"] = time();
	}
}else{
	$_SESSION["settime"] = time();
}
?>

    <script src="./chart/canvas.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="?page=home" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="?page=file" class="nav-link">File</a>
                </li>
            </ul>

            </ul>

            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->

                <!-- Notifications Dropdown Menu -->

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li> -->
            </ul>
        </nav>


        <!-- Right navbar links -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php?page=home" class="brand-link">
                <img src="image_louis/11.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><b>Louis Repair</b></span>
                <!-- <small><?= @$seclogin?></small> -->
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="img/programmer.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="?page=home" class="d-block"><?= @$_SESSION['user_name'] ?> </a>
                        <a style="color:aliceblue"><?= @$_SESSION['pst_name'] ?></a><br>
                       
                    </div>
                </div>



                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                        <!-- https://fontawesome.com/v4/icons/ -->

<?php
if(@$_SESSION["level_id"] == 1){
    @$level1 = "style='display: none';";
}
if(@$_SESSION["level_id"] == 2){
    @$level2 = "disabled";
}

?>
                        <li class="nav-header">สำหรับคุณ</li>
                        <li class="nav-item">

                            <a href="index.php?page=home" class="nav-link">
                                <i class="fa fa-home nav-icon"></i>
                                <p>

                                    หน้าแรก

                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" <?=@$level1?>>

                            <a href="index.php?page=rp_data" class="nav-link">
                                <i class="fa fa-server nav-icon" aria-hidden="true"></i>
                                <p>

                                    ข้อมูลงานซ่อม

                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>
                        <!-- <li class="nav-item" <?=@$level1?>>

                            <a href="index.php?page=plan_maintenance&pm=pm_plan" class="nav-link">
                                <i class="fa fa-handshake-o nav-icon" aria-hidden="true"></i>
                                <p>

                                    แผนบำรุงรักษา

                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li> -->
                        <li class="nav-item" <?=@$level1?>>

                            <a href="index.php?page=inventory" class="nav-link">
                                <i class="fa fa-hdd-o nav-icon" aria-hidden="true"></i>
                                <p>

                                    อุปกรณ์

                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" <?=@$level1?>>

                            <a href="index.php?page=pm_report" class="nav-link">
                                <i class="fa fa-bar-chart nav-icon" aria-hidden="true"></i>
                                <p>

                                    รายงาน

                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>
                    <hr>    
                        <li class="nav-item">

                            <a href="index.php?page=repair" class="nav-link">
                                <i class="fa fa-bar-chart nav-icon" aria-hidden="true"></i>
                                <p>

                                    แจ้งซ่อม

                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">

                            <a href="index.php?page=data_repair" class="nav-link">
                                <i class="fa fa-bar-chart nav-icon" aria-hidden="true"></i>
                                <p>

                                    ประเมินงานซ่อม

                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" <?=@$level1?>>
                            <a href="#" class="nav-link">
                                <i class="fa fa-cogs nav-icon"></i>
                                <p>
                                    ตั้งค่าระบบแจ้งซ่อม
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?page=account" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ตั้งค่าบัญชีผู้ใช้ระบบ</p>
                                    </a>
                                </li>

                            </ul>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?page=setting_vote" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ตั้งค่าแบบประเมิน</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-laptop nav-icon"></i>
                                <p>
                                    จัดการอุปกรณ์ไอที (Sathon)
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="index.php?page=manage_it" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>ยืม-คืนอุปกรณ์</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=stock" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Stock</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="index.php?page=ups" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>UPS</p>
                                    </a>
                                </li>


                            </ul>
                        </li>






                        <hr>
                        <li class="nav-item">
                            <a href="logout.php" class="nav-link">
                                <i class="fa fa-sign-out nav-icon"></i>
                                <p> ออกจากระบบ</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>



        <?php

        if (isset($_GET['page'])) {

           @$page = $_GET['page'];
        }

        if (is_file(@$page . ".php"))

            include($page . ".php");

        ?>



        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="">


        <div class="float-right d-none d-sm-inline-block">
            All rights reserved.
            <strong>Copyright &copy; 2022 <a href="#">Louis IT</a>.</strong>
            <b>Version</b> 2.1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!-- <script src="dist/js/pages/dashboard.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


</body>

</html>