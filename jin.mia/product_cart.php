<?php

include "lib/php/functions.php";
include "parts/templates.php";

//resetCart();
//pretty_dump(getCart());

$cart = getCartItems();

?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product Cart</title>
   
   <?php include "parts/meta.php" ?>
</head>
<body>
   <?php include "parts/navbar.php" ?>
   

   <div class="container">
      <div class="grid gap">
         <div class="col-xs-12 col-md-8">
            <div class="card soft flat">

               <?php

               if(!count($cart)) {
                  echo "<div class='card-section'>No Items In Cart Yet.</div>";
               }
               else {
                  echo array_reduce($cart,'makeCartList');
               }

               ?>
            </div>
         </div>
         <div class="col-xs-12 col-md-4">
            <div class="card soft flat">
               <div class="card-section">
                  <h5>Confirm Cart</h5>
               </div>
               <?= cartTotals() ?>
               <div class="card-section">
                  <a class="form-button" href="product_checkout.php">Checkout</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
</html>