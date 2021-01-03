<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
    include_once "../controllers/EmployeeController.php" ;
    $employee=getemployeeInfo($_GET["eid"]);
?>
<html>
	<head><title>Employee Details</title></head>
              <center>
			  <h1>Employee Information</h1>
				<table border="1">
					<tr>
						<td>Employee Id:</td>
						<td><?php echo $employee[0]["id"]; ?></td>
					</tr>
					<tr>
						<td>Employee Name:</td>
						<td><?php echo $employee[0]["name"]; ?></td>
					</tr>
					<tr>
						<td>Username:</td>
						<td><?php echo $employee[0]["username"]; ?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?php echo $employee[0]["email"]; ?></td>
					</tr>
					<tr>
						<td>Gender:</td>
						<td><?php echo $employee[0]["gender"]; ?></td>
					</tr>
					<tr>
						<td>Date of Birth:</td>
						<td><?php echo $employee[0]["dob"]; ?></td>
					</tr>
					<tr>
						<td>Phone:</td>
						<td><?php echo $employee[0]["phone"]; ?></td>
					</tr>
					<tr>
						<td>City:</td>
						<td><?php echo $employee[0]["city"]; ?></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><?php echo $employee[0]["address"]; ?></td>
					</tr>
					<tr>
						<td>Salary:</td>
						<td><?php echo $employee[0]["salary"]; ?></td>
					</tr>
				</table>
	      </center>
	</body>
</html>