<h3>เพิ่มข้อมูล</h3>
<div class="container">
    <div class="container-fluid">
        <div class="">
        <form method="POST">
            <div class="row">

              
                    <div class="col-lg-6 col-md-6 col-sm-12 p-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>ประเภทการตรวจเช็ค</h4>
                            </div>
                            <div class="card-body">
                                <label for="">ชื่อแผน PM</label><input type="text" name="pm_name" class="form-control">
                                <label for="">ประเภทการตรวจเช็ค</label><input type="text" name="pm_type" class="form-control">
                            </div>
                            <div class="card-header">
                                <h4>ผู้ดำเนินการ</h4>
                            </div>
                            <div class="card-body">
                                <label for="">ผู้ดำเนินการ</label><input type="text" name="pm_user" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 p-3">
                        <div class="card">
                            <div class="card-header">
                                <h4>วันเริ่มแผน/วันสิ้นสุดแผน</h4>
                            </div>
                            <div class="card-body">
                                <label for="">วันเริ่มแผน</label><input type="datetime-local" name="pm_date_start" class="form-control">
                                <label for="">วันสิ้นสุดแผน</label><input type="datetime-local" name="pm_date_end" class="form-control">
                                <label for="">ความถี่</label><select name="pm_frequency" id="" class="form-control">
                                    <option value="ไม่ได้เลือก">-เลือก-</option>
                                    <option value="ทุกวัน">ทุกวัน</option>
                                    <option value="ทุกสัปดาห์">ทุกสัปดาห์</option>
                                    <option value="ทุกเดือน">ทุกเดือน</option>
                                </select>
                            </div>
                            <div class="card-header">
                                <h4>ชื่ออุปกรณ์</h4>
                            </div>
                            <div class="card-body">
                                <input type="text" class="form-control" name="pm_invt_name">
                            </div>
                        </div>
                    </div>

                    <?php
                    if(isset($_POST['btn_save'])){
                        $key = 'PM'.date("Ymd").rand(0,99);
                        $sql_pm = "INSERT INTO tbl_pm_maintenanace (`pm_name`,`pm_type`,`pm_user`,`pm_date_start`,`pm_date_end`,`pm_frequency`,`pm_invt_name`,`pm_key`)
                        VALUES('{$_POST['pm_name']}','{$_POST['pm_type']}','{$_POST['pm_user']}','{$_POST['pm_date_start']}','{$_POST['pm_date_end']}','{$_POST['pm_frequency']}','{$_POST['pm_invt_name']}','$key')";
                        $qr_pm = mysqli_query($conn, $sql_pm);
                    }
                    ?>
               

                <button class="btn btn-primary" name="btn_save" type="submit" style="width: 100px ;">บันทึก</button>



                <!-- <div class="col-lg-12 col-md-12 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>วันที่กำหนด PM</h4>
                           
                            <div class="col-lg-3 col-md-3 col-sm-12"> 
                            <button type="submit" name="" class="btn btn-warning" style="width: 50%;">เพิ่มข้อมูล</button></div>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-bordered detail-view" id="example">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">วันที่กำหนด PM</th>
                                        <th style="text-align: center;">แก้ไข</th>
                                        <th style="text-align: center;">ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2021-05-01</td>
                                        <td style="text-align: center;"><a href="#" class="btn btn-warning">แก้ไข</a></td>
                                        <td style="text-align: center;"><a href="#" class="btn btn-danger">ลบ</a></td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> -->
            </div>
            </form>
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