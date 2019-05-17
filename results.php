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
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> -->
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!--<link rel="stylesheet" href="css/lightbox.css">-->
<link rel="stylesheet" type="text/css" href="css/menu_topexpand.css"/>
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
                <li><a href="all_products.php"><span> All products </span></a></li>
                <li><a href="customer/my_account.php"><i class="glyphicon glyphicon-user"></i><span> My Account </span></a></li>             
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
                             You Selected Total Item(s):<b style="color:yellow"><?php total_items() ; ?></b> Total Price :<b style="color:yellow"> Ksh.<?php total_price (); ?> </b><a href="cart.php" style="color:skyblue; text-decoration: underline; "> Go to Cart </a>
                        </span> 
                        <div id="form_search"> 
                             <form method="get" action="results.php" enctype="multipart/form-data">
                             <input type="text" name="user_query" placeholder="What can we help you find?"/>
                             <input type="submit" name="search" value="Search" />
                             </form>
                        </div> 
                      </div>
							<div id="products_box">
								    <?php  
									if(isset($_GET['search'])) {

										$search_query = $_GET ['user_query'];


								$get_pro = "SELECT * FROM products 	WHERE product_keywords like '%$search_query%'"; 
									$run_pro = mysqli_query($con, $get_pro);
									$i=1;
									 while ($row_pro=mysqli_fetch_array($run_pro)) {
										$pro_id =$row_pro['product_id'];
										$pro_cat=$row_pro['product_cat'];
										$pro_title =$row_pro['product_title'];
										$pro_price =$row_pro['product_price'];
										$pro_image =$row_pro['product_image'];
										$pro_keywords=$row_pro['product_keywords'];
										
						

										 	echo "
								  	 			<div id='single_product'>
										 			<h3>$pro_title</h3>
										 			<img src='farmer/product_images/$pro_image' width='140' height='140' />
										 			<p><b>Ksh. $pro_price /Unit </b></p>
										 			<a href='details.php?pro_id=$pro_id' style='float:left;'>Details </a> 
									 			 	<a href='index.php?pro_id=$pro_id'><button style= 'float:right'> Add to Cart </button></a>
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