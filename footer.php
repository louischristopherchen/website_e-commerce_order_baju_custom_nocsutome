   <?php if(!isset($_SESSION['userRole'])){ ?>
<div class="footer">
	<div class="container">
		<div class="footer-main">
			<div class="ftr-grids-block">
				<div class="col-md-3 footer-grid">
					<ul>
                    <li><a href="index.php">Home</a></li>
						
					</ul>
				</div>
                <div class="col-md-3 footer-grid">
					<ul>
                    
						<li><a href="product.php">Regular</a></li>
						<li><a href="customize.php">Customize</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
						<li><a href="testimoni.php">Testimoni</a></li>

					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
   
					<li><a href="contact.php">Contact Us</a></li>
						<li><a href="faq.php">FAQ</a></li>
					</ul>
				</div>
				
		    <div class="clearfix"> </div>
		  </div>
		  <div class="copy-rights">
		     <p>© HD COLLECTION </p>
		   </div>
		</div>
	</div>
</div>
 <?php }else if(($_SESSION['userRole'] == "admin")){?>
 <div class="footer">
	<div class="container">
		<div class="footer-main">
			<div class="ftr-grids-block">
				<div class="col-md-3 footer-grid">
					<ul>
                    <li><a href="index.php">Home</a></li>
						
					</ul>
				</div>
                <div class="col-md-3 footer-grid">
					<ul>
                    
						<li><a href="product.php">Regular</a></li>
						<li><a href="customize.php">Customize</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
						<li><a href="testimoni.php">Testimoni</a></li>

					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
												<li><a href="contact.php">Contact Us</a></li>
						<li><a href="faq.php">FAQ</a></li>
					</ul>
				</div>
				
		    <div class="clearfix"> </div>
		  </div>
		  <div class="copy-rights">
		     <p>© HD COLLECTION </p>
		   </div>
		</div>
	</div>
</div>
 <?php }else{ ?>
  <div class="footer">
	<div class="container">
		<div class="footer-main">
			<div class="ftr-grids-block">
				<div class="col-md-3 footer-grid">
					<ul>
                    <li><a href="index.php">Home</a></li>
						
					</ul>
				</div>
                <div class="col-md-3 footer-grid">
					<ul>
                    
						<li><a href="product.php">Regular</a></li>
						<li><a href="customize.php">Customize</a></li>
					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
						<li><a href="testimoni.php">Testimoni</a></li>

					</ul>
				</div>
				<div class="col-md-3 footer-grid">
					<ul>
												<li><a href="contact.php">Contact Us</a></li>
						<li><a href="faq.php">FAQ</a></li>
					</ul>
				</div>
				
		    <div class="clearfix"> </div>
		  </div>
		  <div class="copy-rights">
		     <p>© HD COLLECTION </p>
		   </div>
		</div>
	</div>
</div>
 <?php } ?>