<?php 
	include("doConnect.php");
	session_start();
	$transactionID=$_REQUEST['transactionID'];
	$shippingID=$_REQUEST['shippingID'];
	mysql_query("update trshipping set status_shipping='delivery' where shippingID=$shippingID");
	header("location:../shipping.php");
?>
