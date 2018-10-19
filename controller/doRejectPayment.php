<?php 
	include("doConnect.php");
	session_start();
	$transactionID=$_REQUEST['transactionID'];
	$paymentID=$_REQUEST['paymentID'];
	mysql_query("update trpayment set status_payment='rejected' where paymentID=$paymentID");
	header("location:../payment.php");
?>