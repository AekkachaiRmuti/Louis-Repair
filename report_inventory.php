<style>
    .chartone {
        align-content: center;
    }
</style>

<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>รายงานทะเบียนอุปกรณ์</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">รายงานทะเบียนอุปกรณ์</a></li>

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

                            <div class="card-body">
                                <table class="table" id="example">
                                    <thead>
                                        <tr>
                                            <th>รหัสอุปกรณ์</th>
                                            <th>ซีเรียลนัมเบอร์</th>

                                            <th>ยี่ห้อ/รุ่น</th>
                                            <th>หมวดหมู่อุปกรณ์</th>
                                            <th>หน่วยงาน/แผนก</th>
                                            <th>ผู้ใช้งาน/สถานที่ติดตั้ง</th>
                                            <th>การรับประกัน</th>
                                            <th>รายละเอียด</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $sql_invt = "SELECT * FROM `tbl_add_inventory` LEFT OUTER JOIN tbl_category on tbl_category.cate_id = tbl_add_inventory.add_category";
                                        $qr_invt = mysqli_query($conn, $sql_invt);
                                        while ($rs_invt = mysqli_fetch_assoc($qr_invt)) {
                                        ?>
                                            <tr>
                                                <td><?= $rs_invt['add_code'] ?></td>
                                                <td><?= $rs_invt['add_serail'] ?></td>
                                                <td><?= $rs_invt['add_name'] ?></td>

                                                <td>อุปกรณ์<br> <?= $rs_invt['cate_name'] ?></td>
                                                <td><?= $rs_invt['add_location_setup'] ?></td>
                                                <td><?= $rs_invt['add_user'] ?><br><small><?= $rs_invt['add_department'] ?></small></td>
                                                <td><?= $rs_invt['add_varanty'] ?><br> <i>Expire : <?= $rs_invt['add_varanty_expire'] ?></i></td>
                                                <td>
                                                    <button type="button" onclick="preview(<?= $rs_invt['add_id'] ?>)" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                                                        Preview
                                                    </button><br>
                                                </td>
                                            </tr>
                                        <?php
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
<div id="modalajax"></div>
<script>
    
    function preview(add_id) {
        console.log(add_id);
        $.ajax({
            url: 'ajax/preview_invt.php?idaad=' + add_id,
            type: 'get',
            success: function(result) {
                $('#modalajax').html(result);
                console.log("Get DATA Successfully");
            }
        });
    }

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