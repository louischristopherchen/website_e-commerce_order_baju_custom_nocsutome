<?php 
	include("doConnect.php");
	$transactionID = $_REQUEST['id'];
	$result = mysql_query("select d.productID, d.quantity,p.stock, from detailtransaction as d, msproduct as p where transactionID=$transactionID and d.productID=p.productID");
	$subject = "Your Transaction:".$transactionID." has Approved";
	$content="";
	while($row = mysql_fetch_array($result))
	{
		$productID = $row['productID'];
		$quantity = $row['quantity'];
		$content .="ProductID:". $row['productID']." Quantity: ". $row['quantity']." \n";
		$stock=$row['stock']-$quantity;
		mysql_query("update msproduct set stock=$stock where productID=$productID");
	}
	mysql_query("update trtransaction set status_transaction='done' where transactionID=$transactionID");
	header("location:../transaction.php");
?>