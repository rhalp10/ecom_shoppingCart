<?php
require_once('db.php');
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($conn,"SELECT * FROM `user_account` WHERE user_Email ='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['user_Email'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: ../index.php'); // Redirecting To Home Page
}
?>