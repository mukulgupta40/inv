<?php
	
$c_name=NULL;	
$c_description=NULL;
$c_gst=NULL;
$c_hsn_no=NULL;

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
$c_name=$_POST['c_name'];	
$c_description=$_POST['c_description'];
$c_gst=$_POST['c_gst'];
$c_hsn_no=$_POST['c_hsn_no'];
	}
$con=mysqli_connect("localhost","root","","invoice");
$hello=$_SESSION['client_email'];
$get_pro="select * from items where client='$hello'";// and (customer_name='$c_name' or '$c_name' is NULL)";// and (customer_email='$c_email' or '$c_email' is  NULL) and (customer_gst_no='$c_gst' or '$c_gst' is  NULL)";client,,customer_email,customer_gst_no,customer_address,customer_city,customer_state,customer_contact_no
if($c_name!=NULL)
{
	$get_pro .= " and lower(name)=lower('$c_name') ";
}
if($c_description!=NULL)
{
	$get_pro .= " and lower(description)=lower('$c_description') ";
}
if($c_gst!=NULL)
{
	$get_pro .= " and lower(gst)=lower('$c_gst') ";
}
if($c_hsn_no!=NULL)
{
	$get_pro .= " and lower(hsn_no)=lower('$c_hsn_no') ";
}

$run_pro=mysqli_query($con,$get_pro);
$i=0;

	echo '
	

					<div class="signup-form"><!--sign up form-->
						<h1>Search Items</h1>
						
						<form action="invoice_my_account.php?invoice_view_items" method="post" enctype="multipart/form-data">
						<table >	
						<tr>
						<td>
						<input type="text" name="c_name" placeholder="Name" />
						</td><td>
							<input type="text" name="c_description" placeholder="Description"  />
							</td><td>
							<input type="text" name="c_gst" placeholder="GST"  />
							</td><td>
							<input type="text" name="c_hsn_no" placeholder="HSN NO."  />
							</td><td>
							<button type="submit" name="register" class="btn btn-blank">search</button>
						</td>
						</tr>	</table>
						</form>
					</div><!--/sign up form-->
			
	';

echo "  
	<h1>Registered Items</h1>
";


while($row_pro=mysqli_fetch_array($run_pro)){
	$pro_id=$row_pro['item_id'];
	$pro_name=$row_pro['name'];
	$pro_hsn_no=$row_pro['hsn_no'];
	$pro_gst=$row_pro['gst'];
	$pro_description=$row_pro['description'];

$t_product="select * from stock where item_id='$pro_id'";
$run_p=mysqli_query($con,$t_product);	
$row_p=mysqli_fetch_array($run_p);
$pro_units=$row_p['units'];

	$i++;
	     
				echo"	   
					<div class='signup-form'>
						<form action='invoice_edit_items.php' method='post' enctype='multipart/form-data'>
						<table align='center' >
						<input type='hidden' name='pro_id' placeholder='Name' value='$pro_id' />
						<tr>
						<td>
                          <label for='name'>Name</label>						
						<input type='text' name='update_c_name' value='$pro_name' required /></p>
						</td>
						<td>
                          <label for='name'>HSN NO</label>						
						<input type='text' name='update_c_hsn_no' value='$pro_hsn_no' required /></p>
						</td>
						<td>
                          <label for='name'>Description</label>						
						<input type='text' name='update_c_description' value='$pro_description' required /></p>
						</td>
						<td>
                          <label for='name'>GST no</label>						
						<input type='text' name='update_c_gst' value='$pro_gst' required /></p>
						</td>
						<td>
                          <label for='name'>Units</label>						
						<input type='text' name='update_c_units' value='$pro_units' required /></p>
						</td>
						<td>
						<button type='submit' name='register' class='btn btn-blank' >Update</button>
						</td>
						</form>
						 <td>
						 
						 <form action='invoice_delete_item.php' method='post' enctype='multipart/form-data'>
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
				