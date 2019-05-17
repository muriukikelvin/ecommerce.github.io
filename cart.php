
<?php 
include ("function/functions.php"); 
//session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Zaraa Farm Produce Marketers | Marketplace :: Kendu Designers</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Farming, Marketing , Marketer " />
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<!--<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />--> 

<!--<link href="css/font-awesome.css" rel="stylesheet">-->
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
              <a href="marketplace.php"><i class="glyphicon glyphicon-euro"></i><span>MarketPlace</span></a>
              <li><a href="all_products.php"><span> All products </span></a></li>
              <li><a href="customer/my_account.php"><i class="glyphicon glyphicon-user"></i><span> My Account </span></a></li>             
             </ul>
          </div>
         </div>
        </nav>
              <div class="main_wrapper">
              	<div class="content_wrapper"> 
              		    <div id="sidebar"> 
              	     		<div id="sidebar_title"><center>Vegetable </center><center> Categories </center></div>
              	 			<ul id="cats">
              	 				<?php getCats(); ?>
              	 			</ul>
              	    	</div> 
                          <div id="content_area"> 
                          <?php cart (); ?>
                         <div id="shopping_cart">        
                        <a href="marketplace.php" style="color:skyblue; text-decoration: underline; padding-left: 24px; "> Go back to Marketplace </a>
                    <div id="form_search"> 
                     <form method="get" action="results.php" enctype="multipart/form-data">
                     <input type="text" name="user_query" placeholder="What can we help you find?"/>
                     <input type="submit" name="search" value="Search" />
                     </form>
                </div> 
           </span> 
    </div>
                <div id="productss_box">
                          <br>
              	<form  method="post" enctype="multipart/form-data">  
                  <table align="center" width="950" bgcolor="skyblue">
                      <tr align="center">
                      <th>Remove</th>
                      <th>Product(s)</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      </tr>
                          <?php
                          $total= 0;
                          global $con;
                          $ip = getIp();
                          $sel_price= "SELECT * FROM cart ";
                          $run_price = mysqli_query($con, $sel_price) or die(mysqli_error($con));
                          while ($p_price = mysqli_fetch_array($run_price)){
                              $pro_id = $p_price ['product_id']; 
                              $pro_price = " SELECT * FROM products WHERE product_id ='$pro_id' " ;
                              $run_pro_price = mysqli_query($con, $pro_price );
                              while ($pp_price = mysqli_fetch_array($run_pro_price)) {
                           //array storing price values
                                
                              $product_price = array($pp_price['product_price']);
                              $product_title = $pp_price ['product_title'];
                              $product_image = $pp_price ['product_image'];
                              $single_price = $pp_price['product_price'];
                              $product_qty = $pp_price['product_qty'];
                              $values = array_sum($product_price);
                              $total +=$values;
                              ?>
                              <tr align="center">
                              <td><input type="checkbox" name= "remove[]" value="<?php echo $pro_id; ?>"/></td>
                              <td><?php echo $product_title; ?><br><img src="farmer/product_images/<?php echo $product_image; ?>" width="60" height="60"/></td>
                              <td><input type="text" size="4" name="qty"   max=" $pp_price['product_qty']; " value="
                              <?php echo @$_SESSION['qty'];?>"/></td>
                              <?php
                                  if (isset($_POST['update_cart'])) {
                                    $qty= $_POST['qty'];
                                    $update_qty = " UPDATE cart SET qty='$qty' WHERE product_id='$pro_id'"; 
                                    //query running
                                    $run_qty = mysqli_query ($con,$update_qty); 
                                    $_SESSION['qty']= $qty; 
                                    $total = $total*$qty; 
                                  }
                              ?>
                                <td><?php echo "Ksh".$single_price; ?></td>
                              </tr>

                              <?php } } ?>   
                              <tr align="right">
                                  <td colspan="4"><b>Sub Total:</b></td>
                                  <td colspan="4"><?php echo "Ksh".$total; ?></td>
                              </tr>  
                                <tr align="center">
                                <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
                                  <td><input type="submit" name="proceed" value="Continue Shopping"/></td>
                                    <td style="padding:1px; text-decoration:none; color:black; "><a href="checkout.php">Checkout</a></td>
                                </tr>
                      </table>
                     </form>	
                                  <?php
                                      function updatecart(){
                                         $ip = getIp();
                                         global $con;
                                          if(isset($_POST['update_cart'])){
                                            //loop to delete ids at once
                                          foreach($_POST['remove'] as $remove_id){
                                            $delete_product =" DELETE FROM cart WHERE product_id='$remove_id' AND ip_add='$ip'";
                                            $run_delete =mysqli_query($con, $delete_product);
                                            //if deletion is done 
                                             if($run_delete){
                                              echo "<script>window.open('cart.php')</script>";
                                            }
                                            } 
                                          }
                                         if (isset($_POST['proceed'])){
                                          echo "<script>window.open('marketplace.php','_self')</script>";
                                         }
                                          
                                       }
                                       echo @$up_cart = updatecart(); 
                                    ?>

                      </div> 
            	 </div>
            <div class="copyright">
          	<p> © 2018 Zaraa Farm Produce Marketers.All rights reserved</p>
          </div>
     </body>
</html>