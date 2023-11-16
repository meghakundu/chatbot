<?php  
session_start();
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($db_connection, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT messages.incoming_id,messages.outgoing_id,messages.created_at,messages.message_content,users.email FROM messages JOIN users ON users.unique_id = messages.outgoing_id
        WHERE (outgoing_id = '{$outgoing_id}' AND incoming_id = '{$incoming_id}')
        OR (outgoing_id = '{$incoming_id}' AND incoming_id = '{$outgoing_id}') ORDER BY messages.id";
        $query = mysqli_query($db_connection,$sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_id'] === $outgoing_id){
                    $newDateTime = date('h:i A', strtotime($row['created_at']));
                    $output .= '<div class="chat outgoing">
					             <p>'. $row['email'] .'</p>
                                <div class="details">
                                    <p>'. $row['message_content'] .'</p>
                                </div>
                                 <p>'.$newDateTime.'</p>
                                </div>';
                }else{
                    $newDateTime = date('h:i A', strtotime($row['created_at']));
                    $output .= '<div class="chat incoming">
                                <div class="details">
                                    <p>'. $row['message_content'] .'</p>
                                </div>
                                <p>'.$newDateTime.'</p>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;

?>