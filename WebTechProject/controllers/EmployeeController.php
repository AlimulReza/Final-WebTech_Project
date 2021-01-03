<?php
    require_once '../models/db_connect.php';
 
    $eid="";
    $err_eid="";	
    $name="";
    $err_name="";
	$username="";
	$err_username="";
    $pass="";
    $err_pass="";
    $cpass="";
    $err_cpass="";
    $email="";
    $err_email="";
	$gender="";
    $err_gender="";
	$dbirth="";
	$err_dbirth="";
    $phone="";
    $err_phone="";
	$address="";
    $err_address="";
	$city="";
	$err_city="";
	$salary="";
	$err_salary="";
	$jdate="";
	$err_jdate="";
    $has_err=false;
	
    if(isset($_POST["add_employee"])){
		
		if(empty($_POST["eid"])){
            $err_eid=" *Id Required";
            $has_err=true;
        }
        else{
            $eid=htmlspecialchars($_POST["eid"]);
        }
        if(empty($_POST["name"])){
            $err_name=" *Name Required";
            $has_err=true;
        }
        else{
            $name=htmlspecialchars($_POST["name"]);
        }

        if(empty($_POST["username"])){
			$err_username=" *Username Required";
			$has_err=true;
		}
		elseif((strlen($_POST["username"])<6)){
            $err_username=" *Username must contain at least 6 characters";
            $has_err=true;
        }
		elseif(strpos($_POST["username"]," "))
		{
			$err_username = " *No space is allowed";
			$has_err=true;
		}
		else{
		    $username=htmlspecialchars($_POST["username"]);
		}
     
        if(!empty($_POST["pass"]))
		{
			if(strlen($_POST["pass"]) >= 8)
			{
				if(!(strtolower($_POST["pass"]) == $_POST["pass"]) && (!(strtoupper($_POST["pass"]) == $_POST["pass"])))
				{
					$hasNumber = false;
					$num_arr = array("0","1","2","3","4","5","6","7","8","9");
					$password =htmlspecialchars($_POST["pass"]);
					for($i = 0; $i < strlen($password); $i++)
					{
						for($j = 0; $j <10; $j++)
						{
							if($password[$i]== $num_arr[$j])
							{
								$hasNumber = true;
								break;
							}
						}
					}
					if($hasNumber == true)
					{
						if(strpos($_POST["pass"], "#") || strpos($_POST["pass"], "?"))
						{
							$pass = htmlspecialchars($_POST["pass"]);
						}
						else{$err_pass = " *atleast one special character # or ? is required";}
					}
					else{$err_pass = " *atleast one digit is required";}
				}
				else{$err_pass = " *upper and lower case character required";}
			}
			else{$err_pass = " *minimum password length is 8";}
		}
		else{$err_pass = " *Password Required";}
        if(empty($_POST["cpass"])){
            $err_cpass=" *Confirm Password Required";
            $has_err=true;
        }
		elseif($_POST["pass"]!=htmlspecialchars($_POST["cpass"]))
		{
			$err_cpass = " *Password not matched";
			$has_err=true;
		}
		else{
            $cpass=htmlspecialchars($_POST["cpass"]);
        }
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
		if(!isset($_POST["gender"])){
			$err_gender=" *Gender Required";
			$has_err=true;
        }
        else{
            $gender=htmlspecialchars($_POST["gender"]);
        }
		if(empty($_POST["dbirth"])){
            $err_dbirth=" *Date of Birth Required";
            $has_err=true;
        }
        else{
            $dbirth=htmlspecialchars($_POST["dbirth"]);
        }
        if(empty($_POST["phone"]))
		{
			$err_phone = " *Phone no. Required";
			$has_err=true;
		}
		else if(!is_numeric($_POST["phone"]))
		{
			$err_phone = " *Numeric charecter required";
			$has_err=true;
		}
		else{ $phone = htmlspecialchars($_POST["phone"]);
		}
		if(empty($_POST["address"])){
            $err_address=" *Address Required";
            $has_err=true;
        }
        else{
            $address=htmlspecialchars($_POST["address"]);
        }
		if(isset($_POST["city"])){
            $city=htmlspecialchars($_POST["city"]);
        }
        else{
            $err_city=" *Please Select city";
            $has_err=true;
        }
		if(empty($_POST["salary"])){
            $err_salary=" *Salary Required";
            $has_err=true;
        }
        else{
            $salary=htmlspecialchars($_POST["salary"]);
        }
	    if(!$has_err){
			addemployee($eid,$name,$username,$pass,$email,$gender,$dbirth,$phone,$city,$address,$salary);
			header("Location: allemployees.php");
		}
	}
	if(isset($_POST["update_employee"])){
		$name=htmlspecialchars($_POST["name"]);
		$email = htmlspecialchars($_POST["email"]);
		$gender=htmlspecialchars($_POST["gender"]);
		$dbirth=htmlspecialchars($_POST["dbirth"]);
		$phone = htmlspecialchars($_POST["phone"]);
		$city=htmlspecialchars($_POST["city"]);
		$address=htmlspecialchars($_POST["address"]);
		$salary=htmlspecialchars($_POST["salary"]);
        editEmployee($name,$email,$gender,$dbirth,$phone,$city,$address,$salary,$_GET["eid"]);
		header("Location: allemployees.php");
    }
	function addemployee($eid,$name,$username,$pass,$email,$gender,$dbirth,$phone,$city,$address,$salary)
	{
		$pass=md5($pass);
		$query = "INSERT INTO employees VALUES('$eid','$name','$username','$pass','$email','$gender','$dbirth','$phone','$city','$address','$salary')";
		execute($query);
	}
	function getAllEmployees(){
        $query="SELECT * FROM employees";
        return get($query);
    }
    function employeesearch($name){
        $query="SELECT id,name FROM employees WHERE name LIKE '%$name%'";
        return get($query);
    }	
	function getemployeeInfo($id){
        $query="SELECT * FROM employees WHERE id=".$id;
        return get($query);
    }
	function getEmployee($id){
        $query="SELECT * FROM employees WHERE id='$id'";
        return get($query);
    }
    function editEmployee($name,$email,$gender,$dbirth,$phone,$city,$address,$salary,$id){
        $query="UPDATE employees SET name='$name',email='$email',gender='$gender',dob='$dbirth',phone='$phone',city='$city',address='$address',salary='$salary' WHERE id='$id'";
        execute($query);
    }
	function deleteEmployee($id){
        $query="DELETE FROM employees WHERE id='$id'";
        execute($query);
    }
	
?>