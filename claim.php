<?php 
//TRANSACTION LIST
include("controller/doConnect.php");
  session_start();
$userID=$_SESSION['userID'];
	$list="";
	if (isset($_SESSION['userRole']))
	{
		if($_SESSION['userRole']=="member")
		{
			$result = mysql_query("select  	
			tc.claimID, dcr.quantity_claim, dcr.ketclaim, dcr.image_claim, dcr.status_claim,
			t.transactionID,tp.status_payment,tp.paymentID,
			tp.nama_payment,tp.nama_bank,tp.nilai_transfer, ts.shippingID,
			ts.nama_shipping,ts.status_shipping, t.transactionID, t.date , 
			t.status_transaction, d.productID, d.quantity,d.S,d.M,d.L,d.XL,
			d.XXL,d.XXXL,p.image,p.productname,p.price from trtransaction as t,
			detailtransaction as d , msproduct as p,trshipping AS ts, trpayment as tp, trclaim as tc,detailclaim as dcr
where t.transactionID=d.transactionID 
and d.productID = p.productID 
and t.userID=$userID
AND t.transactionID = ts.transactionID
AND t.transactionID = tp.transactionID
AND t.transactionID = tc.transactionID
AND dcr.claimID=tc.claimID
and	t.status_transaction='done'
			");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			$list.="<h1>Claim Regular List</h1>
						<div class='in-check' >
				<ul class='unit'>
				    <li><span>Image</span></li>
				   <li><span>Product</span></li>
				   <li><span>Payment</span></li>
				   <li><span>Shipping</span></li>
				   <li><span>Status transaction</span></li>
					<div class='clearfix'> </div></ul>";
			while($row = mysql_fetch_array($result))
			{	$transactionID=$row['transactionID'];
				$claimID=$row['claimID'];
				$status_claim = $row['status_claim'];
				$quantity_claim = $row['quantity_claim'];
				$ketclaim = $row['ketclaim'];
				$image_claim = $row['image_claim'];
				$paymentID=$row['paymentID'];
				$date = $row['date'];
				$status_transaction=$row['status_transaction'];
				$nama_payment = $row['nama_payment'];
				$status_payment = $row['status_payment'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];
				$image= $row['image'];
				$productID=$row['productID'];
				$name = $row['productname'];
				$price = $row['price'];
				$quantity = $row['quantity'];
				$s = $row['S'];
				$m = $row['M'];
				$l = $row['L'];
				$xl = $row['XL'];
				$xxl = $row['XXL'];
				$xxxl = $row['XXXL'];
				$total=$price*$quantity;
				$grand+=$total;
				$list.="
				<ul class='cart-header'>
				
				
				
				
				
					 <li class='ring-in'><img src='images/$image' class='img-responsive' /></li>
					
				 <li align='left'>
				<p>product name&ensp;:$name</p>
				<p>productID&ensp;:$productID</p>
				</li>
				<li>status&ensp;$status_payment
				<p>a/n</p><p>status&ensp;:$nama_payment</p></li>
				<li>status&ensp;:$status_shipping
				<p>selected:$nama_shipping</p>
				</li>";
			if($tanda!=$row['transactionID'])
				{
					if($status_claim=="")
					{
						$list.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p><p>
					<a href = "InsertClaim.php?transactionID='.$transactionID.'&&claimID='.$claimID.'&&productID='.$productID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Claim</a></p>
					
					</p></li>';
					}
					else if($status_claim=="pending"||$status_claim=="approve"||$status_claim=="reject"||$status_claim=="done")
					{
						$list.='<li align="center">claim '.$status_claim.'
						<p>'.$date.'</p></li>';
					}

					$list.='</td></tr>';
				}
				$list.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				$tanda = $row['transactionID'];
			}
			$list.="</table><br/><div align='center'>GrandTotal = $grand</div>";
		}
		else
		{
			$result = mysql_query("select  u.username,	
			tc.claimID, dcr.quantity_claim, dcr.ketclaim, dcr.image_claim, dcr.status_claim,
			t.transactionID,tp.status_payment,tp.paymentID,
			tp.nama_payment,tp.nama_bank,tp.nilai_transfer, ts.shippingID,
			ts.nama_shipping,ts.status_shipping, t.transactionID, t.date , 
			t.status_transaction, d.productID, d.quantity,d.S,d.M,d.L,d.XL,
			d.XXL,d.XXXL,p.image,p.productname,p.price from msuser as u, trtransaction as t,
			detailtransaction as d , msproduct as p,trshipping AS ts, trpayment as tp, trclaim as tc,detailclaim as dcr
where t.transactionID=d.transactionID 
and d.productID = p.productID 
and t.userID=u.userID
AND t.transactionID = ts.transactionID
AND t.transactionID = tp.transactionID
AND t.transactionID = tc.transactionID
AND dcr.claimID=tc.claimID
and	t.status_transaction='done'
			");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			$list.="<h1>Claim Regular List</h1>
						<div class='in-check' >
				<ul class='unit'>
				    <li><span>Image</span></li>
				   <li><span>Product</span></li>
				   <li><span>Payment</span></li>
				   <li><span>Shipping</span></li>
				   <li><span>Status transaction</span></li>
					<div class='clearfix'> </div></ul>";
			while($row = mysql_fetch_array($result))
			{	$username = $row['username'];
				$transactionID=$row['transactionID'];
				$claimID=$row['claimID'];
				$status_claim = $row['status_claim'];
				$quantity_claim = $row['quantity_claim'];
				$ketclaim = $row['ketclaim'];
				$image_claim = $row['image_claim'];
				$paymentID=$row['paymentID'];
				$date = $row['date'];
				$status_transaction=$row['status_transaction'];
				$nama_payment = $row['nama_payment'];
				$status_payment = $row['status_payment'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];
				$image= $row['image'];
				$productID=$row['productID'];
				$name = $row['productname'];
				$price = $row['price'];
				$quantity = $row['quantity'];
				$s = $row['S'];
				$m = $row['M'];
				$l = $row['L'];
				$xl = $row['XL'];
				$xxl = $row['XXL'];
				$xxxl = $row['XXXL'];
				$total=$price*$quantity;
				$grand+=$total;
				
				$list.="<ul class='cart-header'>
				
				
				
				
				
					 <li class='ring-in'>
					 
					 username&ensp;:$username
					 <p><img src='images/$image' class='img-responsive' /></p>
					 </li>
					
				 <li align='left'>
				<p>product name&ensp;:$name</p>
				<p>productID&ensp;:$productID</p>
				</li>
				<li>status&ensp;$status_payment
				<p>a/n</p><p>status&ensp;:$nama_payment</p></li>
				<li>status&ensp;:$status_shipping
				<p>selected:$nama_shipping</p>
				</li>";
			if($tanda!=$row['transactionID'])
				{
					if($status_claim=="pending")
					{
						$list.='<li>'.$status_transaction.'<p>
					'.$date.'</p>
					
					<p>Ket Claim&ensp;:'.$ketclaim.'</p>
				<p>Quantity Claim&ensp;:'.$quantity_claim.'</p>
					
					<p>
					<a href = "controller/doAClaim.php?transactionID='.$transactionID.'&&claimID='.$claimID.'&&productID='.$productID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Approve</a></p>
					<a href = "controller/doRClaim.php?transactionID='.$transactionID.'&&claimID='.$claimID.'&&productID='.$productID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Reject</a></p>
					</li>';
					}
					
					else if($status_claim=="approve")
					{
						$list.='<li align="center">claim '.$status_claim.'
						<p>'.$date.'</p>
						<a href = "controller/doDClaim.php?transactionID='.$transactionID.'&&claimID='.$claimID.'&&productID='.$productID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Done</a></p>
						</li>';
					}
					
					else if($status_claim=="reject"||$status_claim=="done")
					{
						$list.='<li align="center">claim '.$status_claim.'
						<p>'.$date.'</p></li>';
					}

					$list.='</td></tr>';
				}
				$list.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				$tanda = $row['transactionID'];
			}
			$list.="</table><br/><div align='center'>GrandTotal = $grand</div>";
		}
			
	}
?>

<?php
//CUSTOMIZE LIST
 $elist="";
	if (isset($_SESSION['userRole']))
	{	$userID=$_SESSION['userID'];
		if($_SESSION['userRole']=="admin")
		{
			$result = mysql_query("SELECT u.username,
		tc.claimID, dcc.quantity_claim, dcc.ketclaim, dcc.image_claim, dcc.status_claim,
	tt.transactionID,tp.status_payment,tp.paymentID,tp.nama_payment,tp.nama_bank,tp.nilai_transfer, ts.shippingID,ts.nama_shipping,ts.status_shipping,tt.status_transaction, tt.date, tt.status_transaction,dc.status_customize, dc.customname,dc.customizeID, dc.harga, dc.bahan, dc.warna, dc.image, dc.keterangan, dc.customizeID, dc.quantity, dc.S, dc.M, dc.L, dc.XL, dc.XXL, dc.XXXL,dc.date_customize
FROM  msuser as u,trclaim as tc,trtransaction AS tt, detailcustomize AS dc, trshipping AS ts, trpayment as tp, detailcustomclaim as dcc
WHERE tt.transactionID = dc.transactionID
AND tt.userID =u.userID
AND tt.transactionID = ts.transactionID
AND tt.transactionID = tp.transactionID
AND tt.transactionID = tc.transactionID
And dcc.claimID= tc.claimID
	and	tt.status_transaction='done'
");
			$elist="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
			$elist.=' <h1>Claim Custom List</h1>
						<div class="in-check" >
				<ul class="unit">
				   <li><span>Image</span></li>
				   <li><span>Product</span></li>
				   <li><span>Payment</span></li>
				   <li><span>Shipping</span></li>
				   <li><span>Status transaction</span></li>
					<div class="clearfix"> </div></ul>';
			while($row = mysql_fetch_array($result))
			{$claimID=$row['claimID'];
				$customizeID=$row['customizeID'];
				$status_claim = $row['status_claim'];
				$quantity_claim = $row['quantity_claim'];
				$ketclaim = $row['ketclaim'];
				$image_claim = $row['image_claim'];	
				$transactionID=$row['transactionID'];
				$username = $row['username'];
				$date = $row['date_customize'];
				$status=$row['status_customize'];
				$nama_payment = $row['nama_payment'];
				$status_payment = $row['status_payment'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];
				$status_transaction=$row['status_transaction'];
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
				
				$elist.='
				
				

				
				
				
				<ul class="cart-header">
				username:'.$username.'
				<p>	 <li class="ring-in"><img src="images/custom/'.$image.'" class="img-responsive" /></p></li>
					
				  <li align="left">
				<p>custom name&ensp;:'.$customname.'</p>
				<p>customID&ensp;:'.$customizeID.'</p>
				</li>
				<li>status&ensp;'.$status_payment.'
				<p>a/n</p><p>status&ensp;:'.$nama_payment.'</p></li>
				<li>status&ensp;:'.$status_shipping.'
				<p>selected:'.$nama_shipping.'</p></li>
				';
				if($tanda!=$row['transactionID'])
				{
					if($status_claim=="pending")
					{
						$elist.='<li align="center">'.$status_claim.'<p>
					'.$date.'</p>
					
					<p>Ket Claim&ensp;:'.$ketclaim.'</p>
				<p>Quantity Claim&ensp;:'.$quantity_claim.'</p>
					
					<p>
					<a href = "controller/doACClaim.php?transactionID='.$transactionID.'&&claimID='.$claimID.'&&customizeID='.$customizeID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Apporve</a></p>	
					<p>
					<a href = "controller/doRCClaim.php?transactionID='.$transactionID.'&&claimID='.$claimID.'&&customizeID='.$customizeID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Reject</a></p>					
					</li>';
					}
					else if($status_claim=="approve")
					{
						$elist.='<li align="center">claim '.$status_claim.'
						<p>'.$date.'</p>
						<p>
					<a href = "controller/doDCClaim.php?transactionID='.$transactionID.'&&claimID='.$claimID.'&&customizeID='.$customizeID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Done</a></p>	
						</li>';
					}
					else if($status_claim=="reject"||$status_claim=="done")
					{
						$elist.='<li align="center">claim '.$status_claim.'
						<p>'.$date.'</p></li>';
					}

					$elist.='</td></tr>';
				}
				
				
				
				
				$elist.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				
				
				$tanda = $row['customizeID'];
			
			}
			$elist.="</table><br/><div align='center'>GrandTotal = $grand
	</div>";
		}
		
		
		else if($_SESSION['userRole']=="member")
		{$userID=$_SESSION['userID'];
		$result = mysql_query("SELECT 
		tc.claimID, dcc.quantity_claim, dcc.ketclaim, dcc.image_claim, dcc.status_claim,
	tt.transactionID,tp.status_payment,tp.paymentID,tp.nama_payment,tp.nama_bank,tp.nilai_transfer, ts.shippingID,ts.nama_shipping,ts.status_shipping,tt.status_transaction, tt.date, tt.status_transaction,dc.status_customize, dc.customname,dc.customizeID, dc.harga, dc.bahan, dc.warna, dc.image, dc.keterangan, dc.customizeID, dc.quantity, dc.S, dc.M, dc.L, dc.XL, dc.XXL, dc.XXXL
FROM  trclaim as tc,trtransaction AS tt, detailcustomize AS dc, trshipping AS ts, trpayment as tp, detailcustomclaim as dcc
WHERE tt.transactionID = dc.transactionID
AND tt.userID =$userID
AND tt.transactionID = ts.transactionID
AND tt.transactionID = tp.transactionID
AND tt.transactionID = tc.transactionID
And dcc.claimID= tc.claimID
	and	tt.status_transaction='done'	");
			$elist="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
			$elist.=' <h1>My Custom List</h1>
						<div class="in-check" >
				<ul class="unit">
				   <li><span>Image</span></li>
				   <li><span>Product</span></li>
				   <li><span>Payment</span></li>
				   <li><span>Shipping</span></li>
				   <li><span>Status transaction</span></li>
					<div class="clearfix"> </div></ul>';
			while($row = mysql_fetch_array($result))
			{	$claimID=$row['claimID'];
				$customizeID=$row['customizeID'];
				$status_claim = $row['status_claim'];
				$quantity_claim = $row['quantity_claim'];
				$ketclaim = $row['ketclaim'];
				$image_claim = $row['image_claim'];
				$transactionID=$row['transactionID'];
				$customizeID=$row['customizeID'];
				$date = $row['date'];
				$status=$row['status_customize'];
				$nama_payment = $row['nama_payment'];
				$status_payment = $row['status_payment'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];
				$status_transaction=$row['status_transaction'];
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
				
				$elist.='
				<ul class="cart-header">
					 <li class="ring-in"><img src="images/custom/'.$image.'" class="img-responsive" /></li>
					
				  <li align="left">
				<p>custom name&ensp;:'.$customname.'</p>
				<p>customID&ensp;:'.$customizeID.'</p>
				</li>
				<li>status&ensp;'.$status_payment.'
				<p>a/n</p><p>status&ensp;:'.$nama_payment.'</p></li>
				<li>status&ensp;:'.$status_shipping.'
				<p>selected:'.$nama_shipping.'</p>
				</li>
				';
				if($tanda!=$row['transactionID'])
				{
					if($status_claim=="")
					{
						$elist.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p><p>
					<a href = "InsertCustomClaim.php?transactionID='.$transactionID.'&&claimID='.$claimID.'&&customizeID='.$customizeID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Claim</a></p>
					
					</p></li>';
					}
					else if($status_claim=="pending"||$status_claim=="approve"||$status_claim=="reject"||$status_claim=="done")
					{
						$elist.='<li align="center">claim '.$status_claim.'
						<p>'.$date.'</p></li>';
					}

					$elist.='</td></tr>';
				}
				
				
				
				
				$elist.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				
				
				$tanda = $row['customizeID'];
			}
			$elist.="</table><br/><div align='center'>GrandTotal = $grand
			</div>";
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

<!--sign in start here-->
<div class="signin">
	<div class="container">
		<div class="signin-main">
			<?php 
			if(isset($_SESSION['userRole']))
			  {
			  		if($_SESSION['userRole']=="admin")
					{

					}
				}
				echo $list;
			?>
		</div>
	</div>
</div>
<!--sign in end here-->



<div class="single">
   <div class="signin">
	<div class="container">
		<div class="signin-main">
        <?php
		echo $elist;
		?>
		<div class="clearfix"> </div>
	   </div>
	  
   	 </div>
   </div>
</div>

<!--sign in end here-->
<?php
include ("footer.php");

?>
</body>
</html>
