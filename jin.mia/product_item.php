<?php
include "lib/php/functions.php";
include "parts/templates.php";
include "data/api.php";

$product = makeStatement("product_by_id")[0];

$thumbs = explode(",", $product->image);

$thumb_elements = array_reduce($thumbs,function($r,$o){
   return $r."<img src='/img/$o'>";
});

// echo $_SESSION['num'];

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
            <form class="card flat" style="background-color:#e8edea" action="product_actions.php?crud=add-to-cart" method="post">
              <input type="hidden" name="id" value="<?= $product->id ?>">
               <div class="card-section">
                  <h4><?= $product->name ?></h4>
                   <h6 style="text-align: left"> <?= $product->description ?></h6>
                  <h4>&dollar;<?= $product->price ?></h4>
                  
               </div>
               <div class="card-section">
                  <label class="form-label">Amount</label>
                  <div class="form-select">
                     <select name="amount">
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
               <div class="center" style="margin-bottom: 4em"><button type="submit" class="form-button col-sm-6 col-md-3">ADD TO CART</button></div>
            </div>
            
         </form>
      </div>
   </div>
</div>

<div class="container display-flex flex-justify-center hide">
    <h2>You May Also Like</h2>
   </div>

     <div class="containerwide grid-justify-around">
      <div class="grid">
    
   
   <? 

   $products = MYSQLIQuery("
      SELECT *
      FROM `products`
      WHERE `category` = 'skincare'
      LIMIT 4
   ");

   // pretty_dump($recommended);
   echo array_reduce($products,'makeProductList');

   ?>

   </div>
  </div>

<?php include "parts/footer.php" ?>

</body>
</html>