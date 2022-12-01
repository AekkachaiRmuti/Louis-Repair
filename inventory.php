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
                        <h1>อุปกรณ์</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">อุปกรณ์</a></li>

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

                                <div class="row">
                                    <div class="col-sm-2 col-2">
                                        <div class="description-block border-right">
                                            <!-- <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span> -->
                                            <?php
                                            $sql_co = "SELECT COUNT(add_id) as cca ,add_status FROM tbl_add_inventory WHERE add_status = 'ใช้งานปกติ'";
                                            $qr_co = mysqli_query($conn, $sql_co);
                                            $rs_co = mysqli_fetch_array($qr_co);
                                            ?>
                                            <h5 class="description-header"><?= $rs_co["cca"] ?></h5>
                                            <span class="description-text">ใช้งานปกติ</span>
                                        </div>

                                    </div>

                                    <!-- <div class="col-sm-2 col-2">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                                            <h5 class="description-header">10,390.90</h5>
                                            <span class="description-text">อุกรณ์ส่วนกลาง</span>
                                        </div>

                                    </div>

                                    <div class="col-sm-2 col-2">
                                        <div class="description-block border-right">
                                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                                            <h5 class="description-header">24,813.53</h5>
                                            <span class="description-text">อยู่ระหว่างการซ่อม</span>
                                        </div>

                                    </div>  -->

                                    <div class="col-sm-2 col-2">
                                        <div class="description-block border-right">
                                            <!-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> -->
                                            <?php
                                            $sql_co1 = "SELECT COUNT(add_id) as cca ,add_status FROM tbl_add_inventory WHERE add_status = 'เลิกใช้งาน'";
                                            $qr_co1 = mysqli_query($conn, $sql_co1);
                                            $rs_co1 = mysqli_fetch_array($qr_co1);
                                            ?>
                                            <h5 class="description-header"><?= $rs_co1["cca"]?></h5>
                                            <span class="description-text">เลิกใช้งาน</span>
                                        </div>

                                    </div>
                                    <div class="col-sm-2 col-2">
                                        <div class="description-block border-right">
                                            <!-- <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span> -->
                                            <?php
                                            $sql_co3 = "SELECT COUNT(add_id) as cca ,add_status FROM tbl_add_inventory";
                                            $qr_co3 = mysqli_query($conn, $sql_co3);
                                            $rs_co3 = mysqli_fetch_array($qr_co3);
                                            ?>
                                            <h5 class="description-header"><?= $rs_co3["cca"]?></h5>
                                            <span class="description-text">ทั้งหมด</span>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="col-sm-2 col-2">
                                        <div class="description-block">
                                            <a href="index.php?page=add_inventory" class="btn btn-success">เพิ่มอุปกรณ์</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>รหัสอุปกรณ์</th>
                                            <th>ซีเรียลนัมเบอร์</th>
                                            <th>ชื่ออุปกรณ์</th>

                                            <th>หมวดหมู่อุปกรณ์</th>
                                            <th>หน่วยงาน/แผนก</th>
                                            <th>ผู้ใช้งาน/สถานที่ติดตั้ง</th>
                                            <th>การรับประกัน</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        $sql_invt = "SELECT * FROM `tbl_add_inventory` LEFT OUTER JOIN tbl_category on tbl_category.cate_id = tbl_add_inventory.add_category";
                                        $qr_invt = mysqli_query($conn, $sql_invt);

                                        while ($rs_invt = mysqli_fetch_assoc($qr_invt)) {
                                        ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $rs_invt["add_code"] ?></td>
                                                <td><?= $rs_invt["add_serail"] ?></td>
                                                <td><?= $rs_invt["add_name"] ?></td>

                                                <td> <?= $rs_invt["cate_name"] ?></td>
                                                <td><?= $rs_invt["add_department"] ?></td>
                                                <td><?= $rs_invt["add_user"] ?> <?= $rs_invt["add_location_setup"] ?></td>
                                                <td><?= $rs_invt["add_varanty"] ?><br> <i>Expire : <?= $rs_invt["add_varanty_expire"] ?></i></td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="?page=view_inventory&id=<?= $rs_invt["add_id"] ?>" class="btn btn-primary">view</a>
                                                        <a href="?page=add_inventory&id=<?= $rs_invt["add_id"] ?>" class="btn btn-warning">Edit</a>
                                                        <a href="?page=inventory&del=<?= $rs_invt["add_id"] ?>" class="btn btn-danger">Delete</a>
                                                    </div>


                                                </td>
                                            </tr>

                                        <?php
                                            $i++;
                                        }

                                        if(@$_GET['del']){
                                            echo "<script>swal({
                                                title: 'คุณต้องการลบอุปกรณ์นี้ ใช่หรือไม่?',
                                                // text: '',
                                                icon: 'warning',
                                                buttons: true,
                                                dangerMode: true,
                                              })
                                              .then((willDelete) => {
                                                if (willDelete) {
                                                    window.location.href='index.php?page=inventory&delete_id='+{$_GET['del']};
                                                  swal('ลบอุปกรณ์เรียบ!', {
                                                    icon: 'success',
                                                  });
                                                } else {
                                                  swal('คุณไม่ต้องการลบ!');
                                                }
                                              });</script>";
                                        }
                                        if(@$_GET['delete_id']){
                                            $sql_del = "DELETE FROM `tbl_add_inventory` WHERE `add_id` ='{$_GET['delete_id']}'";
                                            $qr_del = mysqli_query($conn, $sql_del);
                                            if($qr_del){
                                                echo "<script>swal('Good job!', 'ลบอุปกรณ์เรียบร้อย!', 'success');</script>";
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
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
                'excel', 'print'
            ]
        });
    });

    $(document).ready(function() {
        $('#example1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                // 'copy', 'csv', 'excel', 'pdf', 'print'
                'excel', 'print'
            ]
        });
    });
</script>
<!-- Modal -->