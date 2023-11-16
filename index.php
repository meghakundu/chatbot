
<html>
    <head>
    <link rel="stylesheet" href="style.css" />
        <title>Register</title>
    </head>
    <body>
    <img src="explore1.jpg"/>
    <form action="login.php" method="POST" class="reg_form">
    <input type="hidden" name="unique_id" value="<?php echo uniqid();?>"/>
      <label>Username</label>
      <input type="text" name="username"/>
      <label>Password</label>
      <input type="password" name="password"/>
      <label>Email</label>
      <input type="email" name="email"/>
      <input type="hidden" name="created_at" value="<?php echo date('d-m-y h:i:s');?>"/>
      <input type="hidden" name="updated_at" value="<?php echo date('d-m-y h:i:s');?>"/>
      <input type="submit" value="Register to Continue" name="register" id="reg_btn" style="margin-right:0;"/>
    </form>
</body>
</html>
