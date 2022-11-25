<?php
include 'connect_db.php'; 

$id = $_GET['id'];
$query= mysqli_query($conn,"SELECT * FROM `tbl_add_inventory` LEFT OUTER JOIN tbl_category on tbl_category.cate_id = tbl_add_inventory.add_category WHERE add_id ='$id'");
$return = mysqli_fetch_array($query);
echo json_encode($return,JSON_UNESCAPED_UNICODE);
?>