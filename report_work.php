<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>รายงานข้อมูลการทำงาน</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">รายงานข้อมูลการทำงาน</a></li>

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
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-12">
                                        <table class="table-striped table-bordered detail-view" id="example"" style=" width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>วันที่แจ้งซ่อม</th>
                                                    <th>ชื่อผู้แจ้ง</th>
                                                    <th>ประเภทงานซ่อม</th>
                                                    <th>ปัญหางานซ่อม</th>
                                                    <th>สาเหตุ/วิธีแก้ไข</th>
                                                    <th>ผู้ดำเนินการ</th>
                                                    <th>วันที่สำเร็จ</th>
                                                    <th>ค่าใช้จ่าย</th>
                                                    <th>สถานะ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><small>No.028384384</small><br><?= date("Y-m-d H:m:s") ?></td>
                                                    <td>Aekkachia namwicha<br><small>(IT Support)</small></td>
                                                    <td>ซ่อมบำรุง</td>
                                                    <td>หมึกหมด</td>
                                                    <td>เติมหมึก 4 สี</td>
                                                    <td>Aekkachai Namweicha<br><small>IT Support</small></td>
                                                    <td><?= date("Y-m-d H:m:s") ?></td>
                                                    <td>00.00</td>
                                                    <td>สำเร็จ</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <hr>
                                    <h3>สถิติการปฎิบัติงาน : 1 มกราคม 2565 ถึง 31 มกราคม 2565</h3>
                                    <div class="col-md-3 col-sm-12 col-3">

                                        <div class="form-group">

                                            <label for="">วันเริ่มต้น</label><input type="date" name="" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-3 col-sm-12 col-3">
                                        <div class="form-group">

                                            <label for="">ถึง</label><input type="date" name="" class="form-control">

                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-3">
                                        <div class="form-group">

                                            <label for="" style="color: red;">**คลิกปุ่มค้นหา</label><br>
                                            <button type="submit" name="" class="btn btn-success">ค้นหา</button>

                                        </div>
                                    </div>
                                    <?php

                                    $dataPoints = array(
                                        array("label" => "โปรแกรม(IT)", "y" => 60.0),
                                        array("label" => "อุปกรณ์(IT)", "y" => 6.5),
                                        array("label" => "ปัญหาระบบเครื่อข่าย(IT)", "y" => 4.6),
                                        array("label" => "อื่นๆ", "y" => 2.4),
                                        array("label" => "ปัญหากล้องวงจรปิด(IT)", "y" => 1.9),
                                        array("label" => "งานติดตั้ง(IT)", "y" => 1.8),
                                        array("label" => "Onsite(IT)", "y" => 1.5),
                                        array("label" => "แก้ไขข้อมูล(IT)", "y" => 1.5),
                                        array("label" => "สแกนนิ้ว(IT)", "y" => 1.3),
                                        array("label" => "งานซ่อม(IT)", "y" => 0.9),
                                        array("label" => "อบรม", "y" => 0.8),
                                        array("label" => "Install Software(IT)", "y" => 1.3),
                                        array("label" => "ซ่อมบำรุง(IT)", "y" => 0.9),
                                        array("label" => "Human Error", "y" => 0.8)
                                    );

                                    ?>
                                    <script>
                                        window.onload = function() {

                                            var chart = new CanvasJS.Chart("chartContainer", {
                                                animationEnabled: true,
                                                theme: "light2",
                                                title: {
                                                    text: "สถิติการปฎิบัติงาน"
                                                },
                                                axisY: {
                                                    suffix: "%",
                                                    scaleBreaks: {
                                                        autoCalculate: true
                                                    }
                                                },
                                                data: [{
                                                    type: "column",
                                                    yValueFormatString: "#,##0\"%\"",
                                                    indexLabel: "{y}",
                                                    indexLabelPlacement: "inside",
                                                    indexLabelFontColor: "white",
                                                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                                }]
                                            });
                                            chart.render();

                                        }
                                    </script>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                    </div>






                                </div>
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