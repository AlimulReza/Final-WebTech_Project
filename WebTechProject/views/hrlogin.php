<?php 
    session_start();
    if(isset($_SESSION["username"])){
		header("Location: hr_dashboard.php");
	}
    include_once "../controllers/UserController.php" ;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="UTF-8">
	  <title>Login</title>
	  <link rel="stylesheet" href="css/hrlogin_style.css">
   </head>
   <body>
      <div class="center">
	     <h1>Login</h1>
		 <form method="post" onsubmit="return login_validate()">
		    <div class="txt_field">
			   <input type="text" id="username" value="<?php echo $username?>" name="username">
			   <span></span>
			   <label>Username</label>
			</div>
			<span style="color:red;" id="err_username"><?php echo $err_username;?></span>
			<br>
			<div class="txt_field">
			   <input type="password" id="pass" value="<?php echo $pass?>" name="pass">
			   <span></span>
			   <label>Password</label>
			</div>
			<span style="color:red;" id="err_password"><?php echo $err_pass;?></span>
			<br>
			<br>
			<input type="submit" name="login" value="Login">
		 </form>
	  </div>
	  <script src="../js/login_validation.js"></script>
   </body>
</html>