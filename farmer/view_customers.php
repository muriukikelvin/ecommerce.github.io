<?php
session_start();
?>
<table width="900" class="table table-bordered table-hover table-striped" align="center" bgcolor="white">	
	<thead>
	<tr align="center" >
		<th colspan="10"><h2 style="padding-left: 60 px;  " class="text-center"><h2>View Your Customers Here </h2></th>
	</tr>

	<tr align="center" bgcolor="skyblue" style="font-size:90%;">
			<th>Serial Number</th>
		     <th>Name</th>
		     <th>Email</th>
		     <th>County</th>
		     <th>Town</th>
		     <th>Contact</th>
		     <th>Image</th>
		     <th>Address</th>
		   

	</tr>
   </thead>
<?php 
	include ("includes/db.php");
	$id = $_SESSION['customer_id'];
	$get_cus = "SELECT * FROM customers ";
	$run_cus = mysqli_query($con,$get_cus);
	$i = 0;
	while ($row_cus = mysqli_fetch_array($run_cus)){
		$cus_id = $row_cus['customer_id'];
		$cus_name = $row_cus['customer_name'];
		$cus_email= $row_cus['customer_email'];
		$cus_county = $row_cus['customer_county'];
		$cus_town = $row_cus['customer_town'];
		$cus_contact = $row_cus['customer_contact'];
		$cus_image = $row_cus['customer_image'];
		$cus_address = $row_cus['customer_address'];
		$i++ ; 



		//$get_location = "SELECT * FROM locations where location_id ='$cus_location'";

			//$run_location = mysqli_query($con,$get_location);


			//$row_location = mysqli_fetch_array ($run_location);

			//$location_title = $row_location['customer_county'];

	//echo $cus_image;
	?>
	<tbody>
		<tr align="center">
			<td><?php echo $i ; ?></td>
			<td><?php echo $cus_name ; ?></td>
			<td><?php echo $cus_email ; ?></td>
			<td><?php echo $cus_county; ?></td>
			<td><?php echo $cus_town ; ?></td>
			<td><?php echo $cus_contact ; ?></td>
			<td><img src="../customer/customer_images/<?php echo $cus_image ?>" width="40" height="40"/></td>
			<td><?php echo $cus_address ; ?></td>
			
		</tr>
	<tbody>
       <?php };  ?>

</table>