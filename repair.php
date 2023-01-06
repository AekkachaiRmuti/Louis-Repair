<style>
    .ala {
        margin: 200px;
        top: -170px;
    }
</style>
<?php
include './config/connect_db.php';
?>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>แจ้งซ่อม</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">แจ้งซ่อม</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="container-fluid">
                <div class="card card-default ">
                    <div class="">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-header">
                                <h3>แจ้งปัญหา / งานซ่อม</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-3 col-lg-4 col-md-6 col-sm-3">
                                            <div class="form-gruop">

                                                <label for="" class="control-label mt-3">ประเภทงานซ่อม</label>

                                                <select id="type" class="form-control" name="type_work">
                                                    <option value="">-เลือกประเภทงานซ่อม-</option>
                                                    <?php

                                                    $type_repair = "SELECT * FROM `tbl_typework_repair`";
                                                    $qr_type_repair = mysqli_query($conn, $type_repair);
                                                    while ($rs_type_repair = mysqli_fetch_array($qr_type_repair)) {
                                                    ?>
                                                        <option value="<?= $rs_type_repair["type_id"] ?>"><?= $rs_type_repair["type_name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>


                                                </select>
                                            </div>
                                        </div>
<!-- 
                                        <div class="col-3 col-lg-4 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="problem" class="control-label mt-3">ประเภทปัญหา</label>
                                                <input type="text" class="form-control" name="problem">
                                            </div>
                                        </div> -->

                                        <div class="col-3 col-lg-4 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="invt" class="control-label mt-3">ประเภทอุปกรณ์</label>
                                                <select id="" class="form-control" name="invt_name">
                                                    <option value="">-ประเภทอุปกรณ์-</option>
                                                    <?php
                                                    $sql_inventory = "SELECT * FROM `tbl_category`";
                                                    $qr_inventory = mysqli_query($conn, $sql_inventory);
                                                    while ($rs_inventory = mysqli_fetch_assoc($qr_inventory)) {
                                                    ?>
                                                        <option value="<?= $rs_inventory["cate_id"] ?>"><?= $rs_inventory["cate_name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-3 col-lg-4 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="invt" class="control-label mt-3">ยี่ห้อ/รุ่น/Serial No:</label>
                                                <input type="text" name="serial" class="form-control">
                                                
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="urgency" class="control-label mt-3">ความเร่งด่วน</label>
                                                <select id="" class="form-control" name="urgency">
                                                    <option value="">-ความเร่งด่วน-</option>
                                                    <?php
                                                    $sql_urgency = "SELECT * FROM `tbl_urgency`";
                                                    $qr_urgency = mysqli_query($conn, $sql_urgency);
                                                    while ($rs_urgancy = mysqli_fetch_assoc($qr_urgency)) {
                                                    ?>
                                                        <option value="<?= $rs_urgancy["ug_id"] ?>"><?= $rs_urgancy["ug_name"] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="urgency" class="control-label mt-3">สถานที่ติดตั้ง</label>
                                                <input type="text" name="location_setup" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-3 col-lg-4 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="problem_work" class="control-label mt-3">ปัญหา/งานซ่อม</label>
                                                <textarea id="" class="form-control" name="problem_work"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="pic" class="control-label mt-3">ไฟล์แนบ</label>
                                                <input type="file" class="form-control" name="fileupload" id="fileupload" accept="image/gif, image/jpeg, image/png">
                                            </div>
                                        </div>

                                        <div class="col-3 col-lg-4 col-md-6 col-sm-3 mt-4">
                                            <div class="form-gruop">
                                                <br>
                                                <button type="submit" class="btn btn-outline-primary btn-sm" id="btn_ok" name="btn_ok">แจ้งซ่อม</button>
                                            </div>

                                        </div>

                                        <div class="col-12 col-lg-12 col-md-12 col-sm-12 mt-5">
                                           <table class="table">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th>เลขที่แจ้ง</th>
                                                    <th>วันที่แจ้ง</th>
                                                    <th>ผู้แจ้ง</th>
                                                    <th>ยี่ห้อ/รุ่น/Serial No:</th>
                                                    <th>รายละเอียดปัญหา</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql_dt = "SELECT * FROM tbl_repair left outer join tbl_category on tbl_category.cate_id = tbl_repair.rp_name_inventory
                                                left outer join tbl_status on tbl_status.sts_id = tbl_repair.rp_status WHERE rp_user_key = '{$_SESSION['user_id']}'";
                                                $qr_dt = mysqli_query($conn, $sql_dt);
                                                while($rs_dt = mysqli_fetch_assoc($qr_dt)){
                                                    ?>
                                                    <tr>
                                                        <td><?= $rs_dt['rp_job']?></td>
                                                        <td><?= $rs_dt['rp_date_repair']  ."  ".$rs_dt['rp_time']?></td>
                                                        <td><?= $rs_dt['rp_name']?></td>
                                                        <td><?= $rs_dt['rp_serial']?></td>
                                                        <td><?= $rs_dt['rp_problem']?></td>
                                                        <td><?= $rs_dt['sts_name']?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                            </tbody>
                                           </table>

                                        </div>
                                    </div>
                                    <?php

                                    if (isset($_POST['btn_ok'])) {
                                        $type_work = $_POST['type_work'];
                                        $problem = $_POST['problem'];
                                        $invt = $_POST['invt_name'];
                                        $urgency = $_POST['urgency'];
                                        $problem_work = $_POST['problem_work'];
                                        $upload = basename($_FILES['fileupload']['name']);
                                        $date_create = date("Y-m-d");
                                        if ($upload <> '') {   //not select file
                                            //โฟลเดอร์ที่จะ upload file เข้าไป 
                                            $path = "img_inventory/";

                                            //เอาชื่อไฟล์ที่มีอักขระแปลกๆออก
                                            $remove_these = array(
                                                ' ', '`', '"', '\'', '\\', '/', '_', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0', 'a',
                                                'b',
                                                'c',
                                                'd',
                                                'h',
                                                'k',
                                                'l',
                                                'm',
                                                'o',
                                                'q',
                                                'r',
                                                's',
                                                't',
                                                'u',
                                                'v',
                                                'x',
                                                'y',
                                                'z', 'A',
                                                'B',
                                                'C',
                                                'D',
                                                'H',
                                                'K',
                                                'L',
                                                'M',
                                                'O',
                                                'Q',
                                                'R',
                                                'S',
                                                'T',
                                                'U',
                                                'V',
                                                'X',
                                                'Y',
                                                'Z',
                                            );
                                            $newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);

                                            //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
                                           
                                            $newname = $jod_id . basename($newname);
                                            $path_copy = $path . $newname;
                                            $path_link = $path . $newname;
                                             basename($newname);
                                            //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์

                                            move_uploaded_file($_FILES['fileupload']['tmp_name'], $path_copy);
                                        }
                                        $jod_id = 'CMS' . date("Ymd") . rand(0, 999);
                                            $path_link = $path . $newname;
                                        $datetime = date('H:m:s');
                                        // insert data into database LouisRepair
                                        $sql_repair = "INSERT INTO tbl_repair (`rp_job`,`rp_date_repair`,`rp_time`,`rp_name`,`rp_user_key`,`rp_position`,`rp_urgency`,`rp_type_repair`,`rp_name_inventory`,`rp_location_setup`,`rp_serial`,`rp_problem`,`rp_problem_success`,`rp_cause`,`rp_date_success`,`rp_date_next`,`rp_user_accept`,`rp_user_position`,`rp_status`,`rp_picture`,`rp_pic_success`,`rp_vote`)
                                                                        VALUES('$jod_id','$date_create','$datetime','{$_SESSION['user_name']}',{$_SESSION['user_id']},'{$_SESSION['user_position']}','$urgency','$type_work','$invt','{$_POST['location_setup']}','{$_POST['serial']}','$problem_work','','','','','','','1','$path_link','','')";
                                        $qr_repair = mysqli_query($conn, $sql_repair);
                                        if ($qr_repair) {                                      
                                                  echo "<script>swal({
                                                    title: 'แจ้งซ่อมสำเร็จ!',
                                                    // text: 'สำหรับ Administrator!',
                                                    icon: 'success',
                                                  }),setTimeout(() => {
                                                    window.location.href = 'index.php?page=repair';
                                                  }, 3000);</script>";
                                        }
                                    }

                                    ?>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>



<!-- Modal -->