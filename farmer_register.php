<!DOCTYPE html>
<?php
include ("function/functions.php");
include ("includes/db.php");  
?>
<html>
<head>
<title>Farmer Register</title>
<link href="css/farmer.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="css/menu_topexpand.css" />
</head>
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
	<h2>Register</h2>
</div>
<div id="login">
<form method="post" action="farmer_register.php">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" placeholder="e.g Kelvin" value="" required>
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" placeholder="kelvinndungu43@gmail.com" value="" required>
	</div>
	<div class="input-group">
		<label>National Id.</label>
		<input type="number" name="national"  value="" required>
	</div>
    <div class="input-group">
	<label>Farmers' Contact</label>
	<input type="number" name="contact" required/>
	</div>

	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1" required>
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2" required>
	</div>
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="login.php">Sign in</a>
	</p>
		</form>
		</div>
	</div>
	</div>
	<div class="copyright">
		     <p>© 2018 Zaraa Farm Produce Marketers.All rights reserved</p>
	</div>
</body>
</html>
<?php
 if (isset($_POST['register_btn'])) {
 	$f_name = $_POST['username'];
 	$f_email = $_POST['email'];
 	$f_national  = $_POST['national'];
 	$f_pass = $_POST['password_1']; 
 	$password = ($f_pass);
 	$farmer_contact= $_POST['contact'];
 echo $insert_f = "INSERT INTO users (username,email,contact,national,password ,role) 
   values ('$f_name','$f_email','$farmer_contact','$f_national','$password','1') ";

    $run_f = mysqli_query ($con, $insert_f);

   	 if($run_f) {
   			$_SESSION['username']=$f_name;
   				echo "<script>alert('Account has been created successfully, Thanks!')</script>";
   				 echo "<script>window.open('login.php','_self')</script>";
   		}
   		
 }
?>