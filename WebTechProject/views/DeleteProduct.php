<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}

    require_once '../controllers/ProductController.php';
	
    deleteProduct($_GET["pid"]);
    echo  "<script type='text/javascript'>";
    echo "window.close();";
    echo "</script>";
	header("Location: allproducts.php");
?>