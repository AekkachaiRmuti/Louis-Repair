<?php
include 'connect_db.php';
// // require_once __DIR__ . '/vendor/autoload.php';

// $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
// $fontDirs = $defaultConfig['fontDir'];

// $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
// $fontData = $defaultFontConfig['fontdata'];

// $mpdf = new \Mpdf\Mpdf([
//     'fontDir' => array_merge($fontDirs, [
//         __DIR__ . '/tmp',
//     ]),
//     'fontdata' => $fontData + [
//         'sarabun' => [
//             'R' => 'THSarabunNew.ttf',
//             'I' => 'THSarabunNew Italic.ttf',
//             'B' => 'THSarabunNew Bold.ttf',
//             'BI' => 'THSarabunNew BoldItalic.ttf'
//         ]
//     ],
//     'default_font' => 'sarabun'
// ]);

// ob_start();

// $sql_inventory = "SELECT * FROM `inventory_repair` LEFT OUTER JOIN branch ON branch.brn_id = inventory_repair.invt_branch LEFT OUTER JOIN department_repair ON department_repair.dept_id = inventory_repair.invt_dept LEFT OUTER JOIN user_repair ON user_repair.user_id = inventory_repair.invt_user LEFT OUTER JOIN category_it ON category_it.cate_id = inventory_repair.invt_equipment LEFT OUTER JOIN status_repair ON status_repair.sts_id = inventory_repair.invt_status WHERE invt_id='{$_GET['id']}'";
// $qr_inventory = mysqli_query($conn, $sql_inventory);
// $rs_inventory = mysqli_fetch_assoc($qr_inventory);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Louis Adhesive Tepes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Sarabun&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
        }

        .p-2 {
            padding: 2 px;
            margin: 5px;
        }
    </style>
</head>

<body>

    <body>
        <?php
        $sql_select = "SELECT * FROM `tbl_equipment_borrow` LEFT OUTER JOIN tbl_equipment_detail ON tbl_equipment_detail.edetail_borrow = tbl_equipment_borrow.ebr_key WHERE ebr_id ={$_GET['id']}";
        $qr_sqlect = mysqli_query($conn, $sql_select);
        $rs_data = mysqli_fetch_assoc($qr_sqlect);
        $datetime = $rs_data['ebr_date'];
        $insertdate = date("d-m-Y", strtotime($datetime));
        ?>


        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <h4 align="center" class="text-center" width="100%"><b>บริษัท หลุยส์ผลิตภัณฑ์กาวเทป จำกัด</b></h4>
                    <table align="center">
                        <tr>
                            <td><img src="./img/11.png" width="80px"> &nbsp;&nbsp;&nbsp;</td>
                            <td><small><p>1070 ซอยสวนพลู ถนนสาทรใต้ แขวงทุ่งมหาเมฆ เขตสาทร กรุงเทพฯ 10120<br>
                                    สำนักงานใหญ่ (สาทร) : Tel :02-287-2100 (12 Lines) Fax : 02-287-4736<br>
                                    โรงงาน (สมุทรปราการ) : Tel : 02-383-0823 (10 Lines) Fax : 02-756-7367<br>
                                    โรงงาน (ชลบุรี) : Tel : 038-213-111, 121 -2 Fax : 038-213-120<br>
                                    Email : factory@louistapes.com URL : www.louistapes.com</p></small></td>
                            <td><img src="./img/12.jpg" width="120px"></td>
                        </tr>
                    </table>
                    
                    <center>
                        <h4><b>ใบยืมคอมพิวเตอร์พกพา</b></h4>
                    </center>

                    <b>ชื่อผู้ใช้งาน/ผู้ขอยืม</b>&nbsp;&nbsp;
                    <span style='border-bottom:#000 1px dotted;'><?= $rs_data['ebr_name']?></span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>ตำแหน่ง</b>&nbsp;&nbsp;
                    <span style='border-bottom:#000 1px dotted;'><?= $rs_data['ebr_position']?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <b>สังกัดแผนก/ฝ่าย</b>&nbsp;&nbsp;
                    <span style='border-bottom:#000 1px dotted;'><?= $rs_data['ebr_dept']?></span>
                    <br>
                    <b>สาขา </b>&nbsp;&nbsp;
                    <span style='border-bottom:#000 1px dotted;'><?= $rs_data['ebr_branch']?></span>&nbsp;&nbsp;&nbsp;
                    <b>เบอร์ </b>&nbsp;&nbsp;
                    <span style='border-bottom:#000 1px dotted;'><?= $rs_data['ebr_tel']?></span>&nbsp;&nbsp;&nbsp;
                    <b>มีความประสงค์จะขอยืมคอมพิวเตอร์พกพา (Notebook) จำนวน</b>&nbsp;&nbsp;
                    <span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;<?= $rs_data['ebr_qty']?>&nbsp;&nbsp;</span>เครื่อง&nbsp;&nbsp;&nbsp;
                    <b>โดยมีวัตถุประสงค์</b> <span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;<?= $rs_data['ebr_desscript']?>&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;
                    <br>
                    <br>
                    <b>รายละเอียดเครื่องคอมพิวเตอร์พกพา</b>
                    <table style="width: 100%;" border="1" class="text-center">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ลำดับ</th>
                                <th style="text-align: center;">หมายเลขทรัพย์สิน</th>
                                <th style="text-align: center;">หมายเลขเครื่อง S/N</th>
                                <th style="text-align: center;">ยี่ห้อ/รุ่น/สี</th>
                                <th style="text-align: center;">ราคา</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    1
                                </td>
                                <td><?= $rs_data['edetail_no']?></td>
                                <td><?= $rs_data['edetail_pc']?></td> 
                                <td><?= $rs_data['edetail_brand']?></td>
                                <td><?= $rs_data['edetail_price']?></td>
                            </tr>
                        </tbody>
                    </table>
                    <b>อุปกรณ์ต่อพ่วง</b> <input type="checkbox" name="" id="" value="Adepter">&nbsp;<label for="Adepter">Adapter</label>&nbsp;&nbsp;
                    <input type="checkbox" name="" id="" value="Mouse">&nbsp;<label for="Mouse">Mouse</label>&nbsp;&nbsp;
                    <input type="checkbox" name="" id="" value="กระเป๋า">&nbsp;<label for="bage">กระเป๋า</label>&nbsp;&nbsp;
                    <input type="checkbox" name="" id="" value="อื่นๆ">&nbsp;<label for="orther">อื่นๆ</label>&nbsp;&nbsp;<span >.........................</span><br>
                    <b>ระยะเวลาในการยืมนับตั้งแต่วันที่</b><span style="border-bottom:#000 1px dotted ;"> <?= $insertdate?></span>  <b>ถึงวันที่</b><span >.....................</span>
                    <br>
                    &nbsp;<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ข้าพเจ้าได้รับมอบทรัพย์สินข้างต้นแล้วเมื่อวันที่ <span style="border-bottom:#000 1px dotted ;"><?= $insertdate ?></span> ซึ่งข้าพเจ้าได้ตรวจสอบดีแล้วว่าอยู่ในสภาพพร้อมใช้งานทุกประการ และเมื่อสิ้นสุดการจ้างหรือเมื่อบริษัทฯ จำเป็นต้องเรียกคืน ข้าพเจ้ายินดีที่จะนำทรัพย์สินดังกล่าวมาคืนในสภาพเดิม หากมีการชำรุดหรือสูญหายข้าพเจ้ายินดีชำระเงินคืนเต็มจำนวนของราคาทรัพย์สินหรือยินยอมให้บริษัทฯ หักเงินเดือนหรือรายได้ของข้าพเจ้าจนครบตามจำนวนของทรัพย์สินที่ระบุไว้ข้างต้น</p>
                    <br>

                    <table>
                        <tr>
                            <td><b>ลงชื่อผู้ยืม/ผู้รับเครื่อง</b><span>........................................</span><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;<span>(......................................)</span>
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>วันที่......./......./........</span>
                            </td>
                            <td style="width: 100px;">
                            </td>
                            <td><b>ลงชื่อผู้บังคับบัญชาอนุมัติ</b><span>........................................</span><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<span>(......................................)</span>
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ตำแหน่ง ผู้อำนวยการฝ่ายขึ้นไป</span>
                            </td>
                        </tr>
                    </table>
                    <br><br>
                    <table>
                        <tr>
                            <td><b>ลงชื่อ</b><span>........................................</span><b>ผู้จ่ายทรัพย์สิน</b><br>

                                &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<span>(......................................)</span>
                                <br>


                                &nbsp;&nbsp;&nbsp;<span>ตำแหน่ง...............................</span>
                            </td>
                            <td style="width: 100px;"></td>
                            <td>
                                &nbsp;&nbsp; <b>ลงชื่อผู้อนุมัติ</b><span>................................................................</span><br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;<span>(................................................................)</span>
                                <br>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>ผู้อำนวยการฝ่าย IT</span>
                            </td>
                        </tr>
                    </table>

                    <br>
                    <br>
                    <div style="border: 1px solid;">
                        <div class="p-2">
                            <b>กรณีรับคืน/พนักงานพ้นสภาพหรือบริษัท เรียกทรัพย์สินกลับคืน</b>
                            <p>บริษัทฯ ได้รับทรัพย์สินคืนแล้วในสภาพ</p>
                            <input type="checkbox" name="" id="">&nbsp; <label for="">ครบถ้วน/สมบูรณ์พร้อมใช้งานได้</label> &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="" id="">&nbsp; <label for="">ไม่ครบ/ชำรุด/ใช้งานไม่ได้ (ผู้ยืมต้องเสียค่าใช้จ่าย) มูลค่า................ บาท</label>
                            <br>
                            <input type="checkbox" name="" id="">&nbsp; <label for="">สูญหาย (ผู้ยืมต้องเสียค่าใช้จ่าย) มูลค่า................ บาท โดย</label> &nbsp;&nbsp;&nbsp;
                            <p>**กรณีชำรุด หรือสูญหาย ผู้ยืมยินดีชำระด้วย </p><input type="checkbox" name="" id="">&nbsp;<label for="">เงินสด</label> &nbsp;&nbsp;<input type="checkbox" name="" id="">&nbsp;<label for="">หักจากเงินเดือน</label>
                            <br>
                            <br>
                            <table>
                                <tr>
                                    <td><b>ลงชื่อผู้ส่งคืน</b><span>.......................................</span><br>

                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;วันที่......../......../..........</td>
                                    <td style="width: 200px;"></td>
                                    <td><b>ลงชื่อผู้รับคืน</b><span>.......................................</span><br>

                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;วันที่......../......../..........</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <i>ต้นฉบับ : ฝ่ายIT **กรณีมีการหักค่าใช้จ่ายให้ส่งสำเนามายังฝ่ายบุคคลหรือฝ่ายบัญชีและการเงินเพื่อดำเนินการในขั้นตอนต่อไป</i>

                </div>
            </div>
        </div>

        <script src="/electri/application/assets/1b63e784/jquery.js"></script>
        <script src="/electri/application/assets/a2dfbdfe/yii.js"></script>

    </body>
    <!-- <?php
    // $html = ob_get_contents();
    // $mpdf->WriteHTML($html);
    // $mpdf->Output("MyPDF.pdf");
    // ob_end_flush();
    ?> -->
    <!-- <a href="MyReport.pdf" class="btn btn-primary">แบบฟอร์มการแจ้งซ่อมบำรุง</a> -->
    <!-- <button id="printpagebutton" type="button" onClick="printpage()">Print this page</button> -->
    <script>
        $(document).ready(function() {
            //Get the print button and put it into a variable
            // var printButton = document.getElementById("printpagebutton");
            //Set the print button visibility to 'hidden' 
            // printButton.style.visibility = 'hidden';
            //Print the page content
            window.print()
            // printButton.style.visibility = 'visible';
        });
    </script>
    </div>
</body>