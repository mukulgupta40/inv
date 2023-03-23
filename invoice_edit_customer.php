<?php
$con=mysqli_connect("localhost","root","","invoice");
session_start();
if(!isset($_SESSION['client_email'])){
								echo" <script>alert('Please login!')</script>";
								echo "<script>window.open('invoice_login.php','_self')</script>";
								  }
$update_id=$_POST['pro_id'];
$new_name=$_POST['update_c_name'];
$new_email=$_POST['update_c_email'];
$new_gst=$_POST['update_c_gst'];
$new_address=$_POST['update_c_address'];
$new_city=$_POST['update_c_city'];
$new_state=$_POST['update_c_state'];
$new_contact=$_POST['update_c_contact'];

$get_c=" update customer set customer_name='$new_name' ,customer_email='$new_email' ,customer_address='$new_address',customer_gst_no='$new_gst',customer_city='$new_city',customer_state='$new_state',customer_contact_no='$new_contact'where customer_id='$update_id'";
echo $get_c;
$run_c=mysqli_query($con,$get_c);

if($run_c){
echo"<script>alert('Customer has been updated!')</script>"	;
echo "<script>window.open('invoice_my_account.php?invoice_view_customer','_self')</script>";
	
}



?>