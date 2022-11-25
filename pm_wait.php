<table class="table table-striped table-bordered detail-view" id="example">
    <thead>
        <tr>
            <th>วันที่กำหนด PM</th>
            <th>ชื่อแผน PM</th>
            <th>ประเภทการตรวจเช็ค</th>
            <th>ชื่ออุปกรณ์</th>
            <th>ผู้ดำเนินการ</th>
            <th></th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= date("Y-m-d H:m:s") ?></td>
            <td>ทำความสะอาดอุปกรณ์</td>
            <td>ตรวจเช็คอุปกรณ์ประจำปี</td>
            <td>server ad</td>
            <td>ประยุทธ์</td>
            <td>Overdue PM</td>
            <td><a href="#" class="btn btn-primary">เริ่มทำ PM</a></td>
           
        </tr>
    </tbody>
</table>

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