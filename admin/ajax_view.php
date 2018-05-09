<?php 

include('../db.php');
if (isset($_REQUEST['account_view'])) 
{

	$id = $_REQUEST['account_view'];
	$sql = "SELECT * FROM `user_account` WHERE user_ID = $id";
	$result = $conn->query($sql);
    // output data of each row
   	$row = $result->fetch_assoc();
	?>
	<form  method="POST" action="action.php">
        <div class="form-group">
          <label for="name">Full Name:</label>
          <input type="text" class="form-control" name="fullname" readonly=""  value="<?php echo $row['user_Name']?>">
        </div>
        <div class="form-group">
          <label for="name">Phone:</label>
          <input type="fullname" class="form-control" name="phone" readonly=""  value="<?php echo $row['user_Phone']?>">
        </div>
        <div class="form-group">
          <label for="name">Address:</label>
          <input type="fullname" class="form-control" name="address" readonly=""  value="<?php echo $row['user_Address']?>">
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" name="email" readonly=""  value="<?php echo $row['user_Email']?>">
        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input type="text" class="form-control" name="password" readonly=""  value="<?php echo $row['user_password']?>">
        </div>
        <div class="form-group">
          <label for="pwd">Level:</label>
         <input type="text" class="form-control" name="confirm" readonly=""  value="<?php
         if ($row['user_level'] == '1') {
         echo "Customer";
        }
        else{
          echo "Admin";
        }?>">
        </div>
      </form>

	<?php

}
if (isset($_REQUEST['account_edit'])) 
{
	$id = $_REQUEST['account_edit'];
	$sql = "SELECT * FROM `user_account` WHERE user_ID = $id";
	$result = $conn->query($sql);
    // output data of each row
   	$row = $result->fetch_assoc();
	?>
	<form  method="POST" action="action.php?id=<?php echo $id?>">
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
        <div class="form-group">
          <label for="pwd">Level:</label>
          <select name="level" class="form-control">
            <option value="1">Customer</option>
            <option value="2">Admin</option>
          </select>
        </div>
        <button type="submit" class="btn btn-default" name="account_edit">Update</button>
      </form>

	<?php

}
if (isset($_REQUEST['account_delete'])) 
{
	$id = $_REQUEST['account_delete'];
	?>
	
	<form method="POST" action="action.php?id=<?php echo $id?>" class="text-center">
		<div class="btn-group">
			<button class="btn btn-primary" type="submit" name="account_delete">CONFIRM</button>
			<button class="btn btn-danger" data-dismiss="modal">CANCEL</button>
		</div>
	</form>
	<?php

}
if (isset($_REQUEST['product_view'])) 
{
  $id = $_REQUEST['product_view'];
  $sql = "SELECT prod.prod_Img,prod.prod_Name,prod.prod_Description,prod.prod_Price,prod.prod_Qnty,prod.prod_date, x.or_Qnty_item,prod.prod_ID FROM `products`  prod
LEFT JOIN (SELECT sum(od.or_Qnty) or_Qnty_item,od.prod_ID FROM order_detail od Group by od.prod_ID)  x ON x.prod_ID = prod.prod_ID 
WHERE prod.prod_ID = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
      // output data of each row
      $i = 0;
      while($row = $result->fetch_assoc()) {
        $prod_ID = $row['prod_ID'];
        $prod_Name = $row['prod_Name'];
        $price_old = $row['prod_Price'] -(0.10 * $row['prod_Price']) ;
        $price_new = $row['prod_Price'];
        $prod_Qnty = $row['prod_Qnty'];
        $content = $row['prod_Description'];
        if (isset($row['prod_Img'])) {
            $file  = $row['prod_Img'];
            $img = "data:image/jpeg;base64,".base64_encode($file);
            
        } 
        else{
          $img = "img/item-default.jpg";
        }
      }
    }

?>

  <img src="<?php echo $img?>" class="img-circle"  alt="Image" height="250" width="250">
  <div class="form-group">
    <label for="name">Product Name:</label>
    <input type="text" class="form-control" name="prod_Name"  value="<?php echo $prod_Name?>" readonly="">
  </div>
   <div class="form-group">
    <label for="name">Price:</label>
    <input type="text" class="form-control" name="Price"  value="<?php echo $price_new?>" required="">
  </div>
   <div class="form-group">
    <label for="name">Quantity:</label>
    <input type="text" class="form-control" name="Qnty"  value="<?php echo $prod_Qnty?>" required="">
  </div>
  <div  style="color: black">
    <?php echo $content?>
  </div>
	<?php
}
if (isset($_REQUEST['product_edit'])) 
{
  $id = $_REQUEST['product_edit'];
  $sql = "SELECT prod.prod_Img,prod.prod_Name,prod.prod_Description,prod.prod_Price,prod.prod_Qnty,prod.prod_date, x.or_Qnty_item,prod.prod_ID FROM `products`  prod
LEFT JOIN (SELECT sum(od.or_Qnty) or_Qnty_item,od.prod_ID FROM order_detail od Group by od.prod_ID)  x ON x.prod_ID = prod.prod_ID 
WHERE prod.prod_ID = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
      // output data of each row
      $i = 0;
      while($row = $result->fetch_assoc()) {
        $prod_ID = $row['prod_ID'];
        $prod_Name = $row['prod_Name'];
        $prod_Price = $row['prod_Price'];
        $price_old = $row['prod_Price'] -(0.10 * $row['prod_Price']) ;
        $price_new = $row['prod_Price'];
        $prod_Qnty = $row['prod_Qnty'];
        $content = $row['prod_Description'];
        if (isset($row['prod_Img'])) {
            $file  = $row['prod_Img'];
            $img = "data:image/jpeg;base64,".base64_encode($file);
        } 
        else{
          $img = "img/item-default.jpg";
        }
      }
    }
?>
 <form  method="POST" action="action.php?id=<?php echo $id?>"   enctype="multipart/form-data" runat="server">
        
        
        <div class="form-group">
          <label for="prod_Img"><img id="blah1" src="<?php echo $img ?>" alt="your image" class="img-circle" height="250" width="250" /></label>
          <input type='file' name="imahe"  class="form-control" onchange="readURL1(this);" value="<?php echo $img ?>"" />
        </div>
        <div class="form-group">
          <label for="name">Product Name:</label>
          <input type="text" class="form-control" name="prod_Name" required="" value="<?php echo $prod_Name?>">
        </div>
        <div class="form-group">
          <label for="name">Price:</label>
          <input type="fullname" class="form-control" name="prod_Price" required="" value="<?php echo $prod_Price?>">
        </div>
        <div class="form-group">
          <label for="name">Quantity:</label>
          <input type="fullname" class="form-control" name="prod_Qnty" required="" value="<?php echo $prod_Qnty?>">
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
          <textarea name="descr" id="descr1" rows="10" cols="80">
               <?php echo $content?>
            </textarea>
        </div>
        
        <button type="submit" class="btn btn-default" name="product_edit">Submit</button>
      </form>
      <script type="text/javascript">
         CKEDITOR.replace( 'descr1' );
      </script>

	<?php
}
if (isset($_REQUEST['product_delete'])) 
{
$id = $_REQUEST['product_delete'];
	?>
	
	<form method="POST" action="action.php?id=<?php echo $id?>" class="text-center">
		<div class="btn-group">
			<button class="btn btn-primary" type="submit" name="product_delete">CONFIRM</button>
			<button class="btn btn-danger" data-dismiss="modal">CANCEL</button>
		</div>
	</form>
	<?php
}
if (isset($_REQUEST['categories_view'])) 
{
  $id = $_REQUEST['categories_view'];
  $sql = "SELECT * FROM `category` WHERE cat_ID = $id";
  $result = $conn->query($sql);
    // output data of each row
  $row = $result->fetch_assoc();
?>
<form  method="POST" action="action.php">
        <div class="form-group">
          <label for="name">Category Name:</label>
          <input type="text" class="form-control" name="fullname" value="<?php echo $row['cat_Name']?>" readonly="" >
        </div>
      </form>

	<?php
}
if (isset($_REQUEST['categories_edit'])) 
{
  $id = $_REQUEST['categories_edit'];
  $sql = "SELECT * FROM `category` WHERE cat_ID = $id";
  $result = $conn->query($sql);
    // output data of each row
  $row = $result->fetch_assoc();
?>
<form  method="POST" action="action.php?id=<?php echo $id?>">
        <div class="form-group">
          <label for="name">Category Name:</label>
          <input type="text" class="form-control" name="category_name" value="<?php echo $row['cat_Name']?>" required="" >
        </div>

        <button type="submit" class="btn btn-default" name="categories_edit">Submit</button>
      </form>
	<?php
}
if (isset($_REQUEST['categories_delete'])) 
{
$id = $_REQUEST['categories_delete'];
	?>
	
	<form method="POST" action="action.php?id=<?php echo $id?>" class="text-center">
		<div class="btn-group">
			<button class="btn btn-primary" type="submit" name="categories_delete">CONFIRM</button>
			<button class="btn btn-danger" data-dismiss="modal">CANCEL</button>
		</div>
	</form>
	<?php
}
?>