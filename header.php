   <?php if(!isset($_SESSION['userRole'])){ ?>
<!--header strat here-->
<div class="header">
	<div class="container">
		<div class="header-main">
			<div class="top-nav">
				<div class="content white">
	              <nav class="navbar navbar-default" role="navigation">
					    <div class="navbar-header">
					        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
					        <div class="navbar-brand logo">
								<a href="index.php"><img src="images/logo1.png" alt=""></a>
							</div>
					    </div>
					    <!--/.navbar-header-->
					 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					        <ul class="nav navbar-nav">
					        	   <li><a href="index.php">Home</a></li>
						             <li class="dropdown">
						        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
						            <ul class="dropdown-menu multi-column ">
							            <div class="row">
								            <div class="col-sm-4">
									            <ul class="multi-column-dropdown">
										            <li><a href="product.php">Regular</a></li>
										            <li><a href="customize.php">Customize</a></li>
									            </ul>
								            </div>
							            </div>
						            </ul>
						        </li>
            					<li><a href="testimoni.php">Testimoni</a></li>
                                   <li><a href="contact.php">Contact Us</a></li>
                                 <li><a href="faq.php">FAQ</a></li>
					        </ul>
					    </div>
					    <!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>
			</div>
			<div class="header-right">
				<div class="search">
					<div class="search-text">
					</div>
					<div class="cart box_1">
						<a href="cart.php">
						<h3>
							<img src="images/cart.png" alt=""/>
						</a>
						
					</div>    
					<div class="head-signin">
						<h5><a href="login.php"><i class="hd-dign"></i>Sign in</a></h5>
					</div>              
                     <div class="clearfix"> </div>					
				</div>
			</div>
		 <div class="clearfix"> </div>
		</div>
	</div>
</div>
 <?php }else if(($_SESSION['userRole'] == "admin")){?>
 <!--header strat here-->
<div class="header">
	<div class="container">
		<div class="header-main">
			<div class="top-nav">
				<div class="content white">
	              <nav class="navbar navbar-default" role="navigation">
					    <div class="navbar-header">
					        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
					        <div class="navbar-brand logo">
								<a href="index.php"><img src="images/logo1.png" alt=""></a>
							</div>
					    </div>
					    <!--/.navbar-header-->
	 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					        <ul class="nav navbar-nav">
					        	   <li><a href="index.php">Home</a></li>
						             <li class="dropdown">
						        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
						            <ul class="dropdown-menu multi-column ">
							            <div class="row">
								            <div class="col-sm-4">
									            <ul class="multi-column-dropdown">
										            <li><a href="product.php">Regular</a></li>
                                                     
									            </ul>
								            </div>
							            </div>
						            </ul>
						        </li>
                              <li><a href="customize.php">Customize Order</a></li>
                               <li class="dropdown">
						        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaction<b class="caret"></b></a>
						            <ul class="dropdown-menu multi-column ">
							            <div class="row">
								            <div class="col-sm-4">
									            <ul class="multi-column-dropdown">
										              <li><a href="payment.php">Payment</a></li>
										            <li><a href="shipping.php">Shipping</a></li>
                                                    <li><a href="transaction.php">Status</a></li>
                                                    <li><a href="report.php">Report</a></li>
									            </ul>
								            </div>
							            </div>
						            </ul>
						        </li>
						        
                                  <li><a href="claim.php">Claim</a></li>
                                  <li><a href="testimoni.php">Testimoni</a></li>
                                 <li><a href="faq.php">FAQ</a></li>
					        </ul>
					    </div>
					    <!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>
			</div>
			<div class="header-right">
				<div class="search">
					<div class="search-text">
					   
					</div>
					<div class="head-signin">
                    <div class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="hd-dign"></i>Admin<b class="caret"></b></a>
						            <ul class="dropdown-menu multi-column ">
							            <div class="row">
								            <div class="col-sm-4">
									            <ul class="multi-column-dropdown">
										            <li><a href="product-m.html">Your Profile</a></li>
										            <li><a href="../skripsi/controller/doLogout.php">Sign Out</a></li>
									            </ul>
								            </div>
							            </div>
						            </ul>
						        </div>
					</div>           
					
				             
                     <div class="clearfix"> </div>					
				</div>
			</div>
		 <div class="clearfix"> </div>
		</div>
	</div>
</div>
 <?php }else{ ?>
 <!--header strat here-->
<div class="header">
	<div class="container">
		<div class="header-main">
			<div class="top-nav">
				<div class="content white">
	              <nav class="navbar navbar-default" role="navigation">
					    <div class="navbar-header">
					        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						        <span class="sr-only">Toggle navigation</span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
					        </button>
					        <div class="navbar-brand logo">
								<a href="index.php"><img src="images/logo1.png" alt=""></a>
							</div>
					    </div>
					    <!--/.navbar-header-->
 	 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					        <ul class="nav navbar-nav">
					        	   <li><a href="index.php">Home</a></li>
						             <li class="dropdown">
						        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Product<b class="caret"></b></a>
						            <ul class="dropdown-menu multi-column ">
							            <div class="row">
								            <div class="col-sm-4">
									            <ul class="multi-column-dropdown">
										            <li><a href="product.php">Regular</a></li>
										            <li><a href="customize.php">Customize</a></li>
									            </ul>
								            </div>
							            </div>
						            </ul>
						        </li>
						        <li><a href="cart.php">Cart</a></li>
                                 <li class="dropdown">
						        	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Transaction<b class="caret"></b></a>
						            <ul class="dropdown-menu multi-column ">
							            <div class="row">
								            <div class="col-sm-4">
									            <ul class="multi-column-dropdown">
										              <li><a href="payment.php">Payment</a></li>
										            <li><a href="shipping.php">Shipping</a></li>
                                                     <li><a href="transaction.php">Status</a></li>
									            </ul>
								            </div>
							            </div>
						            </ul>
						        </li>
                                 <li><a href="claim.php">Claim</a></li>
                               
                                  <li><a href="testimoni.php">Testimoni</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="faq.php">FAQ</a></li>
					        </ul>
					    </div>
					    <!--/.navbar-collapse-->
					</nav>
					<!--/.navbar-->
				</div>
			</div>
			<div class="header-right">
				<div class="search">
					<div class="search-text">
					   
					</div>
					<div class="cart box_1">
						<a href="cart.php">
						<h3>
							<img src="images/cart.png" alt=""/>
						</a>
						
					</div>    
					<div class="head-signin">
                    <div class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="hd-dign"></i><?php $username = $_SESSION['username'];
		echo $username ?><b class="caret"></b></a>
						            <ul class="dropdown-menu multi-column ">
							            <div class="row">
								            <div class="col-sm-4">
									            <ul class="multi-column-dropdown">
										            <li><a href="product-m.html">Your Profile</a></li>
										            <li><a href="../skripsi/controller/doLogout.php">Sign Out</a></li>
									            </ul>
								            </div>
							            </div>
						            </ul>
						        </div>
					</div>              
                     <div class="clearfix"> </div>					
				</div>
			</div>
		 <div class="clearfix"> </div>
		</div>
	</div>
</div>
  <?php } ?>