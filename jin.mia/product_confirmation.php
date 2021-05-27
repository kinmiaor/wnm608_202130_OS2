<?php
include "lib/php/functions.php";
include "parts/templates.php";
?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Confirmation</title>
   
   <?php include "parts/meta.php" ?>
</head>
<body>
   <?php include "parts/navbar.php" ?>
   <hr>
   

   <div class="container">

         <h2>Thank you for your purchase!</h2>
          <div class="center">
           <div class="foodertext">An comfirmation email has been sent to your email. Subscrib now, get product promotions on holidays!</div>
           </div>
          <div class="grid gap">
             <div class="col-xs-12 col-md-3"></div>

            <div class="col-xs-12 col-md-5">
             <div class="form-control">
            <input id="example3" type="email" placeholder="Email" class="form-input">
            </div>
         </div>

            <div class="col-xs-12 col-md-4" style="margin-top:1em">
           
            <a class="smallbutton" href="#">Subscribe</a>
         </div>
    </div>
  
 <h3>Customers Also Bought</h3>
 <div class="grid">
    
   
   <? 

   $products = MYSQLIQuery("
      SELECT *
      FROM `products`
      WHERE `category` = 'eyecare'
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