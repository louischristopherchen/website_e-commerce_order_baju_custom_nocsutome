<?php 
	include("doConnect.php");
	session_start();
	$transactionID=$_REQUEST['transactionID'];
	$claimID=$_REQUEST['claimID'];
	$qtyC =$_REQUEST['txtQtyC'];
	$ketC=$_REQUEST['txtKetC'];
	$ketC = nl2br($ketC);
	setcookie('cookieqtyC',$qtyC,time()+300,'/');
	setcookie('cookieketC',$ketC,time()+300,'/');
	if ($ketC=="")
	{
		header("location:../insertcustomclaim.php?transactionID=$transactionID&&claimID=$claimID&&errorMsg=Ket Claim Must be Filled$result");
		setcookie('cookieNamaPengirim','',time()+300,'/');
	}
	else if ($qtyC=="")
	{
		header("location:../insertcustomclaim.php?transactionID=$transactionID&&claimID=$claimID&&errorMsg=Qty Claim Must be Filled");
		setcookie('cookieqtyC','',time()+300,'/');
	}
	else if (filter_var($qtyC, FILTER_VALIDATE_INT)!=true)
	{
		header("location:../insertcustomclaim.php?transactionID=$transactionID&&claimID=$claimID&&errorMsg=Jumlah Transfer Must Only Contain Number");
		setcookie('cookieqtyC','',time()+300,'/');
	}
	else if($qtyC<0)
	{
		header("location:../insertcustomclaim.php?transactionID=$transactionID&&claimID=$claimID&&errorMsg=Jumlah Transfer Must Be Greater than 0");
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
				header("location:../insertcustomclaim.php?transactionID=$transactionID&&claimID=$claimID&&errorMsg=Only Image Can be Upload");
			}
			else if($imageType !="jpg" && $imageType !="jpeg" && $imageType !="png")
			{
				header("location:../insertcustomclaim.php?transactionID=$transactionID&&claimID=$claimID&&errorMsg=Only .jpg .jpeg or .png image");
			}
			else
			{
				$picName = "$customname.".$imageType;
				mysql_query("update detailcustomclaim set quantity_claim='$qtyC',ketclaim='$ketC', imageclaim='$picName', status_claim='pending' where claimID=$claimID");
				setcookie('cookieqtyC',$qtyC,time()+300,'/');
			setcookie('cookieketC',$ketC,time()+300,'/');
			header("location:../insertcustomclaim.php?transactionID=$transactionID&&claimID=$claimID&&errorMsg=Success");	
			}
				
		}
		else
		{
			mysql_query("update detailcustomclaim set quantity_claim='$qtyC',ketclaim='$ketC', status_claim='pending' where claimID=$claimID");
			setcookie('cookieqtyC',$qtyC,time()+300,'/');
			setcookie('cookieketC',$ketC,time()+300,'/');
			header("location:../insertcustomclaim.php?transactionID=$transactionID&&claimID=$claimID&&errorMsg=Success");		
		}
			

	}
	
?>