<?php
include('login_action.php'); // Includes Login Script

if(isset($_SESSION['login_user']))
{           
           echo  $email=isset($_SESSION['login_user']);// passing the session user to new user variable
           
            echo  $user_ID=isset($_SESSION['user_ID']);
            echo  $user_level=isset($_SESSION['user_level']);
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

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Rhalp Darren R. Cabrera" content="">

    <title>Log-in</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

  <body>
<?php 
if (isset($_SESSION['user_ID'])) {
   ?>
<a href="logout.php">logout</a>
   <?php
}

else{
    ?>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
 


                    <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title" >Sign In</div>
                      
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form role="form" method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="username" type="text" class="form-control" name="email" value="" placeholder="username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="password" type="password" class="form-control" name="password" placeholder="password">
                                    </div>

                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button type="submit" class="btn btn-success pull-right" name="submit"><span class="glyphicon glyphicon-check"></span> Login</button>

                                    </div>
                                </div>
                            </form>
                         </div>
                    </div>
  


        </div>

    </div> <!-- /container -->
    <?php
}
?>
    

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
