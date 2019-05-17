<?php 
  	include("includes/db.php"); 
  	session_start();
 ?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Zaraa Farm Produce Marketers | Farmer Login</title>
			<link href="css/farmer.css" rel="stylesheet" type="text/css" media="all" />
		    <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
		    <link rel="stylesheet" type="text/css" href="css/menu_topexpand.css" />
	    </head>
<body>
<nav class="show-menu">
	<div class="top-nav menu-wrap">
		 <div class="icon-list">
			<ul id="menu">
				<li><a href="index.php"><!--<i class="glyphicon glyphicon-home"></i>--><span>Home</span></a></li>
				<li><a href="crop_information.php"><i class="glyphicon glyphicon-info-sign"></i><span>Crop Information</span></a></li> 						
             </ul>
		  </div>
    </div>
</nav>
<div class="main_wrapper">
	<div class="contentt_wrapper" style="background-size: cover ; margin-top:84px;"> 
		<div class="header">
			<div class="profile_info">
				<img src="images/farmer.png"/>
				</div>
				    <h2>Login</h2>
				  </div>
					<div id="login">
						<form method="post" action="login.php">
							<div class="input-group">
							<label>Email</label>
							<input type="text" name="email"  class="form-control"placeholder="e.g kelvin@gmail.com" value="" required>
						    </div>
							<div class="input-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password_1" placeholder="Enter password" required>
							</div>
							<div class="input-group">
								<button type="submit" class="btn" name="login_btn"> Login </button>
							</div>
							<p>
								Not yet a member?<a href="farmer_register.php">Register Here</a>
							</p>
					 </form>
				  </div>
	          </div>
		</div>
    </body>
</html>
<?php 
if (isset($_POST['login_btn'])) {
		$f_email = $_POST['email']; 
		$f_pass = $_POST['password_1']; 
		$sel_f = "SELECT * FROM users WHERE password ='$f_pass' AND email='$f_email'"; 
		$run_f = mysqli_query($con, $sel_f);

		 $check_farmer = mysqli_num_rows($run_f);
		 
		if ($check_farmer != 1){
			echo "<script>alert('Password or email does not match our records, please try again!')</script>";
		      //exit(); 
		}
		else
		{
			$num = mysqli_fetch_array($run_f);
			$id = $num['user_id'];
			$farmer_role_id = $num['role'];
			$f_email = $num['email'];

			$_SESSION['user_id'] = $id ;
			$_SESSION['user_role'] = $farmer_role_id;
			$_SESSION['id'] = $f_email;

			$_SESSION['customer_id'] = $f_email;

			
			if ($farmer_role_id == 2){
				header("location:admin/index.php");
				//echo "<script>alert('$_SESSION['user_id']')</script>";
	   			//echo "<script>window.open('farmer/faccount.php','_self')</script>";
	   				
			}
			else
			{
				//echo "<script>alert('$ee')</script>";
				//`$_SESSION['farmer_email']=$f_email;
		   		//echo "<script>alert('You logged in successfully, Thanks!')</script>";
		   		header("location:farmer/faccount.php");
	         	//echo "<script>window.open('farmer/insert_product.php','_self')</script>";
			}
		}
		

}

?>