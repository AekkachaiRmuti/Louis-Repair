<?php
include './connect_db.php';
$sql = "SELECT * FROM `tbl_repair` LEFT OUTER JOIN tbl_urgency ON tbl_urgency.ug_id = tbl_repair.rp_urgency LEFT OUTER JOIN tbl_typework_repair ON tbl_typework_repair.type_id = tbl_repair.rp_type_repair LEFT OUTER JOIN tbl_category ON tbl_category.cate_id = tbl_repair.rp_name_inventory LEFT OUTER JOIN tbl_status ON tbl_status.sts_id = tbl_repair.rp_status 
LEFT OUTER JOIN tbl_position on tbl_position.pst_id = tbl_repair.rp_position
LEFT OUTER JOIN tbl_department on tbl_department.dept_id = tbl_position.pst_department
LEFT OUTER JOIN tbl_brance on tbl_brance.brn_id = tbl_department.dept_brance
LEFT OUTER JOIN tbl_expenses on tbl_expenses.exp_repair = tbl_repair.rp_id
WHERE tbl_status.sts_id = '4' and tbl_repair.rp_id = {$_GET['id']};";
$qr_sql = mysqli_query($conn, $sql);
$rs_sql = mysqli_fetch_assoc($qr_sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ใบแจ้งซ่อม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<style>
    .date {
        position: relative;
        right: -78%;
        bottom: 88%;
    }
    b, td{
        font-size: 18px;
    }
</style>

<body>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <div class="container">
        <div class="row col-12">
            <table style="width: 100%;">
                <tr>

                    <td style="text-align: center; width:100px"><img src="./img/11.png" alt="" width="60px"></td>
                    <td style="text-align: center; width:100px">
                        <center>
                            <h3>แบบฟอร์ม</h3>
                            <p>ใบแจ้งซ่อม ระบบ IT</p>
                        </center>
                    </td>
                    <td style="text-align: left; width:100px"><small>เอกสารหมายเลข : F-IT-01 rev1</small> <br> <small>เอกสารเลขที่ : <?= $rs_sql["rp_job"] ?></small></td>
                </tr>
            </table>
            <hr>
            <div class="date">
                วันที่แจ้ง <?= $rs_sql["rp_date_repair"] ?> &nbsp;&nbsp;<?= $rs_sql["rp_time"] ?>
            </div>
            <br>
            <div class="col-lg-12" >
                <b class="mt-5"><u>ข้อมูลผู้แจ้ง</u></b>
                <div class="p-3">
                    <b>ผู้แจ้ง</b> คุณ <?= $rs_sql["rp_name"] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>ตำแหน่ง</b> <?= $rs_sql["pst_name"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>แผนก</b> <?= $rs_sql["dept_name"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>สาขา</b> <?= $rs_sql["brn_name"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </div>

            </div>
            <div class="col-lg-12 mt-3" >
                <b class="mt-5"><u>ข้อมูลการแจ้ง</u></b>
                <div class="p-3">
                    <b>ประเภทงานซ่อม</b> <?= $rs_sql["type_name"] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>ประเภทอุปกรณ์</b> <?= $rs_sql["cate_name"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>ชื่ออุปกรณ์</b> <?= $rs_sql["rp_serial"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br> <b>ปัญหางานซ่อม</b> <?= $rs_sql["rp_problem"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>ความเร่งด่วน</b> <?= $rs_sql["ug_name"] ?>
                    <br>
                    <b>สถานที่ติดตั้ง</b> <?= $rs_sql["rp_location_setup"] ?>
                </div>

            </div>

            <div class="col-lg-12 mt-3" >
                <b class="mt-5"><u>ข้อมูลการซ่อม</u></b>
                <div class="p-3">
                    <b>ผู้รับแจ้ง</b> <?= $rs_sql["rp_user_accept"] ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>ตำแหน่ง</b> <?= $rs_sql["rp_user_position"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>วันที่ดำเนินการ</b> <?= $rs_sql["rp_date_next"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <b>สาเหตุ:</b> <?= $rs_sql["rp_cause"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>การแก้ไข:</b><?= $rs_sql["rp_problem_success"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
                    <b>วันที่ส่งงาน</b> <?= $rs_sql["rp_date_success"] ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   
                </div>

            </div>

            <div class="col-lg-12 mt-3" >
                <b class="mt-5"><u>ค่าใช้จ่าย</u></b>
                <div class="p-3">
                <table>
                             
                              
                             <tr >
                               
                                 <td style="text-align: left; width:40%">ค่าซ่อม</td>
                                 <td style="width: 20%; text-align :right"><?= number_format($rs_sql["exp_maintenance"],2)?></td>
                                 <td >&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียด</td>
                                 <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_sql["exp_detail_maintenance"]?></td>
                             </tr>
                             <tr>
                             <td style="text-align: left; width:40%">ค่าอะไหล่</td>
                                 <td style="width: 20%; text-align :right"><?= number_format($rs_sql["exp_part"],2)?></td>
                                 <td >&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียด</td>
                                 <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_sql["exp_detail_part"]?></td>
                             </tr>
                             <tr>
                             <td style="text-align: left; width:40%">ค่าอุปกรณ์</td>
                                 <td style="width: 20%; text-align :right"><?= number_format($rs_sql["exp_invt"],2)?></td>
                                 <td >&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียด</td>
                                 <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_sql["exp_detail_invt"]?></td>
                             </tr>
                             <tr >
                             <td style="text-align: left; width:40%">Vat 7%</td>
                                 <td style="width: 20%; text-align :right"><?= number_format($rs_sql["exp_vat"],2)?></td>
                                 <td >&nbsp;&nbsp;&nbsp;&nbsp;รายละเอียด</td>
                                 <td>&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_sql["exp_detail_vat"]?></td>
                             </tr>
                             <tr >
                             <td style="text-align: left; width:40%">รวม</td>
                                 <td style="text-align :right"><?= number_format($rs_sql["exp_vat"]+$rs_sql["exp_part"]+$rs_sql["exp_maintenance"]+$rs_sql["exp_invt"],2)?></td>
                                
                             </tr>
                           </table>
                </div>

            </div>

           

          
        </div>
    </div>
    <!-- <button id="printpagebutton" type="button" onClick="printpage()">Print this page</button> -->

    <script>
        $(document).ready(function() {

            // //Get the print button and put it into a variable
            // var printButton = document.getElementById("printpagebutton");
            // //Set the print button visibility to 'hidden' 
            // printButton.style.visibility = 'hidden';
            // //Print the page content
            window.print()
            // printButton.style.visibility = 'visible';

        });
    </script>
</body>

</html>