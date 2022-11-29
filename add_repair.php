<?php
include './config/connect_db.php';
$id = $_GET['louis'];


$sql_rp = "SELECT * FROM `tbl_repair` LEFT OUTER JOIN tbl_urgency ON tbl_urgency.ug_id = tbl_repair.rp_urgency LEFT OUTER JOIN tbl_typework_repair ON tbl_typework_repair.type_id = tbl_repair.rp_type_repair LEFT OUTER JOIN tbl_category ON tbl_category.cate_id = tbl_repair.rp_name_inventory LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status WHERE rp_id = '$id'";
$qr_rp = mysqli_query($conn, $sql_rp);
$rs_rp = mysqli_fetch_assoc($qr_rp);
?>
<style type="text/css">
    div.img-resize img {
        width: 300px;
        height: auto;
    }

    div.img-resize {
        width: 300px;
        height: 300px;
        overflow: hidden;
        text-align: center;
    }
</style>
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
                <div class="">

                    <div class="row">


                        <div class="col-lg-6 col-md-6 col-sm-12 p-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>ข้อมูลผู้แจ้ง</h4>
                                </div>
                                <div class="card-body">
                                    <label for="">วันที่แจ้งซ่อม</label><input type="text" class="form-control" value="<?= $rs_rp['rp_date_repair'] ?>" disabled>

                                    <label for="">ผู้แจ้ง</label><select name="" id="" class="form-control" disabled>
                                        <option value=""><?= $rs_rp['rp_name'] ?></option>
                                    </select>
                                    <br>
                                    <h3>ข้อมูลปัญหา</h3>
                                    <label for="">ประเภทงานซ่อม</label><input type="text" value="<?= $rs_rp['type_name'] ?>" class="form-control" disabled>
                                    <label for="">ประเภทปัญหา</label><input type="text" value="<?= $rs_rp['rp_problem'] ?>" class="form-control" disabled>
                                    <label for="">ชื่ออุปกรณ์</label><input type="text" value="<?= $rs_rp['cate_name'] ?>" class="form-control" disabled>
                                    <label for="">ความเร่งด่วน</label><input type="text" value="<?= $rs_rp['ug_name'] ?>" class="form-control" disabled>
                                    <label for="">ปัญหา/งานซ่อม</label>
                                    <input type="text" value="<?= $rs_rp['rp_problem'] ?>" class="form-control" disabled>
                                    <label for="">ไฟล์แนบ</label><br>
                                    <div class="img-resize">
                                        <img src="<?= $rs_rp['rp_picture'] ?>" alt="">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 p-3">
                            <div class="card">
                                <div class="card-header">
                                    <h4>ผู้ดำเนินการ</h4>
                                </div>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data">
                                        <label for="">วันที่ดำเนินการ</label><input type="date" class="form-control" value="<?= $rs_rp['rp_date_next'] ?>" name="date_next">

                                        <label for="">ผู้ดำเนินการ</label><select name="user_next" id="" class="form-control" disabled>
                                            <option value=""><?= $_SESSION['user_user'] ?></option>
                                        </select>
                                        <br>
                                        <h3>ผลการแก้ไข</h3>
                                        <label for="">วันที่สำเร็จ</label><input type="date" class="form-control" name="date_succuss" value="<?= $rs_rp['rp_date_success'] ?>">
                                        <label for="">สาเหตุ/วิธีแก้ไข</label><textarea name="method_edit" id="" class="form-control" ><?= $rs_rp['rp_cause'] ?></textarea>
                                        <label for="">ชื่ออุปกรณ์</label><input type="text" value="<?= $rs_rp['cate_name'] ?>"" name="name_inventory" class="form-control" disabled>
                                        <label for="">ความเร่งด่วน</label><input type="text" value="<?= $rs_rp['ug_name'] ?>"" name="fast" class="form-control" disabled>
                                        <label for="">ปัญหา/งานซ่อม</label>
                                        <textarea name="problem_work" class="form-control" ><?= $rs_rp['rp_problem_success'] ?></textarea>
                                        <label for="">ไฟล์แนบ</label><br>
                                        <input type="file" name="fileupload" id="fileupload" class="form-control" accept="image/gif, image/jpeg, image/png">
                                        <br>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            ค่าใช้จ่าย
                                        </button>
                                        <br>
                                        <?php
                                        $exp_sum = "SELECT `exp_maintenance`+`exp_part`+`exp_invt`+`exp_vat`as tolsum FROM tbl_expenses WHERE exp_repair = '$id'";
                                        $qr_sum = mysqli_query($conn, $exp_sum);
                                        $rs_sum = mysqli_fetch_object($qr_sum);
                                        ?>
                                        <label for="">ค่าใช้จ่าย</label>
                                        <input type="text" name="" value="<?= number_format($rs_sum->tolsum, 2) ?>" id="" class="form-control" disabled>
                                        <br>
                                        <div class="row col-12">
                                            <button type="submit" name="btn_add" class="btn btn-warning" style="width: 50%;">ดำเนินการ</button>


                                            <button type="submit" name="btn_success" class="btn btn-primary" style="width: 50%;">ซ่อมสำเร็จ</button>
                                        </div>

                                        <?php
                                        if (isset($_POST['btn_success'])) {
                                            $date_succuss = $_POST['date_succuss'];
                                            $method_edit = $_POST['method_edit'];
                                            $name_inventory = $_POST['name_inventory'];
                                            $fast = $_POST['fast'];
                                            $problem_work = $_POST['problem_work'];
                                            $upload = basename($_FILES['fileupload']['name']);
                                            if ($upload <> '') {   //not select file
                                                //โฟลเดอร์ที่จะ upload file เข้าไป 
                                                $path = "img_inventory/";
    
                                                //เอาชื่อไฟล์ที่มีอักขระแปลกๆออก
                                                $remove_these = array(
                                                    ' ', '`', '"', '\'', '\\', '/', '_', '1', '2', '3', '4', '5', '6', '7', '8', '9', '0',
                                                );
                                                $newname = str_replace($remove_these, '', $_FILES['fileupload']['name']);
    
                                                //ตั้งชื่อไฟล์ใหม่โดยเอาเวลาไว้หน้าชื่อไฟล์เดิม
                                                $jod_id = 'SUCCESS' . date("Ymd"). rand(0,99);
                                                $newname = $jod_id . basename($newname);
                                                $path_copy = $path . $newname;
                                                $path_link = $path . $newname;
                                                echo basename($newname);
                                                //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์
                                                
                                            move_uploaded_file($_FILES['fileupload']['tmp_name'], $path_copy);
    
                                                 
                                                }
                                                $sql_sc = "UPDATE tbl_repair SET `rp_date_success` ='$date_succuss',`rp_cause`='$method_edit', `rp_problem_success`='$problem_work',`rp_status`='4',`rp_pic_success`='$path_link'  ,rp_vote ='1' WHERE rp_id ='$id'";
                                            $qr_sc = mysqli_query($conn, $sql_sc);

                                            if($qr_sc){
                                              echo "<script>swal({
                                                  title: 'การซ่อมสำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                          //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                  type: 'success', //success, warning, danger
                                                  timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                  showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                              }, function(){
                                                  window.location.href ='index.php?page=rp_data'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                  })</script>";
                                            }
                                            }
                                            
                                        

                                        if (isset($_POST['btn_add'])) {
                                            $date_next = $_POST['date_next'];



                                            if ($date_next <> '') {
                                                // insert data into database LouisRepair
                                                $sql_repair = "UPDATE tbl_repair SET rp_date_success = 'กำลังดำเนินการ',rp_date_next='$date_next',rp_user_accept = '{$_SESSION['user_name']}',rp_cause='กำลังดำเนินการ',rp_status = '3',rp_user_position = '{$_SESSION['pst_name']}' WHERE rp_id ='$id'";
                                                $qr_repair = mysqli_query($conn, $sql_repair);

                                                if($qr_repair){
                                                   
                                                    echo "<script>swal({
                                                        title: 'ทำการดำเนินการ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                        type: 'success', //success, warning, danger
                                                        timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                        showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                                    }, function(){
                                                        window.location.href ='index.php?page=rp_data'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                        })</script>";
                                                }
                                            }
                                        }
                                        ?>
                                    </form>



                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">บันทึก ค่าใช้จ่าย</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST">
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align: center;">ประเภทค่าใช้จ่าย</th>
                                                                    <th style="text-align: center;">จำนวน</th>
                                                                    <th style="text-align: center;">รายละเอียด</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $sql_save = "SELECT * FROM `tbl_expenses` WHERE exp_repair='$id'";
                                                                $qr_save = mysqli_query($conn, $sql_save);
                                                                $rs_save = mysqli_fetch_array($qr_save);
                                                                echo $rs_save;
                                                                ?>
                                                                <tr>
                                                                    <td>ค่าซ่อม </td>
                                                                    <td><input type="text" name="exp_miantenance" value="<?= $rs_save["exp_maintenance"] ?>" id="" class="form-control" /></td>
                                                                    <td><input type="text" name="exp_miantenance_detail" value="<?= $rs_save["exp_detail_maintenance"] ?>" id="" class="form-control" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ค่าอะไหล่</td>
                                                                    <td><input type="text" name="exp_part" value="<?= $rs_save["exp_part"] ?>" id="" class="form-control" /></td>
                                                                    <td><input type="text" name="exp_part_detail" value="<?= $rs_save["exp_detail_part"] ?>" id="" class="form-control" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ค่าอุปกรณ์</td>
                                                                    <td><input type="text" name="exp_invt" value="<?= $rs_save["exp_invt"] ?>" id="" class="form-control" /></td>
                                                                    <td><input type="text" name="exp_invt_detail" value="<?= $rs_save["exp_detail_invt"] ?>" id="" class="form-control" /></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>VAT 7%</td>
                                                                    <td><input type="text" name="exp_vat" value="<?= $rs_save["exp_vat"] ?>" id="" class="form-control" /></td>
                                                                    <td><input type="text" name="exp_vat_detail" value="<?= $rs_save["exp_detail_vat"] ?>" id="" class="form-control" /></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    <button type="submit" class="btn btn-primary" name="save_exp">บันทึก</button>
                                                </div>
                                                <?php
                                                if (isset($_POST['save_exp'])) {
                                                    $sql_exp = "INSERT INTO tbl_expenses (`exp_maintenance`,`exp_detail_maintenance`,`exp_part`,`exp_detail_part`,`exp_invt`,`exp_detail_invt`,`exp_vat`,`exp_detail_vat`,`exp_repair`) 
                                                    VALUES ('{$_POST['exp_miantenance']}','{$_POST['exp_miantenance_detail']}','{$_POST['exp_part']}','{$_POST['exp_part_detail']}','{$_POST['exp_invt']}','{$_POST['exp_invt_detail']}','{$_POST['exp_vat']}','{$_POST['exp_vat_detail']}','$id')";
                                                    $qr_exp = mysqli_query($conn, $sql_exp);

                                                    if ($qr_exp) {
                                                        echo "<script>swal({
                                                            title: 'บันทึกค่าใช้จ่ายเรียบร้อย!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                    //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                            type: 'success', //success, warning, danger
                                                            timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                            showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                                        }, function(){
                                                            window.location.href ='index.php?page=add_repair&louis=$id'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
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