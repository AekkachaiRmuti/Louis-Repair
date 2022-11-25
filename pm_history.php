<h3> ประวัติ PM</h3>
<div class="container">
    <div class="container-fluid">
        <div class="">

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 p-3">
                    <div class="card">
                       
                        <div class="card-body">
                            <table class="table table-striped table-bordered detail-view" id="example">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">วันที่กำหนด PM</th>
                                        <th style="text-align: center;">วันเข้าทำ PM</th>
                                        <th style="text-align: center;">ชื่ออุปกรณ์</th>
                                        <th style="text-align: center;">ประเภทการตรวจเช็ค</th>
                                        <th style="text-align: center;">ผู้ดำเนินการ</th>
                                        <th style="text-align: center;">สถานะ</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2021-05-01</td>
                                        <td>2021-05-01</td>
                                        <td><small>testjjjjsjsjsj</small><br><p>Printer A4</p></td>
                                        <td>ตรวจเช็คอุปกรณ์ประจำปี</td>
                                        <td>Aekkachai namwicha<br><small>chief Design Engineer</small></td>
                                        <td>Overdue PM</td>
                                        
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