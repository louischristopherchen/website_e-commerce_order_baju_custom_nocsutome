<?php 
	include("doConnect.php");
	session_start();
	if(!isset($_SESSION['userRole']))
	{
		header("location:../login.php");
	}
	
	else
	{
		$cart = $_SESSION['arrCart'];
		$userID = $_SESSION['userID'];
		date_default_timezone_set("Asia/Jakarta");
		$date = date("d-m-Y")."";
		mysql_query("insert into trtransaction values('','$userID','$date','pending')");
		
		
		$id = mysql_insert_id($con);
		mysql_query("insert into trclaim values('','$id')");
				$id2 = mysql_insert_id($con);
		mysql_query("insert into trpayment values('','$id','','','','','')");
		mysql_query("insert into trshipping values('','$id','','')");
		for ($i = 0 ; $i<count($cart);$i++)
		{
			$productID=$cart[$i]['productID'];
			$quantity=$cart[$i]['quantity'];
			$s=$cart[$i]['S'];
			$m=$cart[$i]['M'];
			$l=$cart[$i]['L'];
			$xl=$cart[$i]['XL'];
			$xxl=$cart[$i]['XXL'];
			$xxxl=$cart[$i]['XXXL'];
			mysql_query("insert into detailtransaction values('$id','$productID','$quantity','$s','$m','$l','$xl','$xxl','$xxxl')");
			mysql_query("insert into detailclaim values('$id2','$productID','','','','')");
		}
	
		
		unset($_SESSION['arrCart']);
		
		header("location:../cart.php");
	}
?>