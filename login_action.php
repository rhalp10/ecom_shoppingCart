<?php
session_start(); // Starting Session
require_once('db.php');
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
		if (empty($_POST['email']) || empty($_POST['password'])) 
			{
				echo "<script>alert('email or Password is empty!	');
										window.location='index.php';
									</script>";
			
			}
		else
		{

			// Define $email and $password
			 $email=$_POST['email'];
			 $password=$_POST['password'];

			// To protect MySQL injection for Security purpose
			$email = stripslashes($email);
			$password = stripslashes($password);
			$email = mysqli_real_escape_string($conn,$email);
			$password = mysqli_real_escape_string($conn,$password);
			
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysqli_query($conn,"SELECT * FROM user_account WHERE user_password = '$password' AND user_Email='$email'");
			$rows = mysqli_fetch_array($query);

			

				if ($rows['user_level'] == '1') 
				{	

					$_SESSION['login_user']=$email; // Initializing Session
					$_SESSION['user_ID'] = $rows['user_ID'] ;
					$_SESSION['user_level'] = $rows['user_level'] ;
					$_SESSION['user_Name'] = $rows['user_Name'] ;
				} 
				elseif ($rows['user_level'] == '2') 
				{
					$_SESSION['login_user']=$email; // Initializing Session
					$_SESSION['user_ID'] = $rows['user_ID'] ;
					$_SESSION['user_level'] = $rows['user_level'] ;
					header("location: admin/index.php"); // student Level
					
				} 
				else 
				{
					echo "<script>alert('Access Denied!	');
										window.location='index.php';
									</script>";
				}
			mysqli_close($conn); // Closing Connection
		}
}
?>