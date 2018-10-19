<?php 
	include("doConnect.php");
	session_start();
	$customizeID = $_REQUEST['customizeID'];
	$customname = $_REQUEST['txtCustomname'];
	$bahan = $_REQUEST['cmbBahan'];
	$warna = $_REQUEST['cmbWarna'];
	$price = $_REQUEST['txtPrice'];
	$quantity = $_REQUEST['txtQuantity'];
	$s = $_REQUEST['txtS'];
	$m = $_REQUEST['txtM'];
	$l = $_REQUEST['txtL'];
	$xl = $_REQUEST['txtXL'];
	$xxl = $_REQUEST['txtXXL'];
	$xxxl = $_REQUEST['txtXXXL'];
	$keterangan = $_REQUEST['txtKeterangan'];
	$keterangan = nl2br($keterangan);
	if ($customname=="")
	{
		header("location:../respond.php?customizeID=$customizeID&&errorMsg=Custom Name must be filled");
		
	}
	else if ($bahan=="")
	{
		header("location:../respond.php?customizeID=$customizeID&&errorMsg=Material Must be Chosen");
		
	}
	else if ($warna=="")
	{
		header("location:../respond.php?customizeID=$customizeID&&errorMsg=Colour Must be Chosen");
	}
	else if ($price=="")
	{
		header("location:../respond.php?customizeID=$customizeID&&errorMsg=Price per Piece must be filled");
		
	}
	else if(filter_var($price,FILTER_VALIDATE_INT)!=true)
	{
		header("location:../respond.php?customizeID=$customizeID&&errorMsg=Price per Piece Must Numeric");
	}
	
	else if($quantity<1)
	{
		header("location:../respond.php?customizeID=$customizeID&&errorMsg=Quantity Must more than 0 (zero)");
	}
	else if(filter_var($quantity,FILTER_VALIDATE_INT)!=true)
	{
		header("location:../respond.php?customizeID=$customizeID&&errorMsg=Quantity Must Numeric");
	}
	else if($quantity!=$s+$m+$l+$xl+$xxl+$xxxl)
	{
	
		header("location:../respond.php?customizeID=$customizeID&&errorMsg=Quantity not match with total quantity per size");
	}
	else
	{ 
	if($_FILES['fileUpload']['tmp_name'])
		{
			$folder = "../images/custom/";
			$imageSize = getimagesize($_FILES['fileUpload']['tmp_name']);
			$imageType = explode(".",$_FILES['fileUpload']['name']);
			$imageType = end($imageType);
		    if($imageSize==false)
			{
				header("location:../respond.php?customizeID=$customizeID&&errorMsg=Only image can be upload");
			}
			else if($imageType !="jpg" && $imageType !="jpeg" && $imageType !="png")
			{
				header("location:../respond.php?customizeID=$customizeID&&errorMsg=Only .jpg .jpeg or .png image");
			}
			else
			{
				$userID = $_SESSION['userID'];
				$picName = "$customname.".$imageType;
				date_default_timezone_set("Asia/Jakarta");
				$date = date("d-m-Y")."";
				mysql_query("update trcustomize set
				customname='$customname', status='respond',harga='$price', warna='$warna', image='$picName', keterangan='$keterangan' where customizeID=$customizeID");
				mysql_query("update detailcustomize set
				quantity='$quantity', S='$s', M='$m', L='$l', XL='$xl', XXL='$xxl', XXXL='$xxxl' where customizeID=$customizeID");
				move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $folder.$picName);
				header("location:../respond.php?customizeID=$customizeID&&errorMsg=Success");
				}
				
			}
		else
		{
		mysql_query("update trcustomize set
				customname='$customname', status='respond',harga='$price', warna='$warna', keterangan='$keterangan' where customizeID=$customizeID");
				mysql_query("update detailcustomize set
				quantity='$quantity', S='$s', M='$m', L='$l', XL='$xl', XXL='$xxl', XXXL='$xxxl' where customizeID=$customizeID");
			header("location:../respond.php?customizeID=$customizeID&&errorMsg= Succes");
		}
			
	
	}
		
		
?>