<?php
include "lib/php/functions.php";

$product = MYSQLIQuery("
   SELECT *
   FROM `products`
   WHERE `id` = {$_GET['id']}
")[0];

$thumbs = explode(",", $product->image);

$thumb_elements = array_reduce($thumbs,function($r,$o){
   return $r."<img src='/img/$o'>";
});

?><!DOCTYPE html>
<html lang="en">
<head>
    <?php include "parts/meta.php" ?>
   <title>Product Item</title>

</head>
<body>
   <?php include "parts/navbar.php" ?>
   <hr>
   
    <div class="container">
      <div class="grid gap product-display">
         <div class="col-xs-12 col-md-7">
           
             <div class="image-main">
                  <img src="<?= $product->image ?>">
             </div>
           
         </div>
         <div class="col-xs-12 col-md-5">
            <div class="card flat" style="background-color:#e8edea">
               <div class="card-section">
                  <h4><?= $product->name ?></h4>
                   <h6 style="text-align: left"> <?= $product->description ?></h6>
                  <h4>&dollar;<?= $product->price ?></h4>
                  
               </div>
               <div class="card-section">
                  <label class="form-label">Amount</label>
                  <div class="form-select">
                     <select>
                        <!-- option[value='$']*10>{$} -->
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                     </select>
                  </div>
               </div>
               
              <div class="card-section">
               <div class="center" style="margin-bottom: 4em"><a href="product_added_cart.php" class="form-button col-sm-6 col-md-3">ADD TO CART</a></div>
            </div>
            
         </div>
      </div>
   </div>
</div>

<div class="container display-flex flex-justify-center hide">
    <h2>You May Also Like</h2>
   </div>

   <div class="containerwide grid-justify-around">
      <div class="grid">
     <!--  <div class="col-md-1"></div> -->
      <div class="col-sm-6 col-md-3">
        <div id="product6" class="product card bottom soft" style="background-image:url(img/product4.jpg)"></div>
        <h5>Black Tea Face Oil</h5>
        <h5>$ 30.00</h5>
         <div class="center"><a href="product_list.php" class="button col-sm-6 col-md-3">VIEW MORE</a></div>
      </div>
   
      <div class="col-sm-6 col-md-3">
        <div id="product7" class="product card bottom soft col-sm-6 col-md-3" style="background-image:url(img/product5.jpg)"></div>
        <h5>Daisy Face Oil</h5>
        <h5>$ 30.00</h5>
         <div class="center"><a href="product_list.php" class="button col-sm-6 col-md-3">VIEW MORE</a></div>
     </div>
     <div class="col-sm-6 col-md-3">
        <div id="product8" class="product card bottom soft col-sm-6 col-md-3" style="background-image:url(img/product6.jpg)"></div>
        <h5>Butter Sleeping Mask</h5>
        <h5>$ 30.00</h5>
        <div class="center"><a href="product_list.php" class="button col-sm-6 col-md-3">VIEW MORE</a></div>
     </div>
     <div class="col-sm-6 col-md-3">
        <div id="product9" class="product card bottom soft col-sm-6 col-md-3" style="background-image:url(img/product7.jpg)"></div>
        <h5>Volcanic Mud Face Mask</h5>
        <h5>$ 30.00</h5>
       <div class="center"><a href="product_list.php" class="button col-sm-6 col-md-3">VIEW MORE</a></div>
     </div>
    
      </div>
   </div>
  </div>

<?php include "parts/footer.php" ?>

</body>
</html>