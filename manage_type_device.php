<style>
    .chartone {
        align-content: center;
    }
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>การจัดการ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">การจัดการ</a></li>

                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <div class="container">
            <div class="container-fluid">
                <form method="POST">
                    <div class="row">
                        <div class=" col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>ประเภทงานซ่อม</h4>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="type">ชื่อประเภทงาน</label>
                                        <input type="text" name="type_w" id="type_w" class="form-control" />
                                        <button class="btn btn-outline-primary mt-3" name="btn_type">บันทึก</button>
                                    </div>
                                    <div class="form-group">
                                        <table class="table" id="example">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">#</th>
                                                    <th style="text-align: center;">ชื่อประเภทงาน</th>
                                                    <th style="text-align: center;">จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $type_repair = "SELECT * FROM `tbl_typework_repair`";
                                                $qr_type_repair = mysqli_query($conn, $type_repair);
                                                while ($rs_type_repair = mysqli_fetch_array($qr_type_repair)) {
                                                ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?= $i ?></td>
                                                        <td><?= $rs_type_repair['type_name'] ?></td>
                                                        <td style="text-align: center;">
                                                            <div class="button-group">
                                                                <div style="display: none;">
                                                                    <input name="total_t" type="text" value="<?= $i ?>">
                                                                    <input name="id_type<?= $i ?>" type="text" value="<?= $rs_type_repair['type_id'] ?>">
                                                                </div>
                                                                <button type="submit" name="btn_tw" class="btn btn-danger">ลบ</button>
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
                                </div>

                            </div>
                        </div>

                        <div class=" col-lg-6 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>ชื่ออุปกรณ์</h4>

                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="device">ชื่ออุปกรณ์</label>
                                        <input type="text" name="device" id="device" class="form-control" />
                                        <button class="btn btn-outline-primary mt-3" name="btn_device">บันทึก</button>
                                    </div>
                                    <div class="form-group">
                                        <table class="table" id="example1">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">#</th>
                                                    <th style="text-align: center;">ชื่ออุปกรณ์</th>
                                                    <th style="text-align: center;">จัดการ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $ai = 1;
                                                $type_repair1 = "SELECT * FROM `tbl_category`";
                                                $qr_type_repair1 = mysqli_query($conn, $type_repair1);
                                                while ($rs_type_repair1 = mysqli_fetch_array($qr_type_repair1)) {
                                                ?>
                                                    <tr>
                                                        <td style="text-align: center;"><?= $ai ?></td>
                                                        <td><?= $rs_type_repair1['cate_name'] ?></td>
                                                        <td style="text-align: center;">
                                                            <div class="button-group">
                                                                <div style="display: none;">
                                                                    <input name="total" type="text" value="<?= $ai ?>">
                                                                    <input name="id_device<?= $ai ?>" type="text" value="<?= $rs_type_repair1['cate_id'] ?>">
                                                                </div>
                                                                <button type="submit" name="del_device<?= $ai ?>" class="btn btn-danger">ลบ</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $ai++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    $total_t = $_POST['total_t'];
                    for ($i = 1; $i <= $total_t; $i++) {
                        $id_t = $_POST["id_type$i"];
                        if (isset($_POST["btn_tw$i"])) {
                            $sql_tw = "DELETE FROM tbl_typework_repair where type_id ='$id_t'";
                            $qr_tw = mysqli_query($conn, $sql_tw);
                            if ($qr_tw) {
                                echo "<script>window.location.href='index.php?page=manage_type_device'</script>";
                            }
                        }
                    }

                    $total_d = $_POST['total'];
                    for ($ai = 1; $ai <= $total_d; $ai++) {
                        $dd = $_POST["id_device$ai"];
                        if (isset($_POST["del_device$ai"])) {
                            $sql_del = "DELETE FROM tbl_category where cate_id ='$dd'";
                            $qr_del = mysqli_query($conn, $sql_del);
                            if ($qr_del) {
                                echo "<script>window.location.href='index.php?page=manage_type_device'</script>";
                            }
                        }
                    }
                    if (isset($_POST['btn_type'])) {
                        $sql_type = "INSERT INTO tbl_typework_repair (type_name) values ('{$_POST['type_w']}')";
                        $qr_type = mysqli_query($conn, $sql_type);
                        if ($qr_type) {
                            echo "<script>window.location.href='index.php?page=manage_type_device'</script>";
                        }
                    }

                    if (isset($_POST['btn_device'])) {
                        $sql_device = "INSERT INTO tbl_category (cate_name) values ('{$_POST['device']}')";
                        $qr_device = mysqli_query($conn, $sql_device);
                        if ($qr_device) {
                            echo "<script>window.location.href='index.php?page=manage_type_device'</script>";
                        }
                    }
                    ?>
                </form>
                <br>


            </div>
        </div>
    </div>
</div>




<!--Preview Modal -->
<!-- Modal -->

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                //'excel', 'print'
            ]
        });
    });

    $(document).ready(function() {
        $('#example1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                // 'excel', 'print'
            ]
        });
    });
</script>
<!-- Modal -->