<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
$c_name=$_POST['c_name'];	
$c_email=$_POST['c_email'];
$c_gst=$_POST['c_gst'];
$c_address=$_POST['c_address'];
$c_city=$_POST['c_city'];
$c_state=$_POST['c_state'];
$c_contact=$_POST['c_contact'];
	}
$con=mysqli_connect("localhost","root","","invoice");
$hello=$_SESSION['client_email'];

$get_item="select * from clients where client_email='$hello'";
	$run_item=mysqli_query($con,$get_item);
	$row_item=mysqli_fetch_array($run_item);
	$client_id=$row_item['client_id'];


$get_pro="select * from invoice where client_id='$client_id' ";// and (customer_name='$c_name' or '$c_name' is NULL)";// and (customer_email='$c_email' or '$c_email' is  NULL) and (customer_gst_no='$c_gst' or '$c_gst' is  NULL)";client,,customer_email,customer_gst_no,customer_address,customer_city,customer_state,customer_contact_no

$run_pro=mysqli_query($con,$get_pro);
$i=0;


echo "  
	<h1>All Invoices</h1>
";
while($row_pro=mysqli_fetch_array($run_pro)){
	$invoice_no=$row_pro['invoice_no'];
	$Dates=$row_pro['Dates'];
	$total_gst=$row_pro['total_gst'];
	$vehicle_no=$row_pro['vechile_no'];
	$net_amount=$row_pro['net_amount'];
	$customer_id=$row_pro['customer_id'];
	
		$get_item="select * from customer where customer_id='$customer_id'";
	$run_item=mysqli_query($con,$get_item);
	$row_item=mysqli_fetch_array($run_item);
	$customer_name=$row_item['customer_name'];
	

	$i++;
	     
				echo"	   
					<div class='signup-form'>
						<form action='invoice_view_particular_invoice.php' method='post' enctype='multipart/form-data'>
						<table align='center' >
						<tr>
						<td>
                          <label for='name'>Invoice No.</label>	
						  
						<input type='text' name='invoice_no' value='$invoice_no' required /></p>
						</td>
						<td>
                          <label for='name'>Customer </label>						
						<input type='text' name='customer_name' value='$customer_name' required /></p>
						</td>
						<td>
                          <label for='name'>Date</label>						
						<input type='text' name='Dates' value='$Dates' required /></p>
						</td>
						<td>
                          <label for='name'>Gst %</label>						
						<input type='text' name='total_gst' value='$total_gst' required /></p>
						</td>
						<td>
                          <label for='name'>Vehicle No.</label>						
						<input type='text' name='vehicle_no' value='$vehicle_no' required /></p>
						</td>
						<td>
                          <label for='name'>Total Amount</label>						
						<input type='text' name='net_amount' value='$net_amount' required /></p>
						</td>
						
						
						<td>
						<input type='hidden' name='invoice_no' placeholder='Name' value='$invoice_no' />
						<button type='submit' name='register' class='btn btn-blank' >View Details</button>
						</td>
						
						</form>
						</tr>
						
						 
						
							</table>
						
					</div><!--/sign up form-->
					";
				
 }                                                                //while loop closed here                                      
?>    
				