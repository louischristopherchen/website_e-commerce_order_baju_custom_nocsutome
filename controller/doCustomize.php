<?php 
	include("doConnect.php");
	session_start();
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
		header("location:../customize.php?errorMsg=Custom Name must be filled");
		
	}
	else if ($bahan=="")
	{
		header("location:../customize.php?errorMsg=Material Must be Chosen");
		
	}
	else if ($warna=="")
	{
		header("location:../customize.php?errorMsg=Colour Must be Chosen");
	}
	else if ($price=="")
	{
		header("location:../customize.php?errorMsg=Price per Piece must be filled");
		
	}
	else if(filter_var($price,FILTER_VALIDATE_INT)!=true)
	{
		header("location:../customize.php?errorMsg=Price per Piece Must Numeric");
	}
	
	else if($quantity<1)
	{
		header("location:../customize.php?errorMsg=Quantity Must more than 0 (zero)");
	}
	else if(filter_var($quantity,FILTER_VALIDATE_INT)!=true)
	{
		header("location:../customize.php?errorMsg=Quantity Must Numeric");
	}
	else if($quantity!=$s+$m+$l+$xl+$xxl+$xxxl)
	{
	
		header("location:../customize.php?errorMsg=Quantity not match with total quantity per size");
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
				header("location:../customize.php?errorMsg=Only image can be upload");
			}
			else if($imageType !="jpg" && $imageType !="jpeg" && $imageType !="png")
			{
				header("location:../customize.php?errorMsg=Only .jpg .jpeg or .png image");
			}
			else
			{
			
				$userID = $_SESSION['userID'];
				$picName = "$customname.".$imageType;
				date_default_timezone_set("Asia/Jakarta");
				$date = date("d-m-Y")."";
				mysql_query("insert into trtransaction values('','$userID','$date','pending')");
				$id = mysql_insert_id($con);
				mysql_query("insert into trclaim values('','$id')");
				$id2 = mysql_insert_id($con);
				mysql_query("insert into detailcustomclaim values('$id2','','','','')");
				mysql_query("insert into trpayment values('','$id','','','','','')");
				mysql_query("insert into trshipping values('','$id','','')");
				mysql_query("insert into detailcustomize values('$id',
				'','$date','','$customname','$price',
				'$bahan','$warna','$picName','$keterangan','$quantity',
				'$s','$m','$l','$xl','$xxl','$xxxl')");
				move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $folder.$picName);
				header("location:../customize.php?errorMsg=Success");
			}
				
		}
		else
		{
			header("location:../customize.php?errorMsg= Product Image  Must be chosen");
		}
	
	}
		
		
?>