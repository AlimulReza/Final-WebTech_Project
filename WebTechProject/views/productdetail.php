<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
    include_once "../controllers/ProductController.php" ;
    $product=getproductInfo($_GET["pid"]);
?>
<html>
	<head><title>Product Details</title></head>
              <center>
			  <h1>Product Information</h1>
				<table border="1">
					<tr>
						<td>Product Id:</td>
						<td><?php echo $product[0]["pid"]; ?></td>
					</tr>
					<tr>
						<td>Product Name:</td>
						<td><?php echo $product[0]["pname"]; ?></td>
					</tr>
					<tr>
						<td>Price:</td>
						<td><?php echo $product[0]["price"]; ?></td>
					</tr>
					<tr>
						<td>Product Type:</td>
						<td><?php echo $product[0]["ptype"]; ?></td>
					</tr>
					<tr>
						<td>Description:</td>
						<td><?php echo $product[0]["description"]; ?></td>
					</tr>
				</table>
	      </center>
	</body>
</html>