<!DOCTYPE html>
<?php
include ("function/functions.php"); 
include ("includes/db.php"); 
?>
<html>
<head>
	<title>Zaraa Farm Produce Marketers | Customer Register </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="Farming, Marketing , Marketer ; charset=utf-8" />
	<link href="css/farmer.css" rel="stylesheet" type="text/css" media="all" />
</head> 
</head>
</head>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<div id="login">
<form action="cuustomer_register.php" method="post" enctype="multipart/form-data">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="c_name" required >
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" placeholder="e.g kj@email.com" name="c_email" required>
	</div>
	 <div class="input-group">
		<label>Password</label>
		<input type="password"  name="c_pass" required>
	 </div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="c_pass" required>
	</div>
   <div class="input-group">
		<label>Profile Pic</label>
		<input type="file" name="p_pic" required >
	</div>
	    <div class="input-group">
		   <label>County</label>
	        <select name="c_county" required >
					<option>Select your County</option>
					<?php
						$get_location = " SELECT * FROM locations ";
  						$run_location = mysqli_query($con, $get_location); 
  						while ($row_location=mysqli_fetch_array($run_location)) {
  						$location_id = $row_location ['location_id'];
  						$location_title = $row_location ['location_title']; 
  						echo "<option value='$location_id'>$location_title</option>"; 
  					}
					?>	
				</select>
           </div>
     <div class="input-group">
		<label>Town</label>
		<input type="text" name="c_town" required >
	</div>
	 <div class="input-group">
		<label>Contact</label>
		<input type="text" name="c_contact" required >
	</div>
	 <div class="input-group">
		<label>Address</label>
		<input type="text" name="c_address" required >
	</div>

	<div class="input-group">
		<button type="submit" class="btn" name="register"> Register</button>
	</div>
	<p>
		Already a member? <a href="customer_login.php">Sign in</a>
	</p>
</form>
</div>
</body>
</html>
<?php
 if (isset($_POST['register'])) {
 	$ip = getIp();
 	$c_name = $_POST['c_name'];
 	$c_email = $_POST['email'];
 	$password = $_POST['c_pass'];
 	$c_pass = ($password); 
 	$p_pic = $_FILES['p_pic']['name'];
 	$p_pic_tmp = $_FILES['p_pic']['tmp_name'];
 	$c_county = $_POST['c_county'];
 	$c_town = $_POST['c_town'];
 	$c_contact = $_POST['c_contact'];
 	$c_address = $_POST['c_address'];

 	move_uploaded_file($p_pic_tmp,"customer/customer_images/$p_pic"); 
 	
   $insert_c = " INSERT INTO customers (customer_ip,
   customer_name,
   customer_email,
   customer_pass,
   customer_county,
   customer_town,
   customer_contact,
   customer_image,
   customer_address ) 
   values ('$ip',
   '$c_name',
   '$c_email',
   '$c_pass',
   '$c_county',
   '$c_town',
   '$c_contact',
   '$p_pic',
   '$c_address') ";

    $run_c = mysqli_query ($con, $insert_c);

   	$sel_cart = "SELECT * FROM cart WHERE ip_add ='$ip'";
   	$run_cart = mysqli_query ($con,$sel_cart);
   	$check_cart = mysqli_num_rows ($run_cart);
   		if ($check_cart==0){
   			
   			$_SESSION['customer_email']=$c_email;
   				echo "<script>alert('Account has been created successfully, Thanks!')</script>";
   				 echo "<script>window.open('customer/my_account.php','_self')</script>";
   		}
   		else {
      $_SESSION['customer_email']=$c_email;
   			echo "<script>alert('Account has been created successfully, Thanks!')</script>";
   	        echo "<script>window.open('checkout.php','_self')</script>";
   		}
 }
?>
