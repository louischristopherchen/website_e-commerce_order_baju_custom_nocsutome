<?php 
	include("doConnect.php");
	$customizeID = $_REQUEST['customizeID'];
	$userID=$_REQUEST['userID'];
	$transactionID = $_REQUEST['transactionID'];
		date_default_timezone_set("Asia/Jakarta");
		$date = date("d-m-Y")."";
		mysql_query("update trtransaction set status_transaction='rejected', date='$date' where transactionID=$transactionID");
		mysql_query("update detailcustomize set status_customize='reject' where customizeID='$customizeID'");
		header("location:../customize.php");
?>