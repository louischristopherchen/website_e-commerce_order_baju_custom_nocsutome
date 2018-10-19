<?php 
	include("doConnect.php");
	$customizeID = $_REQUEST['customizeID'];
	mysql_query("update detailcustomize set status_customize='request' where customizeID='$customizeID'");
	header("location:../cart.php");
?>