<?php 
	include("doConnect.php");
	session_start();
	$transactionID=$_REQUEST['transactionID'];
	$claimID=$_REQUEST['claimID'];
	$productID=$_REQUEST['productID'];
	$qtyC =$_REQUEST['txtQtyC'];
	$ketC=$_REQUEST['txtKetC'];
	$ketC = nl2br($ketC);
	setcookie('cookieqtyC',$qtyC,time()+300,'/');
	setcookie('cookieketC',$ketC,time()+300,'/');
	if ($ketC=="")
	{
		header("location:../insertclaim.php?transactionID=$transactionID&&claimID=$claimID&&productID=$prodcutID&&errorMsg=Ket Claim Must be Filled$result");
		setcookie('cookieNamaPengirim','',time()+300,'/');
	}
	else if ($qtyC=="")
	{
		header("location:../insertclaim.php?transactionID=$transactionID&&claimID=$claimID&&productID=$prodcutID&&errorMsg=Qty Claim Must be Filled");
		setcookie('cookieqtyC','',time()+300,'/');
	}
	else if (filter_var($qtyC, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../insertclaim.php?transactionID=$transactionID&&claimID=$claimID&&productID=$prodcutID&&errorMsg=Jumlah Transfer Must Only Contain Number");
		setcookie('cookieqtyC','',time()+300,'/');
	}
	else if($qtyC<0)
	{
		header("location:../insertclaim.php?transactionID=$transactionID&&claimID=$claimID&&productID=$prodcutID&&errorMsg=Jumlah Transfer Must Be Greater than 0");
		setcookie('cookieqtyC','',time()+300,'/');
	}
	else
	{	if($_FILES['fileUpload']['tmp_name'])
		{
			$folder = "../images/claim/";
			$imageSize = getimagesize($_FILES['fileUpload']['tmp_name']);
			$imageType = explode(".",$_FILES['fileUpload']['name']);
			$imageType = end($imageType);
		    if($imageSize==false)
			{
				header("location:../insertclaim.php?transactionID=$transactionID&&claimID=$claimID&&productID=$prodcutID&&errorMsg=Only Image Can be Upload");
			}
			else if($imageType !="jpg" && $imageType !="jpeg" && $imageType !="png")
			{
				header("location:../insertclaim.php?transactionID=$transactionID&&claimID=$claimID&&productID=$prodcutID&&errorMsg=Only .jpg .jpeg or .png image");
			}
			else
			{
				$picName = "$customname.".$imageType;
				mysql_query("update detailclaim set quantity_claim='$qtyC',ketclaim='$ketC', imageclaim='$picName', status_claim='pending' where productID=$productID");
				setcookie('cookieqtyC',$qtyC,time()+300,'/');
			setcookie('cookieketC',$ketC,time()+300,'/');
			header("location:../insertclaim.php?transactionID=$transactionID&&claimID=$claimID&&productID=$prodcutID&&errorMsg=Success");		
			}
				
		}
		else
		{
			mysql_query("update detailclaim set quantity_claim='$qtyC',ketclaim='$ketC', status_claim='pending' where productID=$productID");
			setcookie('cookieqtyC',$qtyC,time()+300,'/');
			setcookie('cookieketC',$ketC,time()+300,'/');
			header("location:../insertclaim.php?transactionID=$transactionID&&claimID=$claimID&&productID=$prodcutID&&errorMsg=Success");		
		}
			

	}
	
?>