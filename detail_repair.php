<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <?php
                        if ($_GET['sts'] == 1) {
                            $detail = "รายละเอียดการแจ้งซ่อม";
                        }
                        if ($_GET['sts'] == 2) {
                            $detail = "รายละเอียดรอดำเนินการ";
                        }
                        if ($_GET['sts'] == 3) {
                            $detail = "รายละเอียดกำลังดำเนินการ";
                        }
                        if ($_GET['sts'] == 4) {
                            $detail = "รายละเอียดสำเร็จ";
                        }
                        ?>
                        <h1><?= $detail ?></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href=""><?= $detail?></a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="row">
                        <div class="col-12">
                            <div class="card-body">
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
                                            $sql_rp = "SELECT * FROM `tbl_repair` LEFT OUTER JOIN tbl_urgency ON tbl_urgency.ug_id = tbl_repair.rp_urgency LEFT OUTER JOIN tbl_typework_repair ON tbl_typework_repair.type_id = tbl_repair.rp_type_repair LEFT OUTER JOIN tbl_category ON tbl_category.cate_id = tbl_repair.rp_name_inventory LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE tbl_status.sts_id ={$_GET['sts']}";
                                            $qr_rp = mysqli_query($conn, $sql_rp);
                                            while ($rs_rp = mysqli_fetch_assoc($qr_rp)) {
                                            ?>
                                                <tr>
                                                    <td><b>Job ID :</b> <?= $rs_rp["rp_job"] ?><br> <?= $rs_rp["rp_date_repair"] ?></td>
                                                    <td><b>ชื่อผู้แจ้ง :</b> <?= $rs_rp["rp_name"] ?> <br> <i>ไอที(IT)</i><br> <b>ความเร่งด่วน :</b> <?= $rs_rp["ug_name"] ?></td>
                                                    <td><b>ประเภทงานซ่อม :</b> <?= $rs_rp["type_name"] ?> <br> <b>ประเภทปัญหา :</b> <?= $rs_rp["rp_problem"] ?></td>
                                                    <td><b>ชื่ออุปกรณ์ : </b><?= $rs_rp["cate_name"] ?> <br> <b>ปัญหา/งานซ่อม : </b><?= $rs_rp["rp_problem"] ?></td>
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





<!-- Modal -->