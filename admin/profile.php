<?php 
include('../session.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="../img/favicon.png" rel="icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Admin</title>

        <?php 
        include('global_css.php');
        ?>
    </head>
    <body>



        <div class="wrapper">
            <?php 
            include('side_nav.php');
            ?>

            <!-- Page Content Holder -->
            <div id="content" style="width: 100%;">

                <nav class="navbar-inverse navbar-default">
                    <div class="container-fluid">


                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a href="#">Dashboard</a></li>
                                <li><a href="#">/</a></li>
                                <li><a href="#">Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <?php 
                $user_ID = $_SESSION['user_ID'];
                $sql = "SELECT * FROM `user_account` WHERE user_ID = $user_ID";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <div class="container">    
                  <div class="row">
                      <div class="panel panel-default">
                      <div class="panel-heading"><h2>Profile3</h2> <button class="btn btn-success pull-right" style="margin-top: -50px;" data-toggle="modal" data-target="#Edit">EDIT</button></div>
                       <div class="panel-body">
                      <div class="col-md-4 col-xs-12 col-sm-6 col-lg-4">
                       <img alt="User Pic" src="../img/propic.jpg" id="profile-image1" class="img-circle img-responsive"> 
                     
                 
                      </div>
                      <div class="col-md-8 col-xs-12 col-sm-6 col-lg-8" >
                          <div class="container" >
                            <h2><?php echo $row['user_Name']?></h2>
                            <p>an   <b> Admin</b></p>
                          
                           
                          </div>
                           <hr>
                          <ul class="container details" >
                            <li><p><span class="glyphicon glyphicon-user one" style="width:50px;"></span><?php echo $row['user_Name']?></p></li>
                            <li><p><span class="glyphicon glyphicon-envelope one" style="width:50px;"></span><?php echo $row['user_Email']?></p></li>
                          </ul>
                          <hr>
                          <div class="col-sm-5 col-xs-6 tital " >Date Of Joining: <?php echo date('M,d, Y',strtotime($row['date_register']))?></div>
                      </div>
                </div>
            </div>
            </div>
            </div>
            </div>
        </div>





        <?php 
        include('global_jscript');
        ?>
    </body>
    <!-- Modal -->
<div id="Edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profile</h4>
      </div>
      <div class="modal-body">

    <form  method="POST" action="action.php?id=<?php echo $user_ID?>">
        <div class="form-group">
          <label for="name">Full Name:</label>
          <input type="text" class="form-control" name="fullname"  value="<?php echo $row['user_Name']?>" required="">
        </div>
        <div class="form-group">
          <label for="name">Phone:</label>
          <input type="fullname" class="form-control" name="phone" value="<?php echo $row['user_Phone']?>" required="">
        </div>
        <div class="form-group">
          <label for="name">Address:</label>
          <input type="fullname" class="form-control" name="address"  value="<?php echo $row['user_Address']?>" required="">
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" name="email"  value="<?php echo $row['user_Email']?>" required="">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="password"  value="<?php echo $row['user_password']?>" required="">
        </div>
        <div class="form-group">
          <label for="pwd">Confirm:</label>
          <input type="password" class="form-control" name="confirm" required="">
        </div>
        <input type="hidden" name="profile" value="profile">
        <button type="submit" class="btn btn-default" name="profile_edit">Update</button>
      </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</html>
