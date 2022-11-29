<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>อุปกรณ์</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">การตั้งค่าแบบประเมิน</a></li>

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
                            <form method="POST">
                                <div class="card-header">
                                    <h3>การตั้งค่าแบบประเมิน</h3>
                                    <button class="btn btn-success" name="add_txt" type="submit">เพิ่ม</button>
                                    <!-- <small>1.ด้านพนักงานผู้ให้บริการ
1.1 การให้บริการด้วยความสุภาพ เป็นมิตร
1.2 ความตั้งใจและกระตือรือร้นในการให้บริการ
1.3 การให้คำแนะนำและตอบข้อซักถามได้ชัดเจน

2.ด้านขั้นตอนการให้บริการ
2.1 ความสะดวก รวดเร็วในการให้บริการ
2.2 ระยะเวลาในการให้บริการมีความเหมาะสม
2.3 การให้บริการมีความเป็นระบบ มีการแจ้งสาเหตุของปัญหา ความคืบหน้าของการให้บริการ</small> -->
                                </div>
                                <?PHP
                                $total = $_POST['total'];
                                for ($i = 1; $i <= $total; $i++) {
                                    if (isset($_POST["btn_save$i"])) {

                                        $txt = $_POST["txt_a$i"];
                                        $key_id = $_POST["key_id$i"];
                                        $sql_update = "UPDATE tbl_vote_txt SET vt_txt = '$txt' WHERE vt_id = '$key_id'";
                                        $qr_update = mysqli_query($conn, $sql_update);
                                        if ($qr_update) {
                                            echo "<script>window.location.href='index.php?page=setting_vote'</script>";
                                        }
                                    }
                                    if (isset($_POST["btn_del$i"])) {
                                        $key_id = $_POST["key_id$i"];
                                        echo $txt = $_POST["txt_a$i"];
                                        echo $key_id = $_POST["key_id$i"];
                                         $sql_update = "DELETE From tbl_vote_txt  WHERE vt_id = '$key_id'";
                                         $qr_update = mysqli_query($conn, $sql_update);
                                         if ($qr_update) {
                                             echo "<script>window.location.href='index.php?page=setting_vote'</script>";
                                         }
                                     }
                                }


                                if (isset($_POST['add_txt'])) {
                                    $sql_add = "INSERT INTO tbl_vote_txt (vt_txt) values ('**เพิ่มข้อความใหม่**')";
                                    $qr_add = mysqli_query($conn, $sql_add);
                                    if ($qr_add) {
                                        echo "<script>window.location.href='index.php?page=setting_vote'</script>";
                                    }
                                }
                                ?>
                                <div class="card-body">
                                    <table class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center;">ลำดับ</th>
                                                <th style="text-align: center;">ข้อความแบบประเมิน</th>
                                                <th style="text-align: center;">จัดการ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $i = 1;
                                            $sql_txt = "SELECT * FROM `tbl_vote_txt`";
                                            $qr_txt = mysqli_query($conn, $sql_txt);
                                            while ($rs_txt = mysqli_fetch_assoc($qr_txt)) {
                                            ?>
                                                <tr>
                                                    <td style="text-align: center;"><?= $i ?></td>
                                                    <td><textarea name="txt_a<?= $i ?>" id="" class="form-control"><?= $rs_txt['vt_txt'] ?></textarea></td>
                                                    <td style="text-align: center;">
                                                        <div style="display:none ;"><input type="text" name="key_id<?= $i ?>" value="<?= $rs_txt['vt_id'] ?>">
                                                        <input type="text" name="total" value="<?= $i ?>"></div>
                                                        
                                                        <div class="button-group">
                                                            <button class="btn btn-primary" type="submit" name="btn_save<?= $i ?>">Save</button>
                                                            <button class="btn btn-danger" type="submit" name="btn_del<?= $i ?>">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php

                                                $i++;
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <br>


            </div>
        </div>
    </div>
</div>