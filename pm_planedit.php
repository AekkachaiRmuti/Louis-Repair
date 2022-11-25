<h3>แก้ไข แผนบำรุงรักษา : PM000991882</h3>
<div class="container">
    <div class="container-fluid">
        <div class="">

            <div class="row">


                <div class="col-lg-6 col-md-6 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>ประเภทการตรวจเช็ค</h4>
                        </div>
                        <div class="card-body">
                            <label for="">ชื่อแผน PM</label><input type="text" class="form-control">
                            <label for="">ประเภทการตรวจเช็ค</label><select name="" id="" class="form-control">
                                <option value="">-เลือก-</option>
                            </select>

                        </div>
                        <div class="card-header">
                            <h4>ผู้ดำเนินการ</h4>
                        </div>
                        <div class="card-body">
                            <label for="">ผู้ดำเนินการ</label><select name="" id="" class="form-control">
                                <option value="">-เลือก-</option>
                            </select>

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 p-3">
                    <div class="card">
                        <div class="card-header">
                            <h4>วันเริ่มแผน/วันสิ้นสุดแผน</h4>
                        </div>
                        <div class="card-body">
                            <label for="">วันเริ่มแผน</label><input type="date" class="form-control">
                            <label for="">วันสิ้นสุดแผน</label><input type="date" class="form-control">
                            <label for="">ความถี่</label><select name="" id="" class="form-control">
                                <option value="">-เลือก-</option>
                            </select>
                        </div>
                        <div class="card-header">
                            <h4>ชื่ออุปกรณ์</h4>
                        </div>
                        <p class="p-3">EL569IT25630226 -Printer A4- เครื่องสำรองฝ่ายไอที</p>




                    </div>
                </div>



                <div class="col-lg-12 col-md-12 col-sm-12 p-3">
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