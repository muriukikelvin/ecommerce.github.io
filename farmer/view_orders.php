<?php 
session_start();

?>


<table width="900" class="table table-bordered table-hover table-striped" align="center" bgcolor="white">
<thead>
	<tr align="center" >
		<th colspan="10"><h2 style="padding-left: 60 px; " class="text-center">Your Order Details </h2></td>
	</tr>
	<tr align="center" bgcolor="skyblue">
		<th>Serial Number</th>
	     <th>Product(s)</th>
	     <th>Quantity</th>
	      <th>Image </th>
	      <th>Price (Kshs)</th>
	     <th>Invoice No.</th>
	     <th>Customer Name</th>
	       <!--<th>Customer Location</th>-->
	     <th>Contact</th>
		<th>Order Date</th>
	     

	</tr>
	</thead>
<?php include ("includes/db.php");
if (isset($_GET['view_orders'])) {
	 $get_id = $_GET['view_orders']; 

	 $id = $_SESSION['user_id'];
	$get_order = "SELECT * FROM orders where farmer_id='$id'";
	$run_order = mysqli_query($con, $get_order);
	$i = 0;
	  while  ($row_order = mysqli_fetch_array($run_order)){
		$order_id = $row_order ['order_id'];
		$cus_id = $row_order ['customer_id'];
		$farm_id = $row_order ['farmer_id'];
		$pro_id = $row_order  ['product_id'];
		$qty = $row_order ['qty'];
		$total = $row_order ['total_amount']; 
		$invoice_no = $row_order ['invoice_no'];
		$order_date = $row_order ['date_order'];
		
		$i++ ; 

		$get_pro = "SELECT * FROM products WHERE product_id ='$pro_id'";
		$run_pro = mysqli_query ($con, $get_pro);
		$row_pro = mysqli_fetch_array ($run_pro);
		$pro_image = $row_pro['product_image'];
		$pro_title = $row_pro ['product_title'];
		$pro_price =$row_pro ['product_price']; 

		$get_cus = "SELECT * FROM customers";
		$run_cus = mysqli_query ($con, $get_cus);
		$row_cus = mysqli_fetch_array ($run_cus);
		$cus_name = $row_cus['customer_name'];
		$cus_location = $row_cus ['customer_county'];

		//$get_location = "SELECT * FROM locations  WHERE location_id='$pro_location'"; 
		//$run_loc = mysqli_query ($con, $get_location) or die(mysqli_error($con));
		//$row= mysqli_fetch_array($run_loc);
		//$location  =$row['location_title'];
		
		$cus_contact =$row_cus['customer_contact'];
		$totallPrice = $qty *  $pro_price;
		 
	?>
	<tbody>
	<tr align="center">
		<td><?php echo $i ; ?></td>
		<td><?php echo $pro_title; ?></td>
		<td><?php echo $qty ; ?></td>
		<td><img src="../farmer/product_images/<?php echo $pro_image; ?>" width="50" height="50" /></td>
		<td><?php echo 	$totallPrice ?></td>
		<td><?php  echo $invoice_no; ?></td>
		<td><?php echo $cus_name; ?></td>
		
		<td><?php echo $cus_contact; ?></td>
		<td><?php echo $order_date; ?></td>
	</tr>
	</tbody>
       <?php } };  ?>
</table>