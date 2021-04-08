<?php

include "../lib/php/function.php";

$users = file_get_json("users.json");

// pretty_dump($_SERVER);
// pretty_dump($_GET);








function showUserPage($user) {

$classes = implode(", ", $user->classes);

echo <<<HTML
<nav class="nav crumbs">
   <ul>
      <li><a href="{$_SERVER['PHP_SELF']}">Back</a></li>
   </ul>
</nav>
<div>
   <h2>$user->name</h2>
   <div>
      <strong>Type</strong>
      <span>$user->type</span>
   </div>
   <div>
      <strong>Email</strong>
      <span>$user->email</span>
   </div>
   <div>
      <strong>Classes</strong>
      <span>$classes</span>
   </div>
</div>
HTML;
}





?><!DOCTYPE html>
<html lang="en">
<head>
   <title>User Administrator</title>
   <?php include "../parts/meta.php" ?>
</head>
<body>
     <header class="navbar">
      <div class="container display-flex flex-align-center"  style="margin-top: 0">
         <div class="flex-none">
            <div class="brand">User Admin</div>
         </div>
         <div class="flex-stretch"></div>
         <nav class="flex-none nav flex">
            <ul>
               <li><a href="<?= $_SERVER['PHP_SELF'] ?>">List</a></li>
            </ul>
         </nav>
      </div>
   </header>

   <div class="container">
      <div class="card soft">

         <?php
         if(isset($_GET['id'])) {
            showUserPage($users[$_GET['id']]);
         } else {
         ?>

         <h2>User List</h2>

         <ul>
         <?php

         for($i=0; $i<count($users); $i++) {
            echo "<li>
            <a href='{$_SERVER['PHP_SELF']}?id=$i'>{$users[$i]->name}</a>
            </li>";
         }

         ?>
         </ul>
         <?php
         }
         ?>
      </div>
   </div>
</body>
</html>