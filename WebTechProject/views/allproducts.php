<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
    include_once "../controllers/ProductController.php" ;
	include 'hr_header.php';
    $products=getAllProducts();
?>
        <link rel="stylesheet" type="text/css" href="css/allproductsstyle.css">
        <div class=register>
	    <center>
		   <br>
		   <br>
		   <br>
		   <br>
		   <input type="text" name="product_search" id="product_search" placeholder="Search........" onkeyup="searchproduct()">
		   <br>
		   <br>
		   <div id="search_result"></div>
		   <br>
		   <br>
		   <br>
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
						echo "<td><button type='button'><a href='edit_product.php?pid=".$product["pid"]."'>Edit</a></button></td>";
						echo "<td><button type='button'><a href='DeleteProduct.php?pid=".$product["pid"]."'>Delete</a></button></td>";
						echo "</tr>";
					}
				?>
		    </tbody>
         </table>
		</center>
		</div>
		</div>
	</body>
	<script src="../js/product_validation.js"></script>
</html>