
<?php require viewsPath('partials/header');  ?>

<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
<form methos="post"></form>
  <h3>Add Product</h3>
  <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Product Description:</label>
  <input name="description" type="text" class="form-control" id="description" placeholder="Product Description">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Barcode (Optional)</label>
  <input type="text" class="form-control" id="barcode" name="barcode" placeholder="Product barcode">
</div>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Qty:</span>
  <input type="number" value="1" class="form-control" placeholder="Quantity" aria-label="quantity" aria-describedby="quantity">
  <span class="input-group-text" id="basic-addon1">Amount:</span>
  <input type="number" class="form-control" step="0.50" placeholder="Amount" aria-label="amount" aria-describedby="amount">
</div>

<div class=" mb-3">
  <label class="form-label" for="image">Upload Product Image</label>
  <input type="file" name="image" class="form-control" id="image">
</div>


<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="submit" class="btn btn-secondary">Cancel</button>
    <button type="submit" class="btn btn-success">Add</button>
  </div>
</form>
</div>


<?php require viewsPath('partials/footer');  ?>