<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>UPS</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                            <li class="breadcrumb-item active">UPS</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="card">
            <div class="card-body">
                <div class="container">
                    <div class="row ">

                        <div class="col-sm-12 col-lg-12">
                            <h4 class="mb-3">ตารางการตรวจเช็คเครื่องสำรองไฟ สำนักงานใหญ่สาทร <?php echo $years = date('Y') ?> <button type="button" class="btn-sm btn-outline-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">เพิ่มผู้ใช้งาน</button></h4>
                            <small>(O) สถานะ ปกติ</small> || <small>(บ) สถานะ แบตเตอรี่เสื่อม</small> || <small>(ค) สถานะ เครื่องสำรองไฟเสีย</small> || <small>(ย) สถานะ ยกเลิกการใช้เครื่องสำรองไฟ</small>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row g-3">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>ลำดับ</th>
                                                <th>Detail</th>

                                                <th>ม.ค.</th>
                                                <th>ก.พ.</th>
                                                <th>มี.ค.</th>
                                                <th>เม.ย.</th>
                                                <th>พ.ค.</th>
                                                <th>มิ.ย.</th>
                                                <th>ก.ค.</th>
                                                <th>ส.ค.</th>
                                                <th>ก.ย.</th>
                                                <th>ต.ค.</th>
                                                <th>พ.ย.</th>
                                                <th>ธ.ค.</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $a = 1;
                                            $sql_select = "SELECT * FROM tbl_report_ups";
                                            $qr_se = mysqli_query($conn, $sql_select);
                                            while ($rs_se = mysqli_fetch_assoc($qr_se)) {



                                            ?>
                                                <tr>
                                                    <td><?= $a ?></td>
                                                    <td><small>รหัส: <?= $rs_se['ups_key'] ?></small>
                                                        <details><small> <br> สถานที่ตั้ง :<?= $rs_se['ups_location'] ?> <br> แผนก : <?= $rs_se['ups_dept'] ?> <br> ผู้ใช้งาน : <?= $rs_se['ups_user'] ?></small> <button type="submit" name="del<?= $a ?>" class="btn btn-outline-danger btn-sm">ลบ </button></details>
                                                    </td>

                                                    <td>

                                                        <input style="display:none;" type="text" class="form-control" name="tt" value="<?= $a ?>"><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px;" type="text" class="form-control" name="m1<?= $a ?>" value="<?= $rs_se['ups_m1'] ?>">
                                                    </td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; " type="text" class="form-control" name="m2<?= $a ?>" value="<?= $rs_se['ups_m2'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m3<?= $a ?>" value="<?= $rs_se['ups_m3'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m4<?= $a ?>" value="<?= $rs_se['ups_m4'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m5<?= $a ?>" value="<?= $rs_se['ups_m5'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m6<?= $a ?>" value="<?= $rs_se['ups_m6'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m7<?= $a ?>" value="<?= $rs_se['ups_m7'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m8<?= $a ?>" value="<?= $rs_se['ups_m8'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m9<?= $a ?>" value="<?= $rs_se['ups_m9'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m10<?= $a ?>" value="<?= $rs_se['ups_m10'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m_11<?= $a ?>" value="<?= $rs_se['ups_m11'] ?>"></td>
                                                    <td><input style="display:none;" type="text" class="form-control" name="id_k<?= $a ?>" value="<?= $rs_se['ups_id'] ?>"><input style="width: 40px; ;" type="text" class="form-control" name="m_12<?= $a ?>" value="<?= $rs_se['ups_m12'] ?>"></td>
                                                </tr>
                                            <?php
                                                $a++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                                    <button type="submit" name="save_ups" class="btn btn-outline-primary">บันทึก </button>


                            </form>

                            <?php
                            @$total = $_POST['tt'];
                            for ($a = 1; $a <= $total; $a++) {
                                $m1 = $_POST["m1$a"];
                                $m2 = $_POST["m2$a"];
                                $m3 = $_POST["m3$a"];
                                $m4 = $_POST["m4$a"];
                                $m5 = $_POST["m5$a"];
                                $m6 = $_POST["m6$a"];
                                $m7 = $_POST["m7$a"];
                                $m8 = $_POST["m8$a"];
                                $m9 = $_POST["m9$a"];
                                $m10 = $_POST["m10$a"];
                                $m_11 = $_POST["m_11$a"];
                                $m_12 = $_POST["m_12$a"];

                                $id_k = $_POST["id_k$a"];
                                if (isset($_POST['save_ups'])) {
                                    $sql_update = "UPDATE tbl_report_ups SET ups_m1 ='$m1', ups_m2 ='$m2',ups_m3 ='$m3',ups_m4 ='$m4',ups_m5 ='$m5',ups_m6 ='$m6',ups_m7 ='$m7',ups_m8 ='$m8',ups_m9 ='$m9',ups_m10 ='$m10',ups_m11 ='$m_11',ups_m12 ='$m_12' WHERE ups_id ='$id_k'";
                                    $qr_update = mysqli_query($conn, $sql_update);
                                    if ($qr_update) {
                                        echo "<script>swal({
                                            title: 'อัพเดทสำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                       //  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                            type: 'success', //success, warning, danger
                                            timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                            showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                        }, function(){
                                            window.location.href ='index.php?page=ups'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            })</script>";

                                        // echo "$id_k(ID)       $total(total)     คีย์เมื่อกี้.... $m_11   $m_12<br>  ";
                                    }
                                }

                                if (isset($_POST["del$a"])) {
                                    $sql_del = "DELETE FROM tbl_report_ups WHERE ups_id ='$id_k'";
                                    $qr_del = mysqli_query($conn, $sql_del);
                                    if ($qr_del) {
                                        echo "<script>swal({
                                            title: 'ลบผู้ใช้สำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                       //  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                            type: 'success', //success, warning, danger
                                            timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                            showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                        }, function(){
                                            window.location.href ='index.php?page=ups'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                            })</script>";

                                        // echo "$id_k(ID)       $total(total)     คีย์เมื่อกี้.... $m_11   $m_12<br>  ";
                                    }
                                }
                            }


                            ?>
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
                <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้งาน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">

                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">รหัส:</label>
                        <input type="text" class="form-control" id="recipient-name" name="key">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">สถานที่ตั้ง:</label>
                        <input type="text" class="form-control" id="recipient-name" name="location">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">แผนก:</label>
                        <input type="text" class="form-control" id="recipient-name" name="dept">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">ผู้ใช้งาน:</label>
                        <input type="text" class="form-control" id="recipient-name" name="user_add">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="add" class="btn btn-outline-primary">Save</button>
            </div>
            </form>

            <?php

            if (isset($_POST['add'])) {
                $key = $_POST['key'];
                $location = $_POST['location'];
                $dept = $_POST['dept'];
                $user_add = $_POST['user_add'];

                $sql_user_ups = "INSERT INTO tbl_report_ups (ups_key, ups_location, ups_dept, ups_user, ups_years) VALUES ('$key','$location','$dept','$user_add','$years')";
                $qr_user = mysqli_query($conn, $sql_user_ups);

                if ($qr_user) {
                    echo "<script>swal({
                        title: 'เพิ่มผู้ใช้งานสำเร็จ!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                   //  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                        type: 'success', //success, warning, danger
                        timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                        showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                    }, function(){
                        window.location.href ='index.php?page=ups'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                        })</script>";
                }
            }
            ?>
        </div>
    </div>
</div>
<script>
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