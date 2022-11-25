<?php
include 'connect_db.php';




if (isset($_POST['btn_save'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $start_datetime = $_POST['start_datetime'];
    $end_datetime = $_POST['end_datetime'];


    echo $title;
    $save = "INSERT INTO tbl_schedule_list (title,description,start_datetime,end_datetime) VALUES ('$title','$description','$start_datetime','$end_datetime')";
    $qr_sql = mysqli_query($conn, $save);
    if($qr_sql){
        echo "<script>window.location.href='index.php?page=plan_maintenance&pm=pm_calendar'</script>";
    }
}
        // }else{
    //     $sql = "UPDATE `tbl_schedule_list` set `title` = '{$title}', `description` = '{$description}', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
    // }

    // $save = mysqli_query($conn,$sql);

    // if($save){
    //     echo "<script> alert('Schedule Successfully Saved.'); location.replace('./') </script>";
    // }else{
    //     echo "<pre>";
    //     echo "An Error occured.<br>";
    //     echo "Error: ".$conn->error."<br>";
    //     echo "SQL: ".$sql."<br>";
    //     echo "</pre>";
    // }
    
    // $conn->mysqli_close();
