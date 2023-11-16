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
    }else{
      header('Location:index.php');
    }
    $_SESSION['unique_id']=$row['unique_id'];
    //print_r($_SESSION['unique_id']);
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
<div class="glass">
  <div class="user_profile_block">
<span><?php echo strtoupper($row['username']); ?></span>
  <p><?php echo $status; ?></p>
  <a href="logout.php/?email-id=<?php echo $_POST['email']; ?>" class="logout_btn">Logout</a>
  </div>
  <div class="users">
<div class="search">
        <!-- <span class="text">Select an user to start chat</span> -->
        <input type="hidden" id="myInput" value="<?php echo $row['id']; ?>">
        <input type="text" id="searchInput" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
  </div>
  </div>
  <script src="users.js"></script>
  </body>
  </html>
