<?php 
include("controller/doConnect.php");
  session_start();
	if(isset($_REQUEST['productID']))
	{
	$productID=$_REQUEST['productID'];
	}

    if(isset($_REQUEST['errorMsg']))
    {
     $err= $_REQUEST['errorMsg'];
    }
	 else
	{
	 $err="";
	}
 
	
	$button='';
	if(isset($_SESSION['userRole']))
	{
		if($_SESSION['userRole']=="admin")
		{
			$button='<form action="update_product.php" method="get" >
			 &nbsp;&nbsp;<td><input type = "submit" value="Edit Product"></td>
				</tr>
				<tr>
				<td><input type="hidden" name="productID" value="'.$productID.'"/></td>
				</tr>
				<tr>
					<td><a href = "controller/doDeleteProduct.php?productID='.$productID.'">
					<input type = "button" value="Delete Product" onclick= "return confirm(\'Are you sure?\')"/></a></td>
				</tr>
				</table></ul></form>';
		}
		else
		{
		
		$button='<form action="controller/doAddCart.php" method="get" >
				
				<td>Quantity </td><td> : </td> 
				<td><input type= "text" name="txtQuantity" style="width:30px;"/></td>
				<tr><td>Size</td>
				<td> : </td>
				<td align="center">S</td>
				<td align="center">M</td>
				<td align="center">L</td>
				<td align="center">XL</td>
				<td align="center">XXL</td>
				<td align="center">XXXL</td>				
				</tr>
				<tr>
				<td></td>
				<td></td>
				<td><input type= "text" name="txtS" style="width:30px;"/></td>
				<td><input type= "text" name="txtM" style="width:30px;"/></td>
				<td><input type= "text" name="txtL" style="width:30px;"/></td>
				<td><input type= "text" name="txtXL" style="width:30px;"/></td>
				<td><input type= "text" name="txtXXL" style="width:30px;"/></td>
				<td><input type= "text" name="txtXXXL" style="width:30px;"/></td>
				</tr>
				</table></ul>
				<ul><li><input type="hidden" name="productID" value="'.$productID.'"/></li></ul>
				<ul>
					<li><label>
		          		'.$err.'
						</label><br>
						
					<input type = "submit" value="Add to Cart"></li>
				</ul></form>';
		}
	}
		
	
	$list="";
	$result = mysql_query("select productname,price,brand, image from msproduct where productID='$productID'");
	$row = mysql_fetch_array($result);
	$list.='<div class="col-md-5 single-top">	
			   <div class="flexslider">
				        <div class="thumb-image">  
                        <img data-imagezoom="true" class="img-responsive" width="300" height="300" src="images/'.$row['image'].'" width="100%" /></div>
				  
			</div>
			</div>
			<div class="col-md-7 single-top-left simpleCart_shelfItem">
				<h1>'.$row['productname'].'</h1>
				<h6 class="item_price">IDR. '.$row['price'].'</h6>			
				<table>
				<tr>
					<td>Brand</td>
					<td>:</td>
					<td colspan="2">'.$row['brand'].'</td>
				</tr>
				<tr>
					'.$button.'					
	            
			</div>';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>HD Collection</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.0.min.js"></script>
<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<!-- Custom Theme files -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shoplist Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--Google Fonts-->
<link href='//fonts.googleapis.com/css?family=Hind:400,500,300,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
<script src="js/simpleCart.min.js"> </script>
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php
include ("header.php");

?>
<!--single start here-->
<div class="single">
   <div class="container">
   	 <div class="single-main">
   	 	<div class="single-top-main">
	   		<?php echo $list;?>
		   <div class="clearfix"> </div>
	   </div>
	  
   	 </div>
   </div>
</div>
<?php
include ("footer.php");

?>
</body>
</html>