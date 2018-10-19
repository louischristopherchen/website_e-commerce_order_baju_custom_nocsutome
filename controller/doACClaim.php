<?php 
	include("doConnect.php");
	session_start();
	$transactionID=$_REQUEST['transactionID'];
	$claimID=$_REQUEST['claimID'];
	mysql_query("update detailcustomclaim set status_claim='approve' where claimID=$claimID");
	header("location:../claim.php");
?>