<a href="index.php?page=maintenance&pm=pm_planadd">

    <a href="?page=plan_maintenance&pm=pm_planadd">เพิ่มข้อมูล PM</a>
</a>

<table class="table" id="example">
    <thead>
        <tr>
            <th>#</th>
            <th>PM No.</th>
            <th>ชื่อแผน PM</th>
            <th>ประเภทการตรวจเช็ค</th>
            <th>ชื่ออุปกรณ์</th>
            <th>วันเริ่มแผน</th>
            <th>วันสิ้นสุดแผน</th>
            <th>ความถี่</th>
            <th>ผู้ดำเนินการ</th>
            <th>แก้ไข</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 1;
        $sql_plan = "SELECT * FROM `tbl_pm_maintenanace`";
        $qr_plan = mysqli_query($conn, $sql_plan);
        while ($rs_plan = mysqli_fetch_assoc($qr_plan)) {
        ?>


            <tr>
                <td><?= $i?></td>
                <td><?= $rs_plan["pm_key"] ?></td>
                <td><?= $rs_plan["pm_name"] ?></td>
               
                <td><?= $rs_plan["pm_type"] ?></td>
                <td><?= $rs_plan["pm_invt_name"] ?></td>
                <td><?= $rs_plan["pm_date_start"] ?></td>
                <td><?= $rs_plan["pm_date_end"] ?></td>
                <td><?= $rs_plan["pm_frequency"] ?></td>
                <td><?= $rs_plan["pm_user"] ?></td>
                <td><a href="index.php?page=plan_maintenance&pm=pm_planedit" class="btn btn-warning">แก้ไข</a></td>
            </tr>
        <?php
        $i++;
        }
        ?>
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