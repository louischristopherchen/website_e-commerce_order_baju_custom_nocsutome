<?php 
	include("doConnect.php");
	$transactionID = $_REQUEST['id'];
	mysql_query("update trtransaction set status_transaction='rejected' where transactionID='$transactionID'");
	header("location:../transaction.php");
?>