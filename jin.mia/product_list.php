<?php
include "lib/php/functions.php";
include "parts/templates.php";
include "data/api.php";

// pretty_dump([$_GET,$_POST]);


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

<div class="container grid-justify-around" style="margin-top: 0">
   
 <div class="grid">
    <div class="col-xs-12 col-md-9" style="margin-top:4em">
       <form action="product_list.php" method="get" class="hotdog">
         <input type="hidden" name="t" value="search">
         <input type="hidden" name="d" value="<?=$_GET['d']?>">
         <input type="hidden" name="o" value="<?=$_GET['o']?>">
         <input type="hidden" name="l" value="<?=$_GET['l']?>">
         <input type="search" name="s" placeholder="Search" value="<?= $_GET['s'] ?>">
      </form>
  </div>
    
     <div class="col-xs-12 col-md-3">
       <form action="product_list.php" method="get" style="margin-top:4em; margin-left: 2em">
         <input type="hidden" name="t" value="search">
         <input type="hidden" name="s" value="<?=$_GET['s']?>">
         <input type="hidden" name="d" value="<?=$_GET['d']?>">
         <input type="hidden" name="o" value="<?=$_GET['o']?>">
         <input type="hidden" name="l" value="<?=$_GET['l']?>">
         <div class="form-select">
            <select onChange="checkSort(this)">
               <? makeSortOptions() ?>
            </select>
         </div>
      </form>
    </div>
    
    <div class="col-xs-12 col-md-3" style="margin-top:1em">
         <a href="product_list.php?t=products_by_category&category=skincare&d=<?=$_GET['d']?>&o=<?=$_GET['o']?>&l=<?=$_GET['l']?>&s=<?=$_GET['s']?>" class="filter inline">Skinkcare</a>
         <a href="product_list.php?t=products_by_category&category=eyecare&d=<?=$_GET['d']?>&o=<?=$_GET['o']?>&l=<?=$_GET['l']?>&s=<?=$_GET['s']?>" class="filter inline">Eyecare</a>
       </div>

  </div>
   
 </div>
 
<div class="containerwide grid-justify-around" style="margin-top: 0">
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



  <?php include "parts/footer.php" ?>

</body>
</html>