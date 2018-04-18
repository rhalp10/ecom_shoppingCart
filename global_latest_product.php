<!--Latest Product Start-->
<?php 
require('db.php');
$latest_prod_sql = mysqli_query($conn,'SELECT * FROM `products` ORDER BY `products`.`prod_date` DESC LIMIT 5');

?>

        <div class="box">
          <div class="box-heading">Latest</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider">
                <ul class="slides">
                  <?php 
                  while ($latest_prod = mysqli_fetch_array($latest_prod_sql)) {
                   ?>
                   <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product">
                        <?php 
                        if (!empty($latest_prod[1])) {
                          ?>
                           <img src="image/product/sony_vaio_1-45x45.jpg" alt="Friendly Jewelry" /></a>
                          <?php
                        }
                        else{
                          ?>
                           <img src="image/product/sony_vaio_1-45x45.jpg" alt="Friendly Jewelry" /></a>
                          <?php
                        }
                        ?>
                       </div>
                      <div class="name"><a href="product"><?php echo $latest_prod[1];?></a></div>
                      <div class="price">₱<?php echo number_format($latest_prod[3],2); ?></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                   <?php
                  }
                  ?>
                  
                 
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--Latest Product End-->