<?php
include_once "config.php";
$logout_id = mysqli_real_escape_string($db_connection,$_GET['email-id']);
     if(isset($logout_id)){
        $status = "Offline now";
        $sql = mysqli_query($db_connection,"UPDATE users SET Status = '".$status."' WHERE email= '".$_GET['email-id']."'");
        if($sql){
            session_unset();
            session_destroy();
            header("Location:../login.php");
            exit;
        }
    }
?>