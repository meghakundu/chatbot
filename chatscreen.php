<?php
session_start();
require "config.php";
if(isset($_POST['submit'])){
    $s="SELECT * from users WHERE email='".$_POST['email']."'";
    $status = "Active now";
    $sql = mysqli_query($db_connection,"UPDATE users SET Status = '".$status."' WHERE email= '".$_POST['email']."'");
    $result = mysqli_query($db_connection, $s);
    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
      }
    }else if($_GET['email_id']){
      $s="SELECT * from users WHERE email='".$_GET['email_id']."'";
      //$status = "Active now";
      $result = mysqli_query($db_connection, $s);
      if(mysqli_num_rows($result) > 0){
          $row = mysqli_fetch_assoc($result);
        }
      // header('Location:index.php');
     $query="SELECT * from users WHERE unique_id='".$_SESSION['unique_id']."'";
     $result = mysqli_query($db_connection, $query);
      if(mysqli_num_rows($result) > 0){
          $row1 = mysqli_fetch_assoc($result);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Chatbot</title>
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<body>
<div class="chat-area">
  <div class="user_profile_block">
<span><?php echo strtoupper($row['username']); ?></span>
  <p><?php echo $row['Status']; ?></p>
  <a href="logout.php/?email-id=<?php if($_GET['email_id']){echo $row1['email'];}else{echo $_POST['email'];} ?>" class="logout_btn">Logout</a>
  </div>
<h3>Quick Chat</h3>
<div class="chat-box"></div>
  <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php if($_GET['email_id']){echo $row['unique_id'];} ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Type a message here..." autocomplete="off">
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
</div>
<script src="chat.js"></script>
</body>
</html>