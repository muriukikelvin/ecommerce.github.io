<br> 
<h2 style="text-align:center; color:blue;">Do You really want DELETE your acount?</h2>
<form action="" method="post">
<br>
<input type="submit" name="yes" value="Yes"/>
<input type="submit" name="no" value="No ">
</form> 


<?php 
include("includes/db.php");
		$user = $_SESSION['customer_email'];
		    if (isset($_POST['yes'])) {
			$delete_customer = " DELETE FROM customers WHERE customer_email='$user'";
				$run_customer = mysqli_query($con, $delete_customer);
			echo "<script>alert('Your account has been deleted')</script>";	
			echo "<script>window.open('../marketplace.php','_self')</script>";
			}
				if (isset($_POST['no'])) {
			echo "<script>alert('Not deleted')</script>";	
			echo "<script>window.open('my_account.php','_self')</script>";
	}
?>