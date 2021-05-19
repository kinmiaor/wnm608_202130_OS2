<?php

@include_once "../lib/php/functions.php";


function getRequires($props) {
   foreach($props as $prop) {
      if(!isset($_GET[$prop])) return false;
   }
   return true;
}


function makeStatement($type) {
   switch($type) {
      case "products_all":
         if(!getRequires(['o','d','l']))
            return ["error"=>"Missing Properties"];
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            ORDER BY `{$_GET['o']}` {$_GET['d']}
            LIMIT {$_GET['l']}
         ");
         break;
         
      case "products_admin_all":
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            ORDER BY `date_create` DESC
         ");
         break;

      case "product_by_id":
         if(!getRequires(['id']))
            return ["error"=>"Missing Properties"];
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            WHERE `id` = '{$_GET['id']}'
         ");
         break;
         
      case "products_by_category":
         if(!getRequires(['category']))
            return ["error"=>"Missing Properties"];
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            WHERE
               (`name` LIKE '%{$_GET['s']}%' OR
               `description` LIKE '%{$_GET['s']}%') AND
               `category` = '{$_GET['category']}'
            ORDER BY `{$_GET['o']}` {$_GET['d']}
            LIMIT {$_GET['l']}
         ");
         break;



      case "search":
         if(!getRequires(['s','o','d','l']))
            return ["error"=>"Missing Properties"];
         return MYSQLIQuery("
            SELECT *
            FROM `products`
            WHERE
               `name` LIKE '%{$_GET['s']}%' OR
               `category` LIKE '%{$_GET['s']}%' OR
               `description` LIKE '%{$_GET['s']}%'
            ORDER BY `{$_GET['o']}` {$_GET['d']}
            LIMIT {$_GET['l']}
         ");
         break;

    


      // CRUD
      case "product_update":
         $conn = MYSQLIConn();
         $stmt = $conn->prepare("UPDATE `products`
            SET
               `name` = ?,
               `price` = ?,
               `category` = ?,
               `image` = ?,
               `description` = ?,
               `quantity` = ?,
               `date_modify` = NOW()
            WHERE `id` = ?
            ");
         
        $stmt->bind_param("sdsssii",
            $_POST['product-name'],
            $_POST['product-price'],
            $_POST['product-category'],
            $_POST['product-image'],
            $_POST['product-description'],
            $_POST['product-quantity'],
            $_POST['id']
         );
         $stmt->execute();
         break;

      case "product_insert":
         $conn = MYSQLIConn();
         $stmt = $conn->prepare("INSERT INTO `products`
            (
               `name`,
               `price`,
               `category`,
               `image`,
               `description`,
               `quantity`,
               `date_create`,
               `date_modify`
            )
            VALUES
            (
               ?,
               ?,
               ?,
               ?,
               ?,
               ?,
               NOW(),
               NOW()
            )
            ");
         $stmt->bind_param("sdsssi",
            $_POST['product-name'],
            $_POST['product-price'],
            $_POST['product-category'],
            $_POST['product-image'],
            $_POST['product-description'],
            $_POST['product-quantity']
         );
         $stmt->execute();
         return $conn;

      case "product_delete":
         $conn = MYSQLIConn();
         $stmt = $conn->prepare("DELETE FROM `products`
            WHERE `id` = ?
            ");
         $stmt->bind_param("i",$_GET['id']);
         $stmt->execute();
         break;


      default: return ["error"=>"No Matched Type"];
   }
}