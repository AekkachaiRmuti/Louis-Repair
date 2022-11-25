<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>แบบประเมินความพึงพอใจ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">แบบประเมินความพึงพอใจ</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="container-fluid">
                <div class="card card-default ala">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-body">
                                <form method="POST">
                                    <table style="width: 100%;" class="">
                                        <tr>
                                            <td></td>
                                            <td><b>แบบประเมินความพึงพอใจในการซ่อม</b></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>เลขที่แจ้งซ่อม : <?= $_GET['id'] ?></td>
                                            <td></td>
                                            <td>วันที่แจ้งซ่อม : <?= $_GET['d1'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>ผู้ดำเนินการ : <?= $_GET['accept'] ?></td>
                                            <td></td>
                                            <td>วันสำเร็จ : <?= $_GET['d2'] ?></td>
                                        </tr>
                                    </table>
                                    <table class="table-striped table-bordered detail-view" style="width: 100%;">
                                        <thead>
                                            <tr style="align-content: center; text-align:center;">
                                                <th rowspan="2">ลำดับ</th>
                                                <th rowspan="2">หัวข้อการประเมิน</th>
                                                <th colspan="5">ระดับความพึงพอใจ</th>

                                            </tr>
                                            <tr style="align-content: center; text-align:center;">

                                                <th style="width: 80px;">มากที่สุด<br>(5) </th>
                                                <th style="width: 80px;">มาก<br>(4)</th>
                                                <th style="width: 80px;">ปานกลาง<br>(3)</th>
                                                <th style="width: 80px;">น้อย<br>(2)</th>
                                                <th style="width: 80px;">น้อยมาก<br>(1)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            $sql_txt = "SELECT * FROM tbl_vote_txt";
                                            $qr_txt = mysqli_query($conn, $sql_txt);
                                            while ($rs_txt = mysqli_fetch_assoc($qr_txt)) {
                                            ?>
                                                <tr>
                                                    <td style="text-align: center;">
                                                        <?= $i ?>
                                                    </td>
                                                    <td><?= $rs_txt["vt_txt"] ?><div style="display:none ;"><input type="text" name="txt<?= $i ?>" value="<?= $rs_txt["vt_txt"] ?>">
                                                            <div>
                                                    </td>
                                                    <td style="text-align: center;"><input type="radio" name="q<?= $i ?>" value="5"></td>
                                                    <td style="text-align: center;"><input type="radio" name="q<?= $i ?>" value="4"></td>
                                                    <td style="text-align: center;"><input type="radio" name="q<?= $i ?>" value="3"></td>
                                                    <td style="text-align: center;"><input type="radio" name="q<?= $i ?>" value="2"></td>
                                                    <td style="text-align: center;"><input type="radio" name="q<?= $i ?>" value="1"></td>


                                                </tr>

                                            <?php
                                                if (isset($_POST['btn_save'])) {
                                                    $dd = date('Y-m-d H:m:s');
                                                    for ($i = 1; $i <= $_POST['total']; $i++) {
                                                        $sql_s = "INSERT INTO tbl_user_vote (uv_key, uv_name, uv_date, uv_text, uv_vote, uv_offer) values ('{$_GET['id']}','{$_SESSION['user_name']}','$dd','{$_POST["txt$i"]}','{$_POST["q$i"]}','{$_POST['offer']}')";
                                                        $qr_s = mysqli_query($conn, $sql_s);
                                                        if($qr_s){
                                                            $sql_up = "UPDATE tbl_repair SET rp_vote ='2' WHERE rp_job ='{$_GET['id']}'";
                                                            $qr_up = mysqli_query($conn, $sql_up);
                                                            if($qr_up){
                                                                echo "<script>swal({
                                                                    title: 'ทำแบบประเมินเรียบร้อย!', //ข้อความ เปลี่ยนได้ เช่น บันทึกข้อมูลสำเร็จ!!
                                                            //    text: 'Redirecting in 3 seconds.', //ข้อความเปลี่ยนได้ตามการใช้งาน
                                                                    type: 'success', //success, warning, danger
                                                                    timer: 2000, //ระยะเวลา redirect 3000 = 3 วิ เพิ่มลดได้
                                                                    showConfirmButton: false //ปิดการแสดงปุ่มคอนเฟิร์ม ถ้าแก้เป็น true จะแสดงปุ่ม ok ให้คลิกเหมือนเดิม
                                                                }, function(){
                                                                    window.location.href ='index.php?page=data_repair'; //หน้าเพจที่เราต้องการให้ redirect ไป อาจใส่เป็นชื่อไฟล์ภายในโปรเจคเราก็ได้ครับ เช่น admin.php
                                                                    })</script>";
                                                            }
                                                        }
                                                    }
                                                   
                                                }
                                                $i++;
                                            }


                                            ?>
<div style="display:none ;">
                                            <input type="text" name="total" value="<?= $i ?>"></div>
                            </div>
                            </tbody>
                            </table>
                            <br>
                            <p>ข้อเสนอแนะเพิ่มเติม</p>
                            <textarea name="offer" id="" class="form-control"></textarea>
                            <br>
                            <div class="pull-right"> <button class="btn btn-primary" name="btn_save">บันทึก</button></div>


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
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                'excel', 'print'
            ]
        });
    });
</script>



<!-- Modal -->