<?php 
include("db.php");
session_start();
if (isset($_REQUEST['id']) ){

if (isset($_SESSION['user_ID'])) {
 // echo "set";
}
else{
// echo "unset";
}
	$id = $_REQUEST['id'];
	$sql = "SELECT * FROM `products`  WHERE prod_ID = '$id'";
	$result  = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
    $prod_ID = $row['prod_ID'];
		$prod_Img = $row['prod_Img'];
		$prod_Name = $row['prod_Name'];
		$prod_Description = $row['prod_Description'];
		$prod_Price = $row['prod_Price'];
		$prod_Qnty = $row['prod_Qnty'];
		$prod_date = $row['prod_date'];

        $price_old = $row['prod_Price'] -(0.10 * $row['prod_Price']) ;
        $price_new = $row['prod_Price'];

		if (isset($row['prod_Img'])) {
            $file  = $row['prod_Img'];
            $img = "data:img/jpeg;base64,".base64_encode($file);
            
        } 
        else{
          $img = "img/item-default.jpg";
        }
		?>

		<!--Middle Part Start-->
      <div id="content">
        <h1><?php echo $prod_Name?></h1>
        <div class="product-info">
          <div class="left">
            <div class="image"><a href="<?php echo $img?>" title="<?php echo $prod_Name?>" class="cloud-zoom colorbox" id='zoom1' rel="adjustX: 0, adjustY:0, tint:'#000000',tintOpacity:0.2, zoomWidth:360, position:'inside', showTitle:false"><img src="<?php echo $img?>" title="<?php echo $prod_Name?>" alt="<?php echo $prod_Name?>" id="image"  height="250" weight="250"/><span id="zoom-image"><i class="zoom_bttn"></i> Zoom</span></a></div>
            <div class="image-additional"> <a href="<?php echo $img?>" title="<?php echo $prod_Name?>" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '<?php echo $img?>' "><img src="<?php echo $img?>" width="62" title="<?php echo $prod_Name?>" alt="<?php echo $prod_Name?>" /></a> <a href="<?php echo $img?>" title="<?php echo $prod_Name?>" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '<?php echo $img?>' "><img src="<?php echo $img?>" width="62" title="<?php echo $prod_Name?>" alt="<?php echo $prod_Name?>" /></a> <a href="<?php echo $img?>" title="<?php echo $prod_Name?>" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '<?php echo $img?>.png' "><img src="<?php echo $img?>" width="62" title="<?php echo $prod_Name?>" alt="<?php echo $prod_Name?>" /></a> </div>
          </div>
          <div class="right">
            <div class="description"> <span>Brand:</span> <a href="#"><?php echo rand()?></a><br />
              <span>Product Code:</span> Product <?php echo $prod_Name.rand()?><br />
              <span>Reward Points:</span> <?php echo rand()?><br />
              <span>Availability:</span> In Stock</div>
            <div class="price">Price: <span class="price-old">₱<?php echo number_format($price_old,"2")?></span> <span class="price-new">₱<?php echo number_format($price_new,"2")?></span> <br />
              <!-- <span class="price-tax">Ex Tax: $80.00</span> --><br />
            </div>
           <!--  <div class="options">
              <h2>Available Options</h2>
              <div id="option-226" class="option"> <span class="required">*</span> <b>Select:</b><br />
                <select name="option">
                  <option value=""> --- Please Select --- </option>
                  <option value="15">Red</option>
                  <option value="16">Blue</option>
                </select>
              </div>
            </div> -->
            <div class="cart">
              <div>
                <div class="qty"> <strong>Qty:</strong> <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                    
                  <input id="qty" type="text" class="w30" name="quantity" size="2" value="" max="<?php echo $prod_Qnty ?>" onkeyup="inpuxt(this)"/>
                  <a class="qtyBtn plus" href="javascript:void(0);">+</a>
                  
                
                    <input type="hidden" name="product_id" size="2" value="30" />
                  <script type="text/javascript">
                    function inpuxt(e) {
                      document.getElementById("qtyz").value = e.value;
                    }
                  </script>
                  <div class="clear"></div>
                </div>
               <!--  <input type="button" value="Add to Cart" id="button_cart" class="button" data-id="<?php echo $prod_ID?>" name="add_cart" data-toggle="modal" data-target="#add_cart_m"/> -->
                 <form action="action?id=<?php echo $prod_ID?>" method="POST"  target="_blank" >
                  <input id="qtyz" type="hidden" class="w30" name="quantity" size="2" value="" max="" />

                  <input type="hidden" class="w30" name="priceee" value="<?php echo $prod_Price ?>" />
                  <input type="submit" class="button" name="add_cart" vale="Add to Cart">
                  </form>
              </div>
             <!--  <div><a href="#" class="wishlist" >Add to Wish List</a> <a href="#" class="wishlist" >Add to Compare</a></div> -->
            </div>
            <div class="review">
              <div><img src="img/stars-3.png" alt="2 reviews" />&nbsp;&nbsp;<a onClick="$('a[href=\'#tab-review\']').trigger('click');">0 reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onClick="$('a[href=\'#tab-review\']').trigger('click');">Write a review</a></div>
            </div>
          </div>
        </div>
        <!-- Description and Reviews Tab Start -->
        <div id="tabs" class="htabs"> <a href="#tab-description">Description</a> <a href="#tab-review">Reviews (0)</a> </div>
        <div id="tab-description" class="tab-content">
         
          <?php 
          echo $prod_Description ;
          ?>
         
        </div>
        <!-- Description and Reviews Tab Start -->
       
      </div>
      <!--Middle Part End-->
		<?php
	}
	else{
    // echo "asdasd";
  }
}


?>
