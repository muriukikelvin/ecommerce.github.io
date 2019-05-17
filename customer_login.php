<?php 
  	include("includes/db.php");
  	//include("function/functions.php"); 
 ?>
<html>
<body>
<link href="css/farmer.css" rel="stylesheet" type="text/css" media="all" />
<div class="header">
	<img src="images/customer.png"/>
		<h2>Login</h2>
	</div>
	<div id="login">
    <form method ="post" action="">
       <div class="input-group1">
			<label>Email</label>
			<input type="text" name="email" placeholder="e.g esther@yahoo.com" required >
		</div>
		<div class="input-group1">
			<label>Password</label>
			<input type="password" name="pass" placeholder="enter password" required>
		</div>
		<div class="input-group1">
			<button type="submit" class="btn" name="login"> Login </button>
		</div>
		<p>
			Not yet a member?<a href="cuustomer_register.php">Register Here</a>
		</p>
          <!--<div style="padding-left:300px; "> 
           <p>Not a member?<a href="customer_register.php">Register</a></p>
		  </div>-->   
    </form>
    <?php 
	if (isset($_POST['login'])) {
		$c_email = $_POST ['email']; 
		$c_pass = $_POST ['pass']; 
		$sel_c = "SELECT * FROM customers WHERE customer_pass='$c_pass' AND customer_email='$c_email'";
		//echo "<script>alert('$sel_c')</script>";
		$run_c = mysqli_query($con, $sel_c) or die(mysqli_error($con));
		$check_customer = mysqli_num_rows($run_c);

		if ($check_customer==0){
			echo "<script>alert('Password or email does not match our records, please try again!')</script>";
		      exit(); 
	    }
	      else
	      {
					$ip = getIp (); 
					//checking cart b4 login 
					$sel_cart = "SELECT * FROM cart WHERE ip_add ='$ip'";
				   	$run_cart = mysqli_query ($con,$sel_cart);
				   	$check_cart = mysqli_num_rows ($run_cart);

				   	$num = mysqli_fetch_array($run_c);
					$customer_id = $num['customer_id'];
					$customer_email = $num['customer_email'];
					//echo "<script>alert('$customer_email')</script>";
				   	

				   	if ($check_customer>0 AND $check_cart== 0)
				   	{
				   		$_SESSION['customer_email']=$customer_email;
				   		$_SESSION['customer_id'] = $customer_id;
						
			   				echo "<script>alert('You logged in successfully, Thanks!')</script>";
			   				echo "<script>window.open('customer/my_account.php','_self')</script>";
					}
					else 
					{
				   		$_SESSION['customer_email']=$customer_email;
				   		$_SESSION['customer_id'] = $customer_id;
						
			   				echo "<script>alert('You logged in successfully, Thanks!')</script>";
			   				echo "<script>window.open('checkout.php','_self')</script>";
				   		}
					}
	      }
			
		

		?>
     	</div>
    </body>
</html>