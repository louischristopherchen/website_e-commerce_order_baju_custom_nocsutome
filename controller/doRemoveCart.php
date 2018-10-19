<?php 
	session_start();
	$productID = $_REQUEST['productID'];
	$cart = $_SESSION['arrCart'];
	
	for ($i = 0 ; $i <count($cart);$i++)
	{
		if ($cart[$i]['productID'] ==$productID)
		{
			$index = $i;	
			break;
		}
	}

	if(isset($index))
	{
			unset($_SESSION['arrCart'][$index]);
			for ($i = $index ; $i <count($cart)-1;$i++)
			{
				array_splice($_SESSION['arrCart'],$i,4,array(array('productID'=>$cart[$i+1]['productID'],'quantity'=>$cart[$i+1]['quantity'])));
			}
			header("location:../cart.php");
	}
?>