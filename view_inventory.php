<style>
    .chartone {
        align-content: center;
    }
    img{
        border-radius: 10px;

    }
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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
                            <li class="breadcrumb-item active"><a href="">รายละเอียดอุปกรณ์</a></li>

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
<h3>รายละเอียดอุปกรณ์</h3>
                            </div>
                            <div class="card-body">
                                <div class="">
                                <?php
                                    $sql_invt ="SELECT * FROM `tbl_add_inventory` LEFT OUTER JOIN tbl_category on tbl_category.cate_id = tbl_add_inventory.add_category WHERE add_id ='{$_GET['id']}';";
                                   $qr_invt = mysqli_query($conn, $sql_invt);
                                   $rs_invt = mysqli_fetch_array($qr_invt);

                                   ?>
                                    <a>ข้อมูลอุปกรณ์</a><br>
                                    <center><img  src="./<?= $rs_invt['add_picture']?>" width="500 rem" /></center>
                                    
                                    <hr>
                                    <table style="width: 100%;">

                                   
                                        <tr>
                                            <td><b>รหัสอุปกรณ์</b></td>
                                            <td><?= $rs_invt['add_code']?></td>
                                            <td><b>ผู้ใช้งาน</b></td>
                                            <td><?= $rs_invt['add_user']?></td>
                                        </tr>
                                        <tr>
                                            <td><b>ซีเรียลนัมเบอร์</b></td>
                                            <td><?= $rs_invt['add_serail']?></td>
                                            <td><b>วันเริ่มใช้งาน</b></td>
                                            <td><?= $rs_invt['add_date_start']?></td>
                                        </tr>
                                        <tr>
                                            <td><b>ชื่ออุปกรณ์</b></td>
                                            <td><?= $rs_invt['add_name']?></td>
                                            <td><b>อายุการใช้งานที่ผ่านมา</b></td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td><b>หมวดหมู่อุปกรณ์</b></td>
                                            <td><?= $rs_invt['cate_name']?></td>
                                            <td><b>ราคา</b></td>
                                            <td><?= $rs_invt['add_price']?></td>
                                        </tr>
                                        <tr>
                                            <td><b>หน่วยงาน/แผนก</b></td>
                                            <td><?= $rs_invt['add_department']?></td>
                                            <td><b>สถานะอุปกรณ์</b></td>
                                            <td><?= $rs_invt['add_status']?></td>
                                        </tr>
                                        <tr>
                                            <td><b>สถานที่ติดตั้ง</b></td>
                                            <td><?= $rs_invt['add_location_setup']?></td>
                                            <td><b>รายละเอียดเพิ่มเติม</b></td>
                                            <td><?= $rs_invt['add_detail']?></td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <p>ข้อมูลประกัน</p>
                                    <table style="width: 50%;">
                                        <tr>
                                            <td><b>ผู้ผลิต/จำหน่าย</b></td>
                                            <td style="text-align: left;"><?= $rs_invt['add_productby']?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>การรับประกัน</b></td>
                                            <td style="text-align: left;"><?= $rs_invt['add_varanty']?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><b>วันหมดประกัน</b></td>
                                            <td style="text-align: left;"><?= $rs_invt['add_varanty_expire']?></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <!-- <p>ประวัติการซ่อม</p>
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
                                    <hr> -->
                                    <!-- <?php
                                    $sql_rp = "SELECT COUNT(rp_status) as rp_total, sts_name FROM `tbl_repair`
                                    LEFT OUTER JOIN tbl_status on tbl_status.sts_id = tbl_repair.rp_status GROUP BY rp_status";
                                    $qr_rp = mysqli_query($conn, $sql_rp);
                                    $dataPoints = array();
                                    while ($rs_rp = mysqli_fetch_array($qr_rp)) {
                                        array_push($dataPoints, array("label" => $rs_rp['sts_name'], "y" => $rs_rp['rp_total']));
                                    }
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
                                                <td><b><?= number_format($total, 2) . "  บาท" ?></b></td>
                                            </tr>
                                        </tbody>
                                    </table> -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br>


            </div>
        </div>
    </div>
</div>