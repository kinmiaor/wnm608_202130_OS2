<?php

function makeProductList($r,$o) {
return $r.<<<HTML
<div class="col-sm-6 col-md-3">
   <a href="product_item.php?id=$o->id" class="product">
      <div class="product card bottom soft" style="background-image:url($o->image)">
         
      </div></a>
         
         <h5>$o->name</h5>
          <h6>$o->description</h6>
           <h5>&dollar;$o->price</h5>

</div>
HTML;
}




function makeCartList($r,$o) {
return $r.<<<HTML
<div class="display-flex">
   <div class="flex-none image-thumbs">
      <img src="/images/store/$o->image_thumb">
   </div>
   <div class="flex-stretch">
      <strong>$o->title</strong>
      <div>Delete</div>
   </div>
   <div class="flex-none">
      &dollar;$o->price
   </div>
</div>
HTML;
}