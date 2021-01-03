<?php 

    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
    include_once "../controllers/UpdatepasswordController.php" ;
	include 'hr_header.php';
?>
      <link rel="stylesheet" href="css/updatestyle.css">
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <br>
	  <div class="center">
		 <form method="post" onsubmit="return update_validate()">
		    <br>
		    <div class="txt_field">
			   <input type="text" value="" id="email" name="email">
			   <span></span>
			   <label>Email</label>
			</div>
			<span style="color:red;" id="err_email"><?php echo $err_email;?></span>
		    <div class="txt_field">
			   <input type="password" value="" id="cpass" name="cpass">
			   <span></span>
			   <label>Current Password</label>
			</div>
			<span style="color:red;" id="err_cpass"><?php echo $err_cpass;?></span>
			<br>
			<div class="txt_field">
			   <input type="password" value="" id="npass" name="npass">
			   <span></span>
			   <label>New Password</label>
			</div>
			<span style="color:red;" id="err_npass"><?php echo $err_npass;?></span>
			<br>
			<div class="txt_field">
			   <input type="password" value="" id="cnpass" name="cnpass">
			   <span></span>
			   <label>Confirm New Password</label>
			</div>
			<span style="color:red;" id="err_cnpass"><?php echo $err_cnpass;?></span>
			<br>
	        <br>
			    <input type="submit" name="update" value="Update">
		 </form>
	  </div>
	 </div>
	 <script src="../js/updatepassword_validation.js"></script>
   </body>
</html>