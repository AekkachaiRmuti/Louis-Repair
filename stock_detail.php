<?php
$date = date("Y-m-d h:i:sa");
$i = 1;
$id = $_GET['stk_id'];
$sql_pr = "SELECT * FROM tbl_stock WHERE stk_id ='$id'";
$qr_pr = mysqli_query($conn, $sql_pr);
$rs_stk = mysqli_fetch_assoc($qr_pr);
?>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail</h1><small> <?= $rs_stk['stk_list'] ?></small>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                            <li class="breadcrumb-item active">Detail </li>
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

                            <div class="col-12">
                                <div class="card-body">
                                    <table class="table-responsive" style="width:100%">

                                        <tbody>
                                            <tr>
                                                <td style="width:50%">ประเภท :</td>
                                                <td><?= $rs_stk['stk_type'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">รายการ :</td>
                                                <td><?= $rs_stk['stk_list'] ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">จำนวน :</td>
                                                <td><?= $rs_stk['stk_qty'] ?> ชิ้น</td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">เบิก :</td>
                                                <td><?= $rs_stk['stk_withdraw'] ?> ชิ้น</td>
                                            </tr>
                                            <tr>
                                                <td style="width:50%">คงเหลือ :</td>
                                                <td><?= $rs_stk['stk_balance'] ?> ชิ้น</td>
                                            </tr>
                                            <tr>
                                                <button type="button" class="btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เบิก</button></h4>&nbsp;&nbsp;&nbsp;
                                                <button type="button" class="btn-sm btn-outline-warning" data-toggle="modal" data-target="#exampleModa2" data-whatever="@mdo">อัพเดทจำนวน</button></h4>

                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>

                                    <table id="example" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>ลำดับ</th>

                                                <th>รายการ</th>
                                                <th>เบิกเมื่อ</th>
                                                <th>จำนวนที่เบิก</th>
                                                <th>รายละเอียดการเบิก</th>
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $sql_pr = "SELECT * FROM tbl_withdraw_stk WHERE wtd_stk = '$id'";
                                            $qr_pr = mysqli_query($conn, $sql_pr);
                                            while ($rs_pr = mysqli_fetch_array($qr_pr)) {

                                            ?>
                                                <tr>
                                                    <td><?= $i ?></td>

                                                    <td><?= $rs_pr['wtd_list'] ?></td>
                                                    <td><?= $rs_pr['wtd_date'] ?></td>
                                                    <td style="text-align: center;"><?= $rs_pr['wtd_withdraw'] ?></td>
                                                    <td><?= $rs_pr['wtd_detail'] ?></td>

                                                </tr>

                                            <?php
                                                $i++;
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">เบิก <?= $rs_stk['stk_type'] . $rs_stk['stk_list'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">คงเหลือ:</label>
                            <input type="text" class="form-control" id="recipient-name" name="balane" value="<?= $rs_stk['stk_balance'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">ใส่จำนวนที่ต้องการเบิก:</label>
                            <input type="text" class="form-control" id="recipient-name" name="wtd_amt">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">รายละเอียดการเบิก:</label>
                            <input type="text" class="form-control" id="recipient-name" name="wtd_detail">
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="wtd" class="btn btn-outline-primary">Withdraw</button>
                </div>
                </form>

                <?php

                if (isset($_POST['wtd'])) {
                    $balane = $_POST['balane'];
                    $wtd_amt = $_POST['wtd_amt'];

                    $wtd_balance =  $balane - $wtd_amt;

                    $sql_de = "INSERT INTO tbl_withdraw_stk (wtd_stk, wtd_type, wtd_list, wtd_user, wtd_date,wtd_balance,wtd_withdraw, wtd_detail) VALUES ('$id','{$rs_stk['stk_type']}','{$rs_stk['stk_list']}','{$_SESSION['user_user']}','$date','$wtd_balance','$wtd_amt','{$_POST['wtd_detail']}')";
                    $qr_user = mysqli_query($conn, $sql_de);

                    if ($qr_user) {
                        $fi_qty = $rs_stk['stk_withdraw'] + $wtd_amt;
                        $ba_ = $rs_stk['stk_balance'] - $wtd_amt;
                        $sql_update = "UPDATE tbl_stock SET  stk_withdraw = '$fi_qty', stk_balance = '$ba_' WHERE stk_id = '$id'";
                        $qr_user = mysqli_query($conn, $sql_update);
                        if ($qr_user) {
                            echo "<script>swal({
                        title: 'เบิกสำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                   //  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                        type: 'success', //success, warning, danger
                        timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                        showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                    }, function(){
                        window.location.href ='index.php?page=stock_detail&stk_id=$id'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                        })</script>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModa2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">อัพเดทจำนวน <?= $rs_stk['stk_type'] . $rs_stk['stk_list'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">จำนวน:</label>
                            <input type="text" class="form-control" id="recipient-name" name="balane_update">
                        </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="btn_update" class="btn btn-outline-primary">Update</button>
                </div>
                </form>

                <?php

                if (isset($_POST['btn_update'])) {
                    $bn_ = $_POST['balane_update'];
                    $sum_ = $bn_;


                    $sql_update = "UPDATE tbl_stock SET stk_qty = '$sum_', stk_balance = '$sum_' WHERE stk_id = '$id'";
                    $qr_user = mysqli_query($conn, $sql_update);
                    if ($qr_user) {
                        echo "<script>swal({
                        title: 'อัพเดทสำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                   //  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                        type: 'success', //success, warning, danger
                        timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                        showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                    }, function(){
                        window.location.href ='index.php?page=stock_detail&stk_id=$id'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                        })</script>";
                    }
                }

                ?>
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