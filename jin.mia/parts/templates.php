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
           <div class="center" style="margin-bottom: 4em"><a href="product_added_cart.php" class="button col-sm-6 col-md-3">ADD TO CART</a></div>

</div>
HTML;
}




function makeCartList($r,$o) {
return $r.<<<HTML
<div class="container">
 <div class="grid grid-justify-around">
 <div class="col-sm-12 col-md-3">
  <div class="product card samll soft" style="background-image:url($o->image)"></div>
  </div>
 


   <div class="col-sm-12 col-md-3">
    <div class="card flat" style="background-color:#e8edea">
     <div class="card-section">
      <h4>$o->name</h4>
       <h4>Delete</h4>
     </div>
    </div>
   </div>
 

   <div class="col-sm-12 col-md-3"></div>

   <div class="col-sm-12 col-md-3">
    <div class="card flat" style="background-color:#e8edea">
     <div class="card-section">
       <h4>&dollar;$o->price</h4>
     </div>
    </div>
   </div>
</div>
</div>
HTML;
}