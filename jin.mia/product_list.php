<?php
include "lib/php/functions.php";
include "parts/templates.php";
?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product List</title>
   <?php include "parts/meta.php" ?>
</head>
<body>
  <?php include "parts/navbar.php" ?>
  <div class="view-window display-flex flex-align-center flex-justify-center window-shrink" style="background-image:url(img/ad5.jpeg)">
  </div>
   
<div class="containerwide grid-justify-around">
      <div class="grid">
         <?php

      $products = MYSQLIQuery("
         SELECT *
         FROM `products`
         ORDER BY `date_create` DESC
         LIMIT 12
      ");

      echo array_reduce($products,'makeProductList');

      ?>
   
    
   </div>
  </div>















<!-- 
   <div class="container">
      <div class="card soft">
         <ul> -->
            <!-- li*10>a[href='?id=$]'>{Product $} -->
           <!--  <li><a href="product_item.php?id=1">Product 1</a></li>
            <li><a href="product_item.php?id=2">Product 2</a></li>
            <li><a href="product_item.php?id=3">Product 3</a></li>
            <li><a href="product_item.php?id=4">Product 4</a></li>
            <li><a href="product_item.php?id=5">Product 5</a></li>
            <li><a href="product_item.php?id=6">Product 6</a></li>
            <li><a href="product_item.php?id=7">Product 7</a></li>
            <li><a href="product_item.php?id=8">Product 8</a></li>
            <li><a href="product_item.php?id=9">Product 9</a></li>
            <li><a href="product_item.php?id=10">Product 10</a></li>
         </ul>
      </div>
   </div> -->
  <?php include "parts/footer.php" ?>

</body>
</html>