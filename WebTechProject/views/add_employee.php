<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
	include_once "../controllers/EmployeeController.php" ;
	include 'hr_header.php';
?>

	      <link rel="stylesheet" type="text/css" href="css/registrationstyle.css">
		  <div class="register">
		  <h1>Add Employee</h1>
		  <form method="post" id="register" action="" onsubmit="return employee_validate()">
			  <label>Id :</label><br>
			  <input type="text" class="input-field" id="eid" name="eid" placeholder=""><span style="color:red;" id="err_eid"><?php echo $err_eid;?></span><br><br>
			  <label>Name :</label><br>
			  <input type="text" class="input-field" id="name" name="name" placeholder=""><span style="color:red;" id="err_name"><?php echo $err_name;?></span><br><br>
			  <label>Username :</label><br>
			  <input type="text" class="input-field" id="username" name="username" placeholder=""><span style="color:red;" id="err_username"><?php echo $err_username;?></span><br><br>
			  <label>Password :</label><br>
			  <input type="password" class="input-field" id="pass" name="pass" placeholder=""><span style="color:red;" id="err_pass"><?php echo $err_pass;?></span><br><br>
			  <label>Confirm Password :</label><br>
			  <input type="password" class="input-field" id="cpass" name="cpass" placeholder=""><span style="color:red;" id="err_cpass"><?php echo $err_cpass;?></span><br><br>
			  <label>Email :</label><br>
			  <input type="text" class="input-field" id="email" name="email" placeholder=""><span style="color:red;" id="err_email"><?php echo $err_email;?></span><br><br>
			  <label>Gender :</label><br>
			  <input type="radio" id="gender" name="gender" value="Male"><span style="color:black;"> Male</span>
			  <input type="radio" id="gender" name="gender" value="Female"><span style="color:black;"> Female</span><span style="color:red;" id="err_gender"><?php echo $err_gender;?></span><br><br>
			  <label>Date of Birth :</label><br>
			  <input type="date" class="input-field" id="dbirth" name="dbirth" placeholder=""><span style="color:red;" id="err_dbirth"><?php echo $err_dbirth;?></span><br><br>
			  <label>Phone :</label><br>
			  <input type="text" class="input-field" id="phone" name="phone" placeholder=""><span style="color:red;" id="err_phone"><?php echo $err_phone;?></span><br><br>
			  <label>City :</label><br>
			  <select class="input-field" id="city" name="city">
				 <option disabled selected>City</option>
				 <option>Dhaka</option>
				 <option>Chittagong</option>
				 <option>Rajshahi</option>
				 <option>Rangpur</option>
				 <option>Khulna</option>
			  </select><span style="color:red;" id="err_city"><?php echo $err_city;?></span><br><br>
			  <label>Address :</label><br>
			  <textarea type="text" class="input-field" id="address" name="address" placeholder=""></textarea><span style="color:red;" id="err_address"><?php echo $err_address;?></span><br><br>
			  <label>Salary :</label><br>
			  <input type="text" class="input-field" id="salary" name="salary" placeholder=""><span style="color:red;" id="err_salary"><?php echo $err_salary;?></span><br><br>
			  <button type="submit" name="add_employee" id="sub">Submit</button>
			  <br>
			  <br>
			  <script src="../js/employee_validation.js"></script>
		  </form>
		  </div>
		  </div>
		  
     </body>
</html>