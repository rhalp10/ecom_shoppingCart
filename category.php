<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Category(Grid)</title>
<link href="image/favicon.png" rel="icon" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="description" content="clean modern and elegant corporate look eCommerce html template">
<meta name="author" content="">
<?php 
include ('global_css.php');
include ('global_js.php');
include ('global_Google_Fonts.php');
?>
</head>
<body>
<div class="wrapper-wide">
  <div class="main-wide">
     <?php 
    include ('global_header.php');
    ?>
    <div id="container">
      <div id="column-left">
        <!--Category Start -->
        <div class="box">
          <div class="box-heading">Categories</div>
          <div class="box-content box-category">
            <ul id="cat_accordion">
              <?php 

require('db.php');
 $x = 1;
$cat_sql = mysqli_query($conn,"SELECT * FROM `category`");
    while ($cat = mysqli_fetch_array($cat_sql)) {
      
              ?>
              <li class="custom_id<?php echo $cat[0]?>"><a  <?php 
              if ($x == 1) {
                echo "class=\"active\"";
              }else{
                echo "class=\"\"";
              }
              ?> href="category"><?php echo $cat[1]?></a> <span class="down"></span>
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
          </div>
        </div>
        <script type="text/javascript" src="js/jquery.dcjqaccordion.js"></script>
        <!--Category End -->
        <?php 
        include('global_refine.php');
         include('global_latest_product.php');
        ?>
        
        <!--Banner Start-->
        <div class="banner">
          <div><a href="#"><img src="image/product/small-banner1-220x350.jpg" alt="banner" title="banner" /></a></div>
        </div>
        <!--Banner End-->
      </div>
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index">Home</a> &raquo; <a href=""><?php 
        $cat_sql = mysqli_query($conn,"SELECT * FROM `category` where cat_ID =".$_REQUEST['cat']);
        $cat = mysqli_fetch_array($cat_sql);
        echo $cat[1];

        ?></a> </div>
        <!--Breadcrumb Part End-->
        <h1><?php echo $cat[1]; ?></h1>
        <div class="product-filter">
          <div class="display"><b>Display:</b> <span class="grid1-icon">Grid</span> <a href="category-list" class="list-icon">List</a></div>
          <div class="limit"><b>Show:</b>
            <select >
              <option value="15" selected="selected">15</option>
              <option value="25">25</option>
              <option value="50">50</option>
              <option value="75">75</option>
              <option value="100">100</option>
            </select>
          </div>
          <div class="sort"><b>Sort By:</b>
            <select>
              <option value="" selected="selected">Default</option>
              <option value="">Name (A - Z)</option>
              <option value="">Name (Z - A)</option>
              <option value="">Price (Low &gt; High)</option>
              <option value="">Price (High &gt; Low)</option>
              <option value="">Rating (Highest)</option>
              <option value="">Rating (Lowest)</option>
              <option value="">Model (A - Z)</option>
              <option value="">Model (Z - A)</option>
            </select>
          </div>
        </div>
        <div class="product-compare"><a href="#" id="compare-total">Product Compare (0)</a></div>
        <!--Product Grid Start-->
        <div class="product-grid">
          <div>
            <div class="image"><a href="product"><img src="image/product/apple_cinema_30-162x162.jpg" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;" /></a></div>
            <div class="name"><a href="product">Apple Cinema 30&quot;</a></div>
            <div class="description">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed speci..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> <br />
              <span class="price-tax">Ex Tax: $90.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/canon_eos_5d_1-162x162.jpg" title="Canon EOS 5D" alt="Canon EOS 5D" /></a></div>
            <div class="name"><a href="product">Canon EOS 5D</a></div>
            <div class="description">Canon's press material for the EOS 5D states that it 'defines (a) new D-SLR category', while we're n..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$96.00</span> <br />
              <span class="price-tax">Ex Tax: $80.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-2.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/ipod_classic_1-162x162.jpg" title="iPad Classic" alt="iPad Classic" /></a></div>
            <div class="name"><a href="product">iPad Classic</a></div>
            <div class="description"> More room to move.
              
              With 80GB or 160GB of storage and up to 40 hours of battery life, the new ..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/ipod_nano_1-162x162.jpg" title="iPad Retina 2" alt="iPad Retina 2" /></a></div>
            <div class="name"><a href="product">iPad Retina 2</a></div>
            <div class="description"> Video in your pocket.
              
              Its the small iPod with one very big idea: video. The worlds most popular..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/iphone_1-162x162.jpg" title="iPhone 4s" alt="iPhone 4s" /></a></div>
            <div class="name"><a href="product">iPhone 4s</a></div>
            <div class="description">iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name o..</div>
            <div class="price"> $120.68 <br />
              <span class="price-tax">Ex Tax: $101.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/htc_touch_hd_1-162x162.jpg" title="iPhone 5s" alt="iPhone 5s" /></a></div>
            <div class="name"><a href="product">iPhone 5s</a></div>
            <div class="description">HTC Touch - in High Definition. Watch music videos and streaming content in awe-inspiring high defin..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-3.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/palm_treo_pro_1-162x162.jpg" title="Laptop Treo Pro" alt="Laptop Treo Pro" /></a></div>
            <div class="name"><a href="product">Laptop Treo Pro</a></div>
            <div class="description">Redefine your workday with the Palm Treo Pro smartphone. Perfectly balanced, you can respond to busi..</div>
            <div class="price"> $330.99 <br />
              <span class="price-tax">Ex Tax: $279.99</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-5.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/nikon_d300_1-162x162.jpg" title="Nikon D300" alt="Nikon D300" /></a></div>
            <div class="name"><a href="product">Nikon D300</a></div>
            <div class="description"> Engineered with pro-level features and performance, the 12.3-effective-megapixel D300 combines bra..</div>
            <div class="price"> $942.00 <br />
              <span class="price-tax">Ex Tax: $800.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-1.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/iphone_1-162x162.jpg" title="iPhone 4s" alt="iPhone 4s" /></a></div>
            <div class="name"><a href="product">iPhone 4s</a></div>
            <div class="description">iPhone is a revolutionary new mobile phone that allows you to make a call by simply tapping a name o..</div>
            <div class="price"> $120.68 <br />
              <span class="price-tax">Ex Tax: $101.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/ipod_classic_1-162x162.jpg" title="iPad Classic" alt="iPad Classic" /></a></div>
            <div class="name"><a href="product">iPad Classic</a></div>
            <div class="description"> More room to move.
              
              With 80GB or 160GB of storage and up to 40 hours of battery life, the new ..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/canon_eos_5d_1-162x162.jpg" title="Canon EOS 5D" alt="Canon EOS 5D" /></a></div>
            <div class="name"><a href="product">Canon EOS 5D</a></div>
            <div class="description">Canon's press material for the EOS 5D states that it 'defines (a) new D-SLR category', while we're n..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$96.00</span> <br />
              <span class="price-tax">Ex Tax: $80.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-2.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/apple_cinema_30-162x162.jpg" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;" /></a></div>
            <div class="name"><a href="product">Apple Cinema 30&quot;</a></div>
            <div class="description">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed speci..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> <br />
              <span class="price-tax">Ex Tax: $90.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/apple_cinema_30-162x162.jpg" title="Apple Cinema 30&quot;" alt="Apple Cinema 30&quot;" /></a></div>
            <div class="name"><a href="product">Apple Cinema 30&quot;</a></div>
            <div class="description">The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed speci..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$107.75</span> <br />
              <span class="price-tax">Ex Tax: $90.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/canon_eos_5d_1-162x162.jpg" title="Canon EOS 5D" alt="Canon EOS 5D" /></a></div>
            <div class="name"><a href="product">Canon EOS 5D</a></div>
            <div class="description">Canon's press material for the EOS 5D states that it 'defines (a) new D-SLR category', while we're n..</div>
            <div class="price"> <span class="price-old">$119.50</span> <span class="price-new">$96.00</span> <br />
              <span class="price-tax">Ex Tax: $80.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-2.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/ipod_classic_1-162x162.jpg" title="iPad Classic" alt="iPad Classic" /></a></div>
            <div class="name"><a href="product">iPad Classic</a></div>
            <div class="description"> More room to move.
              
              With 80GB or 160GB of storage and up to 40 hours of battery life, the new ..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
          <div>
            <div class="image"><a href="product"><img src="image/product/ipod_nano_1-162x162.jpg" title="iPad Retina 2" alt="iPad Retina 2" /></a></div>
            <div class="name"><a href="product">iPad Retina 2</a></div>
            <div class="description"> Video in your pocket.
              
              Its the small iPod with one very big idea: video. The worlds most popular..</div>
            <div class="price"> $119.50 <br />
              <span class="price-tax">Ex Tax: $100.00</span> </div>
            <div class="cart">
              <input type="button" value="Add to Cart" class="button" />
            </div>
            <div class="rating"><img src="image/stars-4.png" alt="Based on 1 reviews." /></div>
          </div>
        </div>
        <!--Product Grid End-->
        <!--Pagination Part Start-->
        <div class="pagination">
          <div class="links"> <b>1</b> <a href="#">2</a> <a href="#">&gt;</a> <a href="#">&gt;|</a></div>
          <div class="results">Showing 1 to 15 of 16 (2 Pages)</div>
        </div>
        <!--Pagination Part End-->
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
<?php 
include('global_footer.php');
 ?>
</div>
</body>
</html>