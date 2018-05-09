<?php 
include('login_action.php'); // Includes Login Script

if(isset($_SESSION['login_user']))
{           
             $email=isset($_SESSION['login_user']);// passing the session user to new user variable
              $user_ID=isset($_SESSION['user_ID']);
              $user_level=isset($_SESSION['user_level']);

            // $result =mysqli_query($conn,"SELECT * FROM `user_account` WHERE user_Email = '$email'");
    
            // $rows = mysqli_fetch_array($result);
            if ($user_level == '1') //checking if acclevel is equal to 0
                {   
                    
                }
                elseif ($user_level == '2')  //checking if acclevel is equal to 1
                {
                   
                    header("location: admin/index.php"); // retain to student Level
                    
                } 
                else
                {

                }
            
      
          
                
    
            
}

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
function getUserIP(){
  switch (true) {
    case (!empty($_SERVER['HTTP_X_REAL_IP'])): return $_SERVER['HTTP_X_REAL_IP'];
    case (!empty($_SERVER['HTTP_CLIENT_IP'])): return $_SERVER['HTTP_CLIENT_IP'];
    case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])): return $_SERVER['HTTP_X_FORWARDED_FOR'];
    default: return $_SERVER['REMOTE_ADDR'];
     
  }
}
$user_IP = getUserIP();
$_SESSION['user_IP'] = $user_IP;
if (isset($_SESSION['user_ID'])) {

}
else
{
  $sql = "SELECT * FROM `temp_order` WHERE IP = '$user_IP'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {

      date_default_timezone_set("Asia/Hong_Kong");
      //getting latest date base on server PC
      $t=time();
      while($row = $result->fetch_assoc()) 
      {

        $temp_or_Date = $row['or_Date'];
        $temp_serial_ID = $row['serial_ID'];
        $create_date = date( "Y-m-d",strtotime($temp_or_Date));
        
        $dateNow = date("Y-m-d",$t);
        if ($dateNow > $create_date) 
        {
          $sql = "SELECT * FROM `temp_order` WHERE IP ='$user_IP'";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
              $last_id = $row['serial_ID'];
          }
          
          $sql = "DELETE FROM `temp_order` WHERE `IP` = '$user_IP'";
          $result = $conn->query($sql);
          $sql = "DELETE FROM `temp_order_detail` WHERE `serial_ID` = '$last_id'";
          $result = $conn->query($sql);
           
        }

      }
    }
    else
    {
      $sql = "INSERT INTO `temp_order` (`serial_ID`, `or_Date`, `IP`, `status`) VALUES (NULL, CURRENT_TIMESTAMP, '$user_IP', '1');";
      $result = $conn->query($sql);

    }
  }

 


 if (isset($_SESSION['item_cart_count'])) {
  $item_cart_count = $_SESSION['item_cart_count'];
 }
  if (isset( $_SESSION['item_total_sum'])) {
  $item_total_sum = $_SESSION['item_total_sum'];
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact</title>
  <meta charset="utf-8">
  <link href="img/favicon.png" rel="icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
  <script src="bootstrap-3.3.7/dist/js/jquery-1.12.4.min.js"></script>
  <script src="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
  <script src="custom.js"></script>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
  </style>
</head>
<body>

<div class="jumbotron">
  <div class="container text-center">
    <h1>Basketball Wear and Accessories</h1>  
  </div>
</div>

<?php 
include('navigation_bar.php');
?>

<div class="container">
  <div id="content">
        <h1>Contact Us</h1>
        <h2>Our Location</h2>
        <div class="contact-info">
          <div class="content">
            <div class="left">
              <h4><b>Address:</b></h4>
              <p>Cavite State University Indang</p>
            </div>
            <div class="right">
              <h4><b>Telephone:</b></h4>
              +91 9898989898<br>
              +91 8787878787 <br>
            </div>
          </div>
        </div>
        <h2>Contact Form</h2>
        <div class="content"> <b>First Name:</b><br>
          <input class="large-field" type="text" value="test" name="name">
          <br>
          <br>
          <b>E-Mail Address:</b><br>
          <input class="large-field" type="text" value="test@test.com" name="email">
          <br>
          <br>
          <b>Enquiry:</b><br>
          <textarea style="width: 98%;" rows="10" cols="40" name="enquiry"></textarea>
        </div>
        <div class="buttons">
          <div class="right">
            <input type="submit" class="button" value="Continue">
          </div>
        </div>
      </div>
</div>

<br><br>

<?php 
  include('footer.php');
  include('modals.php');
  include('custom_script.php');
?>
</body>



</html>
