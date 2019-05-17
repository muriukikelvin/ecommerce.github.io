<?php
include ("includes/db.php"); 
	if(isset($_GET['delete_pro'])){
		
		$delete_id = $_GET['delete_pro'];

		$delete_pro = "DELETE FROM products WHERE product_id ='$delete_id'"; 
        $run_delete = mysqli_query($con, $delete_pro);

        if ($run_delete) {
         	 "<script>alert('This product has been deleted!')</script>";
         	echo "<script>window.open('faccount.php?view_products','_self')</script>";
         } 

	}
?>