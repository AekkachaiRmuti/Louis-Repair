<?php
include './config/connect_db.php';
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ข้อมูลงานซ่อม</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">ข้อมูลงานซ่อม</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <!-- <h3 class="card-title p-2"> <a href="index.php?page=add_repair" class="btn btn-danger">
                            <i class="fa fa-area-chart" aria-hidden="true"></i>
                            <p>แจ้งซ่อม</p>
                        </a></h3> -->
                    <div class="row">


                        <div class="col-lg-12 col-md-12 col-sm-12 p-3">

                            <b>สถานะงานที่ค้างอยู่ : </b>
                            <br>

                            <div class="row">
                                <div class="col-md-3 col-sm-6 col-12">

                                    <div class="info-box">
                                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">แจ้งซ่อม</span>
                                            <?php
                                            $sql_re = "SELECT COUNT(rp_status) AS ccount, sts_name FROM `tbl_repair`
                                            LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_status = '1'";
                                            $qr_re = mysqli_query($conn, $sql_re);
                                            $rs_re = mysqli_fetch_assoc($qr_re);
                                            ?>
                                    
                                            <span class="info-box-number"><?= $rs_re["ccount"] ?></span>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">รอดำเนินการ</span>
                                            <?php
                                                $sql_re1 = "SELECT COUNT(rp_status) AS ccount, sts_name FROM `tbl_repair`
 LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_status = '2'";
                                                $qr_re1 = mysqli_query($conn, $sql_re1);
                                                $rs_re1 = mysqli_fetch_assoc($qr_re1);
                                                ?>
                                            <span class="info-box-number"><?= $rs_re1["ccount"] ?></span>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">กำลังดำเนินการ</span>
                                            <?php
                                                $sql_re2 = "SELECT COUNT(rp_status) AS ccount, sts_name FROM `tbl_repair`
 LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_status = '3'";
                                                $qr_re2 = mysqli_query($conn, $sql_re2);
                                                $rs_re2 = mysqli_fetch_assoc($qr_re2);
                                                ?>
                                            <span class="info-box-number"><?= $rs_re2["ccount"] ?></span>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-3 col-sm-6 col-12">
                                    <div class="info-box">
                                        <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">สำเร็จ</span>
                                            <?php
                                                $sql_re3 = "SELECT COUNT(rp_status) AS ccount, sts_name FROM `tbl_repair`
 LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_status = '4'";
                                                $qr_re3 = mysqli_query($conn, $sql_re3);
                                                $rs_re3 = mysqli_fetch_assoc($qr_re3);
                                                ?>
                                            <span class="info-box-number"><?= $rs_re3["ccount"] ?></span>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-12">
                                    <table class="table table-striped table-bordered detail-view" id="example">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">วันที่แจ้งซ่อม</th>
                                                <th style="text-align: center;">ชื่อผู้แจ้ง</th>
                                                <th style="text-align: center;">ประเภทงานซ่อม</th>
                                                <th style="text-align: center;">ปัญหา/งานซ่อม</th>
                                                <th style="text-align: center;">สาเหตุ/วิธีแก้ไข</th>
                                                <th style="text-align: center;">ผู้ดำเนินการ</th>
                                                <th style="text-align: center;">สถานะ</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sql_rp = "SELECT * FROM `tbl_repair` LEFT OUTER JOIN tbl_urgency ON tbl_urgency.ug_id = tbl_repair.rp_urgency LEFT OUTER JOIN tbl_typework_repair ON tbl_typework_repair.type_id = tbl_repair.rp_type_repair LEFT OUTER JOIN tbl_category ON tbl_category.cate_id = tbl_repair.rp_name_inventory LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status;";
                                            $qr_rp = mysqli_query($conn, $sql_rp);
                                            while ($rs_rp = mysqli_fetch_assoc($qr_rp)) {
                                            ?>
                                                <tr>
                                                    <td><b>Job ID :</b> <?= $rs_rp["rp_job"] ?><br> <?= $rs_rp["rp_date_repair"] ?></td>
                                                    <td><b>ชื่อผู้แจ้ง :</b> <?= $rs_rp["rp_name"] ?> <br> <i>ไอที(IT)</i><br> <b>ความเร่งด่วน :</b> <?= $rs_rp["ug_name"] ?></td>
                                                    <td><b>ประเภทงานซ่อม :</b> <?= $rs_rp["type_name"] ?> <br> <b>สถานที่ติดตั้ง :</b> <?= $rs_rp["rp_location_setup"] ?></td>
                                                    <td><b>ชื่ออุปกรณ์ : </b><?= $rs_rp["rp_serial"] ?> <br> <b>ปัญหา/งานซ่อม : </b><?= $rs_rp["rp_problem"] ?></td>
                                                    <?php
                                                    if ($rs_rp["rp_cause"] !== '') {

                                                        echo "<td><b>สาเหตุ/วิธีแก้ไข :</b>{$rs_rp['rp_cause']} <br> <b>วันที่สำเร็จ : </b>{$rs_rp['rp_date_success']}</td>";
                                                    } else {

                                                        echo "<td style='color:red;'><i>ยังไม่มีผู้ดำเนินการ</i></td>";
                                                    }
                                                    if ($rs_rp["rp_user_accept"] !== '') {

                                                        echo " <td><b>ผู้ดำเนินการ : </b>{$rs_rp["rp_user_accept"]}<br> {$rs_rp["rp_user_position"]}</td>";
                                                    } else {

                                                        echo "<td style='color:red;'><i>ยังไม่มีผู้ดำเนินการ</i></td>";
                                                    }
                                                    ?>

                                                    <td style="text-align: center;"><?= $rs_rp["sts_name"] ?><br> <a href="index.php?page=add_repair&louis=<?= $rs_rp['rp_id'] ?>" class="btn btn-warning" aria-placeholder="ดำเนินการ"> <i class="fa fa-search" aria-hidden="true"></i></a></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
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