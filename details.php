<!DOCTYPE html>
<?php

include ("function/functions.php"); 

?>
<html lang="en">
<head>
<title>Zaraa Farm Produce Marketers | Marketplace :: Kendu Designers</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Green Farm Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">

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
				<li><a href="index.php"><i class="glyphicon glyphicon-home"></i><span>Home</span></a></li>
				<li><a href="all_products.php"><span>All products</span> </a></li>
				<li><a href="customer/my_account.php"><i class="glyphicon glyphicon-user"></i><span> My Account </span></a></li>
				<a href="cart.php"><i class="glyphicon glyphicon-shopping-cart"></i><span> Shopping Cart</span></a>				
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
				<div id="shopping_cart">
					<span style="float: center; font-size: 18px; padding: 15px; line-height: 40px; "> Welcome Guest!
						 You've Selected Total Item(s):<b style="color:yellow"><?php total_items(); ?></b> Total Price :<b style="color:yellow"> Ksh.<?php total_price (); ?> </b><a href="cart.php" style="color:skyblue; text-decoration: underline; padding-left: 20px;"> Go to Cart </a>
					    </span>
		    		        <div id="form_search">
				 	   	       <form method="get" action="results.php" enctype="multipart/form-data">
				     	        <input type="text" name="user_query" placeholder="What can we help you find?"/>
				     	         <input type="submit" name="search" value="Search" />
				 	      			</form>
		    			</div> 
		 	   </div>
					   <div id="products_box" style="float:left; margin-left: 21px;">
						<?php 		     			
							if(isset($_GET['pro_id'])){
								$product_id= $_GET['pro_id'];
					     		$get_pro = "SELECT * FROM products WHERE product_id='$product_id'"; 
									$run_pro = mysqli_query ($con, $get_pro);
									$i=1;
									while ($row_pro= mysqli_fetch_array($run_pro) ){
										$pro_id =$row_pro['product_id'];
										$pro_title =$row_pro['product_title'];
										$pro_price =$row_pro['product_price'];
										$proprice_desc =$row_pro ['productprice_desc']; 
	                                	$pro_units = $row_pro ['product_units'];
										$pro_image =$row_pro['product_image'];
										$pro_keywords=$row_pro['product_keywords'];
										$pro_location =$row_pro['product_location'];
										$pro_desc= $row_pro ['product_desc'];
										$get_location = "SELECT * FROM locations  WHERE location_id='$pro_location'"; 
										$run_loc = mysqli_query ($con, $get_location);
										$row= mysqli_fetch_array($run_loc) or die(mysqli_error($con));
										$location  =$row['location_title'];		
										$product_quantity = $row_pro['product_qty'];
										$farmer_id = $row_pro['farmer_id'];


										$get_farmer = " SELECT  * FROM users where user_id ='$farmer_id'"; 
										$run_farm_pro = mysqli_query($con, $get_farmer);
										$show_farmer = mysqli_fetch_array ($run_farm_pro);
										$user_id = $show_farmer ['user_id'];
  										$farmer_name = $show_farmer ['username']; 
  										$farmer_contact = $show_farmer['contact'];
										 	
										 	echo "
								  	 		<div id='single_product'>
							 				<h3>$pro_title</h3>
							 				 <img src='farmer/product_images/$pro_image' width='400' height='300' />
							 				 	<p><b>Ksh. $pro_price/$pro_units</b></p>
							 				 	<p>$pro_desc</p>
							 				 	<p><b> Farmer Name: $farmer_name</b></p>
							 				 	<p><b>  Contact: +254 $farmer_contact</b></p>
							 				 	<p><b>Available stock  $product_quantity </b></p>
							 				 	<p><b>$location</b></p>
							 				 	<a href='marketplace.php' style='float:left;'> Go back </a> 
												<a href='marketplace.php?add_cart= $pro_id'><button style= 'float:right'> Add to Cart </button></a>
							 			</div>

												 	";
												 $i++;
											}
										}
									?> 
					     	</div>
			      	</div>
               </div>
					 <div class="copyright">
						<p> © 2018 Zaraa Farm Produce Marketers.All rights reserved</p>
					</div>
</div>
</body>
</html>