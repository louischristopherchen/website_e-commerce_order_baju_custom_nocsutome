<?php 
include("controller/doConnect.php");
  session_start();
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
<div class="login">
	<div class="container">
		<div class="login-main">
			  <h1>Login</h1>
		  <div class="col-md-6 login-left">
          <h2>Existing User</h2>
			<form action="controller/doLogin.php" method="post">
                <input type ="text" placeholder="Username" name = "txtUsername"/>
                <input type ="password" placeholder="Password" name = "txtPassword" /></td>
                        <label>
                             <?php 
                            if(isset($_REQUEST['errorMsg']))
                            {
                                echo $_REQUEST['errorMsg'];
                            }
                            ?>
                            </label><input type ="submit" value="Login" />
			</form>
		  </div>
		  <div class="col-md-6 login-right">
		  	 <h3>Belum ada akun? Buat sekarang, GRATIS!!!</h3>
		  	 <p>Silahkan buat akun baru untuk dapat mengakses fitur - fitur yang telah disediakan.</p>
		     <a href="register.php" class="login-btn">Create an Account </a>
		  </div>
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