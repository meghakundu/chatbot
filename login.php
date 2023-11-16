<?php 
session_start();
require "config.php";
$status = "Active now";
if(isset($_POST['register'])){
$a = $_POST['username'];
$b = $_POST['password'];
$c = $_POST['email'];
$uniqID = $_POST['unique_id'];
$s="INSERT INTO users VALUES(NULL,'".$uniqID."','".$a."','".$b."','".$c."','".$status."','".$_POST['created_at']."','".$_POST['updated_at']."')";
$db_connection->query($s);
}
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css" />
        <title>Login</title>
    </head>
    <body>
      <img src="explore1.jpg"/>
    <form action="users.php" method="POST" class="reg_form">
      <label>Email</label>
      <input type="email" name="email" value='<?php if(isset($_POST['register'])){echo $_POST['email'];} ?>'/>
      <label>Password</label>
      <input type="password" name="password"/>
      <input type="submit" value="Continue" name="submit" id="reg_btn" style="margin-right:0;"/>
    </form>
</body>
</html>