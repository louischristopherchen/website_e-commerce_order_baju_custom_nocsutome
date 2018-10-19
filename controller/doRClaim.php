<?php 
	include("doConnect.php");
	session_start();
	$transactionID=$_REQUEST['transactionID'];
	$claimID=$_REQUEST['claimID'];
	$productID=$_REQUEST['productID'];
	mysql_query("update detailclaim set status_claim='reject' where productID=$productID");
	header("location:../claim.php");
?>