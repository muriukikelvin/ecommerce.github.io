			<?php 
			include ("includes/db.php");
			$user = $_SESSION['customer_email'];
				$get_customer = " SELECT * FROM customers WHERE customer_email= '$user'";
				$run_customer = mysqli_query($con, $get_customer);
				$row_customer= mysqli_fetch_array ($run_customer); 
				$c_id = $row_customer['customer_id']; 
				$name = $row_customer ['customer_name'];
				$email = $row_customer ['customer_email'];
				$pass = $row_customer ['customer_pass'];
				$p_pic = $row_customer ['customer_image'];
				$county = $row_customer ['customer_county'];
				$town = $row_customer ['customer_town'];
				$contact = $row_customer ['customer_contact'];
				$address = $row_customer ['customer_address'];
			?>
<form action="" method="post" enctype="multipart/form-data">
	<table align="center" width="900">
		<tr align="center">
			<td colspan="6"><h2> Update Your Account </h2></td>
		</tr>
			<tr>
				<td align="right">Name:</td>
				<td><input type="text" name="c_name" required  value="<?php echo $name;?>" style="margin-bottom: 12px;" /></td>
			</tr>
			<tr>
				<td align="right">Email:</td>
				<td><input type="text" placeholder="e.g kj@email.com"name="c_email" required  value="<?php echo $email;?>"style="margin-bottom: 12px;"/></td>
			</tr>
			<tr>
				<td align="right">Password:</td>
				<td><input type="password" name="c_pass" required  value="<?php echo $pass;?>"style="margin-bottom: 12px;"/></td>
			</tr>
			<tr>
				<td align="right">Profile Pic</td>
				<td><input type="file" name="p_pic" style="margin-bottom: 12px;"/><img src="customer_images/<?php echo $p_pic; ?>" width="50" height="50"/></td>
			</tr>
			<!--<tr>
    			<td align="right">Confirm Password:</td>
				    <td><input type="password" placeholder="Verify Password" name="pass_confirm" required  style="margin-bottom: 12px;"/>
				    </td>
			</tr>-->
			    <td align="right">County:</td>
				<td>
				<select name="c_county" required  disabled style="margin-bottom: 12px;">
					<option><?php echo $county;?></option>
					<?php
						$get_location = "SELECT * FROM locations ";
  						$run_location = mysqli_query($con, $get_location); 
  						while ($row_location=mysqli_fetch_array($run_location)) {
  						$location_id = $row_location ['location_id'];
  						$location_title = $row_location ['location_title']; 
  						echo "<option value='$location_id'>$location_title</option>"; 
  					}
					?>	
				</select>
			</td>
			</tr>
			<tr>
				<td align="right">Town:</td>
				<td><input type="text" name="c_town" required  value="<?php echo $town;?>" style="margin-bottom: 12px;"/></td>
			</tr>
			<tr>
				<td align="right">Contact:</td>
				<td><input type="text" name="c_contact" required  value="<?php echo $contact;?>" style="margin-bottom: 12px;"/></td>
			</tr>

			<tr>
				<td align="right">Address:</td>
				<td><input type="text" name="c_address" required  value="<?php echo $address;?>"style="margin-bottom: 12px;" />
				</textarea></td>
			</tr>
			   <tr align="center">
				<td colspan="6"><input type="submit" name="update" value="Update Account" style="margin-bottom: 12px;"/></td>
			</tr>

	</table>
	</form>

        
<?php
 if (isset($_POST['update'])) {
 	$ip = getIp();
//get method for updating single customer account
 	$customer_id= $c_id; 
 	
 	$c_name = $_POST['c_name'];
 	$c_email = $_POST['c_email'];
 	$c_pass = $_POST['c_pass'];
 	$p_pic = $_FILES['p_pic']['name'];
 	$p_pic_tmp = $_FILES['p_pic']['tmp_name'];
 	$c_town = $_POST['c_town'];
 	$c_contact = $_POST['c_contact'];
 	$c_address = $_POST['c_address'];

 	move_uploaded_file($p_pic_tmp,"customer_images/$p_pic"); 
 	
    $update_c = " UPDATE customers set
        customer_name='$c_name', 
        customer_email='$c_email',
   		customer_pass='$c_pass',
   		customer_town= '$c_town',
   		customer_contact= '$c_contact',
   		customer_image ='$p_pic',
   		customer_address = '$c_address'
   		
   		WHERE customer_id = '$customer_id'
   ";

    $run_update = mysqli_query($con, $update_c);
   
   		if($run_update){
   			echo "<script>alert('Your account successfully updated')</script>";
   			echo "<script>window.open('my_account.php','_self')</script>";
   		}
 }
?>