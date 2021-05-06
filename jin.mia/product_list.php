<?php
include "lib/php/functions.php";
include "parts/templates.php";
include "data/api.php";





setDefault('s',''); // search
setDefault('t','products_all'); // type
setDefault('d','DESC'); // order direction
setDefault('o','date_create'); // order by
setDefault('l','12'); // limit

// pretty_dump($_GET);


function makeSortOptions() {
   $options = [
      ["date_create","DESC","Latest Products"],
      ["date_create","ASC","Oldest Products"],
      ["price","DESC","Highest Price"],
      ["price","ASC","Lowest Price"]
   ];
   foreach($options as [$orderby,$direction,$name]) {
      echo "
      <option data-orderby='$orderby' data-direction='$direction'
      ".($_GET['o']==$orderby && $_GET['d']==$direction ? "selected" : "").">
      $name</option>
      ";
   }
}

if(isset($_GET['t'])) {
   $result = makeStatement($_GET['t']);
   $products = isset($result['error']) ? [] : $result;
} else {
   $result = makeStatement("products_all");
   $products = isset($result['error']) ? [] : $result;
}


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

 <form action="product_list.php" method="get" class="hotdog" style="margin-top:1em">
         <input type="hidden" name="t" value="search">
         <input type="hidden" name="d" value="<?=$_GET['d']?>">
         <input type="hidden" name="o" value="<?=$_GET['o']?>">
         <input type="hidden" name="l" value="<?=$_GET['l']?>">
         <input type="search" name="s" placeholder="Search" value="<?= $_GET['s'] ?>">
      </form>

      <!-- <div>
         <a href="product_list.php?t=products_by_category&category=fruit&d=<?=$_GET['d']?>&o=<?=$_GET['o']?>&l=<?=$_GET['l']?>&s=<?=$_GET['s']?>" class="button inline">Fruit</a>
         <a href="product_list.php?t=products_by_category&category=vegetable&d=<?=$_GET['d']?>&o=<?=$_GET['o']?>&l=<?=$_GET['l']?>&s=<?=$_GET['s']?>" class="button inline">Vegetable</a>
      </div> -->

       <form action="product_list.php" method="get">
         <input type="hidden" name="t" value="search">
         <input type="hidden" name="d" value="<?=$_GET['d']?>">
         <input type="hidden" name="o" value="<?=$_GET['o']?>">
         <input type="hidden" name="l" value="<?=$_GET['l']?>">
         <div class="form-select">
            <select onChange="checkSort(this)">
               <? makeSortOptions() ?>
            </select>
         </div>
      </form>
   
<div class="containerwide grid-justify-around">
      <div class="grid">
         <?php

     if(empty($products)) {
         echo "No products found.";
      } else {
         echo array_reduce($products,'makeProductList');
      }
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