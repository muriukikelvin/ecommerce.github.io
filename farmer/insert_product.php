<!DOCTYPE >
<html>
<?php 
include ("includes/db.php");
session_start();
?>
	<head>
		<title> Inserting Product </title>
		<!--<link href="css/menu_topexpand.css" rel="stylesheet" type="text/css" media="all" />-->
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	    <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
	    <link href="css/farmer.css" rel="stylesheet" type="text/css" media="all" />
	</head>
	<body>
	<!--<nav class="show-menu">
	<div class="top-nav menu-wrap">
		 <div class="icon-list">
			<ul id="menu">
				<li><a href="index.php"><i class="glyphicon glyphicon-home"></i><span>Home</span></a></li>
				<li><a href="crop_information.php"><i class="glyphicon glyphicon-info-sign"></i><span>Crop Information</span></a></li>				
             </ul>
		  </div>
    </div>
</nav>-->
    <div id="login1" >
	<form action="insert_product.php" method="post" enctype="multipart/form-data" >
       <div class="header1">
			<label><h2>Post product on the Site</h2></label>
		</div>
			<div class="input-group3"><label>Product Title </label>
			<input type="text" name="product_title" size="60" required />
			</div>
			<div class="input-group3"><label>Vegetable Category</label>
				<select name="product_cat" required>
					<option>Select a Vegetable Category</option>	
					<?php
						$get_cats = "SELECT * FROM vegetable_categories ORDER BY cat_title ";
  						$run_cats = mysqli_query($con, $get_cats); 
  						while ($row_cats=mysqli_fetch_array($run_cats)) {
  						$cat_id = $row_cats ['cat_id'];
  						$cat_title = $row_cats ['cat_title']; 
  						echo "<option value='$cat_id'>$cat_title</option>"; 
  		
  					}
					?>	
				</select>
		    </div>
			<div class="input-group3">
			<label>Product Image</label>
			<input type="file" name="product_image" required />
			</div>
		
			<div class="input-group3">
			<label>Product Price</label>
			<input type="number" name="product_price" required/>
			</div>
			<div class="input-group3">
			<label>Price Description</label>
			<input type="text" name="productprice_desc" placeholder=" e.g Transport inclusive " required/>
			</div>
			<div class="input-group3">
			<label>Units</label>
			<input type="text" name="product_units" placeholder=" e.g per bag or per kg " required/>
			</div>
			<div class="input-group3">
			<label>Product Quantity</label>
			<input type="number" name="product_quantity" required/>
			</div>
		   
			
			<div class="input-group3">
			<label>Product Description</label>
			<textarea name="product_desc" cols="80" rows="5" ></textarea>
			</div>
	
			<div class="input-group3"><label>County</label>
				<select name="product_location" required >
					<option>Select your County</option>
					<?php
						$get_location = "SELECT * FROM locations ORDER BY location_title ";
  						$run_location = mysqli_query($con, $get_location); 
  						while ($row_location=mysqli_fetch_array($run_location)) {
  						$location_id = $row_location ['location_id'];
  						$location_title = $row_location ['location_title']; 

  						echo "<option value='$location_id'>$location_title</option>"; 
  		
  					}
					?>	
				</select>
			</div>

			<div class="input-group3">
		    <label>Point of Collection</label>
			<input type="text" name="point_colle" required/>
			</div>

		 <div class="input-group3">
			<label>Product Keywords</label>
			<input type="text" name="product_keywords" size="50"  />
			</div>
	     <div class="input-group3">
		    <button type="submit" class="btn" name="insert_post">Insert Product</button>
		</div>
		</form>
		</div>
</body>
</html>
	<?php 
	if (isset($_POST['insert_post'])) {
			$product_title= $_POST['product_title'];
			$product_cat= $_POST['product_cat'];
			$product_price= $_POST['product_price'];
			$productprice_desc = $_POST ['productprice_desc'];
			$product_unit = $_POST ['product_units'];
			$product_quantity= $_POST['product_quantity'];
			$point_colle = $_POST ['point_colle'];
			$product_desc= $_POST['product_desc'];
			$product_location= $_POST['product_location'];
			$product_keywords= $_POST['product_keywords'];
			$farmer_id = $_SESSION['user_id']; 
			//getting image   from field  
			$product_image = $_FILES['product_image']['name'];
			$product_image_temp = $_FILES ['product_image']['tmp_name'];
			if(move_uploaded_file($product_image_temp,"../farmer/product_images/".$product_image))
			{
		 echo $insert_product = " INSERT INTO products VALUES (NULL,'$product_cat','$product_title','$product_price','$productprice_desc','$product_unit','$product_quantity','$point_colle','$product_desc','$product_image','$product_keywords','$product_location','$farmer_id')"; 
				$insert_pro = mysqli_query($con, $insert_product) or die(mysqli_error($con));
					  if($insert_pro) {
					  	//echo "<script>alert('Product Has Been Sucessfully Posted!')</script>";
					echo "<script>window.open('faccount.php?view_products')</script>"; 
				  }
				  else{
				  	mysqli_error($con);
				}
			}
		}
			
?>