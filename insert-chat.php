<?php 
session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($db_connection, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($db_connection, $_POST['message']);
        if(!empty($message)){
            $sql = mysqli_query($db_connection, "INSERT INTO messages (incoming_id, message_content,outgoing_id)
                                        VALUES ('{$incoming_id}', '{$message}','{$outgoing_id}')") or die();
         
       }
    }else{
        header("location: ../login.php");
    }


    
?>