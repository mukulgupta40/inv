<!DOCTYPE html>
<?php

include("functions/functions.php");
$con=mysqli_connect("localhost","root","","invoice");
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
	
			</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="invoice_signup.php" method="post" enctype="multipart/form-data">
							<input type="text" name="c_name" placeholder="Name" required />
							<input type="email" name="c_email" placeholder="Email Address" required />
							<input type="password" name="c_password" placeholder="Password" required />
							<input type="text" name="c_gst" placeholder="GST NO." required />
							<input type="text" name="c_address" placeholder="Address" required />
							<input type="text" name="c_city" placeholder="City" required />
							<input type="text" name="c_state" placeholder="State" required />
							<input type="text" name="c_contact" placeholder="Contact No." required />
							<button type="submit" name="register" class="btn btn-blank">Signup</button>
						</form>
					</div><!--/sign up form-->
				
		</div>
	</section><!--/form-->
	
	
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
<?php
if(isset($_POST['register'])){
	

$c_name=$_POST['c_name'];	
$c_email=$_POST['c_email'];
$c_password=$_POST['c_password'];
$c_gst=$_POST['c_gst'];
$c_address=$_POST['c_address'];
$c_city=$_POST['c_city'];
$c_state=$_POST['c_state'];
$c_contact=$_POST['c_contact'];	
	
$insert_c=mysqli_query($con,"select * from clients where client_email='$c_email'");	
if(mysqli_num_rows($insert_c)>0){
	echo "<script>alert('Email id already registered')</script>";
}
	
else{	
$insert_c="insert into clients(client_name,client_email,client_password,client_gst_no,client_address,client_city,client_state,client_contact_no) values('$c_name','$c_email','$c_password','$c_gst','$c_address','$c_city','$c_state','$c_contact')"	;

$insert_client=mysqli_query($con,$insert_c);
if($insert_client){
	echo "<script>alert('Thank you! for signing up')</script>";
	echo "<script>window.open('invoice_login.php','_self')</script>";
}
}
}
?>



