<?php 
	include("doConnect.php");
	session_start();
	$transactionID=$_REQUEST['transactionID'];
	$shippingID=$_REQUEST['shippingID'];
	mysql_query("update trshipping set status_shipping='',nama_shipping='' where shippingID=$shippingID");
	header("location:../shipping.php");
?>
