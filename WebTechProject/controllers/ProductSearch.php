<?php
    include_once "../controllers/ProductController.php" ;
    $products=productsearch($_GET['pname']);
    if(count($products)>0){
        foreach($products as $product){
			echo "<button onclick=location.href='productdetail.php?pid=".$product["pid"]."'>".$product["pname"]."</button><br>";
        }
    }
?>