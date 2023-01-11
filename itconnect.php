<style>
    .txtarea {
        width: 500px;
        height: 100px;
        /* font-size: 20px; */
    }


    html,
    /* body {
        background-image: url("img/bg.jpg");

        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        -o-background-size: 100% 100%, auto;
        -moz-background-size: 100% 100%, auto;
        -webkit-background-size: 100% 100%, auto;
        background-size: 100% 100%, auto;
    } */

    * {
        font-family: 'Kanit', sans-serif;
        font-family: 'Mali', cursive;
        font-family: 'Mitr', sans-serif;
        font-family: 'Noto Sans Thai', sans-serif;
    }

    
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Help Desk Services</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                                <li class="breadcrumb-item active"><a href="">Help Desk Services</a></li>

                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <div class="wrapper">
                <!-- <div class="img-phone"><img src="./image_problem/phone.png" /></div>
        <div>

            <div class="img-qrcode"><img style="width: 150px;" src="./image_problem/qr-code.png" /></div>
        </div> -->
                <!-- <div class="text-howto">
            <p>การใช้งานผ่านอุปกรณ์สมาร์ทโฟน</p>
            <li>เชื่อมต่ออินเตอร์เน็ตหรือ WIFI ภายในบริษัท</li>
            <li>กรณี Work From Home ให้เชื่อมต่อ VPN</li>
            <li>เมื่อเชื่อมต่ออินเทอร์เน็ตแล้ว ให้ทำการ Scan QR-CODE ผ่าน Line</li>
            <li>แล้วทำการ ดำเนินการแจ้ง</li>

        </div> -->
                <div class="container">
                    <div class="container-fluid">
                        <div class="card card-default">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">

                                    <div class="">
                                        <div class="card-body">
                                            <form method="POST" enctype="multipart/form-data">
                                                <?PHP
                                                if (@$_GET['accept'] == 'yes') {
                                                    echo "<script>
    window.open('','_self').close()
    </script>";
                                                }
                                                if (@$_GET['accept'] == 'no') {
                                                    echo "<script>
    window.open('','_self').close()
    </script>";
                                                }

                                                ?>
                                                <center>
                                                    <div class="col-md-12 text-center">
                                                        <h3 class="animate-charcter"><span class=""> แจ้งปัญหาไอที</span></h3>
                                                        <br>

                                                        <h3 style="color: white;"> <span class="badge badge-success"><a href="files/connect_it.rar" download style="color:white">Your IP
                                                                    Address: <?= $ip = $_SERVER['REMOTE_ADDR']; ?></a></span></h3>
                                                    </div>


                                                    <div class="col-lg-4 col-md-8 col-sm-12 mb-2">
                                                        <label for="" style="color:white" class="badge badge-warning">
                                                            <h6>แนบรูปภาพ</h6>
                                                        </label>
                                                        <input type="file" id="fileupload" name="fileupload" class="form-control" accept="image/gif, image/jpeg, image/png" />
                                                    </div>

                                                    <div class="col-lg-4 col-md-8 col-sm-12 mb-2">
                                                        <select class="form-select" aria-label="Default select example" name="dept" id="dept" onchange="getdept()">

                                                            <option value="">--Select Department--</option>
                                                            <?php

                                                            // include 'connect_db.php';
                                                            $sql_po = "SELECT * FROM tbl_department_service";
                                                            $qr_po = mysqli_query($conn, $sql_po);

                                                            while ($rs = mysqli_fetch_array($qr_po)) {
                                                            ?>

                                                                <option value="<?= $rs['dept_id'] ?>"><?= $rs['dept_name'] ?>
                                                                    (<?= $rs['dept_description'] ?>)</option>
                                                            <?php
                                                            }
                                                            ?>

                                                        </select>

                                                    </div>
                                                    <div class="col-lg-4 col-md-8 col-sm-12">
                                                        <div id="ajax_connect">
                                                            <select class="form-select" aria-label="Default select example" name="user_name" id="user_id" onchange="id_us()">

                                                                <option value="0" id="">--Select Username--</option>

                                                            </select>
                                                        </div>
                                                    </div>



                                                    <script>
                                                        // $(document).ready(function() {
                                                        function getdept() {
                                                            let id_dept = document.getElementById("dept").value;
                                                            console.log("Dept_Key =>>" + id_dept);

                                                            $.ajax({
                                                                url: 'ajax/get_connect.php?key=' + id_dept,
                                                                type: 'get',
                                                                success: function(result) {
                                                                    $('#ajax_connect').html(result);
                                                                    console.log("Get DATA Successfully");
                                                                    // console.log(result);


                                                                }
                                                            });

                                                        }

                                                        function id_us() {
                                                            let user_id = document.getElementById("user_id").value;
                                                            console.log(user_id);
                                                        }

                                                        // });
                                                    </script>
                                                    <br>
                                                    <div class="col-lg-6 col-md-8 col-sm-8">
                                                        <Textarea name="txtar" class="txtarea form-control" placeholder="--Detail--"></Textarea>
                                                    </div>
                                                    <br>
                                                    <button name="next" type="submit" class="btn btn-outline-primary btn-sm">SEND</button>
                                                    <hr>
                                                    <!-- <button name="test" type="submit" class="btn btn-warning btns">test</button> -->
                                                    <?php
                                                    if (isset($_POST['test'])) {
                                                        echo "<script>swal({
        title: 'ดำเนินการสำเร็จ', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
        // text: 'สำหรับ Administrator!',
        icon: 'success',
      }),setTimeout(() => {
        window.location.href ='index.php?page=itconnect'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php

      }, 3000);</script>";
                                                    }
                                                    ?>
                                                    <?= @$path_link ?>
                                                </center>
                                                <br>
                                                <div class="col-lg-12 col-md-12 col-sm-12 ">

                                                    <table class="table" id="example" style=" width: 100%;">

                                                        <thead>
                                                            <tr>
                                                                <th style="text-align: center;">ลำดับ</th>
                                                                <th style="text-align: center;">วันที่แจ้งปัญหา</th>
                                                                <th style="text-align: center;">แผนก</th>
                                                                <th style="text-align: center;">ชื่อผู้แจ้ง</th>
                                                                <th style="text-align: center;">รายละเอียดปัญหา</th>
                                                                <th style="text-align: center;">IP Address</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                            <?php
                                                            // $servername = 'localhost';
                                                            // $username = 'root';
                                                            // $password = '';
                                                            // $db_name = 'louis_db';

                                                            // $conn = mysqli_connect($servername, $username, $password, $db_name);
                                                            $i = 1;
                                                            $sql_rp = "SELECT * FROM tbl_it_problem order by itp_id desc";
                                                            $qr_rp = mysqli_query($conn, $sql_rp);

                                                            while ($rs_rp = mysqli_fetch_assoc($qr_rp)) {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>

                                                                    <td><?= $rs_rp['itp_date'] ?></td>
                                                                    <td><?= $rs_rp["itp_dept"] ?></td>
                                                                    <td><?= $rs_rp["itp_name"] ?></td>
                                                                    <td>
                                                                        <?= $rs_rp["itp_detail"] ?><br>
                                                                        <span class="badge bg-primary">แจ้งปัญหาแล้ว</span>
                                                                        <?php if ($rs_rp['itp_status'] == 1) {
                                                                        ?>

                                                                            <button type="button" id="btn-modal<?= $i ?>" onclick="momo()" class="badge bg-info" data-bs-toggle="modal" data-id="<?= $rs_rp['itp_id'] ?>" data-bs-target="#exampleModal">
                                                                                รอดำเนินการ
                                                                            </button>
                                                                            <script>
                                                                                $(document).ready(function() {
                                                                                    $('#btn-modal<?= $i ?>').click(function() {
                                                                                        // $('#ddd').text($(this).data('id'));
                                                                                        let id = document.getElementById("ddd").value = $(this).data('id');
                                                                                        console.log('kk');
                                                                                    });
                                                                                })
                                                                            </script>
                                                                        <?php
                                                                        }
                                                                        if ($rs_rp['itp_status'] == 2) {
                                                                            echo "<span type='button' class='badge bg-success'>
                                                สำเร็จ
                                            </span>";
                                                                        }
                                                                        ?>

                                                                    </td>
                                                                    <td>
                                                                        <p style="font-size: 17px;"><span class="badge badge-warning"><?= $rs_rp['itp_ip'] ?></span>
                                                                        </p>
                                                                    </td>




                                                                </tr>
                                                            <?php
                                                                $i++;
                                                            }

                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">IT Support </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <label for="">กรุณากรอกรหัสผ่าน</label>
                                                                <input type="password" class="form-control" onkeyup="pw()" placeholder="Password" id="pass">
                                                                <div id="ok"></div>
                                                                <script>
                                                                    let lb1 = '<label for="" class="label-control">วิธีแก้ไขปัญหา</label>';
                                                                    let lb2 = '<label for="" class="label-control">ผู้ดำเนินการ</label>';
                                                                    let por = '<input type="text" name="problem" id="us_problem" class="form-control" >';
                                                                    let user_s = '<input type="text" name="user" id="user_s" class="form-control" >';

                                                                    function pw() {
                                                                        let x = document.getElementById("pass").value;
                                                                        let us_problem = document.getElementById("us_problem");
                                                                        // x.value = x.value.toUpperCase();
                                                                        console.log(x);
                                                                        if (x == 'GAsYGH6D' || x == 'it01') {
                                                                            $('#lb1').html(lb1)
                                                                            $('#pro').html(por)
                                                                            $('#lb2').html(lb2)
                                                                            $('#user_s').html(user_s)
                                                                            $('#ok').html('<a style="color:red;">รหัสผ่านถูกต้อง</a>')
                                                                            // document.getElementById("pro") = '<input type="text" name="" id="us_problem" class="form-control" >';

                                                                        } else {
                                                                            $('#lb1').html()
                                                                            $('#pro').html()
                                                                            $('#lb2').html()
                                                                            $('#user_s').html()
                                                                        }
                                                                    }
                                                                </script>
                                                                <div style="display: none;"><input type="text" name="ddd" id="ddd" class="form-control"></div>
                                                                <script>
                                                                    function momo() {
                                                                        $(document).ready(function() {
                                                                            let key_id = document.getElementById("ddd").value;
                                                                            console.log(key_id);
                                                                            $.ajax({
                                                                                url: 'ajax/image.php?key=' + key_id,
                                                                                type: 'get',
                                                                                success: function(result) {
                                                                                    $('#imgmomo').html(result);
                                                                                    console.log(result);


                                                                                }
                                                                            });
                                                                        });
                                                                    }
                                                                </script>
                                                                <div id="lb1"></div>
                                                                <div id="pro"></div>
                                                                <div id="lb2"></div>
                                                                <div id="user_s"></div>

                                                                <center>
                                                                    <div id="imgmomo"></div>
                                                                </center>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" name="btn_save" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                            <?php
                                                            if (isset($_POST['btn_save'])) {
                                                                $sql_update = "UPDATE tbl_it_problem SET itp_status = '2', itp_problem = '{$_POST['problem']}', itp_user = '{$_POST['user']}' Where itp_id = '{$_POST['ddd']}'";
                                                                $qr_update = mysqli_query($conn, $sql_update);

                                                                if ($qr_update) {
                                                                    echo "<script>swal({
                                                        title: 'ดำเนินการสำเร็จ', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                        // text: 'สำหรับ Administrator!',
                                                        icon: 'success',
                                                      }),setTimeout(() => {
                                                        window.location.href ='get_connect_it.php?update={$_POST['ddd']}'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php

                                                      }, 3000);</script>";
                                                                }
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                            <?php
                                            $date = date("Y-m-d H:i:s");
                                            @$dept = $_POST['dept'];
                                            @$name = $_POST['user_name'];
                                            @$txtar = $_POST['txtar'];


                                            @$sql_get = "SELECT * FROM tbl_department_service where dept_id = '{$_POST['dept']}'";
                                            $qr_get = mysqli_query($conn, $sql_get);
                                            $rs_get = mysqli_fetch_array($qr_get);

                                            @$dept_id = $rs_get['dept_id'];
                                            @$dept_dept = $rs_get['dept_name'];
                                            @$upload = $_FILES['fileupload']['name'];
                                            if (isset($_POST['next'])) {


                                                if ($name == null || $dept = null) {
                                                    echo "<script>swal({
                                        title: 'Please select Department and Username...', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                        // text: 'สำหรับ Administrator!',
                                        icon: 'error',
                                      }),setTimeout(() => {
                                        window.location.href ='index.php?page=itconnect'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php

                                      }, 3000);</script>";
                                                } else {


                                                    if ($upload <> '') {   //not select file
                                                        //โฟลเดอร์ที่จะ upload file เข้าไป 
                                                        $path = "image_problem/";

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
                                                        $jod_id = 'pic' . date("Ymd") . rand(0, 999);
                                                        $newname = $jod_id . basename($newname);
                                                        $path_copy = $path . $newname;
                                                        $path_link = $path . $newname;
                                                        echo basename($newname);
                                                        //คัดลอกไฟล์ไปเก็บที่เว็บเซริ์ฟเวอร์

                                                        move_uploaded_file($_FILES['fileupload']['tmp_name'], $path_copy);

                                                        // echo $path_link;
                                                        // echo "<br>";
                                                        // echo $newname;
                                                        // echo "<br>";
                                                        // echo $_FILES['fileupload']['tmp_name'], $path_copy;
                                                        // echo "<br>";
                                                        // echo $upload;
                                                    }
                                                    if ($upload == null) {
                                                        $path_link = '1';
                                                    }
                                                    $sql_line = "INSERT INTO tbl_it_problem (itp_date,itp_dept,itp_dept_id,itp_name,itp_detail,itp_ip,itp_anydesk,itp_status,itp_problem,itp_user,itp_picture) VALUES ('$date','$dept_dept','$dept_id','$name','$txtar','$ip','$anydesk','1','','','$path_link')";
                                                    $qr_line = mysqli_query($conn, $sql_line);
                                                    if ($qr_line) {
                                                        echo "<script>swal({
                                            title: 'แจ้งสำเร็จ กรุณารอสักครู่...', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                            // text: 'สำหรับ Administrator!',
                                            icon: 'success',
                                          }),setTimeout(() => {
                                            window.location.href ='get_connect_it.php?line=yes'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                          }, 3000);</script>";
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
                </div>
            </div>
        </div>
    </div>
    
</body>