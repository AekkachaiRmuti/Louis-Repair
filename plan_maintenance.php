<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>แผนบำรุงรักษา Preventive maintenance (PM)</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">แผนบำรุงรักษา</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-header">

                                <h3 class="card-title p-2"> <a href="index.php?page=plan_maintenance&pm=pm_plan" class="btn btn-danger">
                                        <i class="fa fa-area-chart" aria-hidden="true"></i>
                                        <p>วางแผนการบำรุงรักษา</p>
                                    </a></h3>
                                <h3 class="card-title p-2"> <a href="index.php?page=plan_maintenance&pm=pm_wait" class="btn btn-primary">
                                        <i class="fa fa-area-chart" aria-hidden="true"></i>
                                        <p>PM รอดำเนินการ</p>
                                    </a></h3>
                                <h3 class="card-title p-2"> <a href="index.php?page=plan_maintenance&pm=pm_calendar" class="btn btn-success">
                                        <i class="fa fa-server" aria-hidden="true"></i>
                                        <p>ปฎิทิน PM</p>
                                    </a></h3>
                                <h3 class="card-title p-2"> <a href="index.php?page=plan_maintenance&pm=pm_history" class="btn btn-success">
                                        <i class="fa fa-server" aria-hidden="true"></i>
                                        <p>ประวัติ PM</p>
                                    </a></h3>
                                <h3 class="card-title p-2"> <a href="index.php?page=plan_maintenance&pm=pm_setting" class="btn btn-success">
                                        <i class="fa fa-server" aria-hidden="true"></i>
                                        <p>ตั้งค่าประเภทการตรวจเช็ค</p>
                                    </a></h3>
                            </div>
                            <div class="card-body">
                                <?php
                                if ($_GET['pm']) {
                                    $pm = $_GET['pm'];
                                }
                                if (is_file($pm . ".php")) {
                                    include $pm . ".php";
                                }
                                ?>
                            </div>

                        </div>
                    </div>
                </div>
                <br>


            </div>
        </div>
    </div>
</div>
</div>
</div>

<!-- Modal -->