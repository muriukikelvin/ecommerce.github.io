<!DOCTYPE html>
<?php
//<session_start();
include ("function/functions.php"); 
?>
<html lang="en">
<head>
<title>Zaraa Farm Produce Marketers | Marketplace :: Kendu Designers</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Farming, Marketing , Marketer " />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

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
		 <div class="icon-list" style="padding-right: 50px;">
			<ul id="menu">
				<li><a href="index.php"><!--<i class="glyphicon glyphicon-home"></i>--><span>Home</span></a></li>
				<li><a href="all_products.php"><span>All products</span></a></li>
				<!--<li><a href="customer/my_account.php"><i class="glyphicon glyphicon-user"></i><span> Customer Account </span></a>
				</li>
				<li><a href="farmer/faccount.php"><i class="glyphicon glyphicon-user"></i><span> Farmer Account </span></a>
				</li>-->
				<a href="cart.php"><!--<i class="glyphicon glyphicon-shopping-cart"></i>--><span> Shopping Cart</span></a>
				  <a style="float:right; " href="login.php"><span>Post Product</span></a>

				  			 			
             </ul>
           
		  </div>
       </div>
</nav>
	<!--<div class="log_in">
	<a href="log_in.php"><i class="glyphicon glyphicon-log-in"></i><span> Please Log in Here</span></a> 
	</div>--> 
<div class="main_wrapper">
	<div  class="content_wrapper"> 
		    <div id="sidebar"> 
	     		<div id="sidebar_title"><center><span>Vegetable</span></center><center>Categories </center></div>
	 			<ul id="cats">
	 				<?php getCats(); ?>
	 			</ul>
	    	</div> 
			   <div id="content_area"> 
			     <?php cart (); ?>
			     <div id="shopping_cart">        
                        <span style="float: center; font-size: 18px; padding: 15px; line-height: 73px; ">
                        	 <?php
                        		if (isset($_SESSION['customer_email'])) {
                        			echo "<b>Karibu!:</b>".$_SESSION['customer_email']."<b style= 'color:yellow;'></b>";	
                        		}
                        	 else {
                        	      echo "<b>Karibu!</b>";
                        		}
                        		?>
                               You've Selected Total Item(s):<b style="color:yellow"><?php total_items(); ?></b> Total Price :<b style="color:yellow"> Ksh.<?php total_price (); ?> </b><a href="cart.php" style="color:skyblue; text-decoration: underline; padding-left: 20px;"> Go to Cart </a>
                               	<?php
                             		if (!isset($_SESSION['customer_email'])) {
                             			echo "<a href='checkout.php' style='color:yellow; padding-left:45px;'>Customer Log In </a>";
                             		}
                             		else {
                             			echo "<a href ='logout.php' style='color:yellow; padding-left: 45px;'> Log Out </a> ";
                             		}
                    			?>


                        </span>
                        <div id="form_search" style="float: right; padding-right: 4px; line-height: 40px; margin-top: 15px;"> 
                             <form method="get" action="results.php" enctype="multipart/form-data">
                             <input type="text" name="user_query" placeholder="What can we help you find?"/>
                             <input type="submit" name="search" value="Search" />
                             </form>
                        </div> 
                </div>
			     	<div id="products_box">
			     			<?php getPro(); ?> 
			     			<?php getCatPro (); ?>
			     	</div>
		      	</div>
        </div>
      <div class="copyright">
		     <p>© 2018 Zaraa Farm Produce Marketers.All rights reserved</p>
	</div>
</div>
</body>
</html>
