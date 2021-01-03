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
    $employees=getAllEmployees();
?>
        <link rel="stylesheet" type="text/css" href="css/allemployeesstyle.css">
        <div class=register>
	    <center>
		   <br>
		   <br>
		   <br>
		   <br>
		   <input type="text" name="employee_search" id="employee_search" placeholder="Search........" onkeyup="searchemployee()">
		   <br>
		   <br>
		   <div id="search_result"></div>
		   <br>
		   <br>
		   <br>
		   <br>
		   <table border="1" id="employeestable">
		    <thead>
			    <tr>
					  <th>Employee Id</th>
					  <th>Employee Name</th>
					  <th>Username</th>
					  <th>Email</th>
					  <th>Gender</th>
					  <th>Date of Birth</th>
					  <th>Phone</th>
					  <th>City</th>
					  <th>Address</th>
					  <th>Salary</th>
			    </tr>
			</thead>
			<tbody>
				<?php
					foreach($employees as $employee)
					{
						echo "<tr>";
						echo "<td>".$employee["id"]."</td>";
						echo "<td>".$employee["name"]."</td>";
						echo "<td>".$employee["username"]."</td>";
						echo "<td>".$employee["email"]."</td>";
						echo "<td>".$employee["gender"]."</td>";
						echo "<td>".$employee["dob"]."</td>";
						echo "<td>".$employee["phone"]."</td>";
						echo "<td>".$employee["city"]."</td>";
						echo "<td>".$employee["address"]."</td>";
						echo "<td>".$employee["salary"]."</td>";
						echo "<td><button type='button'><a href='edit_employee.php?eid=".$employee["id"]."'>Edit</a></button></td>";
						echo "<td><button type='button'><a href='DeleteEmployee.php?eid=".$employee["id"]."'>Delete</a></button></td>";
						echo "</tr>";
					}
				?>
		    </tbody>
         </table>
		</center>
		</div>
		</div>
	</body>
	<script src="../js/employee_validation.js"></script>
</html>