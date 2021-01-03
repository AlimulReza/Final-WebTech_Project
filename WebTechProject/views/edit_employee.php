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
	$employee=getEmployee($_GET["eid"]);
?>

<link rel="stylesheet" type="text/css" href="css/registrationstyle.css">
		  <div class="register">
		  <h1>Edit Employee</h1>
		  <form method="post" id="register" action="" onsubmit="return employee_validate()">
			  <label>Name :</label><br>
			  <input type="text" class="input-field" id="name" name="name" placeholder="" value="<?php echo $employee[0]["name"]; ?>"><span style="color:red;" id="err_name"><?php echo $err_name;?></span><br><br>
			  <label>Email :</label><br>
			  <input type="text" class="input-field" id="email" name="email" placeholder="" value="<?php echo $employee[0]["email"]; ?>"><span style="color:red;" id="err_email"><?php echo $err_email;?></span><br><br>
			  <label>Gender :</label><br>
			  <input type="radio" id="gender" name="gender" value="Male"><span style="color:black;"> Male</span>
			  <input type="radio" id="gender" name="gender" value="Female"><span style="color:black;"> Female</span><span style="color:red;" id="err_gender"><?php echo $err_gender;?></span><br><br>
			  <label>Date of Birth :</label><br>
			  <input type="date" class="input-field" id="dbirth" name="dbirth" placeholder="" value="<?php echo $employee[0]["dob"]; ?>"><span style="color:red;" id="err_dbirth"><?php echo $err_dbirth;?></span><br><br>
			  <label>Phone :</label><br>
			  <input type="text" class="input-field" id="phone" name="phone" placeholder="" value="<?php echo $employee[0]["phone"]; ?>"><span style="color:red;" id="err_phone"><?php echo $err_phone;?></span><br><br>
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
			  <textarea type="text" class="input-field" id="address" name="address" placeholder=""><?php echo $employee[0]["address"]; ?></textarea><span style="color:red;" id="err_address"><?php echo $err_address;?></span><br><br>
			  <label>Salary :</label><br>
			  <input type="text" class="input-field" id="salary" name="salary" placeholder="" value="<?php echo $employee[0]["salary"]; ?>"><span style="color:red;" id="err_salary"><?php echo $err_salary;?></span><br><br>
			  <button type="submit" name="update_employee" id="sub">Submit</button>
			  <br>
			  <br>
			  <script src="../js/employee_validation.js"></script>
		  </form>
		  </div>
		  </div>
		  
     </body>
</html>