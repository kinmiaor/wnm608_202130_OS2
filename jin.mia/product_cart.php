<?php

include "lib/php/functions.php";
include "parts/templates.php";

$cart = MYSQLIQuery("
   SELECT *
   FROM `products`
   WHERE `id` IN (5,9,2)
");

?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product Cart</title>
   
   <?php include "parts/meta.php" ?>
</head>
<body>
   <?php include "parts/navbar.php" ?>
   <hr>
   

   <div class="container">
     
         <h2>Confirm Cart</h2>

         <?php

         echo array_reduce($cart,'makeCartList');

         ?>

         <div>
            <a class="form-button" href="product_checkout.php">Checkout</a>
         </div>
    
   </div>
    <?php include "parts/footer.php" ?>

</body>
</html>