<?php 
include ("includes/db.php");
    if (isset($_GET['edit_pro'])) {
	    	$get_id = $_GET['edit_pro']; 
	    	$get_pro = "SELECT * FROM products WHERE product_id ='$get_id'";
			$run_pro = mysqli_query($con, $get_pro);
			$i = 0;
		    $row_pro = mysqli_fetch_array($run_pro); 
			$pro_id = $row_pro['product_id'];
			$pro_title = $row_pro ['product_title'];
			$pro_cat = $row_pro ['product_cat'];
			$pro_image = $row_pro ['product_image'];
			$pro_price = $row_pro ['product_price'];
			//$farmer_name = $row_pro ['farmer_name'];
			//$farmer_contact = $row_pro ['farmer_contact'];
			$pro_location = $row_pro ['product_location'];
			$pro_desc = $row_pro['product_desc']; 
			$pro_keywords = $row_pro['product_keywords'];


			$get_cat = "SELECT * FROM vegetable_categories where cat_id ='$pro_cat'";

			$run_cat = mysqli_query($con,$get_cat);


			$row_cat = mysqli_fetch_array ($run_cat);

			$category_title = $row_cat['cat_title'];


			$get_location = "SELECT * FROM locations where location_id ='$pro_location'";

			$run_location = mysqli_query($con,$get_location);


			$row_location = mysqli_fetch_array ($run_location);

			$location_title = $row_location['location_title'];


			$i++ ; 
    	}
    	if (isset($_POST['update_product'])) {
					$update_id = $pro_id;
					$product_title= $_POST['product_title'];
					$product_cat= $_POST['product_cat'];
					$product_price= $_POST['product_price'];
					$product_desc= $_POST['product_desc'];
					//$farmer_contact= $_POST['farmer_contact'];
					//$farmer_name = $_POST['farmer_name'];
					$product_location= $_POST['product_location'];
					$product_keywords= $_POST['product_keywords'];


					//getting image   from field  
					$product_image = $_FILES['product_image']['name'];
					$product_image_temp = $_FILES['product_image']['tmp_name'];
					if(move_uploaded_file($product_image_temp, "product_images/".$product_image))
					{
				   echo  $update_product =" UPDATE products SET product_cat='$product_cat',
						product_title='$product_title',
						product_price='$product_price',
						product_desc='$product_desc',
						product_image='$product_image',
						product_keywords='$product_keywords',
						
						product_location='product_location' WHERE product_id='$update_id'"; 
						//$run_product= mysqli_query($con, $update_product) or die(mysqli_error($con));
	  					  if($run_product) {
	  					  	echo "<script>alert('Product Has Been Updated!')</script>";
	   					 	//echo "<script>window.open('index.php?view_products.php','_self')</script"; 
  					  }
  					  else{
      				  	mysqli_error($con);
						}
					}
			}

	?>
<!DOCTYPE >
<html>
	<head>
		<title>Update Product </title>
	</head>
	<body bgcolor="skyblue">
		<form action="" method="post" enctype="multipart/form-data">
		<table align="center" width="750" border="2" bgcolor="green">
        <tr align="center">
			<td colspan="8"><h2>Edit and Update Product</h2></td>
		</tr>
		<tr>
			<td align="right"><b>Product Title :</b></td>
			<td><input type="text" name="product_title" size="60"  value="<?php echo $pro_title; ?>"/></td>
		</tr>
		<tr>
			<td align="right"><b>Vegetable Category :</b></td>
			<td>
				<select name="product_cat" >
					<option><?php echo $category_title; ?></option>
						
					<?php
						$get_cats = "SELECT * FROM vegetable_categories";
  						$run_cats = mysqli_query($con, $get_cats); 
  						while ($row_cats=mysqli_fetch_array($run_cats)) {
  						$cat_id = $row_cats ['cat_id'];
  						$cat_title = $row_cats ['cat_title']; 

  						echo "<option value='$cat_id'>$cat_title</option>"; 
  		
  					   }
					?>	
				</select>
			</td>
		</tr>
		<tr>
			<td align="right"><b>Product Image:</b></td>
			<td><input type="file" name="product_image"/><img src="product_images/<?php echo $pro_image; ?>" width="60" height="60"
		/></td>
		</tr>
		<tr>
			<td align="right"><b>Product Price:</b></td>
			<td><input type="number " name="product_price" value="<?php echo $pro_price; ?>"/></td>
		</tr>
		<tr>
			<td  align="right"><b>Product Description :</b></td>
			<td><textarea name="product_desc" cols="20" rows="10"><?php echo $pro_desc; ?></textarea></td>
		</tr>
	
	
		<tr>
			<td align="right"><b>County :</b></td>
				<td>
				<select name="product_location"  >
					<option><?php echo $location_title; ?></option>
					<?php
						$get_location = "SELECT * FROM locations ";
  						$run_location = mysqli_query($con, $get_location); 
  						while ($row_location=mysqli_fetch_array($run_location)) {
  						$location_id = $row_location ['location_id'];
  						$location_title = $row_location ['location_title']; 

  						echo "<option value='$location_id'>$location_title</option>"; 
  		
  					}
					?>	
				</select>
			</td>
		

		</tr>
		<tr>
			<td align="right"><b>Product Keywords :</b></td>
			<td><input type="text" name="product_keywords" size="50" value="<?php echo $pro_keywords; ?>" /></td>
		</tr>
		<tr align="center">
			<td colspan="8"><input type="submit" name="update_product" value="Update Product"/></td>
		</tr>
		</table>
		</form>
</body>
</html>
	
