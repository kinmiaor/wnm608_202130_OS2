<?php

function makeProductList($r,$o) {
return $r.<<<HTML

<div class="col-xm-12 col-sm-6 col-md-3">
   <a href="product_item.php?id=$o->id" class="product">
      <div class="product card bottom soft" style="background-image:url($o->image)">
         
      </div></a>
         
         <h5>$o->name</h5>
          <h6>$o->description</h6>
           <h5>&dollar;$o->price</h5>
          
</div>
HTML;
}

function selectAmount($amount=1,$total=10) {
   $output = "<select name='amount'>";
   for($i=1;$i<$total;$i++) {
      $output .= "<option ".($i==$amount?'selected':'').">$i</option>";
   }
   $output .= "</select>";
   return $output;
}



function makeCartList($r,$o) {
$totalfixed = number_format($o->total,2,'.','');
$amountselect = selectAmount($o->amount,10);
return $r.<<<HTML
<div class="container">
 <div class="grid grid-justify-around">
 <div class="col-sm-12 col-md-3">
  <div class="product card samll soft" style="background-image:url($o->image)"></div>
  </div>
 


   <div class="col-sm-12 col-md-5">
    <div class="card flat">
     <div class="card-section">
   <h4>$o->name</h4>
      <form action="product_actions.php?crud=delete-cart-item" method="post" style="font-size:0.8em">
         <input type="hidden" name="id" value="$o->id">
        <input type="submit" value="delete" class="button">
      </form>
     </div>
    </div>
   </div>
 

   <div class="col-sm-12 col-md-1">
     <form action="product_actions.php?crud=update-cart-item" method="post" onchange="this.submit()" style="font-size:0.8em;margin-top: 5.5em">
         <input type="hidden" name="id" value="$o->id">
         <div class="form-select">
            $amountselect
         </div>
      </form>
   </div>

   <div class="col-sm-12 col-md-3">
    <div class="card flat">
     <div class="card-section">
       <h4>&dollar;$o->total</h4>
     </div>
    </div>
   </div>
</div>
</div>
HTML;
}

function makeCondensedCartList($r,$o) {
$totalfixed = number_format($o->total,2,'.','');
$amountselect = selectAmount($o->amount,10);
return $r.<<<HTML
<div class="display-flex card-section">
   <div class="flex-stretch">
      <strong>$o->title</strong>
   </div>
   <div class="flex-none">
      <div>&dollar;$totalfixed</div>
   </div>
</div>
HTML;
}



function cartTotals() {
$cart = getCartItems();

$cartprice = array_reduce($cart,function($r,$o){return $r+$o->total;},0);

$pricefixed = number_format($cartprice,2,".","");
$tax = number_format($cartprice*0.0275,2,".","");
$taxed = number_format($cartprice*1.0275,2,".","");

return <<<HTML
<div class="card-section display-flex">
   <div class="flex-stretch">
      <strong>Sub Total</strong>
   </div>
   <div class="flex-none">&dollar;$pricefixed</div>
</div>
<div class="card-section display-flex">
   <div class="flex-stretch">
      <strong>Taxes</strong>
   </div>
   <div class="flex-none">&dollar;$tax</div>
</div>
<div class="card-section display-flex">
   <div class="flex-stretch">
      <strong>Total</strong>
   </div>
   <div class="flex-none">&dollar;$taxed</div>
</div>
HTML;
}