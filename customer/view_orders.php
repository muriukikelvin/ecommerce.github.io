<table width="900" class="table table-bordered table-hover table-striped" align="center" bgcolor="white">
<thead>
  <tr align="center" >
    <th colspan="10"><h2 style="padding-left: 60 px; " class="text-center"> My Orders  </h2></th>
  </tr>
  <tr align="center" bgcolor="skyblue">
    <th>S.N</th>
       <th>Product(s)</th>
       <th>Quantity</th>
         <th> Location</th>
       <th>Invoice No.</th>
       <th>Price</th>
       <th>Farmer Name</th>
       <th>Farmer Contact</th>
       <th>Order Date</th>
       

  </tr>
  </thead>
<?php include ("includes/db.php");
$user = $_SESSION['customer_email'];
$cussid= "SELECT customer_id from customers where customer_email='$user'";
$run_user = mysqli_query($con, $cussid);
$row_user = mysqli_fetch_array($run_user);
$customer_id= $row_user['customer_id'];
   if (isset($_GET['view_orders'])) {
   $get_id = $_GET['view_orders']; 
  $get_order = "SELECT * FROM orders WHERE customer_id='$customer_id'";
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
    $pro_price = $row_pro ['product_price'];
    $pro_location = $row_pro ['product_location'];

    $get_cus = "SELECT * FROM customers WHERE customer_id ='$cus_id'";
    $run_cus = mysqli_query ($con, $get_cus);
    $row_cus = mysqli_fetch_array ($run_cus);
    $cus_name = $row_cus['customer_name'];
    $cus_contact = $row_cus['customer_contact'];

    $get_farmer = "SELECT * FROM users WHERE user_id ='$farm_id'";
    $run_farm = mysqli_query ($con, $get_farmer);
    $row_users = mysqli_fetch_array ($run_farm);
    $farm_name = $row_users['username'];
    $farm_id = $row_users ['national'];
    $farm_contact = $row_users['contact'];
      $totallPrice = $qty *  $pro_price;
       

    $get_location = "SELECT * FROM locations  WHERE location_id='$pro_location'"; 
    $run_loc = mysqli_query ($con, $get_location) or die(mysqli_error($con));
    $row= mysqli_fetch_array($run_loc);
    $location  =$row['location_title'];
  ?>
  <tbody>
  <tr align="center">
    <td><?php echo $i ; ?></td>
    <td><?php echo $pro_title ; ?></td>
    <td><?php echo $qty ; ?></td>
     <td><?php echo $location ; ?></td>
   
    
    <td><?php  echo $invoice_no; ?></td>
    <td><?php  echo $totallPrice; ?></td>
  
    <td><?php  echo $farm_name; ?></td>
    <td><?php  echo $farm_contact; ?></td>
    <td><?php echo $order_date; ?></td>
  </tr>
  </tbody>

       <?php } } else{
        echo "No orders";
        }  ?>
</table>