<?php
include './connect_db.php';

  if (@$_GET['line'] == 'yes') {
 
    
    $sql = "SELECT itp_id, itp_date,itp_dept,itp_name,itp_detail,itp_ip, itp_anydesk,itp_picture FROM tbl_it_problem ORDER BY itp_id DESC LIMIT 1";
    $qr_ = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_array($qr_); 
    $pic= $rs["itp_picture"];
    if($pic ==1){
        $pic= "image_problem/no.png";
    }elseif($pic !== ''){
        $pic= $rs["itp_picture"];  
    }
  
    $imageFile = new CURLFILE($pic);
    $str = "\n"."เวลา : ".$rs["itp_date"]."\n"."ปัญหาที่แจ้ง : ".$rs["itp_detail"]."\n"."แผนก : ".$rs["itp_dept"]."\n"."ผู้แจ้ง : ".$rs["itp_name"]."\n"."IP : ".$rs["itp_ip"];
}

if (@$_GET['line_mobile'] == 'yes' ) {
 
    
    $sql = "SELECT itp_id, itp_date,itp_dept,itp_name,itp_detail,itp_ip, itp_anydesk,itp_picture FROM tbl_it_problem ORDER BY itp_id DESC LIMIT 1";
    $qr_ = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_array($qr_); 
    $pic= $rs["itp_picture"];
    if($pic ==1){
        $pic= "image_problem/no.png";
    }elseif($pic !== ''){
        $pic= $rs["itp_picture"];  
    }
  
    $imageFile = new CURLFILE($pic);
    $str = "\n"."เวลา : ".$rs["itp_date"]."\n"."ปัญหาที่แจ้ง : ".$rs["itp_detail"]."\n"."แผนก : ".$rs["itp_dept"]."\n"."ผู้แจ้ง : ".$rs["itp_name"]."\n"."IP : ".$rs["itp_ip"];
}

if (@$_GET['update'] != '') {
 
    
    $sql = "SELECT itp_id, itp_date,itp_dept,itp_name,itp_detail,itp_ip, itp_anydesk, itp_status, itp_problem, itp_user FROM tbl_it_problem Where itp_id = '{$_GET['update']}' ORDER BY itp_id DESC LIMIT 1";
    $qr_ = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_array($qr_); 
    
    $str = "\n"."เวลา : ".$rs["itp_date"]."\n"."ปัญหาที่แจ้ง : ".$rs["itp_detail"]."\n"."แผนก : ".$rs["itp_dept"]."\n"."ผู้แจ้ง : ".$rs["itp_name"]."\n"."IP : ".$rs["itp_ip"]."\n"."วิธีแก้ไข : ".$rs['itp_problem']."\n"."ผู้ดำเนินการ : ".$rs['itp_user'];
}

define('LINE_API', "https://notify-api.line.me/api/notify");

    //   $sToken = "YRGfR1f8BsUXDlIPNZZ0IC9eogZkwS4nrHpEJVLDxPV"; //IT
   $sToken = "7q3XZ82ayOuKGSXcM7vky6rqrJz4tMWKDh6MUa1BmSr"; //ใส่Token ที่copy เอาไว้ PHOTOME
 
        $sticker_package_id = '11537';  // Package ID sticker
        $sticker_id = '52002738'; 
    
        $data  = array(
            'message' => $str,
            'imageFile' => $imageFile,
            'stickerPackageId' => $sticker_package_id,
            'stickerId' => $sticker_id
        );
   

    
    $chOne = curl_init(); 
    curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt( $chOne, CURLOPT_POST, 1); 
    curl_setopt( $chOne, CURLOPT_POSTFIELDS, $data); 
    $headers = array( 'Content-type: multipart/form-data', 'Authorization: Bearer '.$sToken.'', );
    curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
    curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
    $result = curl_exec( $chOne ); 
    echo $pic;
    if(@$_GET['line']){
        echo "<script>window.location.href='index.php?page=itconnect'</script>";
    }
    if(@$_GET['line_mobile']){
        echo "<script>window.location.href='mobile_Phone.php'</script>";
    }
    if(@$_GET['update']){
        echo "<script>window.location.href='index.php?page=itconnect'</script>";
    }
    