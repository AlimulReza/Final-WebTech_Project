<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
	include 'hr_header.php';
?>
             
             <link rel="stylesheet" href="css/contactstyle.css">	 
	         <div class="main_content">
		        <div class="header"><h2>Contact</h2></div>
				<div class="btn1">
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				     <button type="button" onclick="document.location='contact_marketing.php'">Marketing Manager</button>
				</div>
				<br>
				<br>
				<div class="btn2"><button type="button" onclick="document.location='contact_customer.php'">Customer</button></div>
				<br>
				<br>
				<div class="btn3"><button type="button" onclick="document.location='contact_employee.php'">Employee</button></div>
			 </div>
		  </div>
	</body>
</html>