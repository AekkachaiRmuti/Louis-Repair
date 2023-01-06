<div class="wrapper">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>การแจ้งปัญหา (IT Support)</h1>
                        <!-- <button class="btn btn-warning" onclick="window.location.href='index.php?page=it_problem&update=1'">UPDATE</button>
                        <small>UPDATE DATA FROM DATABASE louis_db.it_problem to louis_repair</small> -->
                    </div>
                    <?php
                    if(@$_GET['update'] == 1){
                        $cr_sql = "CREATE TABLE tbl_it_problem
                        (itp_id int(10) NOT NULL AUTO_INCREMENT,
                        itp_date varchar(255),
                        itp_dept varchar(255),
                        itp_dept_id varchar(10),
                        itp_name varchar(255),
                        itp_detail varchar(255),
                        itp_ip varchar(255),
                        itp_anydesk varchar(255),
                        itp_status varchar(100),
                        itp_problem varchar(255),
                        itp_user varchar(255),
                        PRIMARY KEY (itp_id))";

                        $qr_cr = mysqli_query($conn, $cr_sql);
                        if($qr_cr){
                            echo "<script>window.location.href='index.php?page=it_problem'</script>";
                        }
                    }
                    ?>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">การแจ้งปัญหา (IT Support)</a></li>

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
                                <form method="POST">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-12">
                                            <table class="table-striped table-bordered detail-view" id="example"" style=" width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>ลำดับ</th>
                                                        <th>วันที่แจ้งปัญหา</th>
                                                        <th>แผนก</th>
                                                        <th>ชื่อผู้แจ้ง</th>
                                                        <th>รายละเอียดปัญหา</th>
                                                        <th>IP Address</th>

                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $servername = "localhost";
                                                    $username = 'root';
                                                    $password = '';
                                                    $db_name = 'louis_db';

                                                    $conn = mysqli_connect($servername, $username, $password, $db_name);
                                                    $i = 1;
                                                    $sql_rp = "SELECT * FROM it_problem order by itp_id desc";
                                                    $qr_rp = mysqli_query($conn, $sql_rp);

                                                    while ($rs_rp = mysqli_fetch_assoc($qr_rp)) {
                                                    ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= $rs_rp['itp_date'] ?></td>
                                                            <td><?= $rs_rp["itp_dept"] ?></td>
                                                            <td><?= $rs_rp["itp_name"] ?></td>
                                                            <td><?= $rs_rp["itp_detail"] ?></td>
                                                            <td><?= $rs_rp['itp_ip'] ?></td>
                                                        </tr>
                                                    <?php
                                                        $i++;
                                                    }
                                                   
                                                    ?>
                                                </tbody>
                                            </table>

                                        </div>
                                       <br>
                                        <?php
                                        if (@!$_GET['d1']) {
                                            $ds = date("d-m-Y", strtotime("first day of this month"));
                                            $de = date("d-m-Y", strtotime("last day of this month"));
                                        } else {
                                            $ds = $_GET['d1'];
                                            $de = $_GET['d2'];
                                        }
                                        ?>
                                        <!-- <h3>สถิติการปฎิบัติงาน : <?= @$ds ?> ถึง <?= @$de  ?></h3>
                                        <div class="col-md-3 col-sm-12 col-3">

                                            <div class="form-group">

                                                <label for="">วันเริ่มต้น</label><input type="date" name="date_s" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-md-3 col-sm-12 col-3">
                                            <div class="form-group">

                                                <label for="">ถึง</label><input type="date" name="date_e" class="form-control">

                                            </div>
                                        </div> -->
                                        <!-- <div class="col-md-3 col-sm-12 col-3">
                                            <div class="form-group">

                                                <label for="" style="color: red;">**คลิกปุ่มค้นหา</label><br>
                                                <button type="submit" name="btn_find" class="btn btn-success">ค้นหา</button>
                                                <?php
                                                if (isset($_POST['btn_find'])) {
                                                    echo "<script>window.location.href='index.php?page=report_work&d1={$_POST['date_s']}&d2={$_POST['date_e']}'</script>";
                                                }
                                                ?>
                                            </div>
                                        </div> -->
                                        <?php


                                        $sql_rp = "SELECT COUNT(itp_dept_id) as ccc , itp_dept FROM it_problem GROUP BY itp_dept;";
                                        $qr_rp = mysqli_query($conn, $sql_rp);
                                        $dataPoints = array();
                                        while ($rs_rp = mysqli_fetch_array($qr_rp)) {
                                            array_push($dataPoints, array("label" => $rs_rp['itp_dept'], "y" => $rs_rp['ccc']));
                                        }

                                        ?>
                                        <script>
                                            window.onload = function() {


                                                var chart_bar = new CanvasJS.Chart("chartContainer", {
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
                                                        yValueFormatString: "#,##0.## ครั้ง",
                                                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                                    }]
                                                });
                                                chart_bar.render();
                                            }
                                        </script>
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                        </div>






                                    </div>
                                </form>
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