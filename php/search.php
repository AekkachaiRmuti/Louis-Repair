<?php
    session_start();
    include_once "../connect_db.php";

    $outgoing_id = $_SESSION['user_unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM tbl_user WHERE NOT user_unique_id = {$outgoing_id} AND (user_name LIKE '%{$searchTerm}%' OR user_user LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>