<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Account Login</title>
<link href="image/favicon.png" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="clean modern and elegant corporate look eCommerce html template">
<meta name="author" content="">
<?php 
include ('global_css.php');
include ('global_js.php');
include ('global_Google_Fonts.php');
?>
</head>
<body>
<div class="wrapper-wide">
  <div class="main-wide">
     <?php 
    include ('global_header.php');
    ?>
    <div id="container">
      <!--Left Part-->
      <div id="column-left">
        <div class="box">
          <div class="box-heading">Account</div>
          <div class="box-content">
            <ul class="list-item">
              <li><a href="login">Login</a></li>
              <li><a href="register">Register</a></li>
              <li><a href="#">Forgotten Password</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Wish List</a></li>
              <li><a href="#">Order History</a></li>
              <li><a href="#">Downloads</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Transactions</a></li>
              <li><a href="#">Newsletter</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index">Home</a> » <a href="#">Account</a> » <a href="login">Login</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Account Login</h1>
        <div class="login-content">
          <div class="left">
            <h2>New Customer</h2>
            <div class="content">
              <p><b>Register Account</b></p>
              <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
              <a class="button" href="register">Continue</a></div>
          </div>
          <div class="right">
            <h2>Returning Customer</h2>
            <form enctype="multipart/form-data" method="post" action="Admin/index">
              <div class="content">
                <p>I am a returning customer</p>
                <b>E-Mail Address:</b><br>
                <input type="text" value="" name="email">
                <br>
                <br>
                <b>Password:</b><br>
                <input type="password" value="" name="password">
                <br>
                <a href="#">Forgotten Password</a><br>
                <br>
                <input type="submit" class="button" value="Login">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
<?php 
include('global_footer.php');
 ?>
</div>
</body>
</html>