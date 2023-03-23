<!DOCTYPE html>
<?php

include("functions/functions.php");
$con=mysqli_connect("localhost","root","","invoice");
session_start();
if(!isset($_SESSION['client_email'])){
								echo" <script>alert('Please login!')</script>";
								echo "<script>window.open('invoice_login.php','_self')</script>";
								  }
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
			</div>
		</div><!--/header-middle-->
	
			</header><!--/header-->
	
	<section id="form"><!--form-->
		<div class="container">
			
					<div class="signup-form"><!--sign up form-->
						<h2>Add Item Details</h2>
						<form action="invoice_item_register.php" method="post" enctype="multipart/form-data">
						    <input type="email" name="cl_email" placeholder="Your Email Address" required />
							<input type="text" name="c_name" placeholder="Name of item" required />
							<input type="text" name="c_description" placeholder="Description" required />
							<input type="text" name="c_hsn" placeholder="HSN No." required />
							<input type="text" name="c_gst" placeholder="GST %" required />
							<input type="text" name="c_image" placeholder="Image" required />
							<input type="number" name="c_price" placeholder="Price" required />
                          	<input type="number" name="c_units" placeholder="Number of untis" required />
							<button type="submit" name="register" class="btn btn-blank">Register</button>
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
	
$cl_email=$_POST['cl_email'];	
$c_name=$_POST['c_name'];	
$c_description=$_POST['c_description'];
$c_hsn=$_POST['c_hsn'];
$c_gst=$_POST['c_gst'];
$c_image=$_POST['c_image'];	
$c_price=$_POST['c_price'];
$c_units=$_POST['c_units'];

$client_id=mysqli_query($con,"select client_id from clients where client_email='$cl_email'");
$col = mysqli_fetch_array($client_id); 

$insert_client=mysqli_query($con,"select * from clients where client_email='$cl_email'");	

if(!mysqli_num_rows($insert_client)>0){
	echo "<script>alert('Your Email id not registered')</script>";
}	
else{	
$insert_c="insert into items(client,name,description,hsn_no,image,gst) values('$cl_email','$c_name','$c_description','$c_hsn','$c_image','$c_gst')"	;
$insert_client=mysqli_query($con,$insert_c);

$insert_item_id=mysqli_query($con,"select item_id from items where client='$cl_email' and name='$c_name'");
$row = mysqli_fetch_array($insert_item_id); 


$insert_stock=mysqli_query($con,"insert into stock values('$col[0]','$row[0]','$c_price','$c_units')") or die(mysqli_error($con));;

if($insert_client and $insert_stock ){
	echo "<script>alert('Item Registered!')</script>";
	echo "<script>window.open('invoice_my_account.php','_self')</script>";
}
}
}
?>



