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
                        <h1>รายงานสถิติ</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">รายงานสถิติ</a></li>

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
                                <b>สถิติการซ่อมตามประเภทงานซ่อม</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">วันที่เริ่มต้น</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">ถึง</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="" style="color: red;">**คลิกปุ่มค้นหา</label><br><button name="" class="btn btn-primary">ค้นหา</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $dataPoints = array(
                                    array("y" => 3373.64, "label" => "โปรแกรม(IT)"),
                                    array("y" => 2435.94, "label" => "อุปกรณ์(IT)"),
                                    array("y" => 1842.55, "label" => "ปัญหาระบบเครือข่าย"),
                                    array("y" => 1828.55, "label" => "อื่นๆ"),
                                    array("y" => 1039.99, "label" => "กล้องวงจรปิด"),
                                    array("y" => 765.215, "label" => "งานติดตั้ง"),
                                    array("y" => 612.453, "label" => "Onsite"),
                                    array("y" => 1039.99, "label" => "แก้ไขข้อมูล"),
                                    array("y" => 765.215, "label" => "แสกนนิ้ว"),
                                    array("y" => 612.453, "label" => "ซ่อมบำรุงเชิงป้องกัน"),
                                    array("y" => 1039.99, "label" => "งานซ่อม(IT)"),
                                    array("y" => 765.215, "label" => "อบรม"),
                                    array("y" => 612.453, "label" => "Insatall Software"),
                                    array("y" => 765.215, "label" => "ซ่อมบำรุง"),
                                    array("y" => 612.453, "label" => "Human Error")
                                );
                                $dataPoints1 = array(
                                    array("y" => 3373.64, "label" => "อุปกรณ์อิเล็กทรอนิคส์(EL)-PC"),
                                    array("y" => 2435.94, "label" => "อุปกรณ์อิเล็กทรอนิคส์(EL)-Printer"),
                                    array("y" => 1842.55, "label" => "อุปกรณ์อิเล็กทรอนิคส์(EL)-Monitor"),
                                    array("y" => 1828.55, "label" => "อุปกรณ์อิเล็กทรอนิคส์(EL)-DotMatrix"),
                                    array("y" => 1039.99, "label" => "อุปกรณ์อิเล็กทรอนิคส์(EL)-Printer Thermal"),
                                    array("y" => 765.215, "label" => "อุปกรณ์อิเล็กทรอนิคส์(EL)-UPS"),
                                    array("y" => 612.453, "label" => "อุปกรณ์อิเล็กทรอนิคส์(EL)-Server")
                                   
                                );
                                $dataPoints2 = array(
                                    array("y" => 3373.64, "label" => "IT"),
                                    array("y" => 2435.94, "label" => "บัญชี"),
                                    array("y" => 1842.55, "label" => "การเงิน"),
                                    array("y" => 1828.55, "label" => "การตลาด"),
                                    array("y" => 1039.99, "label" => "จัดซื้อ"),
                                    array("y" => 765.215, "label" => "คลังสินค้า"),
                                    array("y" => 612.453, "label" => "ประสานงานขาย"),
                                    array("y" => 612.453, "label" => "ฝ่ายขาย"),
                                    array("y" => 612.453, "label" => "ส่งออก")
                                );
                                ?>
                                <script>
                                    window.onload = function() {

                                        var chart = new CanvasJS.Chart("chartContainer", {
                                            animationEnabled: true,
                                            theme: "light2",
                                            title: {
                                                // text: "Gold Reserves"
                                            },
                                            axisY: {
                                                // title: "Gold Reserves (in tonnes)"
                                            },
                                            data: [{
                                                type: "column",
                                                yValueFormatString: "#,##0.## tonnes",
                                                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                            }]
                                        });
                                        chart.render();


                                        var chart1 = new CanvasJS.Chart("chartC1", {
                                            animationEnabled: true,
                                            theme: "light2",
                                            title: {
                                                // text: "Gold Reserves"
                                            },
                                            axisY: {
                                                // title: "Gold Reserves (in tonnes)"
                                            },
                                            data: [{
                                                type: "column",
                                                yValueFormatString: "#,##0.## tonnes",
                                                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
                                            }]
                                        });
                                        chart1.render();

                                        var chart2 = new CanvasJS.Chart("chartC2", {
                                            animationEnabled: true,
                                            theme: "light2",
                                            title: {
                                                // text: "Gold Reserves"
                                            },
                                            axisY: {
                                                // title: "Gold Reserves (in tonnes)"
                                            },
                                            data: [{
                                                type: "column",
                                                yValueFormatString: "#,##0.## tonnes",
                                                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                                            }]
                                        });
                                        chart2.render();

                                    }
                                   

                                    
                                </script>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-header">
                                <b>สถิติการซ่อมแยกตามหมวดหมู่อุปกรณ์</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">วันที่เริ่มต้น</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">ถึง</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="" style="color: red;">**คลิกปุ่มค้นหา</label><br><button name="" class="btn btn-primary">ค้นหา</button>
                                        </div>
                                    </div>
                                </div>
                              

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div id="chartC1" style="height: 370px; width: 100%;"></div>
                                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                </div>


                            </div>

                        </div>
                    </div>
                </div>
                                    <br>
                                    <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-header">
                                <b>สถิติการซ่อมแยกตามแผนก/หน่วยงาน</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">วันที่เริ่มต้น</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="">ถึง</label><input type="date" name="" id="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-3 col-gl-3">
                                        <div class="form-group">
                                            <label for="" style="color: red;">**คลิกปุ่มค้นหา</label><br><button name="" class="btn btn-primary">ค้นหา</button>
                                        </div>
                                    </div>
                                </div>
                              

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <div id="chartC2" style="height: 370px; width: 100%;"></div>
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