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
						<h2>Create invoice</h2>
					
						<form action="create_invoice.php" method="post" enctype="multipart/form-data">
				
						<select name="invoice_no" id="soflow-color">
						<option>Select the invoice no</option>
						<?php
							$customer_name_drop=$_SESSION['client_email'];
							$client_id=mysqli_query($con,"select client_id from clients where client_email='$customer_name_drop'");
                                    $col = mysqli_fetch_array($client_id); 
						    $select_c="select invoice_no from invoice where client_id='$col[0]' ";

							$select=mysqli_query($con,$select_c)or die(mysqli_error($con));
						

							while ($rows = mysqli_fetch_array($select)) {

   		                       echo "<option>" . $rows{'invoice_no'} . "</option>";
							}

						?>
						</select>
						
			
							
							
							<button type="submit" name="register" class="btn btn-blank">Create</button>
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



$c_invoice=$_POST['invoice_no'];

$date=mysqli_query($con,"select Dates from invoice where invoice_no='$c_invoice'") or die(mysqli_error($con));
$dates = mysqli_fetch_array($date); //$dates[0]

$gst=mysqli_query($con,"select total_gst from invoice where invoice_no='$c_invoice'") or die(mysqli_error($con));
$total_gst = mysqli_fetch_array($gst); //$total_gst[0]

$vechile=mysqli_query($con,"select vechile_no from invoice where invoice_no='$c_invoice'") or die(mysqli_error($con));
$vechile_no = mysqli_fetch_array($vechile); //$total_gst[0]

$driver=mysqli_query($con,"select total_gst from invoice where invoice_no='$c_invoice'") or die(mysqli_error($con));
$driver_name= mysqli_fetch_array($driver); //$total_gst[0]


$client_id=mysqli_query($con,"select client_id from invoice where invoice_no='$c_invoice'");
$col = mysqli_fetch_array($client_id); 

$client=mysqli_query($con,"select client_name from clients where client_id='$col[0]'");
$client_name = mysqli_fetch_array($client); 

$customer_id=mysqli_query($con,"select customer_id from invoice where invoice_no='$c_invoice'");
$row = mysqli_fetch_array($customer_id); 

$customer=mysqli_query($con,"select customer_name from customer where customer_id='$row[0]'");
$customer_name = mysqli_fetch_array($customer); 

$insert_client=mysqli_query($con,"select * from clients where client_email='$cl_email'");	

///////////////////////////////////////////////////////
//////invoice for table--> item details

$items=mysqli_query($con,"select item_id from items_for_invoice where invoice_no='$c_invoice'");
$items_no = mysqli_fetch_array($items);

///////
/// items name from item id's

/////////REEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE
/*
$items_name=array();

$i=0;
$max=sizeof($items_no);

$it_names=array();
while($row=mysqli_fetch_array($items))
{
	$it_names[]=$row['item_id'];
}

while ($i<$max) {
	echo "<script>alert('$it_names[0]')</script>";

	        $items_n=mysqli_query($con,"select name from items where item_id='$it_names[$i]'");
			$c_items=mysqli_fetch_array($items_n);
         $items_name[]=$c_items[0];
			$i=$i+1;
							}
	*/
/////////EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE

$units_no=mysqli_query($con,"select units from items_for_invoice where invoice_no='$c_invoice'");
$units = mysqli_fetch_array($units_no);


$price=mysqli_query($con,"select price from items_for_invoice where invoice_no='$c_invoice'");
$c_price = mysqli_fetch_array($price);

$gst=mysqli_query($con,"select gst_amount from items_for_invoice where invoice_no='$c_invoice'");
$c_gst= mysqli_fetch_array($gst);

$amount=mysqli_query($con,"select amount from items_for_invoice where invoice_no='$c_invoice'");
$c_amount= mysqli_fetch_array($amount);

///EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE//
/*
$net_price=0;
$i=0;
$max=sizeof($items_name);


while($i<$max)
{
	$net_price=$net_price+$units[$i]*$c_price[$i]*$c_gst[$i]/100;
	$i=$i+1;
}
*/
///EEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE///
if(!mysqli_num_rows($insert_client)>0){
	echo "<script>alert('Your Email id not registered')</script>";
}	
  else
  {
	  
	  
require('fpdf181/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(55, 5, 'Reference Code', 0, 0);
$pdf->Cell(58, 5, ': 026ETY', 0, 0);
$pdf->Cell(25, 5, 'Date', 0, 0);
$pdf->Cell(52, 5, ': 2018-12-24 11:47:10 AM', 0, 1);
$pdf->Cell(55, 5, 'Amount', 0, 0);
$pdf->Cell(58, 5, ': 2674', 0, 0);
$pdf->Cell(25, 5, 'Channel', 0, 0);
$pdf->Cell(52, 5, ': WEB', 0, 1);
$pdf->Cell(55, 5, 'Status', 0, 0);
$pdf->Cell(58, 5, ': Complete', 0, 1);
$pdf->Line(10, 30, 200, 30);
$pdf->Ln(10);
$pdf->Cell(55, 5, 'Product Id', 0, 0);
$pdf->Cell(58, 5, ': 64351-84503', 0, 1);
$pdf->Cell(55, 5, 'Tax Amount', 0, 0);
$pdf->Cell(58, 5, ': 0', 0, 1);
$pdf->Cell(55, 5, 'Product Service Charge', 0, 0);
$pdf->Cell(58, 5, ': 0', 0, 1);
$pdf->Cell(55, 5, 'Product Delivery Charge', 0, 0);
$pdf->Cell(58, 5, ': 0', 0, 1);
$pdf->Line(10, 60, 200, 60);
$pdf->Ln(10);//Line break
$pdf->Cell(55, 5, 'Paid by', 0, 0);
$pdf->Cell(58, 5, ': Nawaraj Shah', 0, 1);
$pdf->Line(155, 75, 195, 75);
$pdf->Ln(5);//Line break
$pdf->Cell(140, 5, '', 0, 0);
$pdf->Cell(50, 5, ': Signature', 0, 1, 'C');
$pdf->Output();

	  
  }
}
?>



