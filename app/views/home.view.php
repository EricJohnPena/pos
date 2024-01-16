<?php require viewsPath('partials/header');  ?>

<div class="d-flex">
  <div class=" col col-6 pt-2  item-container">
    <div style="border-bottom: 1px solid black">
      <center>
        <h3>Items </h3>
      </center>
    </div>

    <div onclick="addItem(event)" class="products row container-fluid">

    </div>

  </div>
  <div class="col col-5 p-4 pt-2 m-5 cart-container">
    <div style="border-bottom: 1px solid black">
      <center>
        <h3>Cart <div class="badge bg-primary rounded circle item-count">0</div>
        </h3>
      </center>
    </div>

    <div class="table-responsive" style="height:350px;">
      <table class="table table-striped table-hover">
        <tr>
          <th>Item</th>
          <th>Description</th>
          <th>Amount</th>
        </tr>
        <tbody class="items">

        </tbody>

      </table>
    </div>
    <div class=" d-grid gap-2 ">
      <div class="gtotal alert alert-danger">Total: Php 0.00 </div>
      <button class="btn btn-success p-2" type="button" data-bs-toggle="modal" data-bs-target="#checkOutModal">Checkout</button>
      <button onclick="clearAll();" class="btn btn-primary" type="button">Clear All</button>
    </div>
  </div>

</div>

<!-- Modal -->
<div class="modal fade" id="checkOutModal" tabindex="-1" aria-labelledby="checkOutModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" style=" background-color:#DECDB0 ;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="checkOutModalLabel">Checkout</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <input class="form-control amount-paid" type="number" placeholder="Enter amount paid" aria-label="default input example">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#checkOutChangeModal" style="background-color:#8EDAD1; color:black;">Next</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="checkOutChangeModal" tabindex="-1" aria-labelledby="checkOutChangeModalLabel" aria-hidden="true" >
  <div class="modal-dialog" >
    <div class="modal-content" style=" background-color:#DECDB0 ;">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="checkOutChangeModalLabel">Change Amount</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
  <div class="container" style="background-color: #DECDB0;">
<center>
    <p class="change-amount" style="font-size: 40px;"></p>
</center>
  </div>
</div>
      <div class="modal-footer mx-auto">
      
          <button type="button" class="btn btn-secondary btn-lg "style="background-color:#8EDAD1; color:black;" data-bs-dismiss="modal">Continue</button>
        
     
      </div>
    </div>
  </div>
</div>


<script>
// Get the elements by their ids
var amountPaid = document.querySelector("#checkOutModal .amount-paid");
var changeAmount = document.querySelector("#checkOutChangeModal .change-amount");
var nextButton = document.querySelector("#checkOutModal .btn-primary");

// Add a click event listener to the next button
nextButton.addEventListener("click", function() {
  // Get the value of the amount paid and the GTOTAL
  var paid = parseFloat(amountPaid.value);
  var total = GTOTAL;
  // Calculate the change
  var change = paid - total;

  // Display the change in the second modal
  changeAmount.textContent = change.toFixed(2);
  ITEMS = [];
  refreshItems();
});

  var PRODUCTS = [];
  var ITEMS = [];
  var GTOTAL = 0;

  function sendData(data) {
    var ajax = new XMLHttpRequest();
    ajax.addEventListener('readystatechange', function(e) {
      if (ajax.readyState == 4) {
        
        if (ajax.status == 200) {
          handleResult(ajax.responseText);
        } else {
          console.log("Error");
        }
      }
    });

    ajax.open('post', 'index.php?pg=ajax', true);
    ajax.send(JSON.stringify(data));
  }


  function handleResult(result) {

    var obj = JSON.parse(result);

    if (typeof obj != "undefined") {


      var mydiv = document.querySelector(".products");
      mydiv.innerHTML = "";
      PRODUCTS = obj;
      for (var i = 0; i < obj.length; i++) {

        mydiv.innerHTML += productHTML(obj[i], i);
      }
    }

  }

  function productHTML(data, index) {
    return `
  <div class="card product-card mt-2 mx-auto" >
  
  <img index ="${index}" src="${data.image}" class="card-img-top mt-2" style="height: 115px ;" alt="..."></img>

  <div class="">
    <p class=" product-name">${data.description}</p>
    <div><b>Php ${data.amount}</b></div>
  </div>
</div>
`;
  }

  function itemHTML(data, index) {
    return `
  <!-- ///////////// -->
<tr>
  <td >
<img src="${data.image}" class="" style="height: 70px; max-width:100px; " alt="...">
  </td>
  <td>
 <p class=" product-name">
 ${data.description}
  <div class="input-group mb-3 " >
  <span index = "${index}" onclick="changeQty('down', event)" class="input-group-text" style="cursor: pointer;"><i class="fa fa-minus"></i></span>
  <input index = "${index}" onblur="changeQty('input', event)" type="text" class="" value="${data.quantity}" placeholder="1" style="width: 50px;" >
  <span index = "${index}" onclick="changeQty('up', event)" class="input-group-text" style="cursor: pointer;"><i class="fa fa-plus"></i></span>
</div>
 </p>
  </td>
  <td>
 <div class="product-name mx-auto"><p><b>Php ${data.amount}</b> <button onclick="clearItem(${index});" class="btn float-end"> <i class="fa fa-close"></i></buuton>
 </p></div>
  </td>
</tr>
  <!-- ///////////// -->
`;
  }

  function addItemIndex(index) {
    for (var i = ITEMS.length - 1; i >= 0; i--) {
      if (ITEMS[i].id == PRODUCTS[index].id) {
        ITEMS[i].quantity += 1;
        refreshItems();
        return;
      }
    }

    var temp = PRODUCTS[index];
    temp.quantity = 1;

    ITEMS.push(temp);
    refreshItems();

  }

  function addItem(e) {

    if (e.target.tagName == "IMG") {
      var index = e.target.getAttribute("index");

      addItemIndex(index);

    }
  }

  function refreshItems() {
    var item_count = document.querySelector(".item-count");
    item_count.innerHTML = ITEMS.length;

    var item_div = document.querySelector(".items");
    item_div.innerHTML = "";
    var grand_total = 0;
    for (var i = ITEMS.length - 1; i >= 0; i--) {
      item_div.innerHTML += itemHTML(ITEMS[i], i);
      grand_total += ITEMS[i].quantity * ITEMS[i].amount;
    }
    var gtotal_div = document.querySelector(".gtotal");
    gtotal_div.innerHTML = "Total: Php " + grand_total;
    GTOTAL = grand_total;

  }

  function clearAll() {
    if (!confirm('Are you sure to remove all items?')) return;
    ITEMS = [];
    refreshItems();
  }
  function clearItem(index) {
    if (!confirm('Remove item?')) return;
    ITEMS.splice (index,1);
    refreshItems();
  }

  function changeQty(direction, e) {

    var index = e.currentTarget.getAttribute('index');
    if (direction == "up") {
      ITEMS[index].quantity += 1;
    } else if (direction == "down") {
      ITEMS[index].quantity -= 1;
    } else {
      ITEMS[index].quantity = parseInt(e.currentTarget.value);
    }
    if (ITEMS[index].quantity < 1) {
      ITEMS[index].quantity = 1;
    }
    refreshItems();
  }
  sendData();
</script>

<?php require viewsPath('partials/footer');  ?>