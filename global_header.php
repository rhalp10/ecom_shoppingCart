  <!--Header Part Start-->
    <header id="header" class="style2">
      <div class="htop">
       <!--  <div id="language"> <span>Language<b></b></span>
          <ul>
            <li><a title="English"><img src="image/flags/gb.png" alt="English" />English</a></li>
            <li><a title="Türkçe"><img src="image/flags/tr.png" alt="Türkçe" />Türkçe</a></li>
          </ul>
        </div>
        <div id="currency"> <span>Currency<b></b></span>
          <ul>
            <li> <a title="Euro">€ - Euro</a> </li>
            <li> <a title="Pound Sterling">£ - Pound Sterling</a> </li>
            <li> <a title="US Dollar"><b>₱ - US Dollar</b></a> </li>
          </ul>
        </div> -->
        <div class="links"> <a href="login">Login</a> <a href="register">Register</a> <a href="#" id="wishlist-total">Wish List (0)</a> <a href="#">My Account</a> <a href="checkout">Checkout</a> </div>
      </div>
      <section class="hsecond">
        <div id="logo"><a href="index"><img src="image/logo.png" title="Polishop" alt="Polishop" /></a></div>
        <div id="search">
          <div class="button-search"></div>
          <input type="text" name="search" placeholder="Search" value="" />
        </div>
        <?php 
        include('global_mini_shoping_cart.php');
        ?>
        <div class="clear"></div>
      </section>
      <?php 
      include('global_top_menu.php');
      ?>
      <!-- Mobile Menu Start-->
      <nav id="menu" class="m-menu"> <span>Menu</span>
        <ul>
          <?php 

require('db.php');
$cat_sql = mysqli_query($conn,"SELECT * FROM `category`");
    while ($cat = mysqli_fetch_array($cat_sql)) {
              ?>
              <li class="custom_id<?php echo $cat[0]?>"><a class="active" href="category"><?php echo $cat[1]?></a> <span class="down"></span>
                <ul>
                  <?php 
                  $sub_category_sql = mysqli_query($conn,"SELECT * FROM `sub_category` where cat_ID = $cat[0]");
                  while ($sub_category = mysqli_fetch_array($sub_category_sql)) {
                    ?>
                    
                  <li class="custom_id<?php echo $sub_category[0]?>"><a class="" href="category"><?php echo $sub_category[1]?></a></li>
                    <?php
                  }
                  ?>
                 
                </ul>
              </li>
              <?php
            }?>
           
        </ul>
      </nav>
      <!-- Mobile Menu End-->
    </header>
    <!--Header Part End-->