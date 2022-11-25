<?php
include './config/connect_db.php';
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>ตั้งค่าผู้ใช้งาน</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">ตั้งค่าผู้ใช้งาน</a></li>

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
                                <b>เพิ่มผู้ใช้งาน</b>
                            </div>
                            <div class="card-body">
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12">
                                            <label for="" class="label-control">Full Name</label>
                                            <input type="text" name="fullname" class="form-control" placeholder="Full Name" required>
                                            <label for="" class="label-control">User Name</label>
                                            <input type="text" name="username" class="form-control" placeholder="User Name" required>
                                            <label for="" class="label-control">Password</label>
                                            <input type="password" name="pw" class="form-control" placeholder="Password" required>
                                            <label for="" class="label-control">User Level</label>
                                            <select name="us_level" id="" class="form-control" required>
                                                <option value="">-Select-</option>
                                                <?php
                                                $sql_level = "SELECT * FROM `tbl_user_level`";
                                                $qr_level = mysqli_query($conn, $sql_level);
                                                while ($rs_level = mysqli_fetch_array($qr_level)) {
                                                ?>
                                                    <option value="<?= $rs_level["level_id"] ?>"><?= $rs_level["level_name"] ?></option>
                                                <?php
                                                }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12">

                                            <label for="brn" class="label-control">Brance</label>
                                            <select name="brance" id="brance" class="form-control" onchange="get_brn()" required>
                                                <option value="">-Select-</option>
                                                <?php
                                                $sql_brn = "SELECT * FROM `tbl_brance`";
                                                $qr_brn = mysqli_query($conn, $sql_brn);
                                                while ($rs_brn = mysqli_fetch_array($qr_brn)) {
                                                ?>
                                                    <option value="<?= $rs_brn["brn_id"] ?>"><?= $rs_brn["brn_name"] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <label for="" class="label-control">Department</label>
                                            <select name="dept" id="dept" class="form-control" onchange="get_dept()" required>
                                                <option value="">-Select-</option>

                                            </select>

                                            <label for="" class="label-control">ตำแหน่ง</label>
                                            <select name="pst" id="pst" class="form-control" required>
                                                <option value="">-Select-</option>

                                            </select>
                                            <label for="" class="label-control" style="display: none ;">Save</label><br>
                                            <button class="btn btn-primary mt-2" type="submit" name="save_ac">Save</button>

                                            <script>
                                                function get_brn() {
                                                    let id_brance = document.getElementById("brance").value;
                                                    console.log(id_brance);

                                                    $.ajax({
                                                        url: 'ajax/ajax_data.php?brn=' + id_brance,
                                                        type: 'get',
                                                        success: function(result) {
                                                            $('#dept').html(result);
                                                            console.log("Get DATA Successfully");
                                                        }
                                                    });
                                                }

                                                function get_dept() {
                                                    // $(document).ready(function() {
                                                    // function get_brn() {
                                                    let id_dept = document.getElementById("dept").value;
                                                    console.log(id_dept);

                                                    $.ajax({
                                                        url: 'ajax/ajax_data.php?dept=' + id_dept,
                                                        type: 'get',
                                                        success: function(result) {
                                                            $('#pst').html(result);
                                                            console.log("Get DATA Successfully");
                                                        }
                                                    });
                                                }
                                            </script>
                                        </div>
                                        <?php
                                        if (isset($_POST['save_ac'])) {
                                            $sql_save_ac = "INSERT INTO tbl_user (`user_name`,`user_user`,`user_pw`,`user_key`,`user_level`,`user_brance`,`user_dept`,`user_position`)
                                            VALUES ('{$_POST['fullname']}','{$_POST['username']}','{$_POST['pw']}','1','{$_POST['us_level']}','{$_POST['brance']}','{$_POST['dept']}','{$_POST['pst']}')";
                                            $qr_save = mysqli_query($conn, $sql_save_ac);

                                            if ($qr_save) {
                                                echo "<script>swal({
                                                    title: 'เพิ่มผู้ใช้งานสำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                            //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                    type: 'success', //success, warning, danger
                                                    timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                    showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                                }, function(){
                                                    window.location.href ='index.php?page=account'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                    })</script>";
                                            }
                                        }
                                        ?>

                                        <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                                            <table id="example" class="display nowrap" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>ชื่อ-สกุล</th>
                                                        <th>ชื่อผู้ใช้</th>
                                                        <th>Password</th>
                                                        <th>สาขา</th>
                                                        <th>แผนก</th>
                                                        <th>ตำแหน่ง</th>
                                                        <th>Level</th>
                                                        <th>จัดการ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $i = 1;
                                                    $sql_ck = "SELECT * FROM `tbl_user` 
                                                LEFT OUTER JOIN tbl_user_level on tbl_user_level.level_id = tbl_user.user_level
                                                LEFT OUTER JOIN tbl_brance on tbl_brance.brn_id = tbl_user.user_brance
                                                LEFT OUTER JOIN tbl_department on tbl_department.dept_id = tbl_user.user_dept
                                                LEFT OUTER JOIN tbl_position on tbl_position.pst_id = tbl_user.user_position";
                                                    $qr_ck = mysqli_query($conn, $sql_ck);
                                                    while ($rs_acc = mysqli_fetch_assoc($qr_ck)) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $rs_acc["user_name"] ?></td>
                                                            <td><?= $rs_acc["user_user"] ?></td>
                                                            <td><input type="password" value="<?= $rs_acc["user_pw"] ?>" class="form-control"id="myInput<?=$i?>">
                                                                <input type="checkbox" onclick="myFunction<?=$i?>()">Show Password
                                                            </td>
                                                            <script>
                                                                function myFunction<?=$i?>() {
                                                                    var x = document.getElementById("myInput<?=$i?>");
                                                                    if (x.type === "password") {
                                                                        x.type = "text";
                                                                    } else {
                                                                        x.type = "password";
                                                                    }
                                                                }
                                                            </script>

                                                            <td><?= $rs_acc["brn_name"] ?></td>
                                                            <td><?= $rs_acc["dept_name"] ?></td>
                                                            <td><?= $rs_acc["pst_name"] ?></td>
                                                            <td><?= $rs_acc["level_name"] ?></td>
                                                            <td><a href="?page=account&del=<?= $rs_acc["user_id"]?>"class="btn btn-danger">ลบผู้ใช้</a></td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }

                                                    if($_GET['del']){
                                                        $sql_del = "DELETE FROM tbl_user WHERE user_id = '{$_GET['del']}'";
                                                        $qr_del =mysqli_query($conn, $sql_del);
                                                        if($qr_del){
                                                            echo "<script>swal({
                                                                title: 'ลบผู้ใช้งานสำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                        //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                                type: 'success', //success, warning, danger
                                                                timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                                            }, function(){
                                                                window.location.href ='index.php?page=account'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                                })</script>";
                                                        }
                                                    }
                                                    ?>

                                                </tbody>
                                            </table>

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
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    });
</script>



<!-- Modal -->