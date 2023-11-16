<?php
 require "config.php";
 if(isset($_POST['send'])){
    $a = $_POST['incoming_id'];
    $b = $_POST['message_content'];
    $sql="INSERT INTO messages VALUES(NULL,'".$a."','".$b."','".$_POST['created_at']."','".$_POST['updated_at']."')";
    $db_connection->query($sql);
    }
    $s="SELECT users.username,messages.message_content,DATE(messages.created_at) as date_of_message from messages join users on messages.incoming_id=users.id order by messages.id DESC";
    $result = mysqli_query($db_connection, $s);
?>
<html>
    <head>
    <link rel="stylesheet" href="style.css" />
    </head>
    <body>
<div class="queryblock">
    <h2>Queries:</h2>
     <ul>
        <?php foreach($result as $item){?>
        <li>
            <?php echo $item['username'];?>
            <span>Message:<?php echo $item['message_content'];?></span>
            Date: <?php echo $item['date_of_message'];?>
       </li>
       <?php } ?>
    </ul>
</div>
        </body>
</html>