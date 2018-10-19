<?php 
//TRANSACTION LIST
include("controller/doConnect.php");
  session_start();
  if(isset($_REQUEST['txtSearch']))
	{
		$search=$_REQUEST['txtSearch'];
	}
	else
	{
		$search="";
	}
$userID=$_SESSION['userID'];
	$list="";
	if (isset($_SESSION['userRole']))
	{
		if($_SESSION['userRole']=="member")
		{
			
		}
		else
		{if(!isset($_REQUEST['txtSearch'])||$search=="")
	{
			$result = mysql_query("SELECT tp.status_payment,tp.paymentID,tp.nama_payment,tp.nama_bank,tp.nilai_transfer,tp.norek, ts.shippingID,ts.nama_shipping,ts.status_shipping, u.username, t.transactionID, t.date, t.status_transaction, d.productID, d.quantity, d.S, d.M, d.L, d.XL, d.XXL, d.XXXL, p.image, p.productname, p.price
FROM msuser AS u, trtransaction AS t, detailtransaction AS d, trshipping AS ts, msproduct AS p, trpayment AS tp
WHERE t.transactionID = d.transactionID
AND d.productID = p.productID
AND t.userID = u.userID
AND t.transactionID = ts.transactionID
AND t.transactionID = tp.transactionID
AND t.status_transaction = 'done'");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			$list.="<h1>Report Regular List</h1>
						<div class='in-check' >
				<ul class='unit'>
				   <li><span>Image</span></li>
				   <li><span>Product</span></li>
				   <li><span>Payment</span></li>
				   <li><span>Shipping</span></li>
				   <li><span>Status transaction</span></li>
					<div class='clearfix'> </div></ul>";
			while($row = mysql_fetch_array($result))
			{
				$transactionID=$row['transactionID'];
				$username = $row['username'];
				$date = $row['date'];
				$nama_payment = $row['nama_payment'];
				$status_payment = $row['status_payment'];
				$norek=$row['norek'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];
				$status_transaction=$row['status_transaction'];
				$productID=$row['productID'];
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
					 <li align='left' class='ring-in'>username: $username
					 <p><img src='images/$image' class='img-responsive' /></p>
				 <li align='left'> 
				<p>productname&ensp;:$name</p>
				<p>productID&ensp;:$productID</p>
				<p>Price:$price </p>
				<p>Qty:$quantity</p>
				<p>S:$s &ensp;&ensp;XL:$xl</p>
				<p>M:$m &ensp;&ensp;XXL:$xxl</p>
				<p>L:$l &ensp;&ensp;XXXL:$xxxl</p>
				<li>status&ensp;:$status_payment
									<p>no rek&ensp;$norek</p>					
					<p>a/n&ensp;$nama_payment</p>
				
				</li>
				<li>
				status&ensp;:$status_shipping
				<p>selected:$nama_shipping</p>
				</li>
				";
				if($tanda!=$row['transactionID'])
				{
					
					if($status_payment==""||$status_payment!="approved")
					{
						$list.='<li align="center">payment
					</li>';
					}
					else if($status_shipping==""||$status_shipping!="arrive")
					{
						$list.='<li align="center">shipping
					</li>';
					}
					else if($status_transaction=="pending")
					{
						$list.='<li align="center">'.$date.'<p>
						<a href = "controller/doApprove.php?id='.$transactionID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Finish</a></p>
						';
					}
					else if($status_transaction=="done")
					{
						$list.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p></li>';
					}
										else if($status_transaction=="claim")
					{
						$list.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p></li>';
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
		else{
		
		
		
		$result = mysql_query("SELECT tp.status_payment,tp.paymentID,tp.nama_payment,tp.nama_bank,tp.nilai_transfer,tp.norek, ts.shippingID,ts.nama_shipping,ts.status_shipping, u.username, t.transactionID, t.date, t.status_transaction, d.productID, d.quantity, d.S, d.M, d.L, d.XL, d.XXL, d.XXXL, p.image, p.productname, p.price
FROM msuser AS u, trtransaction AS t, detailtransaction AS d, trshipping AS ts, msproduct AS p, trpayment AS tp
WHERE t.transactionID = d.transactionID
AND d.productID = p.productID
AND t.userID = u.userID
AND t.transactionID = ts.transactionID
AND t.transactionID = tp.transactionID
AND t.status_transaction = 'done'
AND  u.username like '%$search%'");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			$list.="<h1>Report Regular List</h1>
						<div class='in-check' >
				<ul class='unit'>
				   <li><span>Image</span></li>
				   <li><span>Product</span></li>
				   <li><span>Payment</span></li>
				   <li><span>Shipping</span></li>
				   <li><span>Status transaction</span></li>
					<div class='clearfix'> </div></ul>";
			while($row = mysql_fetch_array($result))
			{
				$transactionID=$row['transactionID'];
				$username = $row['username'];
				$date = $row['date'];
				$nama_payment = $row['nama_payment'];
				$status_payment = $row['status_payment'];
				$norek=$row['norek'];
				$nama_shipping=$row['nama_shipping'];
				$status_shipping=$row['status_shipping'];
				$status_transaction=$row['status_transaction'];
				$productID=$row['productID'];
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
					 <li align='left' class='ring-in'>username: $username
					 <p><img src='images/$image' class='img-responsive' /></p>
				 <li align='left'> 
				<p>productname&ensp;:$name</p>
				<p>productID&ensp;:$productID</p>
				<p>Price:$price </p>
				<p>Qty:$quantity</p>
				<p>S:$s &ensp;&ensp;XL:$xl</p>
				<p>M:$m &ensp;&ensp;XXL:$xxl</p>
				<p>L:$l &ensp;&ensp;XXXL:$xxxl</p>
				<li>status&ensp;:$status_payment
									<p>no rek&ensp;$norek</p>					
					<p>a/n&ensp;$nama_payment</p>
				
				</li>
				<li>
				status&ensp;:$status_shipping
				<p>selected:$nama_shipping</p>
				</li>
				";
				if($tanda!=$row['transactionID'])
				{
					
					if($status_payment==""||$status_payment!="approved")
					{
						$list.='<li align="center">payment
					</li>';
					}
					else if($status_shipping==""||$status_shipping!="arrive")
					{
						$list.='<li align="center">shipping
					</li>';
					}
					else if($status_transaction=="pending")
					{
						$list.='<li align="center">'.$date.'<p>
						<a href = "controller/doApprove.php?id='.$transactionID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Finish</a></p>
						';
					}
					else if($status_transaction=="done")
					{
						$list.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p></li>';
					}
										else if($status_transaction=="claim")
					{
						$list.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p></li>';
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
	}}
?>

<?php
if(isset($_REQUEST['txtSearch']))
	{
		$search=$_REQUEST['txtSearch'];
	}
	else
	{
		$search="";
	}
//CUSTOMIZE LIST
 $elist="";
	if (isset($_SESSION['userRole']))
	{	$userID=$_SESSION['userID'];
		if($_SESSION['userRole']=="admin")
		{if(!isset($_REQUEST['txtSearch'])||$search=="")
	{
			$result = mysql_query("SELECT tp.status_payment,tp.paymentID,tp.nama_payment,tp.nama_bank,tp.nilai_transfer,tp.norek, ts.shippingID,ts.nama_shipping,ts.status_shipping,tt.transactionID,tt.status_transaction, u.username, dc.date_customize, dc.status_customize, dc.customname, dc.harga, dc.bahan, dc.warna, dc.image, dc.keterangan, dc.customizeID, dc.quantity, dc.S, dc.M, dc.L, dc.XL, dc.XXL, dc.XXXL
FROM msuser AS u, trtransaction AS tt, detailcustomize AS dc,trshipping AS ts, trpayment as tp
WHERE tt.userID = u.userID
AND tt.transactionID = dc.transactionID
AND dc.status_customize =  'approved'
AND tt.transactionID = ts.transactionID
AND tt.transactionID = tp.transactionID

");
			$elist="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
			$elist.=' <h1>Report Custom List</h1>
						<div class="in-check" >
				<ul class="unit">
				   <li><span>Image</span></li>
				   <li><span>Product</span></li>
				   <li><span>Payment</span></li>
				   <li><span>Shipping</span></li>
				   <li><span>Status transaction</span></li>
					<div class="clearfix"> </div></ul>';
			while($row = mysql_fetch_array($result))
			{	$customizeID=$row['customizeID'];
				$transactionID=$row['transactionID'];
				$username = $row['username'];
				$date = $row['date_customize'];
				$status=$row['status_customize'];
				$nama_payment = $row['nama_payment'];
				$status_payment = $row['status_payment'];
				$norek=$row['norek'];
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
				<li align="left"class="ring-in"><p>username :'.$username.'</p>
					 <img src="images/custom/'.$image.'" class="img-responsive" />
				 <li align="left">
				<p>custom name&ensp;:'.$customname.'</p>
				<p>customID&ensp;:'.$customizeID.'</p>
				<p>bahan:'.$bahan.'</p>
				<p>warna:'.$warna.'</p>
				<p>Qty:'.$quantity.'</p>
				<p>S:'.$s.'&ensp;&ensp;XL:'.$xl.'</p>
				<p>M:'.$m.'&ensp;&ensp;XXL:'.$xxl.'</p>
				<p>L:'.$l.'&ensp;&ensp;XXXL:'.$xxxl.'</p>
				<p>Price:'.$price.'</p>
				<p>Ket:'.$keterangan.'</p>
				</li>
				<li>status&ensp;'.$status_payment.'
						<p>no rek&ensp;'.$norek.'</p>					
					<p>a/n&ensp;'.$nama_payment.'</p></li>
				<li>status&ensp;:'.$status_shipping.'
				<p>selected:'.$nama_shipping.'</p>
				</li>
				';
				if($tanda!=$row['transactionID'])
				{
					
					if($status_payment==""||$status_payment!="approved")
					{
						$elist.='<li align="center">payment
					</li>';
					}
					else if($status_shipping==""||$status_shipping!="arrive")
					{
						$elist.='<li align="center">shipping
					</li>';
					}
					else if($status_transaction=="pending")
					{
						$elist.='<li align="center">'.$date.'<p>
						<a href = "controller/doApprove.php?id='.$transactionID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Finish</a></p>
						';
					}
					else if($status_transaction=="done")
					{
						$elist.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p></li>';
					}
										else if($status_transaction=="claim")
					{
						$elist.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p></li>';
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
		</div>";
		}else{
		$result = mysql_query("SELECT tp.status_payment,tp.paymentID,tp.nama_payment,tp.nama_bank,tp.nilai_transfer,tp.norek, ts.shippingID,ts.nama_shipping,ts.status_shipping,tt.transactionID,tt.status_transaction, u.username, dc.date_customize, dc.status_customize, dc.customname, dc.harga, dc.bahan, dc.warna, dc.image, dc.keterangan, dc.customizeID, dc.quantity, dc.S, dc.M, dc.L, dc.XL, dc.XXL, dc.XXXL
FROM msuser AS u, trtransaction AS tt, detailcustomize AS dc,trshipping AS ts, trpayment as tp
WHERE tt.userID = u.userID
AND tt.transactionID = dc.transactionID
AND dc.status_customize =  'approved'
AND tt.transactionID = ts.transactionID
AND tt.transactionID = tp.transactionID
AND  u.username like '%$search%'
");
			$elist="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
			$elist.=' <h1>Report Custom List</h1>
						<div class="in-check" >
				<ul class="unit">
				   <li><span>Nama</span></li>
				   <li><span>Product</span></li>
				   <li><span>Payment</span></li>
				   <li><span>Shipping</span></li>
				   <li><span>Status transaction</span></li>
					<div class="clearfix"> </div></ul>';
			while($row = mysql_fetch_array($result))
			{	$customizeID=$row['customizeID'];
				$transactionID=$row['transactionID'];
				$username = $row['username'];
				$date = $row['date_customize'];
				$status=$row['status_customize'];
				$nama_payment = $row['nama_payment'];
				$status_payment = $row['status_payment'];
				$norek=$row['norek'];
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
				<li align="left"class="ring-in"><p>username :'.$username.'</p>
					 <img src="images/custom/'.$image.'" class="img-responsive" />
				 <li align="left">
				<p>custom name&ensp;:'.$customname.'</p>
				<p>customID&ensp;:'.$customizeID.'</p>
				<p>bahan:'.$bahan.'</p>
				<p>warna:'.$warna.'</p>
				<p>Qty:'.$quantity.'</p>
				<p>S:'.$s.'&ensp;&ensp;XL:'.$xl.'</p>
				<p>M:'.$m.'&ensp;&ensp;XXL:'.$xxl.'</p>
				<p>L:'.$l.'&ensp;&ensp;XXXL:'.$xxxl.'</p>
				<p>Price:'.$price.'</p>
				<p>Ket:'.$keterangan.'</p>
				</li>
				<li>status&ensp;'.$status_payment.'
						<p>no rek&ensp;'.$norek.'</p>					
					<p>a/n&ensp;'.$nama_payment.'</p></li>
				<li>status&ensp;:'.$status_shipping.'
				<p>selected:'.$nama_shipping.'</p>
				</li>
				';
				if($tanda!=$row['transactionID'])
				{
					
					if($status_payment==""||$status_payment!="approved")
					{
						$elist.='<li align="center">payment
					</li>';
					}
					else if($status_shipping==""||$status_shipping!="arrive")
					{
						$elist.='<li align="center">shipping
					</li>';
					}
					else if($status_transaction=="pending")
					{
						$elist.='<li align="center">'.$date.'<p>
						<a href = "controller/doApprove.php?id='.$transactionID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Finish</a></p>
						';
					}
					else if($status_transaction=="done")
					{
						$elist.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p></li>';
					}
										else if($status_transaction=="claim")
					{
						$elist.='<li align="center">'.$status_transaction.'<p>
					'.$date.'</p></li>';
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
		</div>";}
		
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
    <div class="btnsearch" align="right"><form action="report.php" method="get">
                    	<input type= "text" name = "txtSearch"><input type= "submit" value = "Search">    
                    </form></div><br/><br/>  
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