<?php 
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit-login'])) {
	
	echo "<script>alert('Login!');
										window.location='index.php';
									</script>";
}
?>