<?php 
include("controller/doConnect.php");
  session_start();
if(isset($_SESSION['arrCart']))
	{
		$grandTotal=0;
		$cartList='';
		$cart = $_SESSION['arrCart'];
		for ($i=0;$i<count($cart);$i++)
		{
			$productID = $cart[$i]['productID'];
			$result = mysql_query("select productname,price,brand, image from msproduct where productID='$productID'");
			$result = mysql_fetch_array($result);
			
			$totalPrice = $result['price']*$cart[$i]['quantity'];
			$grandTotal+=$totalPrice;
			$cartList.='
				 <ul class="cart-header">
					 <li class="ring-in"><img src="images/'.$result['image'].'" class="img-responsive" /></li>
					 <li align="left">'.$result['productname'].'
					 <p>IDR. '.$result['price'].'</p>
					 <p>brand '.$result['brand'].'</p>
					 <p>quantity = '.$cart[$i]['quantity'].' unit</p>
					 </li>
					 <li>'.$totalPrice.'</li>
					 <li>
						<a href = "controller/doRemoveCart.php?productID='.$cart[$i]['productID'].'" class="add-cart"onclick= "return confirm(\'Are you sure?\')"/>Cancel</a></li></a>
					 </li>
						<div class="clearfix"> </div>
				</ul>
					  ';
		}
		$cartList.='</table><br/>';
		if(count($_SESSION['arrCart'])>0)
		{
			$cartList.="Grand Total = ".$grandTotal;
			$cartList.='<br/><br/><form action="controller/doSubmitCart.php" method="get">
						<input type= "submit" value = "Submit" onclick= "return confirm(\'Are you sure?\')"/>
					</form>';
		}}
		
		
		
		else if(isset($_SESSION['userRole']))
	{	$userID=$_SESSION['userID'];
		if($_SESSION['userRole']=="member")
		{
			
			$result = mysql_query("	select tp.status_payment,tt.transactionID, tt.userID, tt.date,tt.status_transaction, dt.productID, dt.quantity,dt.S,dt.M,dt.L,dt.XL,dt.XXL,dt.XXXL, p.productname,p.price,p.brand,p.image from trtransaction as tt, detailtransaction as dt, msproduct as p, trpayment as tp where tt.transactionID=dt.transactionID and dt.productID=p.productID AND  tt.transactionID=tp.transactionID AND tt.userID=$userID	and tt.status_transaction!=''
			");
			$cartList="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
			$cartList.='';
			while($row = mysql_fetch_array($result))
			{	
				$productID=$row['productID'];
				$productname=$row['productname'];
				$price=$row['price'];
				$brand=$row['brand'];
				$image= $row['image'];
				$status_transaction= $row['status_transaction'];
				$status_payment= $row['status_payment'];
				$quantity= $row['quantity'];
				$total=$price*$quantity;
				$grand+=$total;
				
				$cartList.='
				 <ul class="cart-header">
					 <li class="ring-in"><img src="images/'.$image.'" class="img-responsive" /></li>
					 <li align="left">'.$productname.'
					 <p>IDR. '.$price.'</p>
					 <p>brand '.$brand.'</p>
					 <p>quantity = '.$quantity.' unit</p>
					 </li>
					 <li>'.$total.'</li>';
				if($tanda!=$row['transactionID'])
				{
				if($status_payment=="")
					{
					$cartList.='<li>silahkan lanjut ke menu payment
					<p><a href = "payment.php" class="add-cart"/>Payment</a></p>
					</li>';
					}
				 else if($status_payment=="process"||$status_payment=="approved"||$status_payment=="reject")
					{
					$cartList.='<li>'.$status_payment.'</li>';
					}
					
					
					
					$cartList.='</td></tr>';
				}
				
				
				
				
				$cartList.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				
				
				$tanda = $row['transactionID'];
			}
			$cartList.="</table><br/><div align='center'>GrandTotal = $grand
			<p>request</p>
			<p>cancel</p>
			<p> reject</p>
			<p>accept</p></div>";
		}
	}///
	else 
	{
		$cartList = "<h3>No Product(s) added to Cart2</h3>";
	}

	?>
    
    
    <?php 

	//custom list
	$list="";
	if (isset($_SESSION['userRole']))
	{	$userID=$_SESSION['userID'];
		if($_SESSION['userRole']=="member")
		{
			$result = mysql_query("select tt.userID, dc.customizeID, dc.date_customize,dc.status_customize, dc.customname , dc.harga,dc.bahan,dc.warna,dc.image,dc.keterangan, dc.customizeID, dc.quantity,dc.S,dc.M,dc.L,dc.XL,dc.XXL,dc.XXXL from detailcustomize as dc, trtransaction as tt where tt.transactionID=dc.transactionID AND userID=$userID");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
			$list.='
						<div class="in-check" >
				<ul class="unit">
				   <li><span>Images</span></li>
				   <li><span>Detail</span></li>
				   <li><span>Date</span></li>
				   <li><span>Sub Total</span></li>
				   <li><span>Status</span></li>
					<div class="clearfix"> </div></ul>';
			while($row = mysql_fetch_array($result))
			{	$customizeID=$row['customizeID'];
				$date = $row['date_customize'];
				$status=$row['status_customize'];
				$image= $row['image'];
				$customname = $row['customname'];
				$bahan = $row['bahan'];
				$warna = $row['warna'];
				$price = $row['harga'];
				$quantity = $row['quantity'];
				$s = $row['S'];
				$m = $row['M'];
				$l = $row['L'];
				$xl = $row['XL'];
				$xxl = $row['XXL'];
				$xxxl = $row['XXXL'];
				$keterangan =$row['keterangan'];
				$total=$price*$quantity;
				$grand+=$total;
				$list.='
				<ul class="cart-header">
					 <li class="ring-in"><img src="images/custom/'.$image.'" class="img-responsive" /></li>
					
				 <li align="left">
				<p>'.$customname.'</p>
				<p>bahan:'.$bahan.'</p>
				<p>warna:'.$warna.'</p>
				<p>Qty:'.$quantity.'</p>
				<p>S:'.$s.'&ensp;&ensp;XL:'.$xl.'</p>
				<p>M:'.$m.'&ensp;&ensp;XXL:'.$xxl.'</p>
				<p>L:'.$l.'&ensp;&ensp;XXXL:'.$xxxl.'</p>
				<p>Price:'.$price.'</p>
				<p>Ket:'.$keterangan.'</p>
				<li>'.$date.'</li>
				<li>'.$total.'</p></li>
				<li>';
				if($tanda!=$row['customizeID'])
				{
				
					if($status=="")
					{
					$list.='
					<li>'.$status.'
					<p><a href = "controller/doRequest.php?customizeID='.$customizeID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Request</a></p>
					<p><a href = "controller/doCancel.php?customizeID='.$customizeID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Cancel</a></p>
					 </li>';
					}
					
					else if($status=="request"||$status=="cancel")
					{
					$list.='<li>'.$status.'</li>';
					}
					else if($status=="approved")
					{
					$list.='<li>'.$status.'
					<p>silahkan lanjut ke menu payment</p>
					<p><a href = "payment.php" class="add-cart"/>Payment</a></p>
					</li>';
					}
					
					
					$list.='</td></tr>';
				}
				
				
				
				
				$list.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				
				
				$tanda = $row['customizeID'];
			}
			$list.="</table><br/><div align='center'>GrandTotal = $grand
			<p>request</p>
			<p>cancel</p>
			<p> reject</p>
			<p>accept</p></div>";
		}
		
		
		else
		{
		
		}
	}
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
 <?php if(!isset($_SESSION['userRole'])){ ?>
 <div class="signin">
	<div class="container">
		<div class="signin-main">
	<center>
      <img src="images/membersOnly.jpg" class="img-responsive">
    </center>  
    <div class="clearfix"> </div>
	   </div>
	  
   	 </div>
   </div>
</div>       
         <?php }else{ ?>
<!--home-block start here-->
<div class="ckeckout">
		<div class="container">
			<div class="ckeckout-top">
			<div align ="center" class=" cart-items heading">
			 <h1>My Shopping Cart</h1>
             <div class="in-check" >
				<ul class="unit">
				   <li><span>Images</span></li>
				   <li><span>Detail</span></li>
				   <li><span>Sub Total</span></li>
				   <li><span>Status</span></li>
					<div class="clearfix"> </div></ul>
			<?php echo $cartList;?>
            <div class="clearfix"> </div>
				
			</div>
			</div>  
		 </div>
		</div>
	</div>

<<div class="ckeckout">
		<div class="container">
			<div class="ckeckout-top">
			<div align ="center" class=" cart-items heading">
			 <h1>My Custom List</h1>
			<?php 
			
				echo $list;
			?>
            <div class="clearfix"> </div>
				
			</div>
			</div>  
		 </div>
		</div>
	</div>
<?php } ?>


<?php
include ("footer.php");

?>
</body>
</html>