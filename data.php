<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_id = '{$row['unique_id']}'
        OR outgoing_id = '{$row['unique_id']}') AND (outgoing_id = '{$outgoing_id}' 
        OR incoming_id = '{$outgoing_id}') ORDER BY id DESC LIMIT 1";
        $query2 = mysqli_query($db_connection, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['message_content'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['incoming_id'])){
            ($outgoing_id == $row2['outgoing_id']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }
        ($row['Status'] == "Offline now") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['id']) ? $hid_me = "hide" : $hid_me = "";
        $newDateTime = date('h:i A', strtotime($row2['created_at']));
        $output .= '<a href="chatscreen.php?email_id='. $row['email'] .'">
                    <div class="content">
                    <div class="details">
                        <span>'. $row['username'].'</span>
                        <div class="message_details">
                        <p>'. $you . $msg .'</p>
                        <p class="last_time">'.$newDateTime.'</p>
                        </div>
                    </div>
                    </div>
                   </a>';
    }
?>