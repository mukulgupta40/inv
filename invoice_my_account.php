<!DOCTYPE html>
<?php
include("functions/functions.php");
session_start();
$con=mysqli_connect("localhost","root","","invoice");
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
    </head><!--/head-->

<body>
	<header id="header"><!--header-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
			<div class="navbar-header">
                      
                      <a class="navbar-brand page-scroll" href="index.html">Invoice System</a>
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
								 echo " <a class='page-scroll' href='invoice_my_account.php'> My Profile</a>";
								   }
								  
							?></li>    
						
                        </ul>
                    </div><!-- /.navbar-collapse -->
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
                                   
					
					            
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
							<ul class="nav nav-pills nav-stacked">
							
								
									
                                     <a href="invoice_my_account.php?invoice_my_profile"><h2>My Profile</h2></a>
                                     <a href="invoice_my_account.php?invoice_change_password"><h2>Change Password</h2></a>
									 <a href="invoice_customer_register.php"><h2>Register Customer</h2></a>
									 <a href="invoice_my_account.php?invoice_view_customer"><h2>View Customers</h2></a>
									 <a href="invoice_item_register.php"><h2>Register Items</h2></a>
									 <a href="invoice_my_account.php?invoice_view_items"><h2>View Items</h2></a>
									 <a href="invoice_generate.php?invoice_generate"><h2>Generate Invoice</h2></a>
				                     <a href="create_invoice.php?create_invoice.php"><h2>Create Invoice</h2></a>
									 <a href="invoice_my_account.php?invoice_view_invoice"><h2>View Invoice</h2></a>
                                     <a href="invoice_logout.php"><h2>Logout</h2></a>									 
								</ul>
							
						
						
					</div>
				</div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">My Account</h2>
						<?php
						
						
			if(!isset($_SESSION['client_email'])){
								echo" <script>alert('Please login!')</script>";
								echo "<script>window.open('invoice_login.php','_self')</script>";
								  }
			else{
						

						$user=$_SESSION['client_email'];
						$getaccount="select * from clients where client_email='$user'";
						$runaccount=mysqli_query($con,$getaccount);
						$rowaccount=mysqli_fetch_array($runaccount);
						$c_name=$rowaccount['client_name'];
						$c_email=$rowaccount['client_email'];
						$c_gst=$rowaccount['client_gst_no'];
						$c_address=$rowaccount['client_address'];
						$c_city=$rowaccount['client_city'];
						$c_state=$rowaccount['client_state'];
						$c_contact=$rowaccount['client_contact_no'];
						
					
						if(isset($_GET['invoice_change_password'])){
							include("invoice_change_password.php");
						}
						
						else if(isset($_GET['invoice_my_profile'])){
							include("invoice_my_profile.php");
						}
						else if(isset($_GET['invoice_view_customer'])){
							include("invoice_view_customer.php");
						}
						else if(isset($_GET['invoice_view_items'])){
							include("invoice_view_items.php");
						}
						else if(isset($_GET['invoice_generate'])){
							include("invoice_generate.php");
						}
						else if(isset($_GET['invoice_view_invoice'])){
							include("invoice_view_invoice.php");
						}
				}
							?>
						</div>
						</div>
				
					</div><!--/category-tab-->
					
					
				</div>
			</div>
		
	</section>

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>


