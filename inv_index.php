<!DOCTYPE html>
<?php
$con=mysqli_connect("localhost","root","","ecommerce");

include("functions/functions.php");

session_start();
				  
							

?>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Invoice System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
   
	<!--search bar-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  
  

</head><!--/head-->


<body>
	<header id="header"><!--header-->
		
		
		<nav id="main-navbar" class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">

                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      
                      <a class="navbar-brand page-scroll" href="inv_index.php">Invoice System</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
                        
							
							<li><a class="page-scroll" href="invoice_signup.php"> Sign up</a></li>
								
								<li><?php
							   if(!isset($_SESSION['client_email'])){
								echo" <a class='page-scroll' href='invoice_login.php'> Login</a> ";
								  }
							   else{
								 echo " <a class='page-scroll' href='invoice_logout.php'> Logout</a>";
								 
								   }
							?>	</li> 							
							<li><?php
							   if(!isset($_SESSION['client_email'])){}
							   else{
								 echo " <a class='page-scroll' href='invoice_my_account.php'> My Account</a>";
								   }
								  
							?></li>    
						
                        </ul>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container -->
				  </nav>
			
		</div><!--/header-middle-->
		
		
	</header><!--/header-->
	
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol style="z-index:-1" class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>INVOICE </span>SYSTEM</h1>
									<h2>SAVE YOUR PRECIOUS TIME !</h2>
									<p>We provide you the best management system for your business.</p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6" >
									<img  style="padding-top:50px " src="images/home/j.jpg" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6" >
									<h1><span>INVOICE </span>SYSTEM</h1>
									<h2>Get Your Business In Proper Form</h2>
									
									<button type="button" class="btn btn-default get">Manage it now</button>
								</div>
								<div class="col-sm-6" >
									<img  style="padding:50px " src="images/home/a.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6" >
									<h1><span>INVOICE </span>SYSTEM</h1>
									<h2>ARE YOU CONFUSED?</h2>
									<p>How to manage your customers</p>
									<button type="button" class="btn btn-default get">Manage it now</button>
								</div>
								<div class="col-sm-6" >
									<img style="padding-top:50px "  src="images/home/inv.jpg" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
		
	</section><!--/slider-->
	<section id="story_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="story_image wow slideInLeft" data-wow-duration="2s">
                        <img style="width:100% " src="images/home/i.jpg" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="story_text wow slideInRight" data-wow-duration="2s">
                        <h2>About Us</h2>
                        <p> we are a web-based system where businesses can register and
							generate invoices. They can manage their Customers/Suppliers and Items 
							through our website. Also, GST returns will be automatically generated from 
							sale and purchase details with a single click. The system will also allow them to 
							analyze their sales/purchases and profits.</p>
                        <!-- <a href="">More about our team</a> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
	
	<div class="container" >
			<div class="row">
				
				
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><br><br>Our Customers</h2>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/1.jpg" alt="" />
											
												<h1 style="padding-top:5%">LOVELY SWEETS</h1>
											
										</div>
										
										
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/o.jpg" alt="" />
											
												<h1 style="padding-top:5%">OLA <br>CABS</h1>
											
										</div>
										
										
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/p.jpg" alt="" />
											
												<h1 style="padding-top:5%">OYO<br>ROOMS</h1>
											
										</div>
										
										
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/s.jpg" alt="" />
											
												<h1 style="padding-top:5%">S.R INDUSTRIES</h1>
											
										</div>
										
										
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/u.jpg" alt="" />
											
												<h1 style="padding-top:5%">UNITED PHOTO INDUSTRIES</h1>
											
										</div>
										
										
								</div>
								
							</div>
						</div>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/2.png" alt="" />
											
												<h1 style="padding-top:5%">AGGARWAL TRADERS</h1>
											
										</div>
										
										
								</div>
								
							</div>
						</div>
						
						
					</div><!--features_items-->	
						
						
				
					</div><!--/category-tab-->
					
					
				</div>
	
	</section>
	
  <!--   <script src="js/jquery.js"></script>  -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

