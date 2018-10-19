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
			$result = mysql_query("SELECT ts.shippingID,ts.nama_shipping,ts.status_shipping,t.transactionID, t.date, t.status_transaction, d.productID, d.quantity, d.S, d.M, d.L, d.XL, d.XXL, d.XXXL, p.image, p.productname, p.price
FROM trtransaction AS t, detailtransaction AS d, msproduct AS p, trshipping AS ts
WHERE t.transactionID = d.transactionID
AND ts.transactionID = t.transactionID
AND d.productID = p.productID
AND t.userID=$userID");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			$list.="<h1>Shipping for Regular</h1>
						<div class='in-check' >
				<ul class='unit'>
				   <li><span>Images</span></li>
				   <li><span>Detail</span></li>
				   <li><span>Date</span></li>
				   <li><span>Sub Total</span></li>
				   <li><span>Status</span></li>
					<div class='clearfix'> </div></ul>";
			while($row = mysql_fetch_array($result))
			{	$transactionID=$row['transactionID'];
				$shippingID=$row['shippingID'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];

				$date = $row['date'];
				$status_transaction=$row['status_transaction'];
				$image= $row['image'];
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
				<p>$name</p>
				<p>Price:$price </p>
				<p>Qty:$quantity</p>
				<p>S:$s &ensp;&ensp;XL:$xl</p>
				<p>M:$m &ensp;&ensp;XXL:$xxl</p>
				<p>L:$l &ensp;&ensp;XXXL:$xxxl</p>
				<li>$date</li>
				<li>$total</li>";
				if($tanda!=$row['transactionID'])
				{
					 if($status_shipping=="")
					{
					$list.='<li align="center">silahkan pilih shipping
					
					<p><a href = "controller/doJNE.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'" class="add-cart" onclick="return confirm(\'are you sure?\')"/>JNE</a></p>
					<p><a href = "controller/doTiki.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'" class="add-cart" onclick="return confirm(\'are you sure?\')"/>Tiki</a></p>
					</li>';
					
					}
					else if($status_shipping=="deilvery"||$status_shipping=="arrive")
					{
					$list.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					</li>';
					}
					else if($status_shipping=="process" )
					{
					$list.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					<p><a href = "controller/doReselect.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Re-select</a></p>
					</li>';
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
else//admin
	{
			$result = mysql_query("SELECT ts.shippingID,ts.nama_shipping,ts.status_shipping, u.username, t.transactionID, t.date, t.status_transaction, d.productID, d.quantity, d.S, d.M, d.L, d.XL, d.XXL, d.XXXL, p.image, p.productname, p.price
FROM msuser AS u, trtransaction AS t, detailtransaction AS d, trshipping AS ts, msproduct AS p
WHERE t.transactionID = d.transactionID
AND d.productID = p.productID
AND t.userID = u.userID
AND t.transactionID = ts.transactionID AND ts.status_shipping!=''");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			$list.="<h1>Regular Shipping List</h1>
						<div class='in-check' >
				<ul class='unit'>
				   <li><span>Images</span></li>
				   <li><span>Detail</span></li>
				   <li><span>Date</span></li>
				   <li><span>Sub Total</span></li>
				   <li><span>Status</span></li>
					<div class='clearfix'> </div></ul>";
			while($row = mysql_fetch_array($result))
			{
				$transactionID=$row['transactionID'];
				$shippingID=$row['shippingID'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];

				$username = $row['username'];
				$date = $row['date'];
				$status_transaction=$row['status_transaction'];
				$image= $row['image'];
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
					 <li align='center' class='ring-in'><p>$username</p>
					 <img src='images/$image' class='img-responsive' /></li>
					
				 <li align='left'>
				<p>$name</p>
				<p>Price:$price </p>
				<p>Qty:$quantity</p>
				<p>S:$s &ensp;&ensp;XL:$xl</p>
				<p>M:$m &ensp;&ensp;XXL:$xxl</p>
				<p>L:$l &ensp;&ensp;XXXL:$xxxl</p>
				<li>$date</li>
				<li>$total</li>";
				if($tanda!=$row['transactionID'])
				{
					if($status_shipping=="process" )
					{
					$list.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					<p><a href = "controller/doDelivery.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Delivery</a></p>
					
					</li>';
					}
					else if($status_shipping=="delivery")
					{
					$list.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					<p><a href = "controller/doArrive.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Arrive</a></p>
					</li>';
					}
					else if($status_shipping=="arrive")
					{
					$list.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					</li>';
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
			$result = mysql_query("SELECT ts.shippingID,ts.nama_shipping,ts.status_shipping, tt.transactionID,tt.status_transaction, u.username, dc.date_customize, dc.status_customize, dc.customname, dc.harga, dc.bahan, dc.warna, dc.image, dc.keterangan, dc.customizeID, dc.quantity, dc.S, dc.M, dc.L, dc.XL, dc.XXL, dc.XXXL
FROM msuser AS u, trtransaction AS tt, detailcustomize AS dc, trshipping AS ts
WHERE tt.transactionID = ts.transactionID
AND tt.userID = u.userID
AND tt.transactionID = dc.transactionID
AND dc.status_customize =  'approved'  AND ts.status_shipping!=''");
			$elist="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
			$elist.=' <h1>Custom Shipping List</h1>
						<div class="in-check" >
				<ul class="unit">
				   <li><span>Images</span></li>
				   <li><span>Detail</span></li>
				   <li><span>Date</span></li>
				   <li><span>Sub Total</span></li>
				   <li align="center"><span>Status</span></li>
					<div class="clearfix"> </div></ul>';
			while($row = mysql_fetch_array($result))
			{	$customizeID=$row['customizeID'];
				$transactionID=$row['transactionID'];
				$shippingID=$row['shippingID'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];
				$username = $row['username'];
				$date = $row['date_customize'];
				$status=$row['status_customize'];
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
					 <li align="center"class="ring-in"><p>username :'.$username.'</p>
					 <img src="images/custom/'.$image.'" class="img-responsive" /></li>
					
				 <li align="left">
				<p>custom name:'.$customname.'</p>
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
				if($tanda!=$row['transactionID'])
				{
					if($status_shipping=="process" )
					{
					$elist.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					<p><a href = "controller/doDelivery.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Delivery</a></p>
					
					</li>';
					}
					else if($status_shipping=="delivery")
					{
					$elist.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					<p><a href = "controller/doArrive.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Arrive</a></p>
					</li>';
					}
					else if($status_shipping=="arrive")
					{
					$elist.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					</li>';
					}
					
					$elist.='</td></tr>';
				}
				
				
				
				
				$elist.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				
				
				$tanda = $row['transactionID'];
			}
			$elist.="</table><br/><div align='center'>GrandTotal = $grand
			<p>kalo custom sudah di acc</p>
			<p>reject kalo tidak bayar</p>
			<p>approved kalo sudah bayar</p></div>";
		}
		
		
		else if($_SESSION['userRole']=="member")
		{$userID=$_SESSION['userID'];
		$result = mysql_query("SELECT  ts.shippingID,ts.nama_shipping,ts.status_shipping,tt.transactionID, tt.status_transaction, tt.date, tt.status_transaction, dc.customname, dc.harga, dc.bahan, dc.warna, dc.image, dc.keterangan, dc.customizeID, dc.quantity, dc.S, dc.M, dc.L, dc.XL, dc.XXL,dc.XXXL
FROM trtransaction AS tt, detailcustomize AS dc, trshipping AS ts
WHERE tt.transactionID = dc.transactionID
AND ts.transactionID = tt.transactionID
AND tt.userID =$userID
		");
			$elist="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
			$elist.=' <h1>Shipping for Customize</h1>
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
				$transactionID=$row['transactionID'];
				$shippingID=$row['shippingID'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];
				$date = $row['date'];
				$status_transaction=$row['status_transaction'];
				$date = $row['date'];
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
				if($tanda!=$row['transactionID'])
				{
					 if($status_shipping=="")
					{
					$elist.='<li align="center">silahkan pilih shipping
					
					<p><a href = "controller/doJNE.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'" class="add-cart" onclick="return confirm(\'are you sure?\')"/>JNE</a></p>
					<p><a href = "controller/doTiki.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'" class="add-cart" onclick="return confirm(\'are you sure?\')"/>Tiki</a></p>
					</li>';
					
					}
					else if($status_shipping=="deilvery"||$status_shipping=="arrive")
					{
					$elist.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					</li>';
					}
					else if($status_shipping=="process" )
					{
					$elist.='<li align="center">'.$status_shipping.'
					<p>selected&ensp;'.$nama_shipping.'</p>
					<p><a href = "controller/doReselect.php?transactionID='.$transactionID.'&&shippingID='.$shippingID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Re-select</a></p>
					</li>';
					}
					$list.='</td></tr>';
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
				echo $list;
			?>
		</div>
	</div>
</div>
<!--sign in end here-->



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