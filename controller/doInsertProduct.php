<?php 
	include("doConnect.php");
	session_start();
	
	$name = $_REQUEST['txtPName'];
	$price = $_REQUEST['txtPPrice'];
	$brand =$_REQUEST['txtPBrand'];
	setcookie('cookieProductName',$name,time()+300,'/');
	setcookie('cookieProductPrice',$price,time()+300,'/');
	setcookie('cookieProductBrand',$brand,time()+300,'/');
	
	if ($name=="")
	{
		header("location:../insert_product.php?errorMsg=Name Must be Filled$result");
		setcookie('cookieProductName','',time()+300,'/');
	}
	else if ($price=="")
	{
		header("location:../insert_product.php?errorMsg=Price Must be Filled");
		setcookie('cookieProductPrice','',time()+300,'/');
	}
	else if (filter_var($price, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../insert_product.php?errorMsg=Price Must Only Contain Number");
		setcookie('cookieProductPrice','',time()+300,'/');
	}
	else if($price<0)
	{
		header("location:../insert_product.php?errorMsg=Price Must Be Greater than 0");
		setcookie('cookieProductPrice','',time()+300,'/');
	}
	else if ($brand=="")
	{
		header("location:../insert_product.php?errorMsg=Brand Must be Filled");
		setcookie('cookieProductBrand','',time()+300,'/');
	}
	else
	{
		if($_FILES['fileUpload']['tmp_name'])
		{
			$folder = "../images/";
			$imageSize = getimagesize($_FILES['fileUpload']['tmp_name']);
			$imageType = explode(".",$_FILES['fileUpload']['name']);
			$imageType = end($imageType);
		    if($imageSize==false)
			{
				header("location:../insert_product.php?errorMsg=Only image can be upload");
			}
			else if($imageType !="jpg" && $imageType !="jpeg" && $imageType !="png")
			{
				header("location:../insert_product.php?errorMsg=Only .jpg .jpeg or .png image");
			}
			else
			{
				$picName = "$name.".$imageType;
				mysql_query("insert into msproduct values('','$name','$price','$brand','$picName')");
				move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $folder.$picName);	
				setcookie('cookieProductName','',time()+300,'/');
				setcookie('cookieProductPrice','',time()+300,'/');
				setcookie('cookieProductBrand',"",time()+300,'/');
				header("location:../product.php");				
			}
		}
		else
		{
			header("location:../addProduct.php?errorMsg= Product Image  Must be chosen");
		}
	
	}
	
?>