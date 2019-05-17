<?php
	 session_start();
	// ob_start();
?>
<table width="900" class="table table-bordered table-hover table-striped" align="center" bgcolor="white">
	<thead>
		<tr align="center" >
			<th colspan="10"><h2 style="padding-left: 60 px; " class="text-center">View All Products Here </h2></th>
		</tr>
		<tr align="center" bgcolor="skyblue" style="font-size:90%;">
			<th>Serial</th>
		     <th >Title</th>
		   <th >Image</th>
		     <th >Price (Ksh.)</th>
		      <th > Name</th>
		     
		    <!-- <?php //if($_SESSION['user_id']) { ?>
		     <?php //} ?>-->
		    
		    <th> Quantity</th>
			<th> Contact</th>
		    <th> Location</th>
		     <th>Edit </th>
		    <th>Delete </th>

		</tr>
	</thead>
	
<?php 
	//$id=$_SESSION['user_id'];
	include ("includes/db.php");
	//session_start();
	 $id=$_SESSION['user_id'];
	 $role=$_SESSION['user_role'];
		
	//$get_pro ="SELECT * FROM products JOIN users ON users.role=products.farmer_id WHERE users.user_id='$id'";

	 $get_pro = "SELECT * FROM products where farmer_id='$id'"; 
	$run_pro = mysqli_query($con, $get_pro);
	$i = 0;
	while ($row_pro = mysqli_fetch_array($run_pro)){
		$pro_id = $row_pro['product_id'];
		$pro_title = $row_pro ['product_title'];
		$pro_image = $row_pro ['product_image'];
		$pro_price = $row_pro ['product_price'];
		$pro_location = $row_pro ['product_location'];
		$pro_quantity = $row_pro ['product_qty'];
		$farmer_id = $row_pro ['farmer_id'];

        $get_location = "SELECT * FROM locations  WHERE location_id='$pro_location'"; 
		$run_loc = mysqli_query ($con, $get_location) or die(mysqli_error($con));
		$row= mysqli_fetch_array($run_loc);
		$location  =$row['location_title'];

		$get_farmer = "SELECT * FROM users WHERE user_id='$farmer_id'";
		$run_farm = mysqli_query($con, $get_farmer);

		while($row= mysqli_fetch_array($run_farm)){
			$name = $row['username'];
			$contact = $row ['contact'];	
		}
		//echo $name;
		//echo $contact;
		//if($_SESSION['user_id']){
		
	//}

		$i++ ; 
	?>
	<tbody>
		<tr align="center">

			<td><?php echo $i ; ?></td>
			<td><?php echo $pro_title ; ?></td>
			<td><img src="../farmer/product_images/<?php echo $pro_image; ?>" width="40" height="40" /></td>
			<td><?php echo $pro_price ;  ?></td>
			<td><?php echo  $name; ?></td>
			<td><?php echo $pro_quantity ; ?></td>
			<td><?php echo $contact; ?></td>
			<td><?php echo $location; ?></td>
			<td><a href="faccount.php?edit_pro=<?php echo $pro_id; ?>"><i class="fa fa-edit fa-fw"></i></a></td>
			<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id; ?>"><i class="fa fa-trash fa-fw"></i></a></td>
		</tr>
	</tbody>
       <?php };  ?>
</table>