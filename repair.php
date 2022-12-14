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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-header">
                                <h3>แจ้งปัญหา / งานซ่อม</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">

                                    <div class="">
                                        <div class="col-3 col-lg-12 col-md-6 col-sm-3">
                                            <div class="form-gruop">

                                                <label for="" class="control-label">ประเภทงานซ่อม</label>

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

                                        <div class="col-3 col-lg-12 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="problem" class="control-label">ประเภทปัญหา</label>
                                                <input type="text" class="form-control" name="problem">
                                            </div>
                                        </div>

                                        <div class="col-3 col-lg-12 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="invt" class="control-label">ชื่ออุปกรณ์</label>
                                                <select id="" class="form-control" name="invt_name">
                                                    <option value="">-ชื่ออุปกรณ์-</option>
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

                                        <div class="col-3 col-lg-12 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="urgency" class="control-label">ความเร่งด่วน</label>
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

                                        <div class="col-3 col-lg-12 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="problem_work" class="control-label">ปัญหา/งานซ่อม</label>
                                                <textarea id="" class="form-control" name="problem_work"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-3 col-lg-12 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <label for="pic" class="control-label">ไฟล์แนบ</label>
                                                <input type="file" class="form-control" name="fileupload" id="fileupload" accept="image/gif, image/jpeg, image/png">
                                            </div>
                                        </div>

                                        <div class="col-3 col-lg-12 col-md-6 col-sm-3">
                                            <div class="form-gruop">
                                                <br>
                                                <button type="submit" class="btn btn-primary" id="btn_ok" name="btn_ok">แจ้งซ่อม</button>
                                            </div>

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
                                            $jod_id = 'CMS' . date("Ymd") . rand(0, 999);
                                            $newname = $jod_id . basename($newname);
                                            $path_copy = $path . $newname;
                                            $path_link = $path . $newname;
                                            echo basename($newname);
                                            //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์

                                            move_uploaded_file($_FILES['fileupload']['tmp_name'], $path_copy);
                                        }
                                        // insert data into database LouisRepair
                                        $sql_repair = "INSERT INTO tbl_repair (`rp_job`,`rp_date_repair`,`rp_name`,`rp_user_key`,`rp_position`,`rp_urgency`,`rp_type_repair`,`rp_name_inventory`,`rp_problem`,`rp_problem_success`,`rp_cause`,`rp_date_success`,`rp_date_next`,`rp_user_accept`,`rp_user_position`,`rp_status`,`rp_picture`,`rp_pic_success`,`rp_vote`)
                                                                        VALUES('$jod_id','$date_create','{$_SESSION['user_name']}',{$_SESSION['user_id']},'{$_SESSION['user_position']}','$urgency','$type_work','$invt','$problem_work','','','','','','','1','$path_link','','')";
                                        $qr_repair = mysqli_query($conn, $sql_repair);
                                        if ($qr_repair) {
                                            echo "<script>swal({
                                                  title: 'แจ้งซ่อมสำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                          //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                  type: 'success', //success, warning, danger
                                                  timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                  showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                              }, function(){
                                                  window.location.href ='index.php?page=repair'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                  })</script>";
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