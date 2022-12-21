<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>หน้าแรก</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>

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
                                <div class="row">
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-info">
                                            <div class="inner">
                                                <?php
                                                $sql_re = "SELECT COUNT(rp_status) AS ccount, sts_name FROM `tbl_repair`
 LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_status = '1'";
                                                $qr_re = mysqli_query($conn, $sql_re);
                                                $rs_re = mysqli_fetch_assoc($qr_re);
                                                ?>

                                                <h3><?= $rs_re["ccount"]?></h3>
                                                <h4>แจ้งซ่อม</h4>
                                            </div>
                                            <div class="icon">
                                                <!-- https://themeon.net/nifty/v2.9/icons-ionicons.html? -->
                                                <i class="ion ion-settings"></i>
                                                <!-- <i class="ion ion-bag"></i> -->
                                            </div>
                                            <a href="index.php?page=inventory" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-success">
                                            <div class="inner">
                                                <?php
                                                $sql_re1 = "SELECT COUNT(rp_status) AS ccount, sts_name FROM `tbl_repair`
 LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_status = '2'";
                                                $qr_re1 = mysqli_query($conn, $sql_re1);
                                                $rs_re1 = mysqli_fetch_assoc($qr_re1);
                                                ?>

                                                <h3><?= $rs_re1["ccount"] ?></h3>
                                                <h4>รอดำเนินการ</h4>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-checkmark-circled"></i>
                                            </div>
                                            <a href="index.php?page=inventory&repair=equipment" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-primary">
                                            <div class="inner">
                                                <?php
                                                $sql_re2 = "SELECT COUNT(rp_status) AS ccount, sts_name FROM `tbl_repair`
 LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_status = '3'";
                                                $qr_re2 = mysqli_query($conn, $sql_re2);
                                                $rs_re2 = mysqli_fetch_assoc($qr_re2);
                                                ?>

                                                <h3><?= $rs_re2["ccount"] ?></h3>
                                                <h4>กำลังดำเนินการ</h4>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-clipboard"></i>
                                            </div>
                                            <a href="index.php?page=inventory&repair=equipment" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>

                                    <!-- ./col -->
                                    <div class="col-lg-3 col-6">
                                        <!-- small box -->
                                        <div class="small-box bg-danger">
                                            <div class="inner">
                                                <?php
                                                $sql_re3 = "SELECT COUNT(rp_status) AS ccount, sts_name FROM `tbl_repair`
 LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_status = '4'";
                                                $qr_re3 = mysqli_query($conn, $sql_re3);
                                                $rs_re3 = mysqli_fetch_assoc($qr_re3);
                                                ?>

                                                <h3><?= $rs_re3["ccount"] ?></h3>
                                                <h4>สำเร็จ</h4>
                                            </div>
                                            <div class="icon">
                                                <i class="ion ion-medkit"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                        </div>
                                    </div>
                                    <!-- ./col -->

                                    <!-- ./col -->
                                    <h3>สรุปข้อมูลงานซ่อม วันที่ <?= date("Y-m-d", strtotime("first day of this month")); ?> ถึง <?= date("Y-m-d"); ?></h3>
                                    <!-- <div class="col-6 col-lg-6 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <p>สถานะงานซ่อม แยกตาม ผู้ดำเนินการ</p>
                                            </div>
                                            <div class="card-body">
                                                <table style="width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>ผู้ดำเนินการ</th>
                                                            <th>แจ้งซ่อม</th>
                                                            <th>รอตรวจสอบ</th>
                                                            <th>ดำเนินการ</th>
                                                            <th>ส่งซ่อม/เคลม</th>
                                                            <th>สำเร็จ</th>
                                                            <th>ยกเลิก</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Aekkachai Nameicha</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                            <td>0</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <p>สรุปสถานะงานซ่อม</p>
                                            </div>
                                            <div class="card-body">
                                                <?php

                                                $sql_rp = "SELECT COUNT(rp_status) as rp_total, sts_name FROM `tbl_status`
LEFT OUTER JOIN tbl_repair on tbl_status.sts_id = tbl_repair.rp_status GROUP BY rp_status";
                                                $qr_rp = mysqli_query($conn, $sql_rp);
                                                $dataPoints = array();
                                                while ($rs_rp = mysqli_fetch_array($qr_rp)) {
                                                    array_push($dataPoints, array("label" => $rs_rp['sts_name'], "y" => $rs_rp['rp_total']));
                                                }

                                                $sql_type = "SELECT COUNT(rp_job) as count_type, type_name FROM `tbl_typework_repair` LEFT OUTER JOIN tbl_repair on tbl_typework_repair.type_id = tbl_repair.rp_type_repair GROUP by tbl_typework_repair.type_name;";
                                                $qr_type = mysqli_query($conn, $sql_type);
                                                $dataPoints1 = array();
                                                while ($rs_type = mysqli_fetch_array($qr_type)) {
                                                    array_push($dataPoints1,array("y" => $rs_type['count_type'], "label" => $rs_type['type_name']));
                                                    
                                                }
                                               
                                                $sql_donut = "SELECT COUNT(rp_job) as count_cate , cate_name , SUBSTRING(cate_name,22,30) as sub_txt FROM `tbl_category` LEFT OUTER JOIN tbl_repair on tbl_category.cate_id = tbl_repair.rp_name_inventory GROUP BY tbl_category.cate_name;";
                                                $qr_donut = mysqli_query($conn, $sql_donut);
                                                $donut = array();
                                                while ($rs_donut = mysqli_fetch_array($qr_donut)) {
                                                   
                                                    array_push($donut,array("y" => $rs_donut['count_cate'], "label" => $rs_donut['sub_txt']));
                                                   
                                                }
                                               ?>
                                                <script>
                                                    window.onload = function() {

                                                        var chart = new CanvasJS.Chart("chartContainer", {
                                                            animationEnabled: true,
                                                            exportEnabled: true,
                                                            title: {
                                                                text: ""
                                                            },
                                                            subtitles: [{
                                                                text: ""
                                                            }],
                                                            data: [{
                                                                type: "pie",
                                                                showInLegend: "true",
                                                                legendText: "{label}",
                                                                indexLabelFontSize: 16,
                                                                indexLabel: "{label} - #percent%",
                                                                yValueFormatString: "#,##0 เครื่อง",
                                                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                                            }]
                                                        });
                                                        chart.render();

                                                        var chart_bar = new CanvasJS.Chart("barchart", {
                                                            animationEnabled: true,
                                                            theme: "light2",
                                                            title: {
                                                                // text: "Gold Reserves"
                                                            },
                                                            axisY: {
                                                                // title: "Gold Reserves (in tonnes)"
                                                            },
                                                            data: [{
                                                                type: "column",
                                                                yValueFormatString: "#,##0.## เครื่อง",
                                                                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                                                            }]
                                                        });
                                                        chart_bar.render();

                                                        var donut = new CanvasJS.Chart("chart_donut", {
                                                            animationEnabled: true,
                                                            theme: "light2",
                                                            title: {
                                                                // text: "Gold Reserves"
                                                            },
                                                            axisY: {
                                                                // title: "Gold Reserves (in tonnes)"
                                                            },
                                                            data: [{
                                                                type: "column",
                                                                yValueFormatString: "#,##0.## เครื่อง",
                                                                dataPoints: <?php echo json_encode($donut, JSON_NUMERIC_CHECK); ?>
                                                            }]
                                                        });
                                                        donut.render();

                                                    }
                                                </script>

                                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                                <script src="./chart/canvas.js"></script>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <p>สถิติการซ่อมตามประเภทงานซ่อม</p>
                                            </div>
                                            <div class="card-body">



                                                <div id="barchart" style="height: 370px; width: 100%;"></div>
                                                <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <p>สถิติการซ่อมแยกตามหมวดหมู่</p>
                                            </div>
                                            <div class="card-body">



                                                <div id="chart_donut" style="height: 370px; width: 100%;"></div>
                                                <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>

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