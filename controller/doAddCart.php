<?php 
	include("doConnect.php");
	session_start();
	$productID = $_REQUEST['productID'];
	$quantity = $_REQUEST['txtQuantity'];
	$s = $_REQUEST['txtS'];
	$m = $_REQUEST['txtM'];
	$l = $_REQUEST['txtL'];
	$xl = $_REQUEST['txtXL'];
	$xxl = $_REQUEST['txtXXL'];
	$xxxl = $_REQUEST['txtXXXL'];
	
	if ($quantity=="")
	{
		header("location:../buy_product.php?productID=$productID&&errorMsg=Quantity must be filled");
		
	}
	
	else if($quantity<1)
	{
		header("location:../buy_product.php?productID=$productID&errorMsg=Quantity Must more than 0 (zero)");
	}
	else if(filter_var($quantity,FILTER_VALIDATE_INT)!=true)
	{
		header("location:../buy_product.php?productID=$productID&errorMsg=Quantity Must Numeric");
	}
	else if($quantity!=$s+$m+$l+$xl+$xxl+$xxxl)
	{
	
		header("location:../buy_product.php?productID=$productID&errorMsg=Quantity not match with total quantity per size");
	}
	else
	{
		if(!isset($_SESSION['arrCart'])||count($_SESSION['arrCart'])<1)
		{
			$_SESSION['arrCart']= array(0=>array('productID'=>$productID,'quantity'=>$quantity,'S'=>$s,'M'=>$m,'L'=>$l,'XL'=>$xl,'XXL'=>$xxl,'XXXL'=>$xxxl)
			);
		header("location:../buy_product.php?productID=$productID&errorMsg=Success");
		}
		else
		{
			$flag=0;
			$index=0;
			$cart=$_SESSION['arrCart'];
			for($i=0;$i<count($cart);$i++)
			{
						
				if($cart[$i]['productID']==$productID)
				{
					$flag=1;
					$index=$i;
					$quantity +=$cart[$i]['quantity'];	
					if($flag=1)
					{
							
						array_splice($_SESSION['arrCart'],$index,4,array(array('productID'=>$cart[$i]['productID'],'quantity'=>$quantity,'S'=>$s,'M'=>$m,'L'=>$l,'XL'=>$xl,'XXL'=>$xxl,'XXXL'=>$xxxl)));
						header("location:../buy_product.php?productID=$productID&errorMsg=Success1");
					}
					else
					{
						header("location:../buy_product.php?productID=$productID&errorMsg=Quantity not match with total quantity per size");
					}
				}
				
			}
			if($flag==0)
			{			
				array_push($_SESSION['arrCart'],array('productID'=>$productID,'quantity'=>$quantity,'S'=>$s,'M'=>$m,'L'=>$l,'XL'=>$xl,'XXL'=>$xxl,'XXXL'=>$xxxl));
				header("location:../buy_product.php?productID=$productID&errorMsg=Success2");			
			}
		}
		
		
	}
		
		
?>