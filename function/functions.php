<?php
session_start();
$con = mysqli_connect("localhost", "root","","zaraafarm"); 

if (mysqli_connect_errno())
    {
 	echo "The Connection was not established:".mysqli_connect_errno();
} 
// Getting user Ip 
function getIP(){
    $ip= $_SERVER['REMOTE_ADDR'];
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    } elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip= $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    return $ip;
    }


function cart() {
		if(isset($_GET['add_cart'])) {	
			global $con; 
			$ip = getIP (); 
	        $pro_id = $_GET ['add_cart'];
	        $check_pro = "SELECT * FROM cart WHERE ip_add='$ip' AND cart_id='$pro_id' "; 
	        $run_check = mysqli_query ($con, $check_pro);
	        $qty = $pro_id;

	        if (mysqli_num_rows($run_check)>0) {
	          	echo ""; 
	       
	        }
          	else 
          	{
          	 	$insert_pro = "INSERT INTO cart (cart_id, ip_add,qty,product_id) VALUES (Null,'$ip','$qty','$pro_id')";
          		$run_pro = mysqli_query ($con, $insert_pro) OR die(mysqli_error($con));
          		echo "<script> window.open ('marketplace.php','_self')</script>"; 

          	}

		}
}
 // getting total added items
	function total_items () {
		if (isset($_GET['add_cart'])) {
			global $con;
			$ip = getIp ();
			$get_items = "SELECT * FROM cart WHERE ip_add= '$ip'";
			$run_items = mysqli_query ($con, $get_items);
			$count_items = mysqli_num_rows ($run_items);

			
		}
		else 
		{
			global $con;
            $ip = getIp();
			$get_items = "SELECT * FROM cart WHERE ip_add= '$ip'";
			$run_items = mysqli_query ($con, $get_items);
			$count_items = mysqli_num_rows ($run_items);

		}
          echo $count_items; 
         
	}	

	


// getting the total price of items in the cart
		function total_price (){
				$total= 0;
				global $con;
				$ip = getIp();
				$sel_price= "SELECT * FROM cart WHERE ip_add='$ip' ";
				$run_price = mysqli_query ($con, $sel_price);
				while ($p_price = mysqli_fetch_array($run_price)){
					$pro_id = $p_price ['product_id']; 
					$qty =  $p_price['qty'];
					$pro_price = " SELECT * FROM products WHERE product_id ='$pro_id' " ;
					$run_pro_price = mysqli_query ($con, $pro_price ) or die(mysqli_error($con));
					while  ($pp_price = mysqli_fetch_array ($run_pro_price)) {
                 //array storing price values
						//echo $pp_price['product_price'];
					$product_price =array($pp_price['product_price']);
					//calculatinng sum
					$values  = array_sum($product_price); 
					$total +=$values;
					 //$totallPrice = $qty *  $pro_price;
					}

				}
				echo $total;
			  
		}
// getting the categories 

function getCats() {
        global $con;
  		$get_cats = " SELECT * FROM  vegetable_categories ORDER BY cat_title";
  		$run_cats = mysqli_query ($con, $get_cats); 
  		while ($row_cats=mysqli_fetch_array($run_cats)) {
  				$cat_id = $row_cats ['cat_id'];
  				$cat_title = $row_cats ['cat_title']; 
			echo "<li><a href='marketplace.php?cat=$cat_id'>$cat_title</a></li>"; 
  		}

}

function getPro(){
	if (!isset($_GET['cat'])) {
		global $con;
	$get_pro = "SELECT * FROM products ORDER BY product_title"; 
	$run_pro = mysqli_query ($con, $get_pro);
	//order by RAND () LIMIT 0,25
	$i=1;
	while ($row_pro= mysqli_fetch_array($run_pro) ){
		$pro_id =$row_pro['product_id'];
		$pro_cat=$row_pro['product_cat'];
		$pro_title =$row_pro['product_title'];
		$pro_price =$row_pro['product_price'];
		$proprice_desc =$row_pro ['productprice_desc']; 
		$pro_units = $row_pro ['product_units'];
		$pro_image =$row_pro['product_image'];
		$pro_keywords=$row_pro['product_keywords'];
		$pro_location =$row_pro['product_location'];
		$point_colle = $row_pro ['point_colle']; 

		$get_location = "SELECT * FROM locations  WHERE location_id='$pro_location'"; 
		$run_loc = mysqli_query ($con, $get_location);
		$row= mysqli_fetch_array($run_loc) or die(mysqli_error($con));
		$location  =$row['location_title'];		
		
		$product_quantity = $row_pro['product_qty'];
		 	echo "
  	 			<div id='single_product'>
		 			<h3>$pro_title</h3>
		 			<img src='farmer/product_images/$pro_image'  width='140' height='140'/>
		 			<p><b> Price:Ksh. $pro_price /- $pro_units </b></p> 
		 			<p><b> ( $proprice_desc) </b></p>
		 			<p><b>Available stock  $product_quantity  </b></p>
		 			<p><b>$location  </b></p> 
		 			<p><b> Point Of Collection: $point_colle </b></p> 
		 			<a href='details.php?pro_id=$pro_id' style='float:left;'>Details </a> 
	 			 	<a href='marketplace.php?add_cart=$pro_id'><button style= 'float:right'> Add to Cart </button></a>
		 			</div>

		 	";
		 $i++;
	}
}
}
//getting cat using URL variable 
function getCatPro(){
	if (isset($_GET['cat'])) {
		$cat_id = $_GET['cat']; 
	global $con;
	$get_cat_pro = "SELECT * FROM products WHERE product_cat='$cat_id'";  
	$run_cat_pro = mysqli_query ($con, $get_cat_pro);
	$count_cats = mysqli_num_rows ($run_cat_pro); 
    if ($count_cats==0){
		echo "<h2 style= 'padding: 15px; font family: News Times Roman; color: black;'> Oops!There is no product in this Vegetable category!</h2> ";
		
	}
	else {  
	$i=1;
	while ($row_cat_pro= mysqli_fetch_array($run_cat_pro) ){
		$farm_id = $row_cat_pro['farmer_id'];
		$pro_id =$row_cat_pro['product_id'];
	    $pro_cat=$row_cat_pro['product_cat'];
		$pro_title =$row_cat_pro['product_title'];
		$pro_price =$row_cat_pro['product_price'];
		$proprice_desc =$row_cat_pro ['productprice_desc']; 
		$pro_units = $row_cat_pro ['product_units'];
		$pro_image =$row_cat_pro['product_image'];
		$pro_keywords=$row_cat_pro['product_keywords'];
		$pro_location =$row_cat_pro['product_location'];
		$product_quantity = $row_cat_pro['product_qty'];

		 	echo "
  	 		<div id='single_product' style='text-align:center;float: left;margin-bottom: 2px; margin-left: 4px'>
		 		<h3>$pro_title</h3>
		 		<img src='farmer/product_images/$pro_image' width='140' height='140' />
		 		<p><b>Ksh. $pro_price/$pro_units </b></p> 
		 		<p><b>Available stock  $product_quantity </b></p>
		 		<a href='details.php?pro_id=$pro_id' style='float:left;'>Details </a> 
	 			<a href='marketplace.php?add_cart= $pro_id'><button style= 'float:right'> Add to Cart </button></a>
		 	</div>
		 	" ;
		 $i++;
	}
}
}
}

?>