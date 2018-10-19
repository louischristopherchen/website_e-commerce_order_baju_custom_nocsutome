<?php 
include("controller/doConnect.php");
  session_start();
$transactionID=$_REQUEST['transactionID'];
$paymentID=$_REQUEST['paymentID'];
	
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
			<form action="controller/doInsertPayment.php" method="post" enctype="multipart/form-data">
    <table  align="center">
    <tr>
        <td colspan="8"><h2>PAYMENT</h2></td>
    </tr>
    <tr>
        <td>Nama Pengirim</td><td> </td>
        <td colspan="6"><input type ="text" name = "txtNamaP"/></td>
    </tr>
       <tr>
        <td>No Rekening</td><td> </td>
        <td colspan="6"><input type ="text" name = "txtNorek"/></td>
    </tr>
    <tr>
        <td>Nama Bank</td><td> </td>
        <td colspan="6"><select name = "txtNamaB"/>
       					 <option value="" selected>-Bank-</option>
							<option value="BCA">BCA</option>
							<option value="MANDIRI">MANDIRI</option>
						</select>
        </td>
    </tr>
    <tr>
        <td>Jumlah Transfer</td><td> </td>
        <td colspan="6"><input type ="text" name = "txtJlhTrf"/></td>
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
     <input type="hidden" name="transactionID" value="<?php echo $transactionID;?>"/>
      <input type="hidden" name="paymentID" value="<?php echo $paymentID;?>"/>
        <td colspan="3"><input type ="submit" value="Submit" /></td>
    </tr>
   </table> </form><br/><br/><br/>
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