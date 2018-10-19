<?php 
include("controller/doConnect.php");
  session_start();
$customizeID=$_REQUEST['customizeID'];

	$result = mysql_query("SELECT tt.status_transaction,tt.transactionID,tt.userID, u.username, dc.customizeID, dc.date_customize, dc.status_customize, dc.customname, dc.harga, dc.bahan, dc.warna, dc.image, dc.keterangan, dc.quantity, dc.S, dc.M, dc.L, dc.XL, dc.XXL, dc.XXXL
FROM msuser AS u, detailcustomize AS dc, trtransaction AS tt
WHERE tt.userID = u.userID
AND tt.transactionID = dc.transactionID");
	$result = mysql_fetch_array($result);
	
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
          <?php }else if(($_SESSION['userRole'] == "admin")){?>
			<form action="controller/doRespond.php" method="post" enctype="multipart/form-data">
             <?php }else{ ?>
             <form action="controller/doResend.php" method="post" enctype="multipart/form-data">
               <?php } ?>
    <table align="center">
    <tr>
        <td colspan="8"><h2>Edit Custom Page</h2></td>
    </tr>
    <tr>
					<td rowspan="14" ><img class="img-responsive" width="300" height="300" src="images/custom/<?php echo $result['image']?>" width="100%" /></td>
					<td rowspan="14" width="50px"></td>
                    </tr>
    <tr>
        <td>Custom name</td>
        <td> </td>
        <td colspan="6"><input type ="text" name = "txtCustomname" value ="<?php echo $result['customname'];?>"/></td>
    </tr>
    <tr>
        <td>Material</td><td> </td>
        <td colspan="6">
        <select name = "cmbBahan"  >
							<option value="<?php echo $result['bahan'];?>" selected><?php echo $result['bahan'];?></option>
                            <optgroup label=" ">
							<option value="Kasar">Kasar</option>
							<option value="Halus">Halus</option>
						</select>
        
      </td>
    </tr>
    <tr>
        <td>Colour</td><td> </td>
        <td colspan="6">
        <select name = "cmbWarna"  >
							<option value="<?php echo $result['warna'];?>" selected><?php echo $result['warna'];?></option>
                              <optgroup label=" ">
                            <optgroup label="Kasar" >
							<option value="Biru">Biru</option>
							<option value="Merah">Merah</option>
                            <optgroup label="Halus">
							<option value="Hijau">Hijau</option>
							<option value="Ungu">Ungu</option>
						</select>
        
      </td>
    </tr>
     <tr>
        <td>Price per Piece</td><td> </td>
        <td colspan="6"><input type ="text" name = "txtPrice" value="<?php echo $result['harga'];?>"/></td>
    </tr>
    <tr>
        <td>Quantity</td><td> </td>
        <td colspan="6"><input type ="text" name = "txtQuantity" value="<?php echo $result['quantity'];?>" style="width:30px;"/></td>
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
	<td align="center"><input type= "text" name="txtS" value="<?php echo $result['S'];?>" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtM" value="<?php echo $result['M'];?>" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtL" value="<?php echo $result['L'];?>" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtXL" value="<?php echo $result['XL'];?>" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtXXL" value="<?php echo $result['XXL'];?>" style="width:30px;"/></td>
	<td align="center"><input type= "text" name="txtXXXL" value="<?php echo $result['XXXL'];?>" style="width:30px;"/></td>
    <tr>
    <tr>
        <td>Description</td>
        <td> </td>
        <td colspan="6"><textarea name= "txtKeterangan"><?php echo $result['keterangan'];?></textarea></td>
    </tr>
    
    <tr>
       <td>Product Image</td>
        <td> </td>
        <td  colspan="6"><input name = "fileUpload" type = "file"></td>
    </tr>
    
    <tr>
        <td colspan="3"><label>
         <?php 
         if(isset($_REQUEST['errorMsg']))
         {
          echo $_REQUEST['errorMsg'];
         }
         ?></label></td>
    </tr>
    <tr>
    
    <input type="hidden" name="customizeID" value="<?php echo $customizeID;?>"/>
        <td colspan="3"><input type ="submit" value="Submit" /></td>
    </tr>
   </table> </form><br/><br/><br/>
   
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