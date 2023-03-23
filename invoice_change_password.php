



					<div class='signup-form'>
						
						<form action="invoice_my_account.php?invoice_change_password" method='post' enctype='multipart/form-data'>
						<table align='center' width='500' >
						<tr>
						<td>
                          <label for='Current_Password'>Current Password</label>						
						<input type='password' name='c_password' placeholder='Current Password' required /></p>
						</td>
						</tr>
						
						<tr>
						<td>
						 <label for='New_Password'>New Password</label>	
						 <input type='password' name='c_new_password' placeholder='New Password' required /></p>
						 </td>
						 </tr>
						 
						 <tr>
						 <td>
						 <label for='Confirm_Password'>Confirm Password</label>	
						 <input type='password' name='c_new_con' placeholder='Confirm Password' required /></p>
						 </td>
						 </tr>
						 
                         <tr>
						 <td colspan='8'>
							<button type='submit' name='change_password' value='change_password' class='btn btn-blank'>Change Password</button>
							</td>
							</tr>
							</table>
						</form>
						
					</div><!--/sign up form-->
		
				

<?php	                                             //php of change_password.php page
$con=mysqli_connect("localhost","root","","invoice");	
		
		
				if(isset($_POST['change_password'])){
					$user=$_SESSION['client_email'];
					
					$current_password=$_POST['c_password'];
					$new_password=$_POST['c_new_password'];
					$new_password_con=$_POST['c_new_con'];
					
					
					
					$sel_password="select * from clients where client_password='$current_password' AND client_email='$user'";
					$run_password=mysqli_query($con,$sel_password);
					$check_password=mysqli_num_rows($run_password);
					
					
					if($check_password==0){
						echo "<script>alert('Your current password is wrong!')</script>";
						exit();
					}
					
					
					if($new_password!=$new_password_con){
						echo"<script>alert('Password does not match!')</script>";
						}
						
					else{
                    $update_password="update clients set client_password='$new_password' where client_email='$user'";
                     $run_update=mysqli_query($con,$update_password) ;                // we have to run the query to execute
					 echo"<script>alert('Password updated succesfully!')</script>";
					 
					}					
					
					
				}
				
				
				
				
?>				