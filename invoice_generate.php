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
<style>
select#soflow, select#soflow-color {
   -webkit-appearance: button;
   -webkit-border-radius: 2px;
   -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
   -webkit-padding-end: 20px;
   -webkit-padding-start: 2px;
   -webkit-user-select: none;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#FAFAFA, #F4F4F4 40%, #E5E5E5);
   background-position: 97% center;
   background-repeat: no-repeat;
   border: 1px solid #AAA;
   color: #555;
   font-size: inherit;
   margin: 20px;
   overflow: hidden;
   padding: 5px 10px;
   text-overflow: ellipsis;
   white-space: nowrap;
   width: 300px;
}

select#soflow-color {
   color: #fff;
   background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#779126, #779126 40%, #779126);
   background-color: #779126;
   -webkit-border-radius: 20px;
   -moz-border-radius: 20px;
   border-radius: 20px;
   padding-left: 15px;
}

</style>

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
						<h2>Invoice Details</h2>
					
						<form action="invoice_generate.php" method="post" enctype="multipart/form-data">
				
						<select name="customer_id" id="soflow-color">
						<option>Select the customer</option>
						<?php
							$customer_name_drop=$_SESSION['client_email'];
						    $select_c="select customer_name from customer where client='$customer_name_drop' ";

							$select=mysqli_query($con,$select_c)or die(mysqli_error($con));
						

							while ($rows = mysqli_fetch_array($select)) {

   		                       echo "<option>" . $rows{'customer_name'} . "</option>";
							}

						?>
						</select>
						<br>
						<select name="customer_item" id="soflow-color">
						<option>Select the item</option>
						<?php
							$customer_name_drop=$_SESSION['client_email'];
						    $select_c="select name from items where client='$customer_name_drop' ";
	            

							$select=mysqli_query($con,$select_c)or die(mysqli_error($con));
							while ($rows = mysqli_fetch_array($select)) {

   		                       echo "<option>" . $rows{'name'} . "</option>";
							}

						?>
						</select>
			
						    <input type="number" name="c_invoice_no" placeholder="Invoice number" required />
						<input type="number" name="c_quan" placeholder="Qantity" required />

						<input type="number" name="c_cgst" placeholder="Enter cgst" required />
						<input type="number" name="c_sgst" placeholder="Enter sgst" required />
						<input type="number" name="c_igst" placeholder="Enter igst" required />
							<input type="text" name="c_vechile" placeholder="Vechile Number" required />
							<input type="text" name="c_driver" placeholder="Driver name" required />
							
							
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
	
	
$cl_email=$_SESSION['client_email'];


$customer_name=$_POST['customer_id'];
$customer_item=$_POST['customer_item'];
$c_invoice_no=$_POST['c_invoice_no'];
$c_quan=$_POST['c_quan'];
$c_cgst=$_POST['c_cgst'];
$c_sgst=$_POST['c_sgst'];
$c_igst=$_POST['c_igst'];
$c_vechile=$_POST['c_vechile'];
$c_driver=$_POST['c_driver'];

$total_gst=$c_cgst+$c_sgst+$c_igst;
$today = date("Y/m/d");


$customer_ids=mysqli_query($con,"select customer_id from customer where customer_name='$customer_name'") or die(mysqli_error($con));
$customer_id = mysqli_fetch_array($customer_ids); 



$client_id=mysqli_query($con,"select client_id from clients where client_email='$cl_email'");
$col = mysqli_fetch_array($client_id); 

$insert_client=mysqli_query($con,"select * from clients where client_email='$cl_email'");	

$item_id=mysqli_query($con,"select item_id from items where client='$cl_email' and name='$customer_item'")or die(mysqli_error($con));	
$item_ids = mysqli_fetch_array($item_id); 

$available=mysqli_query($con,"select units from stock where client_id='$col[0]' and item_id='$item_ids[0]'")or die(mysqli_error($con));
$avail = mysqli_fetch_array($available);



$price=mysqli_query($con,"select price from stock where client_id='$col[0]' and item_id='$item_ids[0]'")or die(mysqli_error($con));
$price_f = mysqli_fetch_array($price);

$total_price=$price_f[0]*$c_quan+($price_f[0]*$c_quan)*$total_gst/100;


if(!mysqli_num_rows($insert_client)>0){
	echo "<script>alert('Your Email id not registered')</script>";
}	
else{	

if($avail[0]<$c_quan)
{
echo "<script>alert('There are less products available.')</script>";
}
 else{
	 
	 
	 
	 
$insert_c="insert into invoice values('$c_invoice_no','$today','$c_cgst','$c_sgst','$c_igst','$total_gst','$c_vechile','$c_driver','$total_price','$col[0]','$customer_id[0]')";
$insert_invoice=mysqli_query($con,$insert_c);



$insert_cu="insert into items_for_invoice values('$c_invoice_no','$item_ids[0]','$c_quan','$price_f[0]','$total_price','$total_gst')";
$insert_for=mysqli_query($con,$insert_cu);
if(!$insert_for)
{
	echo "<script>alert('Item is already added')</script>";
}

if($insert_invoice and $insert_for ){
	echo "<script>alert('Invoice created!')</script>";
	echo "<script>window.open('invoice_my_account.php','_self')</script>";
}
  else if($insert_for)
  {
	  	echo "<script>alert('Invoice already created! New item is added to the invoice')</script>";

  }
  
 }
}
}
?>



