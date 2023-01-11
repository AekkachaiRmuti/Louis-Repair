<?php
// include '../connect_db.php';
while($row = mysqli_fetch_assoc($query)){
    // echo $row["user_name"].$row["user_unique_id"]."<br>"; 
    $sql2 = "SELECT * FROM tbl_chat_messages WHERE (incoming_msg_id = {$row['user_unique_id']}
            OR outgoing_msg_id = {$row['user_unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
            OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
    (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
    if(isset($row2['outgoing_msg_id'])){
        ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    }else{
        $you = "";
    }
    ($row['user_chat_status'] == "Offline now") ? $offline = "offline" : $offline = "";
    ($outgoing_id == $row['user_unique_id']) ? $hid_me = "hide" : $hid_me = "";

    $output .= '<a href="?page=users&user_id='. $row['user_unique_id'] .'">
                <div class="content">
                <img src="'.$row['user_img'].'" style="width: 50px; height: 50px;" class="img-circle elevation-2" alt="">
                <div class="details">
                    <span>'. $row['user_name'] .'</span>
                    <p>'. $you . $msg .'</p>
                </div>
                </div>
                <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
            </a>';
}
?>