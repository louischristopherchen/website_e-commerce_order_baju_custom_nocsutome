<?php 
	include("doConnect.php");
	session_start();
	$komen = $_REQUEST['txtKomen'];
	$komen = nl2br($komen);

	if ($komen=="")
	{
		header("location:../testimoni.php?errorMsg=testimoni must be filled");
		
	}
	
	else
	{ 	
				$userID = $_SESSION['userID'];
				date_default_timezone_set("Asia/Jakarta");
				$date = date("d-m-Y")."";
				mysql_query("insert into testimoni values('','$userID','$date','$komen')");
				header("location:../testimoni.php?errorMsg=Success");
			
				
		
	
	}
		
		
?>
