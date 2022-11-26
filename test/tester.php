<?php
include '../connect_db.php';

$sql = "SELECT *, if(uv_vote = 5,uv_vote*5,'') as q5 ,if(uv_vote = 4,uv_vote*4,'') as q4 , if(uv_vote = 3,uv_vote*3,'') as q3
, if(uv_vote = 2,uv_vote*2,'') as q2 ,if(uv_vote = 1,uv_vote*1,'') as q1  FROM `tbl_user_vote`;";
$qr_r = mysqli_query($conn, $sql);
while($rs_vote =mysqli_fetch_assoc($qr_r)){
    echo $rs_vote['q5'] ."<br>" ;
echo $rs_vote['q4'] ."<br>" ;
echo $rs_vote['q3'] ."<br>" ;
echo $rs_vote['q2']."<br>" ;
echo $rs_vote['q1'] ."<br>" ;

}



 ?>