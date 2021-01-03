<?php
    require_once '../models/db_connect.php';
    $email="";
    $err_email="";	
    $cpass="";
    $err_cpass="";
    $npass="";
    $err_npass="";
	$cnpass="";
    $err_cnpass="";
	//$change="";

    $has_err=false;
    if(isset($_POST["update"])){
		if(empty($_POST["email"]))
		{
			$err_email = " *Email Required";
			$has_err=true;
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
			else{$err_email = " *invalid email pattern";}
		}
        if(empty($_POST["cpass"])){
            $err_cpass=" *Current Password Required";
            $has_err=true;
        }
        else{
            $cpass=htmlspecialchars($_POST["cpass"]);
        }
        if(!empty($_POST["npass"]))
		{
			if(strlen($_POST["npass"]) >= 8)
			{
				if(!(strtolower($_POST["npass"]) == $_POST["npass"]) && (!(strtoupper($_POST["npass"]) == $_POST["npass"])))
				{
					$hasNumber = false;
					$num_arr = array("0","1","2","3","4","5","6","7","8","9");
					$npassword =htmlspecialchars($_POST["npass"]);
					for($i = 0; $i < strlen($npassword); $i++)
					{
						for($j = 0; $j <10; $j++)
						{
							if($npassword[$i]== $num_arr[$j])
							{
								$hasNumber = true;
								break;
							}
						}
					}
					if($hasNumber == true)
					{
						if(strpos($_POST["npass"], "#") || strpos($_POST["npass"], "?"))
						{
							$npass = htmlspecialchars($_POST["npass"]);
						}
						else{$err_npass = " *atleast one special character # or ? is required";}
					}
					else{$err_npass = " *atleast one digit is required";}
				}
				else{$err_npass = " *upper and lower case character required";}
			}
			else{$err_npass = " *minimum password length is 8";}
		}
		else{$err_npass = " *New Password Required";
		     $has_err=true;
		    }
		if($_POST["npass"]!=htmlspecialchars($_POST["cnpass"]))
		{
			$err_cnpass = " *Password not matched";
			$has_err=true;
		}
		else if(empty($_POST["cnpass"]))
		{
			$err_cnpass=" *Confirm New Password Required";
            $has_err=true;
		}
	    if(!$has_err){
			//$change= "password updated";
		    editPassword($npass,$email,$cpass);
		    header("Location: hr_dashboard.php");
		}
	}
	function editPassword($npass,$email,$cpass){
		$npass = md5($npass);
		$cpass = md5($cpass);
        $query="UPDATE user SET password='$npass' WHERE email='$email' AND password='$cpass'";
        execute($query);
    }
	
?>