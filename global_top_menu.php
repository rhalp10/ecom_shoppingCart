      <!--Top Menu(Horizontal Categories) Start-->
      <nav id="menu">
        <ul>
          <li class="home"><a title="Home" href="index"><span>Home</span></a></li>
          <li class="categories_hor"><a>Categories</a>

            <div>
              <?php 

require('db.php');
$cat_sql = mysqli_query($conn,"SELECT * FROM `category`");
    while ($cat = mysqli_fetch_array($cat_sql)) {
              ?>
              <div class="column"> <a href="category?cat=<?php echo $cat[0]?>"><?php echo $cat[1]?></a>
                <div>
                  <ul>
                    <?php 
                  $sub_category_sql = mysqli_query($conn,"SELECT * FROM `sub_category` where cat_ID = $cat[0]");
                  while ($sub_category = mysqli_fetch_array($sub_category_sql)) {
                    ?>
                   <li><a href="category?cat=<?php echo $cat[0]?>&subcat=<?php echo $sub_category[0]?>"><?php echo $sub_category[1]?></a></li>
                    <?php
                  }
                  ?>
                  </ul>
                </div>
              </div>
              <?php
            }?>
              
              
          <!-- <li><a target="_blank" href="#">Headers</a>
            <div>
              <ul>
                <li><a href="index">Header Style 1</a></li>
                <li><a href="header-footer-2">Header Style 2</a></li>
                <li><a href="header-footer-3">Header Style 3</a></li>
              </ul>
            </div>
          </li>
          <li><a target="_blank" href="#">Menus</a>
            <div>
              <ul>
                <li><a href="index">Horizontal Categories</a></li>
                <li><a href="header-footer-2">Vertical Categories</a></li>
                <li><a href="header-footer-3">Simple Categories</a></li>
              </ul>
            </div>
          </li> -->
         <!--  <li><a target="_blank" href="#">Sliders</a>
            <div>
              <ul>
                <li><a href="index">Nivo Slider</a></li>
                <li><a href="header-footer-2">Flex Slider</a></li>
              </ul>
            </div>
          </li> -->
          <!-- <li><a target="_blank" href="#">Footers</a>
            <div>
              <ul>
                <li><a href="index">Footer Style 1</a></li>
                <li><a href="header-footer-2">Footer Style 2</a></li>
                <li><a href="header-footer-3">Footer Style 3</a></li>
              </ul>
            </div>
          </li> -->
         <!--  <li><a href="">Custom Block</a>
            <div class="custom_block">
              <ul>
                <li>
                  <table border="0" cellpadding="0" cellspacing="0" style="width: 500px;">
                    <tbody>
                      <tr>
                        <td><h3>You can insert any content here.</h3>
                          <p>&nbsp;</p></td>
                      </tr>
                      <tr>
                        <td><strong><img alt="responsive" src="image/product/responsive.jpg" style="width: 250px; height: 150px; border-width: 0px; border-style: solid; float: left; margin-left: 10px; margin-right: 10px;" />Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing.</td>
                      </tr>
                    </tbody>
                  </table>
                </li>
              </ul>
            </div>
          </li> -->
          <li><a>My Account</a>
            <div>
              <ul>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Order History</a></li>
                <li><a href="#" id="wishlist-total">Wish List (0)</a></li>
                <!-- <li><a href="#">Newsletter</a></li> -->
              </ul>
            </div>
          </li>
          <li><a>Information</a>
            <div>
              <ul>
                <li><a href="about-us">About Us</a></li>
                <li><a href="about-us">Delivery Information</a></li>
                <li><a href="about-us">Privacy Policy</a></li>
               <!--  <li><a href="elements">Elements</a></li> -->
              </ul>
            </div>
          </li>
          <li><a href="contact-us">Contact Us</a></li>
        </ul>
      </nav>
      <!--Top Menu(Horizontal Categories) End-->