<?php 
include('db.php');
session_start();
if (isset($_POST['minus_product'])) {

	 echo "<script>alert('-');
		    	
				</script>";
}
if (isset($_POST['plus_product'])) {

	 echo "<script>alert('+');
		    	
				</script>";
}

if (isset($_POST['add_cart'])) {
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