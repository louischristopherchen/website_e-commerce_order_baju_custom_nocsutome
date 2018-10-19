<?php 
include("controller/doConnect.php");
  session_start();
  
  
  $list="";
	if (isset($_SESSION['userRole']))
	{	
		if($_SESSION['userRole']=="admin")
		{
			$result = mysql_query("SELECT tt.status_transaction,tt.transactionID,tt.userID, u.username, dc.customizeID, dc.date_customize, dc.status_customize, dc.customname, dc.harga, dc.bahan, dc.warna, dc.image, dc.keterangan, dc.quantity, dc.S, dc.M, dc.L, dc.XL, dc.XXL, dc.XXXL
FROM msuser AS u, detailcustomize AS dc, trtransaction AS tt
WHERE tt.userID = u.userID
AND tt.transactionID = dc.transactionID
AND dc.status_customize!='' 
");
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
			{	$transactionID=$row['transactionID'];
				$customizeID=$row['customizeID'];
				$userID=$row['userID'];
				$date = $row['date_customize'];
				$status_transaction=$row['status_transaction'];
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
				
					if($status=="request")
					{
					$list.='<li>'.$status.'from customer
					<p><a href = "respond.php?customizeID='.$customizeID.'&&userID='.$userID.'" class="add-cart" onclick="return confirm(\'are you sure?\')"/>Respond</a></p>
					<p><a href = "controller/doAccept.php?customizeID='.$customizeID.'&userID='.$userID.'&transactionID='.$transactionID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Accept</a></p>
					<p><a href = "controller/doRejected.php?customizeID='.$customizeID.'&userID='.$userID.'&transactionID='.$transactionID.'"class="add-cart" onclick="return confirm(\'are you sure?\')"/>Reject</a></p>
					</li>';
					}
					
					
					else if($status=="reject" || $status=="approved"|| $status=="cancel")
					{
					
					$list.='<li>'.$status.'</li>';
					
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
			<p>respond </p>
			<p>resend atau on process</p>
			<p>cancel atau reject</p>
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



<!--sign in start here-->
<div class="single">
   <div class="container">
   	 <div class="single-main">
   	 	<div class="single-top-main">
         <?php if(!isset($_SESSION['userRole'])){ ?>
	<center>
      <img src="images/membersOnly.jpg" class="img-responsive">
    </center>         
         <?php }else if(($_SESSION['userRole'] == "member")){?>
			<form action="controller/doCustomize.php" method="post" enctype="multipart/form-data">
    <table  align="center">
    <tr>
        <td colspan="8"><h2>Customize Your Design</h2></td>
    </tr>
    <tr>
        <td>Custom name</td><td> </td>
        <td colspan="6"><input type ="text" name = "txtCustomname"/></td>
    </tr>
    
    <tr>
       <td>Upload Your Custom</td>
        <td> </td>
        <td colspan="6"><input name = "fileUpload" type = "file"></td>
    </tr>
    <tr>
        <td>Material</td>
        <td> </td>
        <td colspan="6"><select name = "cmbBahan"  >
							<option value="" selected>-Material-</option>
							<option value="Kasar">Kasar</option>
							<option value="Halus">Halus</option>
						</select>
      </td>
    </tr>
    
    <tr>
        <td>Colour</td>
        <td> </td>
        <td colspan="6"><select name = "cmbWarna"  >
        				
							<option value="" selected>-Colour-</option>
                            <optgroup label="Kasar">
							<option value="Biru">Biru</option>
							<option value="Merah">Merah</option>
                            <optgroup label="Halus">
							<option value="Hijau">Hijau</option>
							<option value="Ungu">Ungu</option>
                            
						</select>
        </td>
    </tr>
    <tr>
        <td>Price per piece</td><td> </td>
        <td colspan="6"><input type ="text" name = "txtPrice"/></td>
    </tr>
    <tr>
        <td>Quantity</td>
        <td> </td>
        <td><input type ="text" name = "txtQuantity" style="width:30px;"/></td>
    </tr>
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
	<td align="center"><input type= "text" name="txtS" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtM" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtL" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtXL" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtXXL" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtXXXL" style="width:30px;"/></td>
    <tr>
    
    
    <tr>
        <td>Description</td>
        <td> </td>
        <td colspan="6"><textarea name= "txtKeterangan"></textarea></td>
    </tr>
    <tr>
        <td colspan="6"><label>
         <?php 
         if(isset($_REQUEST['errorMsg']))
         {
          echo $_REQUEST['errorMsg'];
         }
         ?></label></td>
    </tr>
    <tr>
        <td colspan="3"><input type ="submit" value="Submit" /></td>
    </tr>
   </table> </form><br/><br/><br/>
   <?php }else{echo $list; ?>
   
    <?php } ?>
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