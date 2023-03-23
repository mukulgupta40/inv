<?php

	
$con=mysqli_connect("localhost","root","","invoice");
$view_id=$_POST['invoice_no']	;
$get_pro="select * from items_for_invoice where invoice_no='$view_id'";// and (customer_name='$c_name' or '$c_name' is NULL)";// and (customer_email='$c_email' or '$c_email' is  NULL) and (customer_gst_no='$c_gst' or '$c_gst' is  NULL)";client,,customer_email,customer_gst_no,customer_address,customer_city,customer_state,customer_contact_no

$run_pro=mysqli_query($con,$get_pro);
$i=0;


echo "  
	<h1>Invoice No: $view_id</h1>
";
while($row_pro=mysqli_fetch_array($run_pro)){
	$invoice_no=$row_pro['invoice_no'];
	$units=$row_pro['units'];
	$item_id=$row_pro['item_id'];
	$price=$row_pro['price'];
	$amount=$row_pro['amount'];
	$gst_amount=$row_pro['gst_amount'];
	
	$get_item="select * from items where item_id='$item_id'";
	$run_item=mysqli_query($con,$get_item);
	$row_item=mysqli_fetch_array($run_item);
	$item_name=$row_item['name'];
	$item_hsn=$row_item['hsn_no'];
	

	$i++;
	     
				echo"	   
					<div class='signup-form'>
						<form action='invoice_edit_customer.php' method='post' enctype='multipart/form-data'>
						<table align='center' >
						<tr>
	                    <td>
                          <label for='name'>Name</label>						
						<input type='text' name='item_name' value='$item_name' required /></p>
						</td>
						<td>
                          <label for='name'>Hsn No.</label>						
						<input type='text' name='item_hsn' value='$item_hsn' required /></p>
						</td>
						<td>
                          <label for='name'>No. Of Units</label>						
						<input type='text' name='units' value='$units' required /></p>
						</td>
						<td>
                          <label for='name'>Price/Unit</label>						
						<input type='text' name='price' value='$price' required /></p>
						</td>
						<td>
                          <label for='name'>Gst %</label>						
						<input type='text' name='gst_amount' value='$gst_amount' required /></p>
						</td>
						<td>
                          <label for='name'>Total Amount</label>						
						<input type='text' name='amount' value='$amount' required /></p>
						</td>
						
						
						
						</form>
						</tr>
						
						 
						
							</table>
						
					</div><!--/sign up form-->
					";
				
 }                                                                //while loop closed here                                      
?>    
				