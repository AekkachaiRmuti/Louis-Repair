<?php
session_start();
    include "./connect_db.php";
   
    if($_GET['logout_id']){
        $status = "Offline now";
        $sql = mysqli_query($conn, "UPDATE tbl_user SET user_chat_status = '{$status}' WHERE user_unique_id={$_GET['logout_id']}");
        if($sql){
            session_unset();
            session_destroy();
            header("location: login.php");
        }
    }else{
        header("location: ../users.php");
    }

?>