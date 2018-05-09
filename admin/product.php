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

        <title>Product Management</title>

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
                                <li><a href="#">Product</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <h2>Product Management</h2>
                <br>
                <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#add" id="prod_add" >Add <span class="   glyphicon glyphicon-plus"></span></button>
                <div class="line"></div>
                <?php 
                $sql ="SELECT * FROM `products` ORDER BY `prod_ID` ASC";
                $result = $conn->query($sql);
                ?>
                <table id="product_list" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Date</th>
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
                            <td><?php echo $row['prod_Name']?></td>
                            <td><?php echo $row['prod_Price']?></td>
                            <td><?php echo $row['prod_Qnty']?></td>
                            <td><?php echo $row['prod_date']?></td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#view" id="prod_view" data-id="<?php echo $row['prod_ID']?>"><span class="   glyphicon glyphicon-eye-open"></span></button>
                                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#edit" id="prod_edit" data-id="<?php echo $row['prod_ID']?>"><span class="glyphicon glyphicon-edit"></span></button>
                                    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#delete" id="prod_delete" data-id="<?php echo $row['prod_ID']?>"><span class="glyphicon glyphicon-remove"></span></button>
                                </div>
                            </td>
                        </tr>
                        <?php
                            }
                        } else {
                            
                        }
                        
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
           $(document).on('click', '#prod_view', function(e){
              
              e.preventDefault();
              
              var uid = $(this).data('id');   // it will get id of clicked row
              
              $('#view-content').html(''); // leave it blank before ajax call
              $('#view-loader').show();      // load ajax loader
              
              $.ajax({
                url: 'ajax_view.php',
                type: 'POST',
                data: 'product_view='+uid,
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
           $(document).on('click', '#prod_edit', function(e){
              
              e.preventDefault();
              
              var uid = $(this).data('id');   // it will get id of clicked row
              
              $('#edit-content').html(''); // leave it blank before ajax call
              $('#edit-loader').show();      // load ajax loader
              
              $.ajax({
                url: 'ajax_view.php',
                type: 'POST',
                data: 'product_edit='+uid,
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
           $(document).on('click', '#prod_delete', function(e){
              
              e.preventDefault();
              
              var uid = $(this).data('id');   // it will get id of clicked row
              
              $('#delete-content').html(''); // leave it blank before ajax call
              $('#delete-loader').show();      // load ajax loader
              
              $.ajax({
                url: 'ajax_view.php',
                type: 'POST',
                data: 'product_delete='+uid,
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
   function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);

                }

                reader.readAsDataURL(input.files[0]);
            }
        }
         function readURL1(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah1').attr('src', e.target.result);
                    
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
          
        </script>
<div id="add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">
       <form  method="POST" action="action.php"   enctype="multipart/form-data" runat="server">
        
        
        <div class="form-group">
          <label for="prod_Img"><img id="blah" src="../img/item-default.jpg" alt="your image" class="img-circle" height="250" width="250" /></label>
          <input type='file' name="imahe"  class="form-control" onchange="readURL(this);" />
        </div>
        <div class="form-group">
          <label for="name">Product Name:</label>
          <input type="text" class="form-control" name="prod_Name" required="">
        </div>
        <div class="form-group">
          <label for="name">Price:</label>
          <input type="fullname" class="form-control" name="prod_Price" required="">
        </div>
        <div class="form-group">
          <label for="name">Quantity:</label>
          <input type="fullname" class="form-control" name="prod_Qnty" required="">
        </div>
        <div class="form-group">
          <label for="Category">Category:</label>
          <select  class="form-control" name="category" required="">
            <?php 
            $sql = "SELECT * FROM `category`";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    ?>
                    <option value="<?php echo $row['cat_ID']?>"><?php echo $row['cat_Name']?></option>
                    <?php
                }
            }
            $conn->close();
            ?>
            
          </select>
        </div>
        <div class="form-group">
          <label for="email">Description:</label>
          <textarea name="descr" id="descr" rows="10" cols="80">
               
            </textarea>
        </div>
        
        <button type="submit" class="btn btn-default" name="product_add">Submit</button>
      </form>
      <script type="text/javascript">
         CKEDITOR.replace( 'descr' );
      </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div id="view" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content ">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Product</h4>
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
        <h4 class="modal-title">Edit Product</h4>
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
        <h4 class="modal-title">Delete Product</h4>
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
