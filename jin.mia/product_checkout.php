<?php
include "lib/php/functions.php";
include "parts/templates.php";
$cart = getCartItems();

?><!DOCTYPE html>
<html lang="en">
<head>
   <title>Checkout</title>
   
   <?php include "parts/meta.php" ?>
</head>
<body>
   <div class="container">
      <div class="grid">
         <div class="col-xs-12 col-md-8">
            <div class="card soft">
               <a href="#" onclick="history.back();return false;">Back</a>
               <h4>Shipping Information</h4>
            <div class="grid gap">
          <div class="col-xs-12 col-md-6">
            <div class="form-control">
            <label for="example1" class="form-label">First Name</label>
            <input id="example1" type="text" placeholder="First Name" class="form-input">
            </div>
          </div>
         <div class="col-xs-12 col-md-6">
          <div class="form-control">
            <label for="example2" class="form-label">Last Name</label>
            <input id="example2" type="text" placeholder="Last Name" class="form-input">
          </div>
         </div>
       </div>
         
         <div class="grid gap">
          <div class="col-xs-12 col-md-6">
           <div class="form-control">
            <label for="example3" class="form-label">Address</label>
            <input id="example3" type="text" placeholder="Address" class="form-input">
            </div>
          </div>
         <div class="col-xs-12 col-md-6">
          <div class="form-control">
            <label for="example3" class="form-label">City</label>
            <input id="example3" type="text" placeholder="City" class="form-input">
          </div>
        </div>
      </div>

      <div class="grid gap">
          <div class="col-xs-12 col-md-6">
           <div class="form-control">
            <label for="example3" class="form-label">State</label>
            <input id="example3" type="text" placeholder="State" class="form-input">
            </div>
          </div>
         <div class="col-xs-12 col-md-6">
          <div class="form-control">
            <label for="example3" class="form-label">ZIP Code</label>
            <input id="example3" type="text" placeholder="ZIP Code" class="form-input">
          </div>
        </div>
      </div>

       <div class="grid gap">
          <div class="col-xs-12 col-md-6">
           <div class="form-control">
            <label for="example3" class="form-label">Email</label>
            <input id="example3" type="text" placeholder="Email" class="form-input">
            </div>
          </div>
         <div class="col-xs-12 col-md-6">
          <div class="form-control">
            <label for="example3" class="form-label">Phone Number</label>
            <input id="example3" type="text" placeholder="Phone Number" class="form-input">
          </div>
        </div>
      </div>
       
         <h4>Credit Card Information</h4>
         <div class="grid gap">
          <div class="col-xs-12 col-md-6">
           <div class="form-control">
            <label for="example5" class="form-label">Credit Card Numver</label>
            <input id="example5" type="text" placeholder="1111 2222 3333" class="form-input-lined">
         </div>
        </div>
         
         <div class="col-xs-12 col-md-6">
         <div class="form-control">
            <label for="example6" class="form-label">Exp Date</label>
            <input id="example6" type="text" placeholder="mm/yy" class="form-input-lined">
         </div>
      </div>

      <div class="col-xs-12 col-md-6">
         <div class="form-control">
            <label for="example6" class="form-label">CVV</label>
            <input id="example6" type="text" placeholder="007" class="form-input-lined">
         </div>
      </div>
   </div>
            </div>
         </div>
         


         <div class="col-xs-12 col-md-4">
            <div class="card soft flat">
            <?
            echo array_reduce($cart,'makeCondensedCartList');
            echo cartTotals();
            ?>

               <div class="card-section">
                  <a class="form-button" href="product_actions.php?crud=reset-cart">CONFIRM PURCHASE</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</body>
</html>