<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>แจ้งปัญหา / งานซ่อม</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">แจ้งปัญหา / งานซ่อม</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="container-fluid">
                <div class="card card-default ala">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <!-- <div class="card-header">
                                <td>

                                    แจ้งซ่อม
                                    <span class="badge bg-primary boder-right">100</span>
                                    รอตรวจสอบ
                                    <span class="badge bg-primary">100</span>
                                    ดำเนินการ
                                    <span class="badge bg-primary">100</span>
                                    ส่งซ่อม/เคลม
                                    <span class="badge bg-primary">100</span>
                                    รอประเมินความพึงพอใจ
                                    <span class="badge bg-primary">100</span>
                                </td>
                            </div> -->
                            <div class="card-body">
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    <?php
                                    if ($_SESSION['level_id'] == 3 or $_SESSION['level_id'] == 2) {
                                    ?>
                                        <table class="table" id="example">
                                            <thead>
                                                <tr>
                                                    <th>วันที่แจ้งซ่อม</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>ประเภทงานซ่อม</th>
                                                    <th>ปัญหา/งานซ่อม</th>
                                                    <th>ผู้ดำเนินการ</th>
                                                    <th>สถานะ</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql_vote = "SELECT * FROM `tbl_repair` LEFT OUTER JOIN tbl_urgency ON tbl_urgency.ug_id = tbl_repair.rp_urgency
                                         LEFT OUTER JOIN tbl_typework_repair ON tbl_typework_repair.type_id = tbl_repair.rp_type_repair 
                                         LEFT OUTER JOIN tbl_category ON tbl_category.cate_id = tbl_repair.rp_name_inventory 
                                         LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status 
                                        LEFT OUTER JOIN tbl_position ON tbl_position.pst_id = tbl_repair.rp_position 
                                        LEFT OUTER JOIN tbl_vote ON tbl_vote.vote_id = tbl_repair.rp_vote ";
                                                $qr_vote = mysqli_query($conn, $sql_vote);
                                                while ($rs_vote = mysqli_fetch_assoc($qr_vote)) {
                                                ?>
                                                    <tr>
                                                        <td><b>Job ID:</b> <?= $rs_vote["rp_job"] ?> <br><?= $rs_vote["rp_date_repair"] ?></td>
                                                        <td><?= $rs_vote["rp_name"] ?><br> <small><i>(<?= $rs_vote["pst_name"] ?>)</i></small><br><small> ความเร่งด่วน : <b><?= $rs_vote["ug_name"] ?></b></small></td>
                                                        <td>
                                                            <small><b>ประเภทงานซ่อม :</b></small>
                                                            <p><?= $rs_vote["type_name"] ?></p>
                                                            <small><b>ประเภทปัญหา :</b></small>
                                                            <p><?= $rs_vote["rp_problem"] ?></p>
                                                        </td>


                                                        <td>

                                                            <small><b>ชื่ออุปกรณ์ :</b></small>
                                                            <p><?= $rs_vote["cate_name"] ?></p>
                                                            <small><b>ปัญหา/งานซ่อม :</b></small>
                                                            <p><?= $rs_vote["rp_problem_success"] ?></p>


                                                        </td>
                                                        <td><i><?= $rs_vote["rp_user_accept"] ?></i></td>
                                                        <td>
                                                            <?php
                                                            if ($rs_vote["vote_id"] == '1') {
                                                            ?>

                                                                <p style="color: blue;"><b><small> <?= $rs_vote["vote_name"] ?></small></b></p>
                                                            <?php
                                                            }
                                                            if ($rs_vote["vote_id"] == '2') {
                                                                $dis = "disabled";
                                                                
                                                            ?>

                                                                <p style="color: green;"><b><small> <?= $rs_vote["vote_name"] ?></small></b></p>
                                                               
                                                            <?php
                                                            }
                                                            if ($rs_vote['sts_id'] == 1) {
                                                            ?>
                                                                <p style="color: green;"><b><small> อยู่ในระหว่างการแจ้งซ่อม</b></p>
                                                            <?php
                                                            }
                                                            if ($rs_vote['sts_id'] == 3) {
                                                            ?>
                                                                <p style="color: orange;"><b><small> กำลังดำเนินการ</b></p>
                                                            <?php
                                                            }
                                                            ?>

                                                        </td>
                                                        <td><a href="index.php?page=estimate&id=<?= $rs_vote["rp_job"] ?>&accept=<?= $rs_vote["rp_user_accept"] ?>&d1=<?= $rs_vote["rp_date_repair"] ?>&d2=<?= $rs_vote["rp_date_success"] ?>" class="btn btn-success <?= $dis ?>">ทำแบบประเมิน</a> </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    <?php
                                    } else {
                                    ?>
                                        <table class="table" id="example">
                                            <thead>
                                                <tr>
                                                    <th>วันที่แจ้งซ่อม</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>ประเภทงานซ่อม</th>
                                                    <th>ปัญหา/งานซ่อม</th>
                                                    <th>ผู้ดำเนินการ</th>
                                                    <th>สถานะ</th>
                                                    <th>#</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $sql_vote = "SELECT * FROM `tbl_repair` LEFT OUTER JOIN tbl_urgency ON tbl_urgency.ug_id = tbl_repair.rp_urgency
                                         LEFT OUTER JOIN tbl_typework_repair ON tbl_typework_repair.type_id = tbl_repair.rp_type_repair 
                                         LEFT OUTER JOIN tbl_category ON tbl_category.cate_id = tbl_repair.rp_name_inventory 
                                         LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status 
                                        LEFT OUTER JOIN tbl_position ON tbl_position.pst_id = tbl_repair.rp_position 
                                        LEFT OUTER JOIN tbl_vote ON tbl_vote.vote_id = tbl_repair.rp_vote 
                                        
                                         WHERE tbl_repair.rp_user_key ='{$_SESSION["user_id"]}' AND tbl_status.sts_id = '4';";
                                                $qr_vote = mysqli_query($conn, $sql_vote);
                                                while ($rs_vote = mysqli_fetch_assoc($qr_vote)) {
                                                ?>
                                                    <tr>
                                                        <td><b>Job ID:</b> <?= $rs_vote["rp_job"] ?> <br><?= $rs_vote["rp_date_repair"] ?></td>
                                                        <td><?= $rs_vote["rp_name"] ?><br> <small><i>(<?= $rs_vote["pst_name"] ?>)</i></small><br><small> ความเร่งด่วน : <b><?= $rs_vote["ug_name"] ?></b></small></td>
                                                        <td>
                                                            <small><b>ประเภทงานซ่อม :</b></small>
                                                            <p><?= $rs_vote["type_name"] ?></p>
                                                            <small><b>ประเภทปัญหา :</b></small>
                                                            <p><?= $rs_vote["rp_problem"] ?></p>
                                                        </td>


                                                        <td>

                                                            <small><b>ชื่ออุปกรณ์ :</b></small>
                                                            <p><?= $rs_vote["cate_name"] ?></p>
                                                            <small><b>ปัญหา/งานซ่อม :</b></small>
                                                            <p><?= $rs_vote["rp_problem_success"] ?></p>


                                                        </td>
                                                        <td><i><?= $rs_vote["rp_user_accept"] ?></i></td>
                                                        <td>
                                                            <?php
                                                            if ($rs_vote["vote_id"] == '1') {
                                                            ?>

                                                                <p style="color: blue;"><b><small> <?= $rs_vote["vote_name"] ?></small></b></p>
                                                            <?php
                                                            }
                                                            if ($rs_vote["vote_id"] == '2') {
                                                                $dis = "disabled";
                                                            ?>

                                                                <p style="color: green;"><b><small> <?= $rs_vote["vote_name"] ?></small></b></p>
                                                            <?php
                                                            }
                                                            ?>

                                                        </td>
                                                        <td><a href="index.php?page=estimate&id=<?= $rs_vote["rp_job"] ?>&accept=<?= $rs_vote["rp_user_accept"] ?>&d1=<?= $rs_vote["rp_date_repair"] ?>&d2=<?= $rs_vote["rp_date_success"] ?>" class="btn btn-success <?= $dis ?>">ทำแบบประเมิน</a></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    <?php
                                    }
                                    ?>
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