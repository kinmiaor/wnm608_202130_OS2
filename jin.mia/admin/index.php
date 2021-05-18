<?php

include "../lib/php/functions.php";
include "../data/api.php";


// pretty_dump($_SERVER);
// pretty_dump([$_GET,$_POST]);


$products = makeStatement("products_admin_all");


// pretty_dump($products);

$empty_object = (object) [
   "name"=>"Aloe Clean Set",
   "price"=>"89",
   "category"=>"skincare",
   "image"=>"img/product13.jpg",
   "description"=>"Hydrate & balance",
   "quantity"=>"100",
   
];




switch(@$_GET['crud']) {
   case 'update':
      makeStatement("product_update");
      header("location:{$_SERVER['PHP_SELF']}?id=".$_GET['id']);
      break;
   case 'create':
      $result = makeStatement("product_insert");
      header("location:{$_SERVER['PHP_SELF']}?id=".$result->insert_id);
      break;
   case 'delete':
      makeStatement("product_delete");
      header("location:{$_SERVER['PHP_SELF']}");
      break;
}




// switch(@$_GET['crud']) {
//    case 'update':
//       $products[$_GET['id']]->name = $_POST['product-name'];
//       $products[$_GET['id']]->type = $_POST['product-type'];
//       $products[$_GET['id']]->email = $_POST['product-email'];
//       $products[$_GET['id']]->classes = explode(", ",$_POST['product-classes']);

//       file_put_contents($filename,json_encode($products));

//       header("location:{$_SERVER['PHP_SELF']}?id=".$_GET['id']);
//       break;
//    case 'create':
//       $empty_object->name = $_POST['product-name'];
//       $empty_object->type = $_POST['product-type'];
//       $empty_object->email = $_POST['product-email'];
//       $empty_object->classes = explode(", ",$_POST['product-classes']);

//       $id = count($products);

//       // array_push()
//       $products[] = $empty_object;

//       file_put_contents($filename,json_encode($products));

//       header("location:{$_SERVER['PHP_SELF']}?id=$id");
//       break;
//    case 'delete':
//       array_splice($products,$_GET['id'],1);

//       file_put_contents($filename,json_encode($products));

//       header("location:{$_SERVER['PHP_SELF']}");
//       break;
// }





// function showProductPage($product) {

// $id = $_GET['id'];
// $classes = implode(", ", $product->classes);
// $addoredit = $id=="new" ? 'Add' : 'Edit';
// $createorupdate = $id=="new" ? 'create' : 'update';


// // heredoc
// echo <<<HTML
// <div class="grid gap">
// <div class="col-xs-12">
// <div class="card soft">
// <nav class="nav pills display-flex">
//    <div class="flex-none"><a href="{$_SERVER['PHP_SELF']}"><img src="img/icon/arrow-left.svg" class="icon" style="font-size:1.5em"></a></div>
//    <div class="flex-stretch"></div>
//    <div class="flex-none"><a href="{$_SERVER['PHP_SELF']}?id=$id&crud=delete"><img src="img/icon/trash.svg" class="icon" style="font-size:1.5em"></a></div>
// </nav>
// </div>
// </div>
// <div class="col-xs-12 col-md-4">
//    <div class="card soft">
//       <h2>$product->name</h2>
//       <div>
//          <strong>Type</strong>
//          <span>$product->type</span>
//       </div>
//       <div>
//          <strong>Email</strong>
//          <span>$product->email</span>
//       </div>
//       <div>
//          <strong>Classes</strong>
//          <span>$classes</span>
//       </div>
//    </div>
// </div>
// <form class="col-xs-12 col-md-8" method="post" action="{$_SERVER['PHP_SELF']}?id=$id&crud=$createorupdate">
//    <div class="card soft">
//       <h2>$addoredit Product</h2>
//       <input type="hidden" name="id" value="$id">
//       <div class="form-control">
//          <label class="form-label" for="product-name">Name</label>
//          <input class="form-input"type="text" id="product-name" name="product-name" value="$product->name">
//       </div>
//       <div class="form-control">
//          <label class="form-label" for="product-type">Type</label>
//          <input class="form-input"type="text" id="product-type" name="product-type" value="$product->type">
//       </div>
//       <div class="form-control">
//          <label class="form-label" for="product-email">Email</label>
//          <input class="form-input"type="email" id="product-email" name="product-email" value="$product->email">
//       </div>
//       <div class="form-control">
//          <label class="form-label" for="product-classes">Classes</label>
//          <input class="form-input"type="text" id="product-classes" name="product-classes" value="$classes">
//       </div>
//       <div class="form-control">
//          <input class="form-button" type="submit" value="Submit">
//       </div>
//    </div>
// </form>
// </div>
// HTML;
// }



function productListItem($r,$product) {
return $r.<<<HTML
<div class="card-section">
   <div class="display-flex">
      <div class="flex-none">
        <div class="product card bottom soft" style="background-image:url($product->image)">
      </div>
      <div class="flex-stretch">$product->name</div>  
      <div class="flex-none">
         <a href="product_item.php?id=$product->id" class="form-button">Visit</a>
         <a href="{$_SERVER['PHP_SELF']}?id=$product->id" class="form-button">Edit</a>
      </div>  
   </div>
</div>
HTML;
}


function showProductPage($product) {

$id = $_GET['id'];
$thumbs = explode(",", $product->image);
$thumb_elements = array_reduce($thumbs,function($r,$o){
   return $r."<img src='img/$o'>";
});
$addoredit = $id=="new" ? 'Add' : 'Edit';
$createorupdate = $id=="new" ? 'create' : 'update';

echo <<<HTML
<div class="grid gap">
<div class="col-xs-12">
<div class="card soft">
<nav class="nav pills display-flex">
   <div class="flex-none"><a href="{$_SERVER['PHP_SELF']}"><img src="img/arrow-left.svg" class="icon" style="font-size:1.5em"></a></div>
   <div class="flex-stretch"></div>
   <div class="flex-none"><a href="{$_SERVER['PHP_SELF']}?id=$id&crud=delete"><img src="img/trash.svg" class="icon" style="font-size:1.5em"></a></div>
</nav>
</div>
</div>
<div class="col-xs-12 col-md-4">
   <div class="card soft">
      <h2>$product->name</h2>
      <div>
         <strong>Price</strong>
         <span>&dollar;$product->price</span>
      </div>
      <div>
         <strong>Category</strong>
         <span>$product->category</span>
      </div>
      <div>
         <strong>Description</strong>
         <span>$product->description</span>
      </div>
      <div>
         <strong>Image</strong>
         <div class="image-thumbs">
            <img src="product->image">
         </div>
      </div>
     <div>
         <strong>Quantity</strong>
         <div>$product->quantity</div>
      </div>
  
     
   </div>
</div>
<form class="col-xs-12 col-md-8" method="post" action="{$_SERVER['PHP_SELF']}?id=$id&crud=$createorupdate">
   <div class="card soft">
      <h2>$addoredit Product</h2>
      <input type="hidden" name="id" value="$id">
      <div class="form-control">
         <label class="form-label" for="product-title">Title</label>
         <input class="form-input"type="text" id="product-name" name="product-title" value="$product->name">
      </div>
      <div class="form-control">
         <label class="form-label" for="product-category">Category</label>
         <input class="form-input"type="text" id="product-category" name="product-category" value="$product->category">
      </div>
      <div class="form-control">
         <label class="form-label" for="product-description">Description</label>
         <textarea class="form-input"type="text" id="product-description" name="product-description">$product->description</textarea>
      </div>
      <div class="form-control">
         <label class="form-label" for="product-image_thumb">Image</label>
         <input class="form-input"type="text" id="product-image" name="product-image_thumb" value="$product->image">
      </div>
      <div class="form-control">
         <label class="form-label" for="product-quantity">Quantity</label>
         <input class="form-input" type="number" id="product-quantity" name="product-quantity" value="$product->quantity">
      </div>
      <div class="form-control">
         <input class="form-button" type="submit" value="Submit">
      </div>
   </div>
</form>
</div>
HTML;
}





?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Product Administrator</title>
   <?php include "../parts/meta.php" ?>
</head>
<body>
   <header class="navbar">
      <div class="container display-flex flex-align-center" style="margin-top: 0">
         <div class="flex-none">
            <h3>Product Admin</h3>
         </div>
         <div class="flex-stretch"></div>
         <nav class="flex-none nav flex">
            <ul>
               <li><a href="<?= $_SERVER['PHP_SELF'] ?>">List</a></li>
               <li><a href="<?= $_SERVER['PHP_SELF'] ?>?id=new">Add New Product</a></li>
            </ul>
         </nav>
      </div>
   </header>
<hr>
     <div class="container">

         <?php
         if(isset($_GET['id'])) {
            // ternary, conditional
            showProductPage(
               $_GET['id']=="new" ?
               $empty_object :
               getItemById($products,$_GET['id'])
            );
         } else {
         ?>

      <div class="card soft flat">
         <div class="card-section"><h2>Product List</h2></div>
         <?php

         echo array_reduce($products,'productListItem');

         ?>
      </div>
         <?php
         }
         ?>
   </div>
</body>
</html>