<?php 
include("controller/doConnect.php");
  session_start();
  
  
  $list="";
			$result = mysql_query("SELECT t.userID, u.username,t.komentar,t.date_testimoni
FROM msuser AS u, testimoni as t
WHERE t.userID = u.userID
");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
$list.="<h1>Testimoni</h1>
						<div class='in-check' >
				<ul class='unit'>
		
					<div class='clearfix'> </div></ul>";
			while($row = mysql_fetch_array($result))
			{	$userID=$row['userID'];
				$username=$row['username'];
				$date = $row['date_testimoni'];
				$komentar=$row['komentar'];
				
				$list.='
				<ul class="faq">
					 <li class="ring-in">
					 
					 </li>
					
				 <li align="left">
				<p>username:'.$username.'</p>

				<p>'.$komentar.'</p></li>
				<li>'.$date.'</li>
				<li>';
				
					$list.='<li>
					</li>';
					
				
				
				
				
				$list.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				
				
				$tanda = $row['userID'];
				$list.="</table><br/><div align='center'></div>";
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

<div class="single">
   <div class="container">
   	 <div class="single-main">
   	 	<div class="single-top-main">
        
         <?php if(!isset($_SESSION['userRole'])){echo $list; ?>

          <?php }else if(($_SESSION['userRole'] == "member")){echo $list;?>
			<form action="controller/doTestimoni.php" method="post" enctype="multipart/form-data">
    <table  align="center">
    <tr>
        <td colspan="8"><h2>Testimoni</h2></td>
    </tr>
    <tr>
        <td>Komentar</td><td> </td>
        <td colspan="6"><textarea name= "txtKomen"></textarea></td>
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