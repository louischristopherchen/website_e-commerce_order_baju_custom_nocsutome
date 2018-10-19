<?php 
include("controller/doConnect.php");
  session_start();
  if (isset($_SESSION['userRole']))
	{
		if($_SESSION['userRole']=="admin")
		{
  
  $list="";
			$result = mysql_query("SELECT u.userID, f.faqID,f.nomorfaq,f.pertanyaanfaq, f.jawabanfaq
FROM msuser AS u, faq as f
WHERE f.userID = u.userID
");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
$list.="<h1>FAQ</h1>


<div class='btnaddproduct'><a href = 'insertfaq.php'><input type='button' value = 'Add FAQ'/></a></div>

<div class='in-check' >
				<ul class='unit'>
		  <li align ='center'><span>Quaestion</span></li>
				   <li><span></span></li>
				   <li><span>Answer</span></li>
				   <li><span></span></li>
				   <li><span></span></li>
					<div class='clearfix'> </div></ul>";
			while($row = mysql_fetch_array($result))
			{	$userID=$row['userID'];
				$faqID=$row['faqID'];
				$nomor = $row['nomorfaq'];
				$jawaban=$row['jawabanfaq'];
				$pertanyaan=$row['pertanyaanfaq'];
				$list.='
				<ul class="faq">
					 <li class="ring-in">
					 
					 </li>
					
				 <li align="left">
				<p>'.$nomor.'. '.$pertanyaan.'</p></li>
				<li>'.$jawaban.'</li>
				<li align="center">
					
					<p><a href = "updatefaq.php?faqID='.$faqID.'"
					 class="add-cart" onclick="return confirm(\'are you sure?\')"/>Update FAQ</a></p>
					<p><a href = "controller/doDeletefaq.php?faqID='.$faqID.'" 
					class="add-cart" onclick="return confirm(\'are you sure?\')"/>Delete FAQ</a></p>
					</li>
				
				
				
				';
				
				
					$list.='</td></tr>';
					
				
				
				
				
				$list.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				
				
				$tanda = $row['userID'];
				$list.="</table><br/><div align='center'></div>";
			}
			
		
	}
	else{$list="";
			$result = mysql_query("SELECT t.userID, u.username,t.komentar,t.date_testimoni
FROM msuser AS u, testimoni as t
WHERE t.userID = u.userID
");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
$list.="<h1>FAQ</h1>
<div class='in-check' >
				<ul class='unit'>
		  <li align ='center'><span>Quaestion</span></li>
				   <li><span></span></li>
				   <li><span>Answer</span></li>
				   <li><span></span></li>
				   <li><span></span></li>
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

				<p>'.$komentar.'</p>
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
	}	
		}
	else
	{$list="";
			$result = mysql_query("SELECT t.userID, u.username,t.komentar,t.date_testimoni
FROM msuser AS u, testimoni as t
WHERE t.userID = u.userID
");
			$list="<table align='center' border='1px solid black'>";
			$tanda=0;
			$grand=0;
			
$list.="<h1>FAQ</h1>
<div class='in-check' >
				<ul class='unit'>
		  <li align ='center'><span>Quaestion</span></li>
				   <li><span></span></li>
				   <li><span>Answer</span></li>
				   <li><span></span></li>
				   <li><span></span></li>
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

				<p>'.$komentar.'</p>
				<li>'.$date.'</li>
				<li>';
				
					$list.='<li>
					</li>';
					
				
				
				
				
				$list.='</li>
				<div class="clearfix"> </div>
				</ul>
				</tr>';
				
				
				$tanda = $row['userID'];
				$list.="</table><br/><div align='center'></div>";}}
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
   <?php 					
   echo $list; ?>
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