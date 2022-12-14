<?php
include '../config/connect_db.php';
$sql_invt = "SELECT * FROM `tbl_add_inventory` LEFT OUTER JOIN tbl_category on tbl_category.cate_id = tbl_add_inventory.add_category WHERE add_id = '{$_GET['idaad']}'";
$qr_invt = mysqli_query($conn, $sql_invt);
$rs_invt = mysqli_fetch_assoc($qr_invt);
?>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียด</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a>ข้อมูลอุปกรณ์</a><br>
                <center>
                    <img src="./<?= $rs_invt['add_picture'] ?>" width="200px">
                </center>
                <hr>
                <table style="width: 100%;">
                    <tr>
                        <td><b>รหัสอุปกรณ์</b></td>
                        <td><?= $rs_invt['add_code'] ?></td>
                        <td><b>ผู้ใช้งาน</b></td>
                        <td><?= $rs_invt['add_user'] ?></td>
                    </tr>
                    <tr>
                        <td><b>ซีเรียลนัมเบอร์</b></td>
                        <td><?= $rs_invt['add_serail'] ?></td>
                        <td><b>วันเริ่มใช้งาน</b></td>
                        <td><?= $rs_invt['add_date_start'] ?></td>
                    </tr>
                    <tr>
                        <td><b>ชื่ออุปกรณ์</b></td>
                        <td><?= $rs_invt['add_name'] ?></td>
                        <td><b>อายุการใช้งาน</b></td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td><b>หมวดหมู่อุปกรณ์</b></td>
                        <td><?= $rs_invt['cate_name'] ?></td>
                        <td><b>ราคา</b></td>
                        <td><?= $rs_invt['add_price'] ?></td>
                    </tr>
                    <tr>
                        <td><b>หน่วยงาน/แผนก</b></td>
                        <td><?= $rs_invt['add_department'] ?></td>
                        <td><b>สถานะอุปกรณ์</b></td>
                        <td><?= $rs_invt['add_status'] ?></td>
                    </tr>
                    <tr>
                        <td><b>สถานที่ติดตั้ง</b></td>
                        <td><?= $rs_invt['add_location_setup'] ?></td>
                        <td><b>รายละเอียดเพิ่มเติม</b></td>
                        <td><?= $rs_invt['add_detail'] ?></td>
                    </tr>
                </table>
                <hr>
                <p>ข้อมูลประกัน</p>
                <table style="width: 50%;">
                    <tr>
                        <td><b>ผู้ผลิต/จำหน่าย</b></td>
                        <td style="text-align: left;"><?= $rs_invt['add_productby'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>การรับประกัน</b></td>
                        <td style="text-align: left;"><?= $rs_invt['add_varanty'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><b>วันหมดประกัน</b></td>
                        <td style="text-align: left;"><?= $rs_invt['add_varanty_expire'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                </table>
                
               
               
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>