<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
    include 'hr_header.php';
	include_once "../controllers/UserController.php" ;
	$users = getUser();
	
?>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
			   <br>
               <link rel="stylesheet" href="css/hr_profilestyle.css">	
			   <div class="contact-box"> 
			   <h1 align="center">Your Information</h1>
			   <br>
			   <br>
			   
						<form >							  
							  <table border="1" width="100%" cellpadding="15" cellspacing="0" align="center">
							  
								<tr>
									<td><font size="4">Name:</font></td>
									<td><font size="4"><?php echo $users[0]["name"]; ?></font></td>
								</tr>
								<tr>
									<td><font size="4">Email:</font></td>
									<td><font size="4"><?php echo $users[0]["email"]; ?></font></td>								
								</tr>
								<tr>
									<td><font size="4">Gender:</font></td>
									<td><font size="4"><?php echo $users[0]["gender"]; ?></font></td>								
								</tr>
								<tr>
									<td><font size="4">Address:</font></td>	
									<td><font size="4"><?php echo $users[0]["address"]; ?></font></td>
								</tr>
								<tr>
									<td><font size="4">Phone:</font></td>
									<td><font size="4"><?php echo $users[0]["phone"]; ?></font></td>								
								</tr>
								
							  </table>
					    </form> 
				</div>
			</div>
	</body>
</html>