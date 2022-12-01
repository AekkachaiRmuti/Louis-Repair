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
                                  $sql_type = "SELECT COUNT(rp_job) as count_type, type_name, rp_date_repair FROM `tbl_repair` LEFT OUTER JOIN tbl_typework_repair on tbl_typework_repair.type_id = tbl_repair.rp_type_repair GROUP by tbl_typework_repair.type_name;";
                                  $qr_type = mysqli_query($conn, $sql_type);
                                  $dataPoints = array();
                                  while ($rs_type = mysqli_fetch_array($qr_type)) {
                                      array_push($dataPoints,array("y" => $rs_type['count_type'], "label" => $rs_type['type_name']));
                                      
                                  }
                                  $sql_type1 = "SELECT COUNT(rp_job) as count_type, cate_name, rp_date_repair FROM `tbl_repair` LEFT OUTER JOIN tbl_category on tbl_category.cate_id = tbl_repair.rp_name_inventory GROUP BY cate_name;";
                                  $qr_type1 = mysqli_query($conn, $sql_type1);
                                  $dataPoints1 = array();
                                  while ($rs_type1 = mysqli_fetch_array($qr_type1)) {
                                      array_push($dataPoints1,array("y" => $rs_type1['count_type'], "label" => $rs_type1['cate_name']));
                                      
                                  }
                                  $sql_type2 = "SELECT dept_name, rp_date_repair,COUNT(rp_job) as c_job FROM `tbl_repair` LEFT OUTER JOIN tbl_position on tbl_position.pst_id = tbl_repair.rp_position LEFT OUTER JOIN tbl_department on tbl_department.dept_id = tbl_position.pst_department LEFT OUTER JOIN tbl_brance on tbl_brance.brn_id = tbl_department.dept_brance GROUP by dept_name;";
                                  $qr_type2 = mysqli_query($conn, $sql_type2);
                                  $dataPoints2 = array();
                                  while ($rs_type2 = mysqli_fetch_array($qr_type2)) {
                                      array_push($dataPoints2,array("y" => $rs_type2['c_job'], "label" => $rs_type2['dept_name']));
                                      
                                  }
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
                                                yValueFormatString: "#,##0.## เครื่อง",
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
                                                yValueFormatString: "#,##0.## เครื่อง",
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