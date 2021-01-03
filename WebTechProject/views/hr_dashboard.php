<?php
   session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
	include_once "../controllers/EmployeeController.php" ;
	include_once "../controllers/ProductController.php" ;
	include 'hr_header.php';
    $employees=getAllEmployees();
    $products=getAllProducts();	
?>

		   <link rel="stylesheet" href="css/hr_dashboardstyle.css">	 
		   <div class=register>
	       <center>
		   <h1>Welcome Md. Alimul Reza</h1>
		   <br>
		   <br>
		   <br>
		   <br>
		   <br>
		   <br>
		   <br>
		   <h2>Product Details</h2>
		   <br>
		   			<table border="1" id="productstable">
		    <thead>
			    <tr>
					  <th>Product Id</th>
					  <th>Product Name</th>
					  <th>Price</th>
					  <th>Product Type</th>
					  <th>Description</th>
			    </tr>
			</thead>
			<tbody>
				<?php
					foreach($products as $product)
					{
						echo "<tr>";
						echo "<td>".$product["pid"]."</td>";
						echo "<td>".$product["pname"]."</td>";
						echo "<td>".$product["price"]."</td>";
						echo "<td>".$product["ptype"]."</td>";
						echo "<td>".$product["description"]."</td>";
						echo "</tr>";
					}
				?>
		    </tbody>
            </table>
			<br>
			<br>
			<br>
			<h2>Employee Details</h2>
			<br>
		   <table border="1" id="employeestable">
		    <thead>
			    <tr>
					  <th>Employee Id</th>
					  <th>Employee Name</th>
					  <th>Email</th>
					  <th>Gender</th>
					  <th>Phone</th>
					  <th>Address</th>
			    </tr>
			</thead>
			<tbody>
				<?php
					foreach($employees as $employee)
					{
						echo "<tr>";
						echo "<td>".$employee["id"]."</td>";
						echo "<td>".$employee["name"]."</td>";
						echo "<td>".$employee["email"]."</td>";
						echo "<td>".$employee["gender"]."</td>";
						echo "<td>".$employee["phone"]."</td>";
						echo "<td>".$employee["address"]."</td>";
						echo "</tr>";
					}
				?>
		    </tbody>
			</table>
		</center>
		</div>
	   </div>
	</body>
</html>