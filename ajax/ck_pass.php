<?php
include '../config/connect_db.php';
$sql_pst = "SELECT * FROM `tbl_user` WHERE user_id ='{$_GET['id']}'";
    $qr_pst = mysqli_query($conn, $sql_pst);
    $rs_pst = mysqli_fetch_assoc($qr_pst);

    if($rs_pst['user_pw'] == $_GET['pass']){
echo "1";
    }else{
      echo "0";  
    }

?>