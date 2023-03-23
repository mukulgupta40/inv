<?php
$con=mysqli_connect("localhost","root","","invoice");
session_start();
if(!isset($_SESSION['client_email'])){
								echo" <script>alert('Please login!')</script>";
								echo "<script>window.open('invoice_login.php','_self')</script>";
								  }

$delete_id=$_POST['pro_id']	;

$delete_c="delete from customer where customer_id='$delete_id'";
$run_delete=mysqli_query($con,$delete_c);
if($run_delete){
	
	echo "<script>alert('customer has been deleted')</script>";
	 echo "<script>window.open('invoice_my_account.php?invoice_view_customer','_self')</script>";

}



?>
