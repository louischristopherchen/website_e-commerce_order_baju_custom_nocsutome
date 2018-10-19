<?php
	include("doConnect.php");
	$productID = $_REQUEST['productID'];
	mysql_query("delete from msproduct where productID=$productID");
	header("location:../product.php");
?>