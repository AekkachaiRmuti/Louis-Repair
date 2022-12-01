<div class="wrapper">
    <?php
    include 'connect_db.php';
    ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>การจัดการอุปกรณ์ไอที</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
                            <li class="breadcrumb-item active">การจัดการอุปกรณ์ไอที</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">ยืมคอมพิวเตอร์พกพา (Notebook)</h3>

                        <!-- <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div> -->
                    </div>
                    <!-- /.card-header -->
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>ชื่อ-นามสกุล</label>
                                        <input class="form-control " style="width: 100%;" name="name">

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>วันที่ยืม</label>
                                        <input class="form-control " style="width: 100%;" type="date" name="date">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>ตำแหน่ง</label>
                                        <input class="form-control " style="width: 100%;" name="position">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>สังกัดแผนก/ฝ่าย</label>
                                        <input class="form-control " style="width: 100%;" name="dept">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>สาขา</label>
                                        <input class="form-control " style="width: 100%;" name="branch">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>เบอร์โทรศัพท์ส่วนตัว</label>
                                        <input class="form-control " style="width: 100%;" name="tel">

                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label>จำนวน</label>
                                        <input class="form-control" style="width: 100%;" type="number" name="qty">
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>วัตถุประสงค์ในการยืม</label>
                                        <input class="form-control " style="width: 100%;" name="description">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <b>รายลละเอียดเครื่องคอมพิวเตอร์พกพา</b>
                                        <table style="width:100% ;" class="table text-center">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>หมายเลขทรัพย์สิน</th>
                                                    <th>หมายเลขเครื่อง S/N</th>
                                                    <th>ยี่ห้อ/รุ่น/สี</th>
                                                    <th>ราคา</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td><input type="text" class="form-control" name="nb_number"></td>
                                                    <td><input type="text" class="form-control" name="nb_sn"></td>
                                                    <td><input type="text" class="form-control" name="nb_brand"></td>
                                                    <td><input type="text" class="form-control" name="nb_price"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- <a href="manage_pdf.php?id=sdsdc" target="_blank">Print To PDF</a> -->
                            <input type="submit" value="บันทึก" class="btn btn-primary" name="btn_save">
                            <!-- <h5>Custom Color Variants</h5> -->

                            <!-- /.row -->
                        </div>
                    </form>
                    <?php

                    if (isset($_POST['btn_save'])) {
                        $key_main = date("Ymd") . rand(0, 1000);
                        $name = $_POST['name'];
                        $date = $_POST['date'];
                        $position = $_POST['position'];
                        $dept = $_POST['dept'];
                        $branch = $_POST['branch'];
                        $tel = $_POST['tel'];
                        $qty = $_POST['qty'];
                        $description = $_POST['description'];
                        $nb_number = $_POST['nb_number'];
                        $nb_sn = $_POST['nb_sn'];
                        $nb_brand = $_POST['nb_brand'];
                        $nb_price = $_POST['nb_price'];

                        $sql_insert = "INSERT INTO tbl_equipment_borrow (ebr_name,ebr_date,ebr_position,ebr_dept,ebr_branch,ebr_tel,ebr_qty,ebr_desscript,ebr_key) VALUES
                        ('$name','$date','$position','$dept','$branch','$tel','$qty','$description','$key_main')";
                        $qr_insert = mysqli_query($conn, $sql_insert);
                        if ($qr_insert) {
                            $sql_insert2 = "INSERT INTO tbl_equipment_detail (edetail_borrow, edetail_no, edetail_pc, edetail_brand, edetail_price) VALUES
                            ('$key_main','$nb_number','$nb_sn','$nb_brand','$nb_price')";
                            $qr_insert2 = mysqli_query($conn, $sql_insert2);
                            if ($qr_insert2) {
                                echo "<script>swal({
                                    title: 'บันทึกสำเร็จ', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                               //  text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                    type: 'success', //success, warning, danger
                                    timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                    showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                }, function(){
                                    window.location.href ='?page=manage_it'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                    })</script>";
                            }
                        }
                    }
                    ?>
                    <!-- /.card-body -->
                    <div class="card-body">
                        <table class="table table-success table-striped" style="width:100% ;" id="example">
                            <thead>
                                <tr>
                                    <th>วันที่ยืม</th>
                                    <th>ชื่อ-สกุล</th>
                                    <th>ตำแหน่ง</th>
                                    <th>สาขา</th>
                                    <th>หมายเลขทรัพย์สิน</th>
                                    <th>ยี่ห้อ/รุ่น/สี</th>
                                    <th>Print to PDF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql_select ="SELECT * FROM `tbl_equipment_borrow` LEFT OUTER JOIN tbl_equipment_detail ON tbl_equipment_detail.edetail_borrow = tbl_equipment_borrow.ebr_key";
                                $qr_sqlect = mysqli_query($conn, $sql_select);
                                while(@$rs_data = mysqli_fetch_assoc($qr_sqlect)){
                                ?>
                                <tr>
                                    <td><?= $rs_data['ebr_date']?></td>
                                    <td><?= $rs_data['ebr_name']?></td>
                                    <td><?= $rs_data['ebr_position']?></td>
                                    <td><?= $rs_data['ebr_branch']?></td>
                                    <td><?= $rs_data['edetail_no']?></td>
                                    <td><?= $rs_data['edetail_brand']?></td>
                                    <td><a href="manage_pdf.php?id=<?= $rs_data['ebr_id']?>" target="_blank">PDF</a></td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
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