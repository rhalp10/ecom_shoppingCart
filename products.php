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
if (isset($_REQUEST['category'])) {
$cat = $_REQUEST['category'];
$filter_item = " WHERE prod.cat_ID = $cat";
       
}
else{
   $filter_item = "";
}

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
  $prod_data_traget = "modal_viewproduct";
  $prod_view ="view_product";

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
     $prod_data_traget = "modal_viewproduct1";
     $prod_view ="view_product1";
  }

 


 if (isset($_SESSION['item_cart_count'])) {
  $item_cart_count = $_SESSION['item_cart_count'];
 }
  if (isset( $_SESSION['item_total_sum'])) {
  $item_total_sum = $_SESSION['item_total_sum'];
 }

?>
<!-- 
/*******************************************************************************
* DEVELOPED BY:  Rhalp Darren R. Cabrera                                        *
* MAIL:          info@grmcuts.com / rhalpdarrencabrera@gmail.com                *
*******************************************************************************/ 
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Index</title>
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

<br>
<div class="container">  
<h1 style="background-color: white; padding: 5px; border-radius: 5px;  box-shadow: 5px 5px 5px grey; border: solid 1px; border-color: #337ab7;">LATEST PRODUCTS
  <?php 
  if (isset($_REQUEST['category'])) {
    $cat = $_REQUEST['category'];
    $sql  = "SELECT * FROM `category` WHERE cat_ID = $cat";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $cat_Name = $row['cat_Name'];
    echo "<p style='font-size: 25px;'>".$cat_Name ."</p>";
  }
  else{}
  ?>

</h1>  

  <div class="row">
    <?php 

$sql = "SELECT prod.prod_Img,prod.prod_Name,prod.prod_Description,prod.prod_Price,prod.prod_Qnty,prod.prod_date, x.or_Qnty_item,prod.prod_ID FROM `products`  prod
LEFT JOIN (SELECT sum(od.or_Qnty) or_Qnty_item,od.prod_ID FROM order_detail od Group by od.prod_ID)  x ON x.prod_ID = prod.prod_ID  $filter_item 
ORDER BY prod.`prod_date` 
DESC LIMIT 25";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
      // output data of each row
      $i = 0;
      while($row = $result->fetch_assoc()) {
        $prod_ID = $row['prod_ID'];
        $prod_Name = $row['prod_Name'];
        $price_old = $row['prod_Price'] -(0.10 * $row['prod_Price']) ;
        $price_new = $row['prod_Price'];
        if (isset($row['prod_Img'])) {
            $file  = $row['prod_Img'];
            $img = "data:image/jpeg;base64,".base64_encode($file);
            
        } 
        else{
          $img = "img/item-default.jpg";
        }
         ?>

         <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">BLACK FRIDAY DEAL</div>
            <div class="panel-body"><img src="<?php echo $img?>" class="img-responsive" style="width:100%" alt="Image" height="250" width="250"></div>
            <div class="panel-footer">
              <div class="name">
                <a href="product"><?php echo $prod_Name?></a>
              </div>
              <div class="price"> 
                <span class="price-old" style="color: red;"> <strike>₱<?php echo number_format($price_old,"2")?></strike></span>
                <span class="price-new">₱<?php echo number_format($price_new,"2")?></span> 
              </div>
              <div class="cart">
                <a class="button" data-toggle="modal" data-target="#<?php echo $prod_data_traget?>" data-id="<?php echo $prod_ID; ?>"  id="<?php echo $prod_view?>">VIEW DETAIL</a>
              </div>
            </div>
          </div>
        </div>
         <?php 
         $i++;
      }
  } else {
      echo "0 results";
  }
?>
  
  </div>
</div><br>

<br><br>

<?php 
  include('footer.php');
  include('modals.php');
  include('custom_script.php');
?>

</body>


</html>
<script type="text/javascript">
         $(document).ready(function(){
   $(document).on('click', '#view_product1', function(e){
      
      e.preventDefault();
      
      var uid = $(this).data('id');   // it will get id of clicked row
      
      $('#viewprod1-content').html(''); // leave it blank before ajax call
      $('#viewprod1-loader').show();      // load ajax loader
      
      $.ajax({
        url: 'ajax_view.php',
        type: 'POST',
        data: 'id='+uid,
        dataType: 'html'
      })
      .done(function(data){
        console.log(data);  
        $('#viewprod1-content').html('');    
        $('#viewprod1-content').html(data); // load response 
        $('#viewprod1-loader').hide();      // hide ajax loader 
      })
      .fail(function(){
        $('#viewprod1-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
        $('#viewprod1-loader').hide();
      });
      
    });
   });
</script>
  <!-- Modal -->
<div id="modal_viewproduct1" class="modal fade" role="dialog" style=" padding: 50px !important;">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Product Details</h4>
      </div>
      <div class="modal-body">
        <div id="viewprod1-loader" style="display: none; text-align: center;">
            <img src="img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="viewprod1-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

