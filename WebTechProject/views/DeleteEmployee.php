<?php
    session_start();
    if(!isset($_SESSION["username"])){
		header("Location: hrlogin.php");
	}
	if(!isset($_COOKIE["username"])){
		header("Location: ../controllers/logout.php");
	}
    require_once '../controllers/EmployeeController.php';
	
    deleteEmployee($_GET["eid"]);
    echo  "<script type='text/javascript'>";
    echo "window.close();";
    echo "</script>";
	header("Location: allemployees.php");
?>