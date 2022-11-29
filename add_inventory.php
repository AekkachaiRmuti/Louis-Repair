<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>เพิ่มอุปกรณ์</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">เพิ่มอุปกรณ์</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <?php
        $i = 1;
        $sql_invt = "SELECT * FROM `tbl_add_inventory` LEFT OUTER JOIN tbl_category on tbl_category.cate_id = tbl_add_inventory.add_category WHERE add_id='{$_GET['id']}'";
        $qr_invt = mysqli_query($conn, $sql_invt);

        $rs_invt = mysqli_fetch_assoc($qr_invt);
        ?>
        <div class="container">
            <div class="container-fluid">
                <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">

                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <label for="">รูปภาพอุปกรณ์</label>
                                        <input name="fileupload" type="file" id="fileupload"><br>
                                        <div class="col-sm-12 col-lg-6">

                                            <label for="">รหัสอุปกรณ์</label>
                                            <input type="text" name="add_code" value="<?= $rs_invt['add_code'] ?>" class="form-control" required>
                                            <label for="">ซีเรียลนัมเบอร์</label>
                                            <input type="text" name="add_serail" value="<?= $rs_invt['add_serail'] ?>" class="form-control">

                                            <label for="">หมวดหมู่อุปกรณ์ <i style="color:red ;"><?= $rs_invt['cate_name'] ?></i></label>
                                            <select name="add_category" id="" class="form-control">
                                                <option value="">-หมวดหมู่อุปกรณ์-</option>
                                                <?php
                                                $sql_dept = "SELECT * FROM `tbl_category`";
                                                $qr_dept = mysqli_query($conn, $sql_dept);
                                                while ($rs_dept = mysqli_fetch_assoc($qr_dept)) {
                                                ?>
                                                    <option value="<?= $rs_dept["cate_id"] ?>"><?= $rs_dept["cate_name"] ?></option>

                                                <?php
                                                }
                                                ?>

                                            </select>
                                            <label for="">ผู้ใช้งาน</label>
                                            <input name="add_user" id="" type="text" class="form-control" value="<?= $rs_invt['add_user'] ?>" required>

                                            <label for="">สถานที่ติดตั้ง</label>
                                            <input type="text" name="add_location_setup" id="" class="form-control" value="<?= $rs_invt['add_location_setup'] ?>">


                                        </div>


                                        <div class="col-sm-12 col-lg-6">

                                            <label for="">ชื่ออุปกรณ์</label>
                                            <input type="text" name="add_name" class="form-control" value="<?= $rs_invt['add_name'] ?>">
                                            <label for="">ราคา</label>
                                            <input type="number" name="add_price" class="form-control" value="<?= $rs_invt['add_price'] ?>" require>
                                            <label for="">หน่วยงาน/แผนก</label>
                                            <input type="text" name="add_department" id="" class="form-control" value="<?= $rs_invt['add_department'] ?>">

                                            <label for="">วันเริ่มใช้งาน</label>
                                            <input type="date" name="add_date_start" class="form-control" value="<?= $rs_invt['add_date_start'] ?>">
                                            <label for="">สถานะอุปกรณ์ <i style="color:red ;"><?= $rs_invt['add_status'] ?></i></label><br>
                                            <input type="radio" name="add_status" id="ck" value="ใช้งานปกติ"> <label for="">ใช้งานปกติ</label>
                                            <input type="radio" name="add_status" id="ck" value="เลิกใช้งาน"> <label for="">เลิกใช้งาน</label>
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <label for="">รายละเอียดเพิ่มเติม</label>
                                            <textarea name="add_detail" id="" class="form-control" ><?= $rs_invt['add_detail'] ?></textarea>
                                        </div>
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <h3>ข้อมูลประกัน</h3>
                                            <label for="">ผู้ผลิต</label>
                                            <input type="text" name="add_productby" class="form-control" value="<?= $rs_invt['add_productby'] ?>">
                                            <label for="">การรับประกัน</label>
                                            <input type="text" name="add_varanty" class="form-control" value="<?= $rs_invt['add_varanty'] ?>">
                                            <label for="">วันที่หมดประกัน</label>
                                            <input type="date" name="add_varanty_expire" class="form-control" value="<?= $rs_invt['add_varanty_expire'] ?>">
                                        </div>
                                        <br>
                                        <center>
                                            <?php
                                            if (!$_GET['id']) {
                                                $btnU = "style='display:none';";
                                            } else {
                                                $btnS = "style='display:none';";
                                            }
                                            ?>
                                            <button name="btn_add" type="submit" class="btn btn-primary mt-5" <?= $btnS ?>>เพิ่มอุปกรณ์</button>
                                            <button name="btn_update" type="submit" class="btn btn-warning mt-5" <?= $btnU ?>>บันทึกการแก้ไข</button>

                                        </center>
                                    </div>


                                    <?php
                                    if (isset($_POST['btn_update'])) {
                                        $sql_update = "UPDATE tbl_add_inventory SET `add_code` = '{$_POST['add_code']}',`add_name`='{$_POST['add_name']}',`add_serail`='{$_POST['add_serail']}',`add_price`='{$_POST['add_price']}',`add_category`='{$_POST['add_category']}',
    `add_department`='{$_POST['add_department']}',`add_user`='{$_POST['add_user']}',`add_date_start`='{$_POST['add_date_start']}',`add_location_setup`='{$_POST['add_location_setup']}',`add_status`='{$_POST['add_status']}',`add_detail`='{$_POST['add_detail']}',
    `add_productby`='{$_POST['add_productby']}',`add_varanty`='{$_POST['add_varanty']}',`add_varanty_expire`='{$_POST['add_varanty_expire']}' WHERE add_id ='{$_GET['id']}'";
                                        $qr_update = mysqli_query($conn, $sql_update);
                                        if ($qr_update) {
                                            echo "<script>swal({
            title: 'แก้ไขอุปกรณ์เรียบร้อย!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
    //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
            type: 'success', //success, warning, danger
            timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
            showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
        }, function(){
            window.location.href ='index.php?page=inventory'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
            })</script>";
                                        }
                                    }

                                    if (isset($_POST['btn_add'])) {
                                        $upload = basename($_FILES['fileupload']['name']);
                                        $date_create = date("Y-m-d H:m:s");
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
                                            $jod_id = 'INVT' . date("Ymd") . rand(0, 999);
                                            $newname = $jod_id . basename($newname);
                                            $path_copy = $path . $newname;
                                            $path_link = $path . $newname;
                                            echo basename($newname);
                                            //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์

                                            move_uploaded_file($_FILES['fileupload']['tmp_name'], $path_copy);
                                            $sql_inventory = "INSERT INTO tbl_add_inventory (`add_code`,`add_name`,`add_serail`,`add_price`,`add_category`,
                                           `add_department`,`add_user`,`add_date_start`,
                                           `add_location_setup`,`add_status`,`add_detail`,`add_productby`,`add_varanty`,
                                           `add_varanty_expire`,`add_picture`)
                                           VALUES ('{$_POST['add_code']}','{$_POST['add_name']}','{$_POST['add_serail']}','{$_POST['add_price']}',
                                           '{$_POST['add_category']}','{$_POST['add_department']}','{$_POST['add_user']}','{$_POST['add_date_start']}','{$_POST['add_location_setup']}','{$_POST['add_status']}','{$_POST['add_detail']}',
                                           '{$_POST['add_productby']}','{$_POST['add_varanty']}','{$_POST['add_varanty_expire']}','$path_link')";
                                            $qr_inventory = mysqli_query($conn, $sql_inventory);
                                            if ($qr_inventory) {
                                                echo "<script>swal({
                                                   title: 'เพิ่มอุปกรณ์เรียบร้อย!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                           //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                   type: 'success', //success, warning, danger
                                                   timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                   showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                               }, function(){
                                                   window.location.href ='index.php?page=inventory'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                   })</script>";
                                            }
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