<!DOCTYPE html>
<?php
 session_start();
include ("function/functions.php"); 
include ("includes/db.php"); 
?>
<html lang="en">
<head>
<title>Zaraa Farm Produce Marketers | Marketplace :: Kendu Designers</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Farming, Marketing , Marketer ; charset=utf-8" /> 

<!-- Custom Theme files -->
<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

<link href="css/font-awesome.css" rel="stylesheet">-->
<!--<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />-->
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!--<link rel="stylesheet" href="css/lightbox.css">-->
<link rel="stylesheet" type="text/css" href="css/menu_topexpand.css" />
<!-- //Custom Theme files -->
<!--fonts-->
<!--<link href="//fonts.googleapis.com/css?family=Courgette&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&  amp;subset=latin-ext,vietnamese" rel="stylesheet">-->
<!--//fonts-->
</head>
<body>
<nav class="show-menu">
	<div class="top-nav menu-wrap">
		 <div class="icon-list">
			<ul id="menu">
				<li><a href="index.php"><!--<i class="glyphicon glyphicon-home"></i>--><span>Home</span></a></li>
				<li><a href="all_products.php"> <span>All products</span></a></li>
				<li><a href="customer/my_account.php"><!--<i class="glyphicon glyphicon-user"></i>--><span> My Account </span></a></li>
				<a href="cart.php"><!--<i class="glyphicon glyphicon-shopping-cart"></i>--><span> Shopping Cart</span></a>				
             </ul>
		  </div>
       </div>
</nav>
<div class="main_wrapper">
	<div  class="content_wrapper"> 
<div id="sidebar"> 
		<div id="sidebar_title"><center>Vegetable </center><center>Categories </center></div>
		<ul id="cats">
			<?php getCats(); ?>
		</ul>
</div> 
<div id="content_area">
 <?php cart (); ?>
    <div id="shopping_cart">        
            <span style="float: center; font-size: 18px; padding: 15px; line-height: 40px; "> Welcome Guest!
                 You Selected Total Item(s):<b style="color:yellow"><?php total_items() ; ?></b> Total Price :<b style="color:yellow"> Ksh.<?php total_price (); ?> </b><a href="cart.php" style="color:skyblue; text-decoration: underline; "> Go to Cart </a>
                <div id="form_search"> 
                     <form method="get" action="results.php" enctype="multipart/form-data">
                     <input type="text" name="user_query" placeholder="What can we help you find?"/>
                     <input type="submit" name="search" value="Search" />
                     </form>
                </div> 
           </span> 
    </div>

<form action="customer_register.php" method="post" enctype="multipart/form-data">
	<table align="center" width="900">
		<tr align="center">
			<td colspan="6"><h2> Create an Account</h2></td>
		</tr>
			<tr>
				<td align="right">Name:</td>
				<td><input type="text" name="c_name" required style="margin-bottom: 12px;" /></td>
			</tr>
			<tr>
				<td align="right">Email:</td>
				<td><input type="text" placeholder="e.g kj@email.com" name="c_email" required style="margin-bottom: 12px;"/></td>
			</tr>
			<tr>
				<td align="right">Password:</td>
				<td><input type="password" name="c_pass" required style="margin-bottom: 12px;"/></td>
			</tr>
			<tr>
				<td align="right">Profile Pic</td>
				<td><input type="file" name="p_pic" required style="margin-bottom: 12px;"/></td>
			</tr>
			<!--<tr>
    			<td align="right">Confirm Password:</td>
				    <td><input type="password" placeholder="Verify Password" name="pass_confirm" required  style="margin-bottom: 12px;"/>
				    </td>
			</tr>-->
			    <td align="right">County:</td>
				<td>
				<select name="c_county" required style="margin-bottom: 12px;">
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
			</td>
			</tr>
			<tr>
				<td align="right">Town:</td>
				<td><input type="text" name="c_town" required  style="margin-bottom: 12px;"/></td>
			</tr>
			<tr>
				<td align="right">Contact:</td>
				<td><input type="text" name="c_contact" required  style="margin-bottom: 12px;"/></td>
			</tr>

			<tr>
				<td align="right">Address:</td>
				<td><input type="text" name="c_address" required style="margin-bottom: 12px;" />
				</textarea></td>
			</tr>
			   <tr align="center">
				<td colspan="6"><input type="submit" name="register" value="Create Account" style="margin-bottom: 12px;"/></td>
			</tr>
	</table>
	</form>
</div>    	 	
</div>
        <div class="copyright"><p> © 2018 Zaraa Farm Produce Marketers.All rights reserved</p>
		</div>
     </div>
  </body>
</html>
<?php
 if (isset($_POST['register'])) {
 	$ip = getIp();
 	$c_name = $_POST['c_name'];
 	$c_email = $_POST['c_email'];
 	$c_pass = $_POST['c_pass'];
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