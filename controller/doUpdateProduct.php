<?php 
	include("doConnect.php");
	session_start();
	$productID = $_REQUEST['ProductID'];
	$name = $_REQUEST['txtPName'];
	$price = $_REQUEST['txtPPrice'];
	$brand =$_REQUEST['txtPBrand'];
	if ($name=="")
	{
		header("location:../update_product.php?productID=$productID&&errorMsg=Name Must be Filled$result");

	}
	else if ($brand=="")
	{
		header("location:../update_product.php?productID=$productID&&errorMsg=Brand Must be Filled");
	
	}
	else if ($price=="")
	{
		header("location:../update_product.php?productID=$productID&&errorMsg=Price Must be Filled");

	}
	else if (filter_var($price, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../update_product.php?productID=$productID&&errorMsg=Price Must Only Contain Number");
	
	}
	else if($price<0)
	{
		header("location:../update_product.php?productID=$productID&&errorMsg=Price Must Be Greater than 0");
	
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
				header("location:../update_product.php?productID=$productID&&errorMsg=Only image can be upload");
			}
			else if($imageType !="jpg" && $imageType !="jpeg" && $imageType !="png")
			{
				header("location:../update_product.php?productID=$productID&&errorMsg=Only .jpg .jpeg or .png image");
			}
			else
			{
				$picName = "$name.".$imageType;
				mysql_query("update msproduct set productname='$name', price='$price',
							image='$picName',brand='$brand'where productID=$productID");
				move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $folder.$picName);	
				header("location:../update_product.php?productID=$productID&&errorMsg= Success");			
			}
		}
		else
		{
			header("location:../update_product.php?productID=$productID&&errorMsg= Product Image  Must be chosen");
		}
	
	}
?>