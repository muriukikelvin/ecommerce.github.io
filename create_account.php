<?php
 session_start();
include ("function/functions.php"); 
include ("includes/db.php"); 
 if (isset($_POST['register'])) {
		 	$ip = getIp();
		 	$c_name = $_POST['c_name'];
		 	$c_email = $_POST['c_email'];
		 	$c_pass = $_POST['c_pass'];
		 	$c_county = $_POST['c_county'];
		 	$c_town = $_POST['c_town'];
		 	$c_contact = $_POST['c_contact'];
		 	$c_address = $_POST['c_address'];
		 	
		 	$q= " INSERT INTO customers (
		 	customer_ip,
		 	customer_name,
		 	customer_email,
		 	customer_pass,
		 	customer_county,
		 	customer_town,
		 	customer_contact,
		 	customer_address) 
		 	VALUES('$ip','$c_name','$c_email','$c_pass','$c_county','$c_town','$c_contact','$c_address') ";
		// $q = " INSERT INTO customers (customer_ip,customer_name,customer_email,customer_pass,customer_county,customer_town,customer_contact,customer_address ) values ('$ip','$c_name','$c_email','$c_pass','$c_county','$c_town','$c_contact','$c_address') ";
		    $run_c = mysqli_query ($con, $q ) ;//or die(myqli_error($con)); 

		    if($run_c){
		    	echo "alert('success')";
		    } 
		    else {
		    	echo "alert('err')";
		    }
		   	$sel_cart = "SELECT * FROM cart WHERE ip_add ='$ip'";
		   	$run_cart = mysqli_query ($con,$sel_cart);
		   	$check_cart = mysqli_num_rows ($run_cart);
		   		if ($check_cart==0){
		   			$_SESSION['customer_email']=$c_email;
		   				echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		   				 echo "<script>window.open('customer/my_account.php','_self')</script>";
		   		}
		   		else {
              $_SESSION['customer_email']=$c_email;
		   			echo "<script>alert('Account has been created successfully, Thanks!')</script>";
		   	        echo "<script>window.open('checkout.php','_self')</script>";
		   		}
		 }




?>