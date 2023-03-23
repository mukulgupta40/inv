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
                        
							<li><a class="page-scroll" href="inv_index.php">Home</a></li>
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
		</div><!--/header-middle-->
	
			</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="login-form"><!--login form-->
						<h2>LOGIN</h2>
						<form method="post" action="invoice_login.php">
							<input type="email" name="email" placeholder="Email Address" required />
							<input type="password" name="password" placeholder="Password" required />
							<a href="invoice_login.php?forgot_pass">Forgot password</a><br><br>
							
							<button type="submit" value="submit" name="login" class="btn btn-blank">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				
			</div>
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

if(isset($_POST['login'])){
	 
	$c_email=mysqli_real_escape_string($con,$_POST['email']);          //we will save the value of email in the local variable
	$c_password=mysqli_real_escape_string($con,$_POST['password']);
	$sel_client="select * from clients where client_email='$c_email' AND client_password='$c_password'";
	
	$run_c=mysqli_query($con,$sel_client);
	$check_client=mysqli_num_rows($run_c);
	
	if($check_client==0){
		echo "<script>alert('Incorrect email or password')</script>";
		echo "<script>window.open('invoice_login.php','_self')</script>";
	}
	else{
		$_SESSION['client_email']=$c_email;                           //session is created
		
		echo "<script>window.open('invoice_my_account.php','_self')</script>";
	}
	
}



?>