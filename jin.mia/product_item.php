<?php
include "lib/php/functions.php";
?><!DOCTYPE html>
<html lang="en">
<head>
    <?php include "parts/meta.php" ?>
   <title>Product Item</title>

</head>
<body>
   <?php include "parts/navbar.php" ?>
   
   <div class="container">
      <div class="card soft">
         <h2>Product Item</h2>

         <div>This is product item: #<?= $_GET['id'] ?></div>

      </div>
   </div>
</body>
</html>