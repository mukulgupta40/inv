<?php
				echo"	   
					<div class='signup-form'>
						
						<form action='invoice_edit_profile.php' method='post' enctype='multipart/form-data'>
						<table align='center' width='500' >
						<tr>
						<td>
                          <label for='name'>Name</label>						
						<input type='text' name='c_name' value='$c_name' required /></p>
						</td>
						</tr>
						
						<tr>
						<td>
						 <label for='email'>Email</label>	
						 <input type='email' name='c_email' value='$c_email' required /></p>
						 </td>
						 </tr>
						 
						 <tr>
						<td>
                          <label for='name'>GST No.</label>						
						<input type='text' name='c_gst' value='$c_gst' required /></p>
						</td>
						</tr>
						
						<td>
                          <label for='name'>Address</label>						
						<input type='text' name='c_address' value='$c_address' required /></p>
						</td>
						</tr>
						<tr>
						<td>
                          <label for='name'>City</label>						
						<input type='text' name='c_city' value='$c_city' required /></p>
						</td>
						</tr>
						<tr>
						<td>
                          <label for='name'>State</label>						
						<input type='text' name='c_state' value='$c_state' required /></p>
						</td>
						</tr>
						<tr>
						<td>
                          <label for='name'>Contact</label>						
						<input type='text' name='c_contact' value='$c_contact' required /></p>
						</td>
						</tr>
						<tr>
						<td>
						<button type='submit' name='register' class='btn btn-blank' >Update</button>
						</td>
						 </tr>
						
							</table>
						</form>
						
					</div><!--/sign up form-->"
				
?>				