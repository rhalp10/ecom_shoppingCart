<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Elements</title>
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
      <!--Left Part-->
      <div id="column-left">
        <?php 
        include('global_best_seller.php');
        include('global_latest_product.php');
        ?>
        <!--Banner Start-->
        <div class="banner">
          <div><a href="#"><img src="image/product/small-banner1-220x350.jpg" alt="banner" title="banner" /></a></div>
        </div>
        <!--Banner End-->
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <div class="breadcrumb"><a href="index">Home</a> &raquo; <a href="#">Elements</a></div>
        <h1>Elements</h1>
        <!--Tabs Start-->
        <h4>Tabs</h4>
        <div id="tabs" class="htabs"> <a href="#tab-1">Title #1</a> <a href="#tab-2">Title #2</a> <a href="#tab-3">Title #3</a> </div>
        <div id="tab-1" class="tab-content"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </div>
        <div id="tab-2" class="tab-content"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>
          <br>
          It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </div>
        <div id="tab-3" class="tab-content"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>
          <br>
          It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. <br>
          <br>
          It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </div>
        <script>
	  	$(document).ready(function(){
		  $('#tabs a').tabs();
		});
      </script>
        <!--Tabs End-->
        <!--Alert Boxes Start-->
        <h4>Alert Boxes</h4>
        <div class="success">Success: Your Text Message!<img class="close" alt="" src="image/close.png"></div>
        <div class="warning">Error: Your Text Message!<img class="close" alt="" src="image/close.png"></div>
        <div class="attention">Information: Your Text Message!<img class="close" alt="" src="image/close.png"></div>
        <!--Alert Boxes End-->
        <!--Accordion Start-->
        <h4>Accordion</h4>
        <div class="accordion">
          <div class="accordion-heading">Title #1</div>
          <div class="accordion-content" style="display:block;"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </div>
        </div>
        <div class="accordion">
          <div class="accordion-heading">Title #2</div>
          <div class="accordion-content"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>
            <br>
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
        </div>
        <div class="accordion">
          <div class="accordion-heading">Title #3</div>
          <div class="accordion-content"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. </div>
        </div>
        <div class="accordion">
          <div class="accordion-heading">Title #4</div>
          <div class="accordion-content"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <br>
            <br>
            It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div>
        </div>
        <!--Accordion End-->
        <!--Carousel Part Start-->
        <h4>Carousel </h4>
        <section id="carousel">
          <ul class="jcarousel-skin-opencart">
            <li><a href="#"><img src="image/product/brand_logo.jpg" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="image/product/brand_logo.jpg" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="image/product/brand_logo.jpg" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="image/product/brand_logo.jpg" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="image/product/brand_logo.jpg" alt="brand_logo" title="brand_logo" /></a></li>
            <li><a href="#"><img src="image/product/brand_logo.jpg" alt="brand_logo" title="brand_logo" /></a></li>
          </ul>
        </section>
        <!--Carousel Part End-->
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