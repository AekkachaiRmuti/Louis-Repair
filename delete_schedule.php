<?php 
    include('connect_db.php');

    if(!isset($_GET['id'])){
        echo "<script> alert('Undefined Schedule ID.'); window.location.href='index.php?page=plan_maintenance&pm=pm_calendar') </script>";
        $conn->close();
        exit;
    }
$sql ="DELETE FROM `tbl_schedule_list` where id = '{$_GET['id']}'";
    $delete = mysqli_query($conn, $sql);

    if($delete){
        echo "<script> alert('Event has deleted successfully.'); window.location.href='index.php?page=plan_maintenance&pm=pm_calendar') </script>";
    }else{
        echo "<pre>";
        echo "An Error occured.<br>";
        echo "Error: ".$conn->error."<br>";
        echo "SQL: ".$sql."<br>";
        echo "</pre>";
    }
    
    // $conn->close();
?>