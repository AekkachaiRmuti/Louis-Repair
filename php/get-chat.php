<?php 
    session_start();
    if(isset($_SESSION['user_unique_id'])){
        include_once "../connect_db.php";
        $outgoing_id = $_SESSION['user_unique_id'];
        @$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM tbl_chat_messages LEFT JOIN tbl_user ON tbl_user.user_unique_id = tbl_chat_messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        @$query = mysqli_query($conn, $sql);
        if(@$numrow = mysqli_num_rows($query) > 0){
            while(@$row = mysqli_fetch_assoc($query)){
                if(@$row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="'. $row['user_img'] .'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>