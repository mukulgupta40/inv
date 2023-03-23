<?php
$con=mysqli_connect("localhost","root","","invoice");
session_start();
if(!isset($_SESSION['client_email'])){
								echo" <script>alert('Please login!')</script>";
								echo "<script>window.open('invoice_login.php','_self')</script>";
								  }
$client_mail=$_SESSION['client_email'] ;
$new_name=$_POST['c_name'];
$new_email=$_POST['c_email'];
$new_gst=$_POST['c_gst'];
$new_address=$_POST['c_address'];
$new_city=$_POST['c_city'];
$new_state=$_POST['c_state'];
$new_contact=$_POST['c_contact'];

$get_c=" update clients set client_name='$new_name' ,client_email='$new_email' ,client_gst_no='$new_gst',client_address='$new_address',client_city='$new_city',client_state='$new_state',client_contact_no='$new_contact'where client_email='$client_mail'";
echo $get_c;
$run_c=mysqli_query($con,$get_c);

if($run_c){
echo"<script>alert('Profile has been updated!')</script>"	;
echo "<script>window.open('invoice_my_account.php?invoice_my_profile','_self')</script>";
	
}



?>