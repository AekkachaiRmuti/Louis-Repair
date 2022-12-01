<div class="wrapper">

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Stock</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                            <li class="breadcrumb-item active">Stock</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 container">

                            <div class="card-header">
                                <h3>จัดการสต็อก </h3>
                                <button type="button" class="btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เพิ่มอุปกรณ์</button></h4>
                            </div>
                            <div class="card-body">
                                <form method="POST">

                                    <div class="form-group row">
                                        <!-- <label for="inputPassword3" class="col-sm-3 col-form-label">Department</label> -->
                                        <div class="card">
                                            <div class="card-body">
                                                <table id="example" class="display nowrap" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ลำดับ</th>

                                                            <th>ประเภท</th>
                                                            <th>รายการ</th>
                                                            <th>จำนวน</th>
                                                            <th>เบิก</th>
                                                            <th>คงเหลือ</th>
                                                            <th>จัดการ</th>
                                                           
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        $sql_pr = "SELECT * FROM tbl_stock";
                                                        $qr_pr = mysqli_query($conn, $sql_pr);
                                                        while ($rs_pr = mysqli_fetch_array($qr_pr)) {
                                                            @$total_qty += $rs_pr['stk_qty'];
                                                            @$total_withdraw += $rs_pr['stk_withdraw'];
                                                            @$total_balance += $rs_pr['stk_balance'];
                                                        ?>
                                                            <tr>
                                                                <td><?= $i ?></td>

                                                                <td><?= $rs_pr['stk_type'] ?></td>
                                                                <td><a href="?page=stock_detail&stk_id=<?= $rs_pr["stk_id"] ?>"><?= $rs_pr["stk_list"] ?></a></td>


                                                                <td style="text-align: center;"><?= $rs_pr['stk_qty'] ?>
                                                                    <!-- <div style="display: none;"><?= $rs_pr['stk_qty'] ?></div><input style="width:60px ;" class="form-control" type="number" id="" value="<?= $rs_pr['stk_qty'] ?>" name="qty<?= $i ?>" </td> -->
                                                                <td style="text-align: center;"><?= $rs_pr['stk_withdraw'] ?>
                                                                    <!-- <div style="display: none;"><?= $rs_pr['stk_withdraw'] ?></div><input style=" width:60px ;" class="form-control" type="number" id="stk_withdraw" value="<?= $rs_pr['stk_withdraw'] ?>" name="withdraw<?= $i ?>" disabled> -->
                                                                </td>
                                                                <td style="text-align: center;"><?= $rs_pr['stk_balance'] ?></td>
                                                                <td>
                                                                    <div style="display: none;"><input type="text" value="<?= $i ?>" name="total">
                                                                        <input type="text" value="<?= $rs_pr['stk_id'] ?>" name="key<?= $i ?>">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-outline-danger btn-sm" name="del_pr<?= $i ?>" >ลบ</button>


                                                                </td>
                                                                <!-- <td>
                                                                    <button type="submit" class="btn btn-outline-primary btn-sm" name="btn_save<?= $i ?>">บันทึก</button>
                                                                </td> -->
                                                            </tr>

                                                        <?php
                                                            $i++;
                                                        }

                                                        ?>
                                                        <tr>

                                                           
                                                            <td></td>
                                                            
                                                            <td style="text-align: center;" colspan="2"><b>รวม</b></td>
                                                            <td style="text-align: center;"><b><?= $total_qty ?></b></td>
                                                            <td style="text-align: center;"><b><?= $total_withdraw ?></b></td>
                                                            <td style="text-align: center;"><b><?= $total_balance ?></b></td>
                                                            
                                                            <td></td>
                                                            <td></td>
                                                            

                                                        </tr>


                                                    </tbody>

                                                </table>

                                            </div>


                                        </div>
                                    </div>

                                    <br>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
@$total = $_POST['total'];
for ($i = 1; $i <= $total; $i++) {
    if (isset($_POST["del_pr$i"])) {
        $key = $_POST["key$i"];
        // $ip = $_POST["ip$k"];

        $sql_UPip = "DELETE FROM tbl_stock where stk_id='$key'";

        $qr_Upip = mysqli_query($conn, $sql_UPip);

        if ($qr_Upip) {
            echo "<script>swal({
                                                title: 'ลบอุปกรณ์สำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                           				//  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: 'success', //success, warning, danger
                                                timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function(){
                                                window.location.href ='index.php?page=stock'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                })</script>";
        }
    }
    if (isset($_POST["btn_save$i"])) {
        $key = $_POST["key$i"];

        $qty = $_POST["qty$i"];
        $withdraw = $_POST["withdraw$i"];
        $balance =  $qty - $withdraw;

        // , stk_withdraw = '$withdraw'
        $sql_save = "UPDATE tbl_stock SET  stk_balance ='$balance' where stk_id = '$key'";

        $qr_save = mysqli_query($conn, $sql_save);

        if ($qr_save) {
            echo "<script>swal({
                                                title: 'บันทึกเรียบร้อย!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                           				//  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                type: 'success', //success, warning, danger
                                                timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                            }, function(){
                                                window.location.href ='index.php?page=stock'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                })</script>";
        }
    }
}

?>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มอุปกรณ์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ประเภท:</label>
                        <input type="text" class="form-control" id="recipient-name" name="stk_type">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">รายการ:</label>
                        <input type="text" class="form-control" id="recipient-name" name="stk_list">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">จำนวน:</label>
                        <input type="text" class="form-control" id="recipient-name" name="stk_qty">
                    </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-outline-primary">Save</button>
            </div>
            </form>

            <?php

            if (isset($_POST['add'])) {
                $stk_type = $_POST['stk_type'];
                $stk_list = $_POST['stk_list'];
                $stk_qty = $_POST['stk_qty'];


                $sql_user_ups = "INSERT INTO tbl_stock (stk_type, stk_list, stk_qty, stk_date, stk_balance) VALUES ('$stk_type','$stk_list','$stk_qty',now(),'$stk_qty')";
                $qr_user = mysqli_query($conn, $sql_user_ups);

                if ($qr_user) {
                    echo "<script>swal({
                        title: 'เพิ่มอุปกรณ์สำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                   //  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                        type: 'success', //success, warning, danger
                        timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                        showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                    }, function(){
                        window.location.href ='index.php?page=stock'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
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


    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })
</script>