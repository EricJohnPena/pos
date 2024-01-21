<?php require viewsPath('partials/header');  ?>

<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
  <?php if(!empty($row)):?>
  <form method="post" enctype="multipart/form-data">
  <h3>Delete Sale Record</h3>
  <div class="alert alert-danger text-center">
    Are you sure you want to delete this sale record?
  </div>
  <div class="row">
  <div class="mb-3 col-lg-6">
    <label for="formGroupExampleInput" class="form-label">Product:</label>
    <input disabled value="<?=setValue('description', $row['description']) ?>"  type="text" class="form-control" >
  </div>
  <div class="mb-3 col-lg-6">
    <label for="formGroupExampleInput" class="form-label">Quantity:</label>
    <input disabled value="<?=setValue('quantity', $row['quantity']) ?>"  type="text" class="form-control" >
  </div>
  <div class="mb-3 col-lg-6">
    <label for="formGroupExampleInput" class="form-label">Price:</label>
    <input disabled value="<?=setValue('amount', $row['amount']) ?>"  type="text" class="form-control" >
  </div>
  <div class="mb-3 col-lg-6">
    <label for="formGroupExampleInput" class="form-label">Total:</label>
    <input disabled value="<?=setValue('total', $row['total']) ?>"  type="text" class="form-control" >
  </div>
  <div class="mb-3 col-lg-6">
    <label for="formGroupExampleInput" class="form-label">Cashier:</label>
    <input disabled value="<?=setValue('id', $row['id']) ?>"  type="text" class="form-control" >
  </div>
  <div class="mb-3 col-lg-6">
    <label for="formGroupExampleInput" class="form-label">Date of Transaction:</label>
    <input disabled value="<?=setValue('date', date("jS M, Y", strtotime($row['date']))) ?>"  type="text" class="form-control" >
  </div>
</div>
 

  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="index.php?pg=admin&tab=sales">
      <button type="button"  class="btn btn-secondary col-12">Cancel</button>
    </a>
    <button type="submit" class="btn btn-danger">Delete</button>
  </div>
  </form>
  <?php else: ?>
    No sales record found.
    <br><br>
    <a href="index.php?pg=admin&tab=sales">
      <button type="button"  class="btn btn-secondary col-12">Back to sales</button>
    </a>
  <?php endif; ?>
</div>


<?php require viewsPath('partials/footer');  ?>