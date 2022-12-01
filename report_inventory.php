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
                                    $sql_invt ="SELECT * FROM `tbl_add_inventory` LEFT OUTER JOIN tbl_category on tbl_category.cate_id = tbl_add_inventory.add_category";
                                    $qr_invt = mysqli_query($conn, $sql_invt);
                                    while($rs_invt = mysqli_fetch_assoc($qr_invt)){
                                    ?>
                                        <tr>
                                            <td><?= $rs_invt['add_code']?></td>
                                            <td><?= $rs_invt['add_serail']?></td>
                                            <td><?= $rs_invt['add_name']?></td>
                                      
                                            <td>อุปกรณ์<br> <?= $rs_invt['cate_name']?></td>
                                            <td><?= $rs_invt['add_location_setup']?></td>
                                            <td><?= $rs_invt['add_user']?><br><small><?= $rs_invt['add_department']?></small></td>
                                            <td><?= $rs_invt['add_varanty']?><br> <i>Expire : <?= $rs_invt['add_varanty_expire']?></i></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
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
</div>
</div>

<!--Preview Modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a>ข้อมูลอุปกรณ์</a><br>
                <img src="./img/11.png" width="50px">
                <hr>
                <table style="width: 100%;">
                    <tr>
                        <td><b>รหัสอุปกรณ์</b></td>
                        <td>LKJDHS***&&93837</td>
                        <td><b>ผู้ใช้งาน</b></td>
                        <td>เอกชัย IT</td>
                    </tr>
                    <tr>
                        <td><b>ซีเรียลนัมเบอร์</b></td>
                        <td>NHGHYY7765554</td>
                        <td><b>วันเริ่มใช้งาน</b></td>
                        <td>20-12-2022</td>
                    </tr>
                    <tr>
                        <td><b>ชื่ออุปกรณ์</b></td>
                        <td>LKJDHS***&&93837</td>
                        <td><b>อายุการใช้งานที่ผ่านมา</b></td>
                        <td>เอกชัย IT</td>
                    </tr>
                    <tr>
                        <td><b>หมวดหมู่อุปกรณ์</b></td>
                        <td>LKJDHS***&&93837</td>
                        <td><b>ราคา</b></td>
                        <td>เอกชัย IT</td>
                    </tr>
                    <tr>
                        <td><b>หน่วยงาน/แผนก</b></td>
                        <td>LKJDHS***&&93837</td>
                        <td><b>สถานะอุปกรณ์</b></td>
                        <td>เอกชัย IT</td>
                    </tr>
                    <tr>
                        <td><b>สถานที่ติดตั้ง</b></td>
                        <td>LKJDHS***&&93837</td>
                        <td><b>รายละเอียดเพิ่มเติม</b></td>
                        <td>เอกชัย IT</td>
                    </tr>
                </table>
                <hr>
                <p>ข้อมูลประกัน</p>
                <table style="width: 50%;">
                    <tr>
                        <td><b>ผู้ผลิต/จำหน่าย</b></td>
                        <td style="text-align: left;">HP</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>การรับประกัน</b></td>
                        <td style="text-align: left;">3</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>วันหมดประกัน</b></td>
                        <td style="text-align: left;">17-12-2022</td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                <hr>
                <p>ประวัติการซ่อม</p>
                <table class="table table-striped table-bordered detail-view" id="example1">
                    <thead>
                        <tr>
                            <th>วันที่แจ้งซ่อม</th>
                            <th>ชื่อผู้แจ้งซ่อม</th>
                            <th>ประเภทงานซ่อม</th>
                            <th>ปัญหา/งานซ่อม</th>
                            <th>สาเหตุ/วิธีแก้ไข</th>
                            <th>ผู้ดำเนินงาน</th>
                            <th>วิธีแก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ticket ID: 202255363<br> <?= date("Y-m-d H:m:s") ?></td>
                            <td>ชื่อผู้แจ้ง : เอกชัย นามวิชา <br><i>Information technology</i> <br> ความเร่งด่วน : ด่วน</td>
                            <td>ประเภทงานซ่อม : ซ่อมบำรุง <br> ประเภทปัญหา : เครื่องไม่ติด</td>
                            <td>ปัญหา/งานซ่อม : เร่งไฟไม่ขึ้น</td>
                            <td>สาเหตุ/วิธีแก้ไข : เปลี่ยน PSU <br> <i>วันที่สำเร็จ <?= date("Y-m-d H:m:s") ?></i></td>
                            <td>ผู้ดำเนินการ : Aekkachai <br> <i>Cheif Design Engineer</i></td>
                            <td>สำเร็จ</td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                <?php

                $dataPoints = array(
                    array("label" => "ค่าซ่อม", "y" => 100),
                    array("label" => "ค่าอะไหล่", "y" => 2000),
                    array("label" => "ค่าอุปกรณ์", "y" => 5000),
                    array("label" => "VAT 7%", "y" => 35.24),

                );

                ?>
                <p>สรุปค่าใช้จ่าย</p>
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                    <div id="chartContainer" style="height: 370px; width: 100%;" class="chartone"></div>

                        </div>
                    </div>
            </div>
                <script>
                    window.onload = function() {

                        var chart = new CanvasJS.Chart("chartContainer", {
                            animationEnabled: true,
                            exportEnabled: true,
                            title: {
                                text: "สรุปค่าซ่อม"
                            },
                            subtitles: [{
                                text: "Currency Used: Thai Baht (฿)"
                            }],
                            data: [{
                                type: "pie",
                                showInLegend: "true",
                                legendText: "{label}",
                                indexLabelFontSize: 16,
                                indexLabel: "{label} - #percent%",
                                yValueFormatString: "฿#,##0",
                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                            }]
                        });
                        chart.render();

                    }
                </script>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

                <br>
                <br>
                <table style="width: 50%;">
                    <thead>
                        <tr>
                            <th>ประเภทค่าใช้จ่าย</th>
                            <th>ค่าใช้จ่าย</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($dataPoints as $label => $value) {
                            $total += $value['y'];
                        ?>
                            <tr>
                                <td><?= $value['label'] ?></td>
                                <td><?= number_format($value['y'], 2) . "  บาท" ?></td>
                            </tr>

                        <?php
                        }
                        ?>
                        <tr>
                            <td><b>สรุปค่าใช้จ่ายการซ่อม</b></td>
                            <td><b><?= number_format($total,2) . "  บาท"?></b></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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