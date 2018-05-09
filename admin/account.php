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

        <title>Account Management</title>

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
                                <li><a href="#">Account</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <h2>Account Management</h2>
                <br>
                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#add" id="prod_add" >Add <span class="   glyphicon glyphicon-plus"></span></button>
                <div class="line"></div>
                <?php 
                $sql ="SELECT * FROM `user_account`";
                $result = $conn->query($sql);
                ?>
                <table id="account_list" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>User Level</th>

                            <th class="col-sm-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($result->num_rows > 0) {
                            // output data of each row
                        while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $row['user_Name']?></td>
                            <td><?php echo $row['user_Email']?></td>
                            <td><?php 
                            if ($row['user_level'] == '1') {
                             echo "Customer";
                            }
                            else{
                              echo "Admin";
                            }
                            
                            ?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#view" id="acc_view" data-id="<?php echo $row['user_ID']?>"><span class="   glyphicon glyphicon-eye-open"></span></button>
                                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#edit" id="acc_edit" data-id="<?php echo $row['user_ID']?>"><span class="glyphicon glyphicon-edit"></span></button>
                                    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#delete" id="acc_delete" data-id="<?php echo $row['user_ID']?>"><span class="glyphicon glyphicon-remove"></span></button>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            
                        }
                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>





        <?php 
        include('global_jscript.php');
        ?>
        <script type="text/javascript">
           $(document).ready(function(){
           $(document).on('click', '#acc_view', function(e){
              
              e.preventDefault();
              
              var uid = $(this).data('id');   // it will get id of clicked row
              
              $('#view-content').html(''); // leave it blank before ajax call
              $('#view-loader').show();      // load ajax loader
              
              $.ajax({
                url: 'ajax_view.php',
                type: 'POST',
                data: 'account_view='+uid,
                dataType: 'html'
              })
              .done(function(data){
                console.log(data);  
                $('#view-content').html('');    
                $('#view-content').html(data); // load response 
                $('#view-loader').hide();      // hide ajax loader 
              })
              .fail(function(){
                $('#view-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#view-loader').hide();
              });
              
            });
           $(document).on('click', '#acc_edit', function(e){
              
              e.preventDefault();
              
              var uid = $(this).data('id');   // it will get id of clicked row
              
              $('#edit-content').html(''); // leave it blank before ajax call
              $('#edit-loader').show();      // load ajax loader
              
              $.ajax({
                url: 'ajax_view.php',
                type: 'POST',
                data: 'account_edit='+uid,
                dataType: 'html'
              })
              .done(function(data){
                console.log(data);  
                $('#edit-content').html('');    
                $('#edit-content').html(data); // load response 
                $('#edit-loader').hide();      // hide ajax loader 
              })
              .fail(function(){
                $('#edit-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#edit-loader').hide();
              });
              
            });
           $(document).on('click', '#acc_delete', function(e){
              
              e.preventDefault();
              
              var uid = $(this).data('id');   // it will get id of clicked row
              
              $('#delete-content').html(''); // leave it blank before ajax call
              $('#delete-loader').show();      // load ajax loader
              
              $.ajax({
                url: 'ajax_view.php',
                type: 'POST',
                data: 'account_delete='+uid,
                dataType: 'html'
              })
              .done(function(data){
                console.log(data);  
                $('#delete-content').html('');    
                $('#delete-content').html(data); // load response 
                $('#delete-loader').hide();      // hide ajax loader 
              })
              .fail(function(){
                $('#delete-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
                $('#delete-loader').hide();
              });
              
            });
           });
        </script>
            <!-- Modal -->
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Account</h4>
      </div>
      <div class="modal-body">
       <form  method="POST" action="action.php">
        <div class="form-group">
          <label for="name">Full Name:</label>
          <input type="text" class="form-control" name="fullname" required="">
        </div>
        <div class="form-group">
          <label for="name">Phone:</label>
          <input type="fullname" class="form-control" name="phone" required="">
        </div>
        <div class="form-group">
          <label for="name">Address:</label>
          <input type="fullname" class="form-control" name="address" required="">
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" name="email" required="">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" name="password" required="">
        </div>
        <div class="form-group">
          <label for="pwd">Confirm:</label>
          <input type="password" class="form-control" name="confirm" required="">
        </div>
        <div class="form-group">
          <label for="pwd">Level:</label>
          <select name="level" class="form-control" required="">
            <option value="1">Customer</option>
            <option value="2">Admin</option>
          </select>
        </div>
        <button type="submit" class="btn btn-default" name="account_add">Submit</button>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="view" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Account</h4>
      </div>
      <div class="modal-body">
       <div id="view-loader" style="display: none; text-align: center;">
            <img src="../img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="view-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="edit" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Account</h4>
      </div>
      <div class="modal-body">
       <div id="edit-loader" style="display: none; text-align: center;">
            <img src="../img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="edit-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="delete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Account</h4>
      </div>
      <div class="modal-body">
       <div id="delete-loader" style="display: none; text-align: center;">
            <img src="../img/ajax-loader.gif">
        </div>
        <!-- content will be load here -->                          
        <div id="delete-content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    </body>
</html>
