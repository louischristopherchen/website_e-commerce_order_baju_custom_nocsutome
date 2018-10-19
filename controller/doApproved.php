<?php 
	include("doConnect.php");
	$transactionID = $_REQUEST['transactionID'];
	mysql_query("update trtransaction set status_transaction='approve' where transactionID='$transactionID'");
	header("location:../transaction.php");
?>