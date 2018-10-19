<?php
	include("doConnect.php");
	$faqID = $_REQUEST['faqID'];
	mysql_query("delete from faq where faqID=$faqID");
	header("location:../faq.php");
?>