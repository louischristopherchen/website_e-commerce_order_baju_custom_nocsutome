<?php 
include("controller/doConnect.php");
  session_start();
  if(isset($_REQUEST['page']))
	{
		$page=$_REQUEST['page'];
	}	
	else
	{
		$page=1;
	}
	$start=($page-1)*4;
	$list="";
	$index=0;
	if(isset($_REQUEST['txtSearch']))
	{
		$search=$_REQUEST['txtSearch'];
	}
	else
	{
		$search="";
	}
	

	
	if(!isset($_REQUEST['txtSearch'])||$search=="")
	{
		
		$list.='<table width="80%" align="center">';
		$result=mysql_query("select * from msproduct limit $start,4");
		$count=mysql_query("select * from msproduct");
		$pages = ceil(mysql_num_rows($count)/4);
		while($row = mysql_fetch_array($result))
		{
			if($index%4==0)
			{
				$list.='<div class="col-md-3 home-grid">
				<div class="home-product-main">
				   <div class="home-product-top">
				      <img width="250" height = "250" src="images/'.$row["image"].'" alt="" class="img-responsive zoom-img">
				   </div>
					<div class="home-product-bottom">
							<h3>'.$row["productname"].'</h3>				
					</div>
					<div class="srch">
						<span>IDR '.$row["price"].'</span>
					</div>
				</div>
			</div>';
			}
			else
			{
				$list.='<div class="col-md-3 home-grid">
				<div class="home-product-main">
				   <div class="home-product-top">
				      <img width="250" height = "250" src="images/'.$row["image"].'" alt="" class="img-responsive zoom-img">
				   </div>
					<div class="home-product-bottom">
							<h3>'.$row["productname"].'</h3>				
					</div>
					<div class="srch">
						<span>IDR '.$row["price"].'</span>
					</div>
				</div>
			</div>';
				if(($index+1)%3==0)
				{
					$list.= '</tr>';
				}
			}
		
			$index++;
		}
		$list.='</table>';
		
		
	}
	else
	{
			$list.='<table width="80%" align="center">';
			$result=mysql_query("select * from msproduct where productname like '%$search%'  or price like '%$search%' limit $start,4");
			$count=mysql_query("select * from msproduct where productname like '%$search%'  or price like '%$search%'");
			$pages = ceil(mysql_num_rows($count)/4);
			while($row = mysql_fetch_array($result))
			{
				if($index%4==0)
				{
					$list.='<div class="col-md-3 home-grid">
				<div class="home-product-main">
				   <div class="home-product-top">
				      <img width="250" height = "250" src="images/'.$row["image"].'" alt="" class="img-responsive zoom-img">
				   </div>
					<div class="home-product-bottom">
							<h3>'.$row["productname"].'</h3>				
					</div>
					<div class="srch">
						<span>IDR '.$row["price"].'</span>
					</div>
				</div>
			</div>';
				}
				else
				{
					$list.='<div class="col-md-3 home-grid">
				<div class="home-product-main">
				   <div class="home-product-top">
				      <img width="250" height = "250" src="images/'.$row["image"].'" alt="" class="img-responsive zoom-img">
				   </div>
					<div class="home-product-bottom">
							<h3>'.$row["productname"].'</h3>				
					</div>
					<div class="srch">
						<span>IDR '.$row["price"].'</span>
					</div>
				</div>
			</div>';
					if(($index+1)%4==0)
					{
						$list.= '</tr>';
					}
				}
			
				$index++;
			}
			$list.='</table>';
		
	
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
<!--block-layer2 start here-->
<div class="blc-layer2">
	<div class="container">
		<div class="blc-layer2-main">
			 <div class="col-md-6 blc-layer2-left">
			 	  <h3>HD COLLECTION</h3>
			 	  <p>Selamat Datang</p>
			 </div>
			 <div class="col-md-6 blc-layer2-right">
			 	
			 </div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<!--block-layer2 end here-->
<!--home-block start here-->
<div class="home-block">
	<div class="container">
		<div class="home-block-main">
			 <?php 
				echo $list;
			?>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>	
<!--home block end here-->
<?php
include ("footer.php");

?>
</body>
</html>