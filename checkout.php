<?php
	//session_start();
?>
<!DOCTYPE html>
<?php

include ("function/functions.php"); 
?>
<html lang="en">
<head>
<title>Zaraa Farm Produce Marketers | Marketplace :: Kendu Designers</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" content="Farming, Marketing , Marketer ; charset=utf-8 " />
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />

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
 <!--<link href="admin/css/bootstrap.min.css" rel="stylesheet">-->

        <!-- MetisMenu CSS -->
       <!-- <link href="admin/css/metisMenu.min.css" rel="stylesheet">-->

        <!-- Timeline CSS -->
        <!--<link href="admin/css/timeline.css" rel="stylesheet">-->

        <!-- Custom CSS -->
        <!--<link href="admin/css/startmin.css" rel="stylesheet">-->

        <!-- Morris Charts CSS -->
        <!--<link href="admin/css/morris.css" rel="stylesheet">-->
</head>
<body>
<nav class="show-menu">
	<div class="top-nav menu-wrap">
		 <div class="icon-list">
			<ul id="menu">
				<li><a href="index.php"><!--<i class="glyphicon glyphicon-home"></i>--><span>Home</span></a></li>
				<li><a href="all_products.php"><span>All products</span></a></li>
				<li><a href="customer/my_account.php"><!--<i class="glyphicon glyphicon-user"></i>--><span> My Account </span></a></li>
				<a href="cart.php"><!--<i class="glyphicon glyphicon-shopping-cart"></i>--><span> Shopping Cart</span></a>
				                <?php
                             		if (!isset($_SESSION['customer_email'])) {
                             			//echo "<a href='checkout.php'style='color:yellow; padding-left:450px;'>Log In </a>" ;
                             		}
                             		else {
                             			echo "<a href ='logout.php' style='color:yellow; padding-left: 430px;'> Log Out </a>" ;
                             		}
                             	?>							
             </ul>
		  </div>
    </div>
</nav>
<div class="main_wrapper">
	<div  class="content_wrapper"> 
		    <div id="sidebar"> 
	     		<div id="sidebar_title"><center> Vegetable </center><center>Categories </center></div>
	 			<ul id="cats">
	 				<?php getCats(); ?>
	 			</ul>
	    	</div>  
			     <div id="content_area">
			     <?php cart (); ?>
			     <div id="shopping_cart">        
	                        <span style="float: center; font-size: 18px; padding: 15px; line-height: 40px; "> <?php
	                        		if (isset($_SESSION['customer_email'])) {
	                        			echo "<b>You're Logged In As:</b>".$_SESSION['customer_email']."<b style= 'color:yellow;'></b>";	
	                        		}
	                        	 else {
	                        			echo "<b>Karibu!</b>";
	                        		}
	                        		?>
	                             You Selected Total Item(s):<b style="color:yellow"><?php total_items() ; ?></b> Total Price :<b style="color:yellow"> Ksh.<?php total_price (); ?> </b><a href="cart.php" style="color:skyblue; text-decoration: underline; "> Go to Cart </a>
	                        <div id="form_search"> 
	                             <form method="get" action="results.php" enctype="multipart/form-data">
		                             <input type="text" name="user_query" placeholder="What can we help you find?"/>
		                             <input type="submit" name="search" value="Search" />
	                             </form>
	                        </div> 
                        </span>   
                  </div>
                		<?php
				     		if (!ISSET ($_SESSION['customer_email'])) {
				     			include ("customer_login.php");
				     		}
				     		else {
				     			include ("./customer/confirmation.php");
				     		} 
			     	     ?> 
		      	</div>
    </div>
        <div class="copyright">
		  <p> © 2018 Zaraa Farm Produce Marketers.All rights reserved</p>
		</div>
</div>
<script src="admin/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="admin/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="admin/js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="admin/js/raphael.min.js"></script>
        <script src="admin/js/morris.min.js"></script>
        <script src="admin/js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="admin/js/startmin.js"></script>

</body>
</html>