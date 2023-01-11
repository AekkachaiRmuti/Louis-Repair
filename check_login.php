
<?php
include 'connect_db.php';
session_start();

$hour = 0; //เวลาทด เป็น + หรือ - ถ้าเวลาของ Server ไม่ตรงกับประเทศไทย
$min = 0; //เวลาทด เป็น + หรือ - ถ้าเวลาของ Server ไม่ตรงกับประเทศไทย
$logtime = date("U", mktime(date("H") + $hour, date("i") + $min));

if (isset($_POST['btn_login'])) {
    // echo "<script>window.location.href ='index.php?page=home'</script>";
     $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql_ck = "SELECT * FROM `tbl_user` 
    LEFT OUTER JOIN tbl_user_level on tbl_user_level.level_id = tbl_user.user_level
    LEFT OUTER JOIN tbl_brance on tbl_brance.brn_id = tbl_user.user_brance
    LEFT OUTER JOIN tbl_department on tbl_department.dept_id = tbl_user.user_dept
    LEFT OUTER JOIN tbl_position on tbl_position.pst_id = tbl_user.user_position WHERE user_user ='$user'";
    $qr_ck = mysqli_query($conn, $sql_ck);
    $rs = mysqli_fetch_array($qr_ck);
    $store_password = $rs["user_pw"];
    
    $louis = "REPAIR";
  
    if (mysqli_num_rows($qr_ck) == 1 and $louis = "REPAIR") {
        
        //Verify  Password ตรวจสอบ password ระหว่าง $password และ $store_password
         $validPassword = password_verify($pass, $store_password);
        if ($validPassword) {
            $_SESSION['web'] = $louis;
            $_SESSION['user_id'] =  $rs["user_id"];
            $_SESSION['user_name'] =  $rs["user_name"];
            $_SESSION['user_user'] =  $rs["user_user"];
            $_SESSION['user_key'] =  $rs["user_key"];
            $_SESSION['user_level'] =  $rs["user_level"];
            $_SESSION['user_brance'] =  $rs["user_brance"];
            $_SESSION['user_dept'] =  $rs["user_dept"];
            $_SESSION['user_position'] =  $rs["user_position"];
            $_SESSION['level_id'] =  $rs["level_id"];
            $_SESSION['level_name'] =  $rs["level_name"];
            $_SESSION['brn_id'] =  $rs["brn_id"];
            $_SESSION['brn_name'] =  $rs["brn_name"];
            $_SESSION['dept_id'] =  $rs["dept_id"];
            $_SESSION['dept_name'] =  $rs["dept_name"];
            $_SESSION['pst_id'] =  $rs["pst_id"];
            $_SESSION['pst_name'] =  $rs["pst_name"];
            $_SESSION['pst_department'] =  $rs["pst_department"];
            $_SESSION['user_img'] =  $rs["user_img"];
            $_SESSION['user_unique_id'] =  $rs["user_unique_id"];
            $_SESSION["settime"] = $logtime;

            

    echo "<script>window.location.href ='index.php?page=home'</script>";



        }else{
            //password ผิด
		    	//เคลียร์ session 
		    	session_destroy();
		    	echo '<font color="red"> wrong password !! </font>';
		    	echo '<a href="login.php"> Back </a>';
        }
    } else {
        echo "<script>";
        echo "alert(\" user หรือ  password ไม่ถูกต้อง\");";
        echo "window.history.back()";
        echo "</script>";
    }
}

?>
