 <?php 
require('db.php');
$best_seller_sql = mysqli_query($conn,'SELECT * FROM `order` o
INNER JOIN products p ON p.prod_ID = o.prod_ID GROUP BY o.prod_ID LIMIT 5');

?>
 <!--Bestsellers Part Start-->
        <div class="box">
          <div class="box-heading">Bestsellers</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider">
                <ul class="slides">
                  <?php 
                  while ($best_seller = mysqli_fetch_array($best_seller_sql)) {
                   ?>
                  <li>
                    <div class="slide-inner">
                      <div class="image">
                        
                         <?php 
                        if (!empty($best_seller[8])) {
                          ?>
                           <a href="product"><img src="image/product/sony_vaio_1-45x45.jpg" alt="Friendly Jewelry" /></a>
                          <?php
                        }
                        else{
                          ?>
                           <a href="product"><img src="image/product/sony_vaio_1-45x45.jpg" alt="Friendly Jewelry" /></a>
                          <?php
                        }
                        ?>
                      </div>
                      <div class="name"><a href="product"><a href="product"><?php echo $best_seller[5];?></a></div>
                      <div class="price">₱<?php echo number_format($best_seller[7],2); ?></div>
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
        <!--Bestsellers Part End-->