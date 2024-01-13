
<?php require viewsPath('partials/header');  ?>

<div class="d-flex">
<div  class=" col col-6 pt-2  item-container">
<div style="border-bottom: 1px solid black"><center><h3>Items </h3></center></div>

<div class="products row container-fluid">
  

<div class="card product-card" >
  <a href="">
  <img src="assets/images/chocolate.png" class="card-img-top" style="height: 115px ;" alt="...">
</a>
  <div class="">
    <p class=" product-name">Chocolate</p>
    <div><b>Php 20</b></div>
  </div>
</div>

<div class="card product-card" >
  <a href="">
  <img src="assets/images/chocolate.png" class="card-img-top" style="height: 115px ;" alt="...">
</a>
  <div class="">
    <p class=" product-name">Chocolate</p>
    <div><b>Php 20</b></div>
  </div>
</div>

<div class="card product-card" >
  <a href="">
  <img src="assets/images/chocolate.png" class="card-img-top" style="height: 115px ;" alt="...">
</a>
  <div class="">
    <p class=" product-name">Chocolate</p>
    <div><b>Php 20</b></div>
  </div>
</div>

<div class="card product-card" >
<a href="">
  <img src="assets/images/wchocolate.png" class="card-img-top" style="height: 115px ;" alt="...">
</a>
  <div class="">
    <p class="product-name">White Chocolate</p>
    <div><b>Php 20</b></div>
  </div>
</div>

<div class="card product-card" >
<a href="">
  <img src="assets/images/wchocolate.png" class="card-img-top" style="height: 115px ;" alt="...">
</a>
  <div class="">
    <p class="product-name">White Chocolate</p>
    <div><b>Php 20</b></div>
  </div>
</div>

<div class="card product-card" >
<a href="">
  <img src="assets/images/strawberry.png" class="card-img-top" style="height: 115px ;" alt="...">
</a>
  <div>
      <p class=" product-name">Strawberry</p>
    <div><b>Php 20</b></div>
  </div>
</div>


</div>



</div>
<div class="col col-5 p-4 pt-2 m-5 cart-container"  >
  <div style="border-bottom: 1px solid black"><center><h3>Cart <div class="badge bg-primary rounded circle">3</div></h3></center></div>

<div class="table-responsive" style="height:350px;">
<table class="table table-striped table-hover">
  <tr >
    <th>Item</th>
<th >Description</th>
<th>Amount</th>
  </tr>
  <!-- ///////////// -->
<tr>
  <td>
<img src="assets/images/chocolate.png" class="" style="height: 70px; " alt="...">
  </td>
  <td>
 <p class=" product-name">
  Chocolate
  <div class="input-group mb-3 " >
  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus"></i></span>
  <input type="text" class="" placeholder="1" style="width: 50px;" >
  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus"></i></span>
</div>
 </p>
  </td>
  <td>
 <div><p class="product-name"><b>Php 20</b><span class="" style="cursor: pointer; margin-left:28px;"><i class="fa fa-close"></i></p></div>
  </td>
</tr>
  <!-- ///////////// -->
  <!-- ///////////// -->
 <tr>
  <td>
<img src="assets/images/chocolate.png" class="" style="height: 70px; " alt="...">
  </td>
  <td>
 <p class=" product-name">
  Chocolate
  <div class="input-group mb-3 " >
  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus"></i></span>
  <input type="text" class="" placeholder="1" style="width: 50px;" >
  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus"></i></span>
</div>
 </p>
  </td>
  <td>
 <div><p class="product-name"><b>Php 20</b><span class="" style="cursor: pointer; margin-left:18px;"><i class="fa fa-close"></i></p></div>
  </td>
</tr>
  <!-- ///////////// -->
  <!-- ///////////// -->
 <tr>
  <td>
<img src="assets/images/chocolate.png" class="" style="height: 70px; " alt="...">
  </td>
  <td>
 <p class=" product-name">
  Chocolate
  <div class="input-group mb-3 " >
  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus"></i></span>
  <input type="text" class="" placeholder="1" style="width: 50px;" >
  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus"></i></span>
</div>
 </p>
  </td>
  <td>
 <div><p class="product-name"><b>Php 20</b><span class="" style="cursor: pointer; margin-left:18px;"><i class="fa fa-close"></i></p></div>
  </td>
</tr>
  <!-- ///////////// -->
  <!-- ///////////// -->
 <tr>
  <td>
<img src="assets/images/chocolate.png" class="" style="height: 70px; " alt="...">
  </td>
  <td>
 <p class=" product-name">
  Chocolate
  <div class="input-group mb-3 " >
  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus"></i></span>
  <input type="text" class="" placeholder="1" style="width: 50px;" >
  <span class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus"></i></span>
</div>
 </p>
  </td>
  <td>
 <div><p class="product-name"><b>Php 20</b><span class="" style="cursor: pointer; margin-left:18px;"><i class="fa fa-close"></i></span></p>  </div>
  </td>
</tr>
  <!-- ///////////// -->


  
</table>
</div>
<div class="d-grid gap-2 ">
  <div class="alert alert-danger">Total:  80</div>
  <button class="btn btn-success p-2" type="button">Checkout</button>
  <button class="btn btn-primary" type="button">Clear All</button>
</div>
</div>

</div>


<?php require viewsPath('partials/footer');  ?>