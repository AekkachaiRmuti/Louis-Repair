<?php
    session_start();
    include "../connect_db.php";
    // $outgoing_id = 362601401;
    $outgoing_id = $_SESSION['user_unique_id'];
    $sql = "SELECT * FROM tbl_user WHERE NOT user_unique_id = {$outgoing_id} ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include "data.php";
       
    }
    echo $output;
?>