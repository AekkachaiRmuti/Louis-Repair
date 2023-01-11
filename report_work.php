<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>รายงานข้อมูลการทำงาน
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">รายงานข้อมูลการทำงาน</a></li>

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

                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <table class="table-striped table-bordered detail-view" id="example"" style=" width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">วันที่แจ้งซ่อม</th>
                                                        <th style="text-align: center;">ชื่อผู้แจ้ง</th>
                                                        <th style="text-align: center;">ประเภทงานซ่อม</th>
                                                        <th style="text-align: center;">ปัญหางานซ่อม</th>
                                                        <!-- <th>สาเหตุ/วิธีแก้ไข</th> -->
                                                        <th style="text-align: center;">ผู้ดำเนินการ</th>
                                                        <th style="text-align: center;">วันที่สำเร็จ</th>
                                                        <!-- <th>ค่าใช้จ่าย</th> -->
                                                        <th style="text-align: center;">สถานะ</th>
                                                        <th style="text-align: center;">พิมพ์</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $i = 1;
                                                    $sql_rp = "SELECT * FROM `tbl_repair` LEFT OUTER JOIN tbl_urgency ON tbl_urgency.ug_id = tbl_repair.rp_urgency LEFT OUTER JOIN tbl_typework_repair ON tbl_typework_repair.type_id = tbl_repair.rp_type_repair LEFT OUTER JOIN tbl_category ON tbl_category.cate_id = tbl_repair.rp_name_inventory LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status 
                                             LEFT OUTER JOIN tbl_position on tbl_position.pst_id = tbl_repair.rp_position
                                             WHERE tbl_status.sts_id = '4';";
                                                    $qr_rp = mysqli_query($conn, $sql_rp);

                                                    while ($rs_rp = mysqli_fetch_assoc($qr_rp)) {
                                                        $r_id = $rs_rp['rp_id'];
                                                        $r_job = $rs_rp['rp_job'];
                                                    ?>
                                                        <tr>
                                                            <td><small>No.<?= $rs_rp["rp_job"] ?></small><br> <?= $rs_rp["rp_date_repair"] ?></td>
                                                            <td><?= $rs_rp["rp_name"] ?><br><small><?= $rs_rp["pst_name"] ?></small></td>
                                                            <td><a href="index.php?page=report_work_detail&id=<?= $r_id ?>"><?= $rs_rp["type_name"] ?></a></td>
                                                            <td><?= $rs_rp["rp_problem"] ?>
                                                             
                                                            </td>
                                                            <!-- <td><?= $rs_rp["rp_problem_success"] ?></td> -->
                                                            <td><?= $rs_rp["rp_user_accept"] ?><br><small><?= $rs_rp["rp_user_position"] ?></small></td>
                                                            <td><?= $rs_rp["rp_date_success"] ?></td>
                                                            <?php

                                                            $total = "SELECT sum(exp_maintenance+exp_part+exp_invt+exp_vat) as sum_baht FROM `tbl_expenses` WHERE exp_repair = '$r_id'";
                                                            $qr_total = mysqli_query($conn, $total);
                                                            $rs_total = mysqli_fetch_assoc($qr_total);
                                                            ?>
                                                            <!-- <td style="text-align: center;"><?= number_format($rs_total["sum_baht"], 2) ?></td> -->
                                                            <td style="width: 10%;"><?= $rs_rp['sts_name'] ?><br> <small><a href="index.php?page=report_work&RE=<?= $r_id ?>&job=<?= $r_job ?>">Re-Repair</a></small></td>
                                                            <td><a href="print_pdf.php?id=<?= $r_id ?>" class="btn-outline-primary btn-sm" target="_blank">พิมพ์</a></td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                        <hr>
                                        <?php
                                        if (@!$_GET['d1']) {
                                            $ds = date("d-m-Y", strtotime("first day of this month"));
                                            $de = date("d-m-Y", strtotime("last day of this month"));
                                        } else {
                                            $ds = $_GET['d1'];
                                            $de = $_GET['d2'];
                                        }
                                        ?>
                                        <!-- <h3>สถิติการปฎิบัติงาน : <?= $ds ?> ถึง <?= $de  ?></h3> -->
                                        <div class="col-md-3 col-sm-12 col-3">

                                            <div class="form-group">

                                                <label for="">วันเริ่มต้น</label><input type="date" name="date_s" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12 col-3">
                                            <div class="form-group">

                                                <label for="">ถึง</label><input type="date" name="date_e" class="form-control">

                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-12 col-3">
                                            <div class="form-group">

                                                <label for="" style="color: red;">**คลิกปุ่มค้นหา</label><br>
                                                <button type="submit" name="btn_find" class="btn btn-success">ค้นหา</button>
                                                <?php
                                                if (isset($_POST['btn_find'])) {
                                                    echo "<script>window.location.href='index.php?page=report_work&d1={$_POST['date_s']}&d2={$_POST['date_e']}'</script>";
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <?php


                                        $sql_rp = "SELECT COUNT(rp_type_repair) as c_count, type_name FROM `tbl_typework_repair` 
                                        LEFT OUTER JOIN tbl_repair on tbl_typework_repair.type_id = tbl_repair.rp_type_repair
                                              WHERE rp_date_repair BETWEEN '$ds' and '$de'  and tbl_repair.rp_status ='4' GROUP BY rp_type_repair;";
                                        $qr_rp = mysqli_query($conn, $sql_rp);
                                        $dataPoints = array();
                                        while ($rs_rp = mysqli_fetch_array($qr_rp)) {
                                            array_push($dataPoints, array("label" => $rs_rp['type_name'], "y" => $rs_rp['c_count']));
                                        }

                                        if (isset($_GET['RE'])) {
                                            // 99 status 
                                            $date = date('Y-m-d');
                                            $time = date('H:m:s');
                                            $ids = "RE" . substr($_GET['job'], 3);

                                            $sql_into = "SELECT * FROM tbl_repair WHERE rp_id = {$_GET['RE']}";
                                            $qr_into = mysqli_query($conn, $sql_into);
                                            $rs_into = mysqli_fetch_assoc($qr_into);
                                            echo $rs_into['rp_job'];
                                            if ($qr_into) {
                                                $sql_insert = "INSERT INTO tbl_redata (`rd_id`,`rd_job`,`rd_date_repair`,`rd_time`,`rd_name`,`rd_user_key`,`rd_position`,
`rd_urgency`,`rd_type_repair`,`rd_name_inventory`,`rd_location_setup`,`rd_serial`,`rd_problem`,`rd_problem_success`,
`rd_cause`,`rd_date_success`,`rd_date_next`,`rd_user_accept`,`rd_user_position`,`rd_status`,`rd_picture`,`rd_pic_success`,`rd_vote`) 
VALUES ('{$rs_into['rp_id']}','{$rs_into['rp_job']}','{$rs_into['rp_date_repair']}','{$rs_into['rp_time']}','{$rs_into['rp_name']}', 
'{$rs_into['rp_user_key']}','{$rs_into['rp_position']}','{$rs_into['rp_urgency']}','{$rs_into['rp_type_repair']}',
'{$rs_into['rp_name_inventory']}','{$rs_into['rp_location_setup']}','{$rs_into['rp_serial']}','{$rs_into['rp_problem']}',
'{$rs_into['rp_problem_success']}', '{$rs_into['rp_cause']}','{$rs_into['rp_date_success']}','{$rs_into['rp_date_next']}','{$rs_into['rp_user_accept']}',
'{$rs_into['rp_user_position']}','{$rs_into['rp_status']}','{$rs_into['rp_picture']}','{$rs_into['rp_pic_success']}',
'{$rs_into['rp_vote']}')";
                                                $qr_insert = mysqli_query($conn, $sql_insert);
                                                if ($qr_insert) {
                                                    $sql_re = "UPDATE tbl_repair SET rp_job = '$ids',rp_problem_success = '',rp_cause = '',rp_date_success = '',rp_date_next = '',rp_user_accept = '',
    rp_user_position = '',rp_status = '1', rp_re_repair = '1' WHERE rp_id ={$_GET['RE']};";
                                                    $qr_re = mysqli_query($conn, $sql_re);
                                                    if ($qr_re) {
                                                        $sql_rr = "INSERT INTO tbl_re_repair (re_repair, re_date, re_time, re_user)
        VALUES ('{$_GET['RE']}','$date','$time','{$_SESSION['user_name']}')";
                                                        $qr_rr = mysqli_query($conn, $sql_rr);
                                                        if ($qr_rr) {
                                                            echo "<script>swal({
                title: 'Change STATUS TO RE-REPAIR',
                // text: 'สำหรับ Administrator!',
                icon: 'success',
              }),setTimeout(() => {
                window.location.href = 'index.php?page=rp_data';
              }, 3000);</script>";
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                        <script>
                                            window.onload = function() {


                                                var chart_bar = new CanvasJS.Chart("chartContainer", {
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
                                                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                                    }]
                                                });
                                                chart_bar.render();
                                            }
                                        </script>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                        </div>






                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                'excel', 'print'
            ]
        });
    });
</script>

<!-- Modal -->