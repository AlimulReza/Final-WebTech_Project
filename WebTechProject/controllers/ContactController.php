<?php 
    require_once '../models/db_connect.php';
   
    $name="";
    $err_name="";
    $email="";
    $err_email="";;
	$message="";
	$err_message="";

    $has_err=false;
    if(isset($_POST["send"])){
		
        if(empty($_POST["name"])){
            $err_name=" *Name Required";
            $has_err=true;
        }
        else{
            $name=htmlspecialchars($_POST["name"]);
        }
        if(empty($_POST["email"]))
		{
			$err_email = " *Email Required";
		}
		else if(strpos($_POST["email"],"@"))
		{
			$flag = false;
			$pos = strpos($_POST["email"],"@");
			$str = $_POST["email"];
			for($i = $pos; $i < strlen($str); $i++)
			{
				if($str[$i] == "."){$flag = true;break;}
			}
			if($flag == true){$email = htmlspecialchars($_POST["email"]);}
			else{$err_email = "*invalid email pattern";}
		}
		if(empty($_POST["message"])){
            $err_message=" *Message Required";
            $has_err=true;
        }
        else{
            $message=htmlspecialchars($_POST["message"]);
        }
	    if(!$has_err){
			addcontact($name,$email,$message);
            header("Location: contact_with.php");
		}
	}
	function addcontact($name,$email,$message)
	{
		$query = "INSERT INTO customer_contact VALUES(NULL,'$name','$email','$message')";
		execute($query);
	}
	
	if(isset($_POST["esend"])){
	
		if(empty($_POST["ename"])){
			$err_name=" *Name Required";
			$has_err=true;
		}
		else{
			$name=htmlspecialchars($_POST["ename"]);
		}
		if(empty($_POST["eemail"]))
		{
			$err_email = " *Email Required";
		}
		else if(strpos($_POST["eemail"],"@"))
		{
			$flag = false;
			$pos = strpos($_POST["eemail"],"@");
			$str = $_POST["eemail"];
			for($i = $pos; $i < strlen($str); $i++)
			{
				if($str[$i] == "."){$flag = true;break;}
			}
			if($flag == true){$email = htmlspecialchars($_POST["eemail"]);}
			else{$err_email = "*invalid email pattern";}
		}
		if(empty($_POST["emessage"])){
			$err_message=" *Message Required";
			$has_err=true;
		}
		else{
			$message=htmlspecialchars($_POST["emessage"]);
		}
		if(!$has_err){
			addemployee($name,$email,$message);
			header("Location: contact_with.php");
		}
    }
    function addemployee($name,$email,$message)
	{
		$query = "INSERT INTO employee_contact VALUES(NULL,'$name','$email','$message')";
		execute($query);
	}
	
	if(isset($_POST["msend"])){
	
		if(empty($_POST["mname"])){
			$err_name=" *Name Required";
			$has_err=true;
		}
		else{
			$name=htmlspecialchars($_POST["mname"]);
		}
		if(empty($_POST["memail"]))
		{
			$err_email = " *Email Required";
		}
		else if(strpos($_POST["memail"],"@"))
		{
			$flag = false;
			$pos = strpos($_POST["memail"],"@");
			$str = $_POST["memail"];
			for($i = $pos; $i < strlen($str); $i++)
			{
				if($str[$i] == "."){$flag = true;break;}
			}
			if($flag == true){$email = htmlspecialchars($_POST["memail"]);}
			else{$err_email = " *invalid email pattern";}
		}
		if(empty($_POST["mmessage"])){
			$err_message=" *Message Required";
			$has_err=true;
		}
		else{
			$message=htmlspecialchars($_POST["mmessage"]);
		}
		if(!$has_err){
			addmarketing($name,$email,$message);
			header("Location: contact_with.php");
		}
    }
    function addmarketing($name,$email,$message)
	{
		$query = "INSERT INTO marketing_contact VALUES(NULL,'$name','$email','$message')";
		execute($query);
	}
	
?>