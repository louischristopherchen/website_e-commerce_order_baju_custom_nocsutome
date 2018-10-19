<?php 
	include("doConnect.php");
	$customizeID = $_REQUEST['customizeID'];
	mysql_query("update detailcustomize set status_customize='cancel' where customizeID='$customizeID'");
	header("location:../cart.php");
?>