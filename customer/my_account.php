<!DOCTYPE html>
<?php
//session_start();
include ("../function/functions.php");
//session_start();
//if (!isset($_SESSION['customer_id'])) {
	
	//echo" <script>window.open('customer_login.php',);</script>"
	
//}
?>
<html lang="en">
<head>
<title>Zaraa Farm Produce Marketers | Marketplace :: Kendu Designers</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Farming, Marketing , Marketer " />
<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet">-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<!--<link rel="stylesheet" href="css/lightbox.css">-->
<link rel="stylesheet" type="text/css" href="css/menu_topexpand.css" />
<!-- //Custom Theme files -->
<!--fonts-->
<!--<link href="//fonts.googleapis.com/css?family=Courgette&amp;subset=latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&  amp;subset=latin-ext,vietnamese" rel="stylesheet">-->
<!--//fonts-->
  <link href="./admin/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
       <link href="./admin/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="./admin/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="./admin/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="./admin/css/morris.css" rel="stylesheet">
</head>
<body>
<nav class="show-menu">
	<div class="top-nav menu-wrap">
		 <div class="icon-list">
			<ul id="menu">
				<li><a href="index.php"><!--<i class="glyphicon glyphicon-home"></i>--><span>Home</span></a></li>
				<li><a href="../all_products.php"><span>All products</span></a></li>
				<li><a href="customer/my_account.php"><!--<i class="glyphicon glyphicon-user"></i>--><span> My Account </span></a>
				</li>
				<a href="../cart.php"><!--<i class="glyphicon glyphicon-shopping-cart"></i>--><span> Shopping Cart</span></a>	
	  			 	<?php
                 		if (!isset($_SESSION['customer_email'])) {
                 			echo "<a href='../checkout.php' style='color:yellow; padding-left:450px;'> Log In </a>";
                 		}
                 		else {
                 			echo "<a href ='logout.php' style='color:yellow; padding-left: 455px;'> Log Out </a>";
                 		}
        			?>			
                    </ul>
		        </div>
           </div>
    </nav>
<div class="main_wrapper">
	<div  class="content_wrapper"> 
		    <div id="sidebar"> 
	     		<div id="sidebar_title"> My Account: </div>
	 			<ul id="cats">
 			    <?php
	 				$user = $_SESSION['customer_email'];
	 				$get_img = " SELECT * FROM customers WHERE customer_email= '$user'";
	 				$run_img = mysqli_query($con, $get_img); 
	 				$row_img = mysqli_fetch_array ($run_img); 
	 				$p_pic= $row_img['customer_image']; 
	 				//taking name from table directly
	 				$c_name = $row_img['customer_name']; 

	 				echo " <p style='text-align: center;'><img src='customer_images/$p_pic' width='150' height='150' /> "; 
 			     ?>
	 				<li><a href="my_account.php?view_orders">My Orders</a></li>
	 				<li><a href="my_account.php?edit_account"> Edit Account</a></li>
	 				<li><a href="my_account.php?change_pass"> Change Password</a></li>
	 				<!--<li><a href="my_account.php?delete_account"> Delete Account</a></li>-->
	 				<li><a href="logout.php"> Log Out</a></li>
	 			</ul>
	    	</div> 
   <div id="content_area"> 
    <?php cart (); ?>
     <div id="shopping_cart">        
            <span style="float: center; font-size: 18px; padding: 15px; line-height: 73px; ">
            	 <?php
            		if (isset($_SESSION['customer_email'])) {
            			echo "<b>Welcome:</b>".$_SESSION['customer_email'];
            		}
                ?>
            </span>
        <!--<div id="form_search"> 
             <form method="get" action="results.php" enctype="multipart/form-data">
             <input type="text" name="user_query" placeholder="What can we help you find?"/>
             <input type="submit" name="search" value="Search"/>
             </form>
        </div>-->
  </div>
	<div id="products_box">
		 <?php
		// if(!isset($_GET['my_orders'])) {
		 		//if(!isset($_GET['edit_account'])){
		 			///if(!isset($_GET['change_pass'])){
		//echo " 
		//<h2 style='padding:20px;'> Welcome: $c_name </h2>
		//<b>You can see your orders progress by clicking this <a href='my_account.php?my_orders'>link</a></b> "; 
					// }
				//}
  			//}			
 	
  	?>
	 <?php 
	 if(isset($_GET['edit_account'])){
	   include ("edit_account.php"); 
	 }
	  if(isset($_GET['change_pass'])){
	   include ("change_pass.php"); 
	 }
  if(isset($_GET['delete_account'])){
	   include ("delete_account.php"); 
	 }
	  if(isset($_GET['view_orders'])){
	   include ("view_orders.php"); 
	 }

     ?>
	</div>
</div>
        </div>
       <div class="copyright">
		    <p> © 2018 Zaraa Farm Produce Marketers.All rights reserved </p>
	  </div>
</div>
 <script src="../admin/js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../admin/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="../admin/js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <script src="../admin/js/raphael.min.js"></script>
        <script src="../admin/js/morris.min.js"></script>
        <script src="../admin/js/morris-data.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="../admin/js/startmin.js"></script>

</body>
</html>
