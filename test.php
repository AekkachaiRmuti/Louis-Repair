<!DOCTYPE html>
<html lang="en">
<?php include 'connect_db.php' ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <a data-id="<?= $a = 3 ?>" class="open-AddBookDialog btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" onclick="setval(3)">view</a>


    <!-- ////////////////////////////// div modal รับค่า //////////////////////////////////// -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>

                </div>
                <div class="modal-body">
                    <a>ข้อมูลอุปกรณ์</a><br>
                    <img src="<?= $rs_invt["add_picture"] ?>" width="50px">
                    <hr>
                    <table style="width: 100%;">
                        <tr>
                            <td><b>รหัสอุปกรณ์</b></td>
                            <td><input type="text" id="value" class="form-control"></td>
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
        function setval(value) {
            console.log(value);
            $('#myModal').modal('show'); //เผื่อ modal ไม่ขึ้นนะครับ
            var req = $.ajax({
                url: "server.php", //หน้าที่จะโพสต์ไป
                type: "GET",
                data: "id=" + value
            });
           
            req.success(function(result) {
                var obj = jQuery.parseJSON(result);
                console.log(obj[9]);
                console.log(obj[9]);

                setTimeout(function() {
                    document.getElementById("value").value = obj[9];
                }, 200); // setTimeout เพราะว่าเผื่อเวลาที่ใช้ในการเปิด modal ครับ
                // $.each(obj, function(key, val) {
                //     setTimeout(function() {
                //         document.getElementById("value").value = val['add_name'];

                //         // val['value'] value คือ = ชื่อ fields
                //     }, 200); // setTimeout เพราะว่าเผื่อเวลาที่ใช้ในการเปิด modal ครับ
                // });
            });
        }
    </script>


</body>

</html>