 <header class="navbar">
   <div class="container display-flex flex-align-center" style="margin-top: 0">
      <div class="flex-none">
         <div class="brand">LITTLE GREEN HOUSE</div>
      </div>
      <div class="flex-stretch"></div>
      <nav class="flex-none nav flex">
         <ul>
            <li><a href="index.php">HOME</a></li>
            <li><a href="product_list.php">SHOP</a></li>
            <li><a href="aboutus.php">ABOUT</a></li>
            <li><a href="product_cart.php">
            <span>CART</span>
            <span class="badge"><?= makeCartBadge() ?></span>
         </a></li>
         </ul>
      </nav>
   </div>
</header>
