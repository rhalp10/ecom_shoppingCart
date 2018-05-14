<?php 
include('../db.php');
if (isset($_POST['account_add'])) {
	 $fullname = $_POST['fullname'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $address = $_POST['address'];
	 $password = $_POST['password'];
	 $level = $_POST['level'];
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
if (isset($_POST['account_edit'])) {
	$id = $_REQUEST['id'];
	 $fullname = $_POST['fullname'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $address = $_POST['address'];
	 $password = $_POST['password'];
	 $level = $_POST['level'];
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
if (isset($_POST['account_delete'])) {

	$id = $_REQUEST['id'];
	$sql = "DELETE FROM `user_account` WHERE `user_account`.`user_ID` = $id";

	if ($conn->query($sql) === TRUE) {
	   echo "<script>alert('Succesfully Delete!');
			window.location='account';
		</script>";
	} else {
		echo "<script>alert('Error deleting record: ".$conn->error."');
			window.location='account';
		</script>";
	}
	$conn->close();
	
}
if (isset($_POST['product_add'])) {
	 // $name = $_FILES['img']['name'];
	 // $type = $_FILES['img']['type'];
	 $imahe = addslashes(file_get_contents($_FILES['imahe']['tmp_name']));
	 $prod_Name = $_POST['prod_Name'];
	 $descr = $_POST['descr'];
	 $prod_Price = $_POST['prod_Price'];
	 $prod_Qnty = $_POST['prod_Qnty'];
	 $category = $_POST['category'];


	 $sql = "INSERT INTO `products` (`prod_ID`, `prod_Img`, `prod_Name`, `prod_Description`, `prod_Price`, `prod_Qnty`, `prod_date`, `cat_ID`) VALUES (NULL, '$imahe', '$prod_Name', '$descr', '$prod_Price', '$prod_Qnty', CURRENT_TIMESTAMP, '$category');";
	if ($conn->query($sql) === TRUE) {
	   echo "<script>alert('Succesfully Added New Product!');
		window.location='product';
	 	</script>";
	} else {
	 	echo "<script>alert('Error deleting record: ".$conn->error."');
	 		window.location='product';
	 	</script>";
	}
	$conn->close();
}
if (isset($_POST['product_edit'])) {

	 $id = $_REQUEST['id'];
	
	 $prod_Name = $_POST['prod_Name'];
	 $descr = $_POST['descr'];
	 $prod_Price = $_POST['prod_Price'];
	 $prod_Qnty = $_POST['prod_Qnty'];
	 $category = $_POST['category'];
	//if user update product  image 
	if($_FILES['imahe']['name'] == "") {

		$sql = "UPDATE `products` SET 
	   `prod_Name` = '$prod_Name',
	    `prod_Description` = '$descr',
	     `prod_Price` = '$prod_Price',
	      `prod_Qnty` = '$prod_Qnty',
	      `cat_ID` = '$category'
	       WHERE `products`.`prod_ID` = $id";
	}
	//if user update product and doesnt now change image 
	else{
		 $imahe = addslashes(file_get_contents($_FILES['imahe']['tmp_name']));
		 $sql = "UPDATE `products` SET  
	`prod_Img` = '$imahe',
	   `prod_Name` = '$prod_Name',
	    `prod_Description` = '$descr',
	     `prod_Price` = '$prod_Price',
	      `prod_Qnty` = '$prod_Qnty',
	      `cat_ID` = '$category'
	       WHERE `products`.`prod_ID` = $id";
	}
	//perform query
	if ($conn->query($sql) === TRUE) {
	   echo "<script>alert('Succesfully Update Product!');
		window.location='product';
	 	</script>";
	} else {
	 	echo "<script>alert('Error Update record: ".$conn->error."');
	 		window.location='product';
	 	</script>";
	}
	
	
	$conn->close();
}
if (isset($_POST['product_delete'])) {
	$id = $_REQUEST['id'];
	$sql = "DELETE FROM `products` WHERE `products`.`prod_ID`  = $id";

	if ($conn->query($sql) === TRUE) {
	   echo "<script>alert('Succesfully Delete!');
			window.location='product';
		</script>";
	} else {
		echo "<script>alert('Error deleting record: ".$conn->error."');
			window.location='product';
		</script>";
	}
	$conn->close();
}
if (isset($_POST['categories_add'])) {
	$category_name = $_POST['category_name'];
	$sql = "SELECT * FROM `category` WHERE cat_Name ='$category_name'";
	$result = $conn->query($sql);
  		if ($result->num_rows > 0)
  		{
  			echo "<script>alert('Category Name Already Used!');
					window.location='categories';
				</script>";
  		}
  		else{
		$sql = "INSERT INTO `category` (`cat_ID`, `cat_Name`) VALUES (NULL, '$category_name');";
		$result = $conn->query($sql);
		echo "<script>alert('Category Name Succesfully Added!');
					window.location='categories';
				</script>";
  		}
	$conn->close();
}
if (isset($_POST['categories_edit'])) {
	$id = $_REQUEST['id'];
	$category_name = $_POST['category_name'];
	$sql = "SELECT * FROM `category` WHERE cat_Name ='$category_name' ";
	$result = $conn->query($sql);
  		if ($result->num_rows > 0)
  		{
  			echo "<script>alert('Category Name Already Used!');
					window.location='categories';
				</script>";
  		}
  		else{

		$sql = "UPDATE `category` SET `cat_Name` = '$category_name' WHERE `category`.`cat_ID` = $id";
		$result = $conn->query($sql);
		echo "<script>alert('Category Name Succesfully Edited!');
					window.location='categories';
				</script>";
  		}
	$conn->close();
	
}
if (isset($_POST['categories_delete'])) {
	$id = $_REQUEST['id'];
	$sql = "DELETE FROM `category` WHERE `category`.`cat_ID` = $id";
	if ($conn->query($sql) === TRUE) {
	   echo "<script>alert('Succesfully Delete!');
			window.location='categories';
		</script>";
	} else {
		echo "<script>alert('Error deleting record: ".$conn->error."');
			window.location='categories';
		</script>";
	}
	$conn->close();
}

if (isset($_POST['profile_edit'])) {
	$id = $_REQUEST['id'];
	 $fullname = $_POST['fullname'];
	 $email = $_POST['email'];
	 $phone = $_POST['phone'];
	 $address = $_POST['address'];
	 $password = $_POST['password'];
	 $confirm = $_POST['confirm'];

	 if ($password  == $confirm) {
		$sql = "SELECT * FROM `user_account` WHERE user_Email = '$email' AND user_password = '$password'";
  		$result = $conn->query($sql);
  		if ($result->num_rows > 0)
  		{
  			$sql = "UPDATE `user_account` SET `user_Name` = '$fullname',`user_Email` = '$email',`user_Address` = '$address',`user_Phone` = '$phone',`user_password` = '$confirm' WHERE `user_account`.`user_ID` = '$id';";
		if ($conn->query($sql) === TRUE) {
			   echo "<script>alert('Succesfully Added!');
					window.location='profile';
				</script>";
			} else {
				echo "<script>alert('Error Added record: ".$conn->error."');
					window.location='profile';
				</script>";
			}
  		}
  		else{
  			
  			$sql = "SELECT * FROM `user_account` WHERE user_Email = '$email'";
	  		$result = $conn->query($sql);
	  		if ($result->num_rows > 0){

  			echo "<script>alert('Email Already Used!');
					window.location='profile';
				</script>";
	  		}
	  		else{
	  			$sql = "UPDATE `user_account` SET `user_Name` = '$fullname',`user_Email` = '$email',`user_Address` = '$address',`user_Phone` = '$phone',`user_password` = '$confirm' WHERE `user_account`.`user_ID` = '$id';";
		if ($conn->query($sql) === TRUE) {
			   echo "<script>alert('Succesfully Added!');
					window.location='profile';
				</script>";
			} else {
				echo "<script>alert('Error Added record: ".$conn->error."');
					window.location='profile';
				</script>";
			}

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