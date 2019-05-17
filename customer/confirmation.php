
<table width="900" class="table table-bordered table-hover table-striped" align="center" bgcolor="white" >	
	<thead>
	<tr align="center" >
		<th colspan="10"><h2 style="padding-left: 60 px;" class="text-center"><h2>Confirm All Your Details Here </h2></th>
	</tr>

	<tr align="center" bgcolor="skyblue" style="font-size:90%; height:45px; line-height: 45px; ">
	     <th>Name</th>
	     <th>Email</th>
	     <th>County</th>
	     <th>Town</th>
	     <th>Contact</th>
	     <th>Address</th>
	    <th>Edit</th>
	</tr>
   </thead>
<?php 
	include ("includes/db.php");
    $f_email = $_SESSION['customer_id'];

	$get_cus = "SELECT * FROM customers WHERE customer_id='$f_email'";
	$run_cus = mysqli_query($con, $get_cus);
	$i = 0;
	while ($row_cus = mysqli_fetch_array($run_cus)){
		$cus_id = $row_cus ['customer_id'];
		$cus_name = $row_cus ['customer_name'];
		$cus_email= $row_cus ['customer_email'];
		$cus_county = $row_cus ['customer_county'];
		$get_location = "SELECT * FROM locations  WHERE location_id='$cus_county'"; 
		$run_loc = mysqli_query ($con, $get_location) or die(mysqli_error($con));
		$row = mysqli_fetch_array($run_loc);
		$location = $row['location_title'];
		$cus_town = $row_cus ['customer_town'];
		$cus_contact = $row_cus ['customer_contact'];
		$cus_address = $row_cus ['customer_address'];
		$i++ ; 
		
	?>

	<tbody>
		<tr align="center">
			<td><?php echo $cus_name ; ?></td>
			<td><?php echo $cus_email ; ?></td>
			<td><?php echo $location; ?></td>
			<td><?php echo $cus_town ; ?></td>
			<td><?php echo $cus_contact ; ?></td>
			<td><?php echo $cus_address ; ?></td>
			<td><a href="customer/my_account.php?edit_account=<?php echo $cus_id; ?>"><i class="fa fa-edit fa-fw"></i></a></td>
		</tr>
	</tbody>
       <?php }  ?>
     
</table>
 
	 	<form action="" method="post" enctype="multipart/form-data"> 
	 	<div id="confirmm" style=" margin-left:500px; padding: 20px 18px 18px 20px; ">
		   <input type="submit" name="confirm" value="Confirm"/> 
               <?php
               if (isset($_POST['confirm'])) {
               	 
					global $con;
					$addorder="";
				    $getAll = "SELECT * FROM cart   "; 
				    $resp = mysqli_query($con,$getAll);
				    $totalPrice=0;

				     while ( $cart=mysqli_fetch_array($resp) ) {
				       	@$prodid = $cart['product_id'];
				        $qty = $cart['qty'];
				     $getprods = "SELECT * FROM products WHERE product_id='$prodid'";
			            $run_pro = mysqli_query($con,$getprods) ;
			            $row_pro=mysqli_fetch_array($run_pro);
				        $pro_title = $row_pro['product_title'];
				        $pro_cat =$row_pro['product_cat'];
			            $pro_price =$row_pro['product_price'];
			            $pro_image =$row_pro['product_image'];
			            $farmer_id =$row_pro['farmer_id'];

			            $totalPrice=$totalPrice + $pro_price ;


				        $invoice = rand(123456789,5);
				        $customer_id = $_SESSION['customer_id'];

				        //$deliverydate=date('Y-m-d H:i:s',time());
				        $dateordered=date('Y-m-d H:i:s',time());
			        {
						$addorder ="INSERT INTO orders  
										VALUES(NULL,'$customer_id','$farmer_id',
										'$prodid','$qty','$invoice','$totalPrice','$dateordered')"; 

				     $add_order = mysqli_query($con, $addorder)  or die(mysqli_error($con));
				    // $addstatus ="success";

				     $update = "UPDATE products set product_qty=product_qty-$qty where product_id='$prodid'";

				     $run_update = mysqli_query($con, $update)  or die(mysqli_error($con));

				     $delete_cart ="DELETE from cart where product_id=$prodid";
				     $run_delete = mysqli_query($con,  $delete_cart)  or die(mysqli_error($con));
				    
				   
					
			}
  			}

  			// if($addstatus=="success") {
					  	echo "<script>alert('Order has successfuly been placed!')</script>";
					   echo "<script>window.open('customer/my_account.php?view_orders')</script>"; 
				      //}
		}
				       
	?> 
