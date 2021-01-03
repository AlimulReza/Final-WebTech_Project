<?php

    require_once '../models/db_connect.php';
    /*session_start();
    if(isset($_SESSION["username"])){
		header("Location: hr_dashboard.php");
	}*/
	$username="";
	$err_username="";
	$pass="";
	$err_pass="";
	$hasError=false;
	if(isset($_POST["login"])){
		if(empty($_POST["username"])){
			$err_username="Username Required";
			$hasError =true;	
		}
		else{
			$username = htmlspecialchars($_POST["username"]);
		}
		if(empty ($_POST["pass"])){
			$err_pass="Password Required";
			$hasError = true;
		}
		else{
			$pass=md5(htmlspecialchars($_POST["pass"]));
        }
		
		if(!$hasError)
		{
			$flag=false;
			$result = authenticate($username,$pass);
			if($result)
			{
				$flag=true;
				session_start();
				$_SESSION["username"] = $username;
				setcookie("username",$username,time() + 120);
				
			}
			if($flag)
			{
				header("Location: hr_dashboard.php");
			}
			else
			{
				echo "Invalid Username or Password";
			}
			
		}
	}
	function authenticate($username,$pass)
	{
		//$password = md5($password);
		$query = "SELECT username FROM user WHERE username='$username' AND password='$pass'";
		$result = get($query);
		if(count($result) > 0) return true;
		return false;
	}
	function getUser()
	{
		$query="SELECT * FROM user";
        return get($query);
	}
	
?>