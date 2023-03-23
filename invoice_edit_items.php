<?php
$con=mysqli_connect("localhost","root","","invoice");
session_start();
if(!isset($_SESSION['client_email'])){
								echo" <script>alert('Please login!')</script>";
								echo "<script>window.open('invoice_login.php','_self')</script>";
								  }
$update_id=$_POST['pro_id'];
$new_name=$_POST['update_c_name'];
$new_description=$_POST['update_c_description'];
$new_gst=$_POST['update_c_gst'];
$new_hsn_no=$_POST['update_c_hsn_no'];
$new_units=$_POST['update_c_units'];



$get_c=" update items set name='$new_name' ,description='$new_description' ,gst='$new_gst',hsn_no='$new_hsn_no' where item_id='$update_id'";

$get_it=" update stock set units='$new_units'  where item_id='$update_id'";


$run_c=mysqli_query($con,$get_c);
$run_it=mysqli_query($con,$get_it);


if($run_c && $run_it){
echo"<script>alert('Item has been updated!')</script>"	;
echo "<script>window.open('invoice_my_account.php?invoice_view_items','_self')</script>";
	
}



?>