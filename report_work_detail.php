<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">Detail</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-body">
                              <table>
                              
                                <tr>
                                    <?php
                                    $sql = "SELECT * FROM `tbl_repair` LEFT OUTER JOIN tbl_urgency ON tbl_urgency.ug_id = tbl_repair.rp_urgency LEFT OUTER JOIN tbl_typework_repair ON tbl_typework_repair.type_id = tbl_repair.rp_type_repair LEFT OUTER JOIN tbl_category ON tbl_category.cate_id = tbl_repair.rp_name_inventory LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status 
                                    LEFT OUTER JOIN tbl_position on tbl_position.pst_id = tbl_repair.rp_position
                                    WHERE tbl_status.sts_id = '4' and rp_id = {$_GET['id']};";
                                    $qr_sql = mysqli_query($conn,$sql);
                                    $rs_sql = mysqli_fetch_assoc($qr_sql);
                                    ?>
                                    <td style="width: 30%;"><b>No.</b></td>
                                    <td>:</td>
                                    <td style="width: 60%; text-align:left"><?= $rs_sql["rp_job"]?></td>
                                </tr>
                                <tr>
                                    <td>วันที่แจ้งซ่อม</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_date_repair"]?></td>

                                </tr>
                                <tr>
                                    <td>ชื่อผู้แจ้ง</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_name"]?></td>

                                </tr>
                                <tr>
                                    <td>ปัญหาที่แจ้ง</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_problem"]?></td>

                                </tr>
                                <tr>
                                    <td>ปัญหางานซ่อม</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_problem_success"]?></td>

                                </tr>
                                <tr>
                                    <td>สาเหตุ/วิธีแก้ไข</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_cause"]?></td>

                                </tr>
                                <tr>
                                    <td>ความเร่งด่วน</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["ug_name"]?></td>

                                </tr>
                                <tr>
                                    <td>วันที่ดำเนินการ</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_date_next"]?></td>

                                </tr>
                                <tr>
                                    <td>ผู้ดำเนินการ</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_user_accept"]?></td>

                                </tr>
                                <tr>
                                    <td>วันที่ซ่อมเสร็จ</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_date_success"]?></td>

                                </tr>
                                <tr>
                                    <td>ประเภทงานซ่อม</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["type_name"]?></td>

                                </tr>
                                <tr>
                                    <td>ประเภทอุปกรณ์</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["cate_name"]?></td>

                                </tr>
                                <tr>
                                    <td>ยี้ห้อ/รุ่น/Serial No:</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_serial"]?></td>

                                </tr>
                                <tr>
                                    <td>สถานที่ติดตั้ง</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["rp_location_setup"]?></td>

                                </tr>
                                <tr>
                                    <td>สถานะ</td>
                                    <td>:</td>
                                    <td><?= $rs_sql["sts_name"]?></td>

                                </tr>
                              </table>

                             
                            </div>
                           
                        </div>
                        <div class="col-6">
                            <div class="card-body">
                                <u><p>ค่าใช้จ่าย</p></u>
                              <table>
                             
                              
                                <tr>
                                    <?php
                                    $sql1 = "SELECT * FROM `tbl_expenses` WHERE exp_repair = {$_GET['id']};";
                                    $qr_sql1 = mysqli_query($conn,$sql1);
                                    $rs_sql1 = mysqli_fetch_assoc($qr_sql1);
                                    ?>
                                    <td style="width: 30%;">ค่าซ่อม</td>
                                    <td style="width: 20%;"><?= number_format($rs_sql1["exp_maintenance"],2)?></td>
                                    <td style="width: 40%;">รายละเอียด</td>
                                    <td><?= $rs_sql1["exp_detail_maintenance"]?></td>
                                </tr>
                                <tr>
                                <td style="width: 30%;">ค่าอะไหล่</td>
                                    <td><?= number_format($rs_sql1["exp_part"],2)?></td>
                                    <td >รายละเอียด</td>
                                    <td><?= $rs_sql1["exp_detail_part"]?></td>
                                </tr>
                                <tr>
                                <td style="width: 30%;">ค่าอุปกรณ์</td>
                                    <td><?= number_format($rs_sql1["exp_invt"],2)?></td>
                                    <td >รายละเอียด</td>
                                    <td><?= $rs_sql1["exp_detail_invt"]?></td>
                                </tr>
                                <tr>
                                <td style="width: 30%;">Vat 7%</td>
                                    <td><?= number_format($rs_sql1["exp_vat"],2)?></td>
                                    <td >รายละเอียด</td>
                                    <td><?= $rs_sql1["exp_detail_vat"]?></td>
                                </tr>
                                <tr>
                                <td style="width: 30%;">รวม</td>
                                    <td><?= number_format($rs_sql1["exp_vat"]+$rs_sql1["exp_part"]+$rs_sql1["exp_maintenance"]+$rs_sql1["exp_invt"],2)?></td>
                                   
                                </tr>
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