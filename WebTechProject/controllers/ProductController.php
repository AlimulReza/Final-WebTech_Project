<?php
    require_once '../models/db_connect.php';
    
    $pid="";
    $err_pid="";	
    $pname="";
    $err_pname="";
	$price="";
	$err_price="";
	$ptype="";
    $err_ptype="";
	$description="";
	$err_description="";
	
    $has_err=false;
	
    if(isset($_POST["add_products"])){
		
		if(empty($_POST["pid"])){
            $err_pid=" *Product Id Required";
            $has_err=true;
        }
        else{
            $pid=htmlspecialchars($_POST["pid"]);
        }
        if(empty($_POST["pname"])){
            $err_pname=" *Product Name Required";
            $has_err=true;
        }
        else{
            $pname=htmlspecialchars($_POST["pname"]);
        }

        if(empty($_POST["price"])){
			$err_price=" *Price Required";
			$has_err=true;
		}
		else{
		    $price=htmlspecialchars($_POST["price"]);
		}
		if(isset($_POST["ptype"])){
            $ptype=htmlspecialchars($_POST["ptype"]);
        }
        else{
            $err_ptype=" *Please Select Product type";
            $has_err=true;
        }
		if(empty($_POST["description"])){
            $err_description=" *Description Required";
            $has_err=true;
        }
        else{
            $description=htmlspecialchars($_POST["description"]);
        }
	    if(!$has_err){
			addproduct($pid,$pname,$price,$ptype,$description);
			header("Location: allproducts.php");
			
		}
	}
	if(isset($_POST["update_products"])){
		$pname=htmlspecialchars($_POST["pname"]);
		$price=htmlspecialchars($_POST["price"]);
		$ptype=htmlspecialchars($_POST["ptype"]);
		$description=htmlspecialchars($_POST["description"]);
        editProduct($pname,$price,$ptype,$description,$_GET["pid"]);
		header("Location: allproducts.php");
    }
	function addproduct($pid,$pname,$price,$ptype,$description)
	{
		$query = "INSERT INTO products VALUES('$pid','$pname','$price','$ptype','$description')";
		execute($query);
	}
	function getAllProducts(){
        $query="SELECT * FROM products";
        return get($query);
    }
    function productsearch($name){
        $query="SELECT pid,pname FROM products WHERE pname LIKE '%$name%'";
        return get($query);
    }	
	function getproductInfo($id){
        $query="SELECT * FROM products WHERE pid=".$id;
        return get($query);
    }
	function getProduct($pid){
        $query="SELECT * FROM products WHERE pid='$pid'";
        return get($query);
    }
    function editProduct($pname,$price,$ptype,$description,$pid){
        $query="UPDATE products SET pname='$pname',price='$price',ptype='$ptype',description='$description' WHERE pid='$pid'";
        execute($query);
    }
	function deleteProduct($pid){
        $query="DELETE FROM products WHERE pid='$pid'";
        execute($query);
    }
	
?>