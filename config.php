<?php
  $hostname = "localhost";
  $username = "root";
  $password = "";
  $dbname = "messenger_db";

  $db_connection = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$db_connection){
    echo "Database connection error".mysqli_connect_error();
  }
?>
