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
                        <h1>ค่าใช้จ่าย</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php?page=home">หน้าแรก</a></li>
                            <li class="breadcrumb-item active"><a href="">ค่าใช้จ่าย</a></li>

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
                                <b>สรุปค่าใช้จ่ายแยกตามแผนก/หน่วยงาน</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-sm-12 col-md-3 col-gl-3">
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
                                    </div> -->

                                    <div class="col-sm-12 col-md-12 col-gl-12">
                                        <table class="table" id="example" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>สาขา</th>
                                                    <th>หน่วยงาน/แผนก</th>
                                                    <th>ค่าซ่อม</th>
                                                    <th>ค่าอะไหล่</th>
                                                    <th>ค่าอุปกรณ์</th>
                                                    <th>VAT 7%</th>
                                                    <th>รวมค่าใช้จ่าย</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            <?php
                                            $sql_mtn = "SELECT * FROM `tbl_repair`
                                            LEFT OUTER JOIN tbl_expenses on tbl_expenses.exp_repair = tbl_repair.rp_id
                                            LEFT OUTER JOIN tbl_position on tbl_position.pst_id = tbl_repair.rp_position
                                            LEFT OUTER JOIN tbl_department ON tbl_department.dept_id = tbl_position.pst_department
                                            LEFT OUTER JOIN tbl_brance ON tbl_brance.brn_id = tbl_department.dept_brance";
                                            $qr_mtn = mysqli_query($conn, $sql_mtn);
                                            while($rs_mtn = mysqli_fetch_assoc($qr_mtn)){
                                            ?>
                                                <tr>
                                                    <td><small><?= $rs_mtn['rp_job']?><br><i><?= $rs_mtn['rp_date_repair']?></i></small></td>
                                                    <td><?= $rs_mtn['brn_name']?></td>
                                                    <td><?= $rs_mtn['dept_name']?></td>
                                                    <td style="text-align: right"><?= number_format($rs_mtn['exp_maintenance'],2)."฿";?></td>
                                                    <td style="text-align: right"><?= number_format($rs_mtn['exp_part'],2)."฿";?></td>
                                                    <td style="text-align: right"><?= number_format($rs_mtn['exp_invt'],2)."฿";?></td>
                                                    <td style="text-align: right"><?= number_format($rs_mtn['exp_vat'],2)."฿";?></td>
                                                    <td style="text-align: right"><?=number_format($rs_mtn['exp_maintenance']+$rs_mtn['exp_part']+$rs_mtn['exp_invt']+$rs_mtn['exp_vat'],2)."฿"?></td>
                                                    
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
                    </div>
                </div>
                <br>
                <div class="card card-default">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card-header">
                                <b>สรุปค่าใช้จ่ายแยกตามประเภทงานซ่อม</b>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- <div class="col-sm-12 col-md-3 col-gl-3">
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
                                    </div> -->

                                    <div class="col-sm-12 col-md-12 col-gl-12">
                                        <table class="table" id="example1" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>ประเภทงานซ่อม</th>
                                                    <th>ค่าซ่อม</th>
                                                    <th>ค่าอะไหล่</th>
                                                    <th>ค่าอุปกรณ์</th>
                                                    <th>VAT 7%</th>
                                                    <th>รวมค่าใช้จ่าย</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i = 1;
                                                $sql_type = "SELECT * FROM `tbl_repair`
                                                LEFT OUTER JOIN tbl_expenses on tbl_expenses.exp_repair = tbl_repair.rp_id
                                                LEFT OUTER JOIN tbl_position on tbl_position.pst_id = tbl_repair.rp_position
                                                LEFT OUTER JOIN tbl_department ON tbl_department.dept_id = tbl_position.pst_department
                                                LEFT OUTER JOIN tbl_brance ON tbl_brance.brn_id = tbl_department.dept_brance
                                                LEFT OUTER JOIN tbl_typework_repair on tbl_typework_repair.type_id = tbl_repair.rp_type_repair";

                                                $qr_type = mysqli_query($conn, $sql_type);
                                                while($rs_type = mysqli_fetch_assoc($qr_type)){
                                                ?>
                                                <tr>
                                                <td><small><?= $rs_type['rp_job']?><br><i><?= $rs_type['rp_date_repair']?></i></small></td>
                                                    <td><?= $rs_type['type_name']?></td>
                                                    <td style="text-align: right"><?= number_format($rs_type['exp_maintenance'],2)."฿";?></td>
                                                    <td style="text-align: right"><?= number_format($rs_type['exp_part'],2)."฿";?></td>
                                                    <td style="text-align: right"><?= number_format($rs_type['exp_invt'],2)."฿";?></td>
                                                    <td style="text-align: right"><?= number_format($rs_type['exp_vat'],2)."฿";?></td>
                                                    <td style="text-align: right"><?=number_format($rs_type['exp_maintenance']+$rs_type['exp_part']+$rs_type['exp_invt']+$rs_type['exp_vat'],2)."฿"?></td>
                                                    
                                                    
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