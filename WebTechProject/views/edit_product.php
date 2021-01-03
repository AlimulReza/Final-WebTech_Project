<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
    include_once "../controllers/ProductController.php";
	include 'hr_header.php';
	$product=getProduct($_GET["pid"]);
?>
<link rel="stylesheet" type="text/css" href="css/registrationstyle.css">
		  <div class="register">
		  <h1>Edit Product</h1>
		  <br>
		  <br>
		  <br>
		  <form method="post" id="register" action="" onsubmit="return product_validate()">
			  <label>Product Name :</label><br>
			  <input type="text" class="input-field" id="pname" name="pname" placeholder="" value="<?php echo $product[0]["pname"]; ?>"><span style="color:red;" id="err_pname"><?php echo $err_pname;?></span><br><br>
			  <label>Price :</label><br>
			  <input type="text" class="input-field" id="price" name="price" placeholder="" value="<?php echo $product[0]["price"]; ?>"><span style="color:red;" id="err_price"><?php echo $err_price;?></span><br><br>
			  <label>Product Type :</label><br>
			  <select  class="input-field" id="ptype" name="ptype">
				 <option disabled selected>Product type</option>
				 <option>Medical Product</option>
				 <option>Industrial Product</option>
			  </select><span style="color:red;" id="err_ptype"><?php echo $err_ptype;?></span><br><br>
			  <label>Description :</label><br>
			  <textarea type="text" class="input-field" id="description" name="description" placeholder=""><?php echo $product[0]["description"]; ?></textarea><span style="color:red;" id="err_description"><?php echo $err_description;?></span><br><br>
			  <button type="submit" name="update_products" id="sub">Update</button>
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>
			  <br>
		  </form>
		  </div>
		  </div>
		  <script src="../js/product_validation.js"></script>
     </body>
</html>