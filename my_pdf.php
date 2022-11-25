<?php
include 'connect_db.php';
require_once __DIR__ . '/vendor/autoload.php';

$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
  'fontDir' => array_merge($fontDirs, [
    __DIR__ . '/tmp',
  ]),
  'fontdata' => $fontData + [
    'sarabun' => [
      'R' => 'THSarabunNew.ttf',
      'I' => 'THSarabunNew Italic.ttf',
      'B' => 'THSarabunNew Bold.ttf',
      'BI' => 'THSarabunNew BoldItalic.ttf'
    ]
  ],
  'default_font' => 'sarabun'
]);

ob_start();

$sql_inventory = "SELECT * FROM `inventory_repair` LEFT OUTER JOIN branch ON branch.brn_id = inventory_repair.invt_branch LEFT OUTER JOIN department_repair ON department_repair.dept_id = inventory_repair.invt_dept LEFT OUTER JOIN user_repair ON user_repair.user_id = inventory_repair.invt_user LEFT OUTER JOIN category_it ON category_it.cate_id = inventory_repair.invt_equipment LEFT OUTER JOIN status_repair ON status_repair.sts_id = inventory_repair.invt_status WHERE invt_id='{$_GET['id']}'";
$qr_inventory = mysqli_query($conn, $sql_inventory);
$rs_inventory = mysqli_fetch_assoc($qr_inventory);
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
  </style>
</head>

<body>

  <body>



    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <h4 align="center">แบบฟอร์มการแจ้งซ่อมบำรุง</h4>
          <p></p>

          <!-- <div class="row">
            <div class="col-md-12">
              <div class="pull-right" id="non-printable">
                <p>
                  <button class="btn btn-info btn-sm" onclick="return window.print();"><i class="glyphicon glyphicon-print"></i> พิมพ์รายงาน</button> 
                  <button class="btn btn-default btn-sm" onclick="return window.close();"><i class="glyphicon glyphicon-off"></i> ปิด</button>
                </p>
              </div>

            </div>
          </div> -->

          <table style="font-size:15px;" width="100%">
            <tbody>
              <tr>
                <td><b>วันที่แจ้งซ่อม</b></td>
                <td class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["invt_date"]; ?>&nbsp;&nbsp;&nbsp;</span></td>
                <td></td>
                <td></td>
                <td><b>สาขา</b> </td>
                <td class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["brn_name"]; ?>&nbsp;&nbsp;&nbsp;</span></td>

              </tr>
              <p></p>
              <tr>
                <td><b>การแจ้งซ่อมอุปกรณ์</b></td>
                <td class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["cate_name"]; ?>&nbsp;&nbsp;&nbsp;</span></td>
                <td><b>ปัญหา</b> </td>
                <td class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["invt_problem"]; ?>&nbsp;&nbsp;&nbsp;</span></td>
                <td><b>สถานะ</b> </td>
                <td class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["sts_name"]; ?>&nbsp;&nbsp;&nbsp;</span></td>

              </tr>
              <tr>
                <td ><b>ผู้แจ้ง</b></td>
                <td class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["user_name"]; ?>&nbsp;&nbsp;&nbsp;</span></td>
                <td  ><b>แผนก</b> </td>
                <td  class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["dept_name"]; ?>&nbsp;&nbsp;&nbsp;</span></td>
                <td ><b>ตำแหน่ง</b> </td>
                <td  class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["user_position"]; ?>&nbsp;&nbsp;&nbsp;</span></td>

              </tr>
              <tr>
                <td ><b>ผู้ดำเนินการ</b></td>
                <td class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["invt_process"]; ?>&nbsp;&nbsp;&nbsp;</span></td>
                <td  ><b>วันที่ดำเนินการ</b> </td>
                <td  class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["invt_success"]; ?>&nbsp;&nbsp;&nbsp;</span></td>
                <td ><b>วันที่ซ่อมเสร็จ</b> </td>
                <td  class="p-dotted" align="center"><span style='border-bottom:#000 1px dotted;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $rs_inventory["invt_success"]; ?>&nbsp;&nbsp;&nbsp;</span></td>

              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="/electri/application/assets/1b63e784/jquery.js"></script>
    <script src="/electri/application/assets/a2dfbdfe/yii.js"></script>

  </body>
  <?php
  $html = ob_get_contents();
  $mpdf->WriteHTML($html);
  $mpdf->Output("MyReport.pdf");
  ob_end_flush();
  ?>
  <!-- <a href="MyReport.pdf" class="btn btn-primary">แบบฟอร์มการแจ้งซ่อมบำรุง</a> -->
  <!-- <button id="printpagebutton" type="button" onClick="printpage()">Print this page</button> -->
 <script>
      function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
       
    }
  </script>
  </div>
</body>