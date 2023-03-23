<?php
	
$c_name=NULL;	
$c_email=NULL;
$c_gst=NULL;
$c_address=NULL;
$c_city=NULL;
$c_state=NULL;
$c_contact=NULL;
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
$get_pro="select * from customer where client='$hello'";// and (customer_name='$c_name' or '$c_name' is NULL)";// and (customer_email='$c_email' or '$c_email' is  NULL) and (customer_gst_no='$c_gst' or '$c_gst' is  NULL)";client,,customer_email,customer_gst_no,customer_address,customer_city,customer_state,customer_contact_no
if($c_name!=NULL)
{
	$get_pro .= " and lower(customer_name)=lower('$c_name') ";
}
if($c_email!=NULL)
{
	$get_pro .= " and lower(customer_email)=lower('$c_email') ";
}
if($c_gst!=NULL)
{
	$get_pro .= " and lower(customer_gst_no)=lower('$c_gst') ";
}
if($c_contact!=NULL)
{
	$get_pro .= " and lower(customer_contact_no)=lower('$c_contact') ";
}
if($c_city!=NULL)
{
	$get_pro .= " and lower(customer_city)=lower('$c_city') ";
}
if($c_address!=NULL)
{
	$get_pro .= " and lower(customer_address)=lower('$c_address') ";
}
if($c_state!=NULL)
{
	$get_pro .= " and lower(customer_state)=lower('$c_state') ";
}
$run_pro=mysqli_query($con,$get_pro);
$i=0;

	echo '
	

					<div class="signup-form"><!--sign up form-->
						<h1>Search customers</h1>
						
						<form action="invoice_my_account.php?invoice_view_customer" method="post" enctype="multipart/form-data">
						<table >	
						<tr>
						<td>
						<input type="text" name="c_name" placeholder="Name" />
						</td><td>
							<input type="email" name="c_email" placeholder="Email"  />
							</td><td>
							<input type="text" name="c_gst" placeholder="GST NO."  />
							</td><td>
							<input type="text" name="c_address" placeholder="Address"  />
							</td><td>
							<input type="text" name="c_city" placeholder="City"  />
							</td><td>
							<input type="text" name="c_state" placeholder="State"  />
							</td><td>
							<input type="text" name="c_contact" placeholder="Contact No."  />
							</td><td>
							<button type="submit" name="register" class="btn btn-blank">search</button>
						</td>
						</tr>	</table>
						</form>
					</div><!--/sign up form-->
			
	';

echo "  
	<h1>Registered Customers</h1>
";
while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_id=$row_pro['customer_id'];
	$pro_name=$row_pro['customer_name'];
	$pro_email=$row_pro['customer_email'];
	$pro_gst=$row_pro['customer_gst_no'];
	$pro_address=$row_pro['customer_address'];
	$pro_city=$row_pro['customer_city'];
	$pro_state=$row_pro['customer_state'];
	$pro_contact=$row_pro['customer_contact_no'];
	

	$i++;
	     
				echo"	   
					<div class='signup-form'>
						<form action='invoice_edit_customer.php' method='post' enctype='multipart/form-data'>
						<table align='center' >
						<input type='hidden' name='pro_id' placeholder='Name' value='$pro_id' />
						<tr>
						<td>
                          <label for='name'>Name</label>						
						<input type='text' name='update_c_name' value='$pro_name' required /></p>
						</td>
						<td>
                          <label for='name'>Email</label>						
						<input type='text' name='update_c_email' value='$pro_email' required /></p>
						</td>
						<td>
                          <label for='name'>Address</label>						
						<input type='text' name='update_c_address' value='$pro_address' required /></p>
						</td>
						<td>
                          <label for='name'>GST no</label>						
						<input type='text' name='update_c_gst' value='$pro_gst' required /></p>
						</td>
						<td>
                          <label for='name'>City</label>						
						<input type='text' name='update_c_city' value='$pro_city' required /></p>
						</td>
						<td>
                          <label for='name'>State</label>						
						<input type='text' name='update_c_state' value='$pro_state' required /></p>
						</td>
						<td>
                          <label for='name'>Contact</label>						
						<input type='text' name='update_c_contact' value='$pro_contact' required /></p>
						</td>
						<td>
						<button type='submit' name='register' class='btn btn-blank' >Update</button>
						</td>
						</form>
						 <td>
						 
						 <form action='invoice_delete_customer.php' method='post' enctype='multipart/form-data'>
							<input type='hidden' name='pro_id' placeholder='Name' value='$pro_id' />
							<button type='submit' name='register' class='btn btn-blank' >Delete</button>
						</form>
						 </td>
						</tr>
						
						 
						
							</table>
						
					</div><!--/sign up form-->
					";
				
 }                                                                //while loop closed here                                      
?>    
				