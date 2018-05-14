<?php 
include('db.php');
session_start();
if (isset($_GET['minus_product'])) {

	$id = $_GET['minus_product'];
	if (isset($_SESSION['user_ID'])) {
		$sql = "SELECT * FROM `order_detail` WHERE or_ID =  $id;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		       $or_Qnty = $row['or_Qnty'];
		    }
		    echo $or_Qnty = $or_Qnty - 1;
		    if ($or_Qnty == 0) {
		    	$sql = "DELETE FROM `order_detail` WHERE `order_detail`.`or_ID` = $id";
		    	$result = $conn->query($sql);
		    	 echo "<script>
		    	window.close()
				</script>";
		    }
		    else{
		    	$sql = "UPDATE `order_detail` SET `or_Qnty` = '$or_Qnty' WHERE `order_detail`.`or_ID` = $id;";
		    	$result = $conn->query($sql);
		    	  echo "<script>
		    	window.close()
				</script>";

		    }
		}
	}
	else{
		
		$sql = "SELECT * FROM `temp_order_detail` WHERE or_ID =  $id;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		       $or_Qnty = $row['or_Qnty'];
		    }
		    echo $or_Qnty = $or_Qnty - 1;
		    if ($or_Qnty == 0) {
		    	$sql = "DELETE FROM `temp_order_detail` WHERE `temp_order_detail`.`or_ID` = $id";
		    	$result = $conn->query($sql);
		    	 echo "<script>
		    	window.close()
				</script>";
		    }
		    else{
		    	$sql = "UPDATE `temp_order_detail` SET `or_Qnty` = '$or_Qnty' WHERE `temp_order_detail`.`or_ID` = $id;";
		    	$result = $conn->query($sql);
		    	  echo "<script>
		    	window.close()
				</script>";

		    }
		}

		
	}

}

if (isset($_GET['plus_product'])) {
	$id = $_GET['plus_product'];
	if (isset($_SESSION['user_ID'])) {
		$sql = "SELECT * FROM `order_detail` WHERE or_ID =  $id;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		       $or_Qnty = $row['or_Qnty'];
		    }
		     $or_Qnty = $or_Qnty + 1;
		   
		    
		    	$sql = "UPDATE `order_detail` SET `or_Qnty` = '$or_Qnty' WHERE `order_detail`.`or_ID` = $id;";
		    	$result = $conn->query($sql);
		    	  echo "<script>
		    	window.close()
				</script>";

		    
		}
	}
	else{
		$sql = "SELECT * FROM `temp_order_detail` WHERE or_ID =  $id;";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		       $or_Qnty = $row['or_Qnty'];
		    }
		     $or_Qnty = $or_Qnty + 1;
		   
		    
		    	$sql = "UPDATE `temp_order_detail` SET `or_Qnty` = '$or_Qnty' WHERE `temp_order_detail`.`or_ID` = $id;";
		    	$result = $conn->query($sql);
		    	  echo "<script>
		    	window.close()
				</script>";

		    
		}


	}

}
if (isset($_GET['delete_ord_i'])) {
	$id = $_GET['delete_ord_i'];

	if (isset($_SESSION['user_ID'])) {
		$sql = "DELETE FROM `order_detail` WHERE `order_detail`.`or_ID` = '$id'";
		$result = $conn->query($sql);
		 echo "<script>
		    	window.close()
				</script>";
	}
	else{
		$sql = "DELETE FROM `temp_order_detail` WHERE `temp_order_detail`.`or_ID` = '$id'";
		$result = $conn->query($sql);
		 echo "<script>
		    	window.close()
				</script>";
	}
}

if (isset($_POST['add_cart'])) {
	if (isset($_SESSION['user_ID'])) {
	$id = $_REQUEST['id'];
	$cus_ID = $_SESSION['user_ID'];
	$quantity = $_POST['quantity'];
	$priceee = $_POST['priceee'];
	$sql = "SELECT * FROM `order` WHERE cus_ID = $cus_ID AND status = 1";
	$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$serial_ID = $row['serial_ID'];
		    $sql = "INSERT INTO `order_detail` (`serial_ID`, `or_ID`, `prod_ID`, `or_Qnty`, `or_Price`) VALUES ('$serial_ID', NULL, '$id', '$quantity', '$priceee');";
		    $conn->query($sql);
		    echo "<script>alert('Succesfully Add To Cart');
		    	window.location='index';
				</script>";

		    }
		} 
		else {
			$sql = "INSERT INTO `order` (`serial_ID`, `or_Date`, `cus_ID`, `status`) VALUES (NULL, CURRENT_TIMESTAMP, '$cus_ID ', '1');";
			if ($conn->query($sql) === TRUE) {
			    $last_id = $conn->insert_id;
			   $sql = "INSERT INTO `order_detail` (`serial_ID`, `or_ID`, `prod_ID`, `or_Qnty`, `or_Price`) VALUES ('$last_id', NULL, '$id', '$quantity', '$priceee');";
			   $conn->query($sql);
			    echo "<script>alert('Succesfully Add To Cart');
		    	window.location='index';
				</script>";
			} 
			else {
			  echo "<script>alert('Error');
			  window.location='index';
				</script>";
			}

		}
	}
	else{
		$id = $_REQUEST['id'];
		$quantity = $_POST['quantity'];
		$priceee = $_POST['priceee'];
		$ip = $_SESSION['user_IP'];
		$sql = "SELECT * FROM `temp_order` WHERE IP = '::1' AND status = 1";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
			$serial_ID = $row['serial_ID'];
		    $sql = "INSERT INTO `temp_order_detail` (`serial_ID`, `or_ID`, `prod_ID`, `or_Qnty`, `or_Price`) VALUES ('$serial_ID', NULL, '$id', '$quantity', '$priceee');";
		    $conn->query($sql);
		    echo "<script>alert('Succesfully Add To Cart');
		    	window.location='index';
				</script>";
			}

		}
		
		}
	}

	

if (isset($_SESSION['user_ID'])) {
	# code...
}
else{
	if (isset($_POST['addCart'])) {
	echo $id = $_REQUEST['id'];
	}
}
if (isset($_POST['register'])) {
	 $fullname = $_POST['fullname'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $address = $_POST['address'];
	 $password = $_POST['password'];
	 $level = '1';
	 $confirm = $_POST['confirm'];
	if ($password  == $confirm) {
		$sql = "SELECT * FROM `user_account` WHERE user_Email = '$email'";
  		$result = $conn->query($sql);
  		if ($result->num_rows > 0)
  		{
  			echo "<script>alert('Email Already Used!');
					window.location='account';
				</script>";
  		}
  		else{
  			
		$sql = "INSERT INTO `user_account` (`user_ID`, `user_Name`, `user_Email`, `user_Address`, `user_Phone`, `user_password`, `user_level`) VALUES (NULL, '$fullname', '$email', '$address', '$phone', '$confirm', '$level');";
		if ($conn->query($sql) === TRUE) {
			   echo "<script>alert('Succesfully Register!');
					window.location='index';
				</script>";
			} else {
				echo "<script>alert('Error Added record: ".$conn->error."');
					window.location='index';
				</script>";
			}
  		}
	}
	else{
		echo "<script>alert('Password Not Match');
					window.location='index';
				</script>";
	}
	$conn->close();

}
if (isset($_POST['edit-profile'])) {
	$id = $_REQUEST['id'];
	 $fullname = $_POST['fullname'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $address = $_POST['address'];
	 $password = $_POST['password'];
	 $confirm = $_POST['confirm'];
	if ($password  == $confirm) {
		$sql = "SELECT * FROM `user_account` WHERE user_Email = '$email'";
  		$result = $conn->query($sql);
  		if ($result->num_rows > 0)
  		{
  			echo "<script>alert('Email Already Used!');
					window.location='account';
				</script>";
  		}
  		else{
  			
		$sql = "UPDATE `user_account` SET `user_Name` = '$fullname',`user_Email` = '$email',`user_Address` = '$address',`user_Phone` = '$phone',`user_password` = '$confirm',`user_level` = '$level' WHERE `user_account`.`user_ID` = '$id';";
		if ($conn->query($sql) === TRUE) {
			   echo "<script>alert('Succesfully Added!');
					window.location='account';
				</script>";
			} else {
				echo "<script>alert('Error Added record: ".$conn->error."');
					window.location='account';
				</script>";
			}
  		}
	}
	else{
		echo "<script>alert('Password Not Match');
					window.location='account';
				</script>";
	}
	$conn->close();
}

?>