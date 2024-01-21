<?php require viewsPath('partials/header');  ?>

<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
  <?php if(!empty($row)):?>
  <form method="post" enctype="multipart/form-data">
  <h3>Edit Sale Record</h3>
  <div class="row">
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Product Name:</label>
    <input value="<?=setValue('description', $row['description']) ?>" name="description" type="text" class="form-control <?= !empty($errors['description']) ? 'border-danger' : '' ?> " id="description" placeholder="Product description">
    <?php if (!empty($errors['description'])) : ?>
        <small class="text-danger"> <?= $errors['description'] ?> </small>
      <?php endif; ?>
  </div>
  <div class="mb-3 col-md-4">
    <label for="formGroupExampleInput" class="form-label">Receipt No:</label>
    <input value="<?=setValue('receipt_no', $row['receipt_no']) ?>" name="receipt_no" type="text" class="form-control <?= !empty($errors['receipt_no']) ? 'border-danger' : '' ?> " id="receipt_no" placeholder="Product receipt_no">
    <?php if (!empty($errors['receipt_no'])) : ?>
        <small class="text-danger"> <?= $errors['receipt_no'] ?> </small>
      <?php endif; ?>
  </div>
  <div class="mb-3 col-md-8">
    <label for="formGroupExampleInput" class="form-label">Cashier:</label>
    <input value="<?=setValue('user_id', $row['user_id']) ?>" name="user_id" type="text" class="form-control <?= !empty($errors['user_id']) ? 'border-danger' : '' ?> " id="user_id" placeholder="Cashier">
    <?php if (!empty($errors['user_id'])) : ?>
        <small class="text-danger"> <?= $errors['user_id'] ?> </small>
      <?php endif; ?>
  </div>

  <div class="input-group mb-3">
    <span class="input-group-text" id="basic-addon1">Qty:</span>
    <input type="number" value="<?=setValue('quantity', $row['quantity']) ?>" name="quantity" id="quantity" class="form-control <?= !empty($errors['quantity']) ? 'border-danger' : '' ?> " placeholder="Quantity" aria-label="quantity" aria-describedby="quantity">
    <span class="input-group-text"  id="basic-addon1">Amount:</span>
    <input value="<?=setValue('amount', $row['amount']) ?>" type="number" class="form-control <?= !empty($errors['amount']) ? 'border-danger' : '' ?> "name="amount" id="amount"  placeholder="Php" aria-label="amount" aria-describedby="amount">
  </div>

  
  <?php if (!empty($errors['quantity'])) : ?>
        <small class="text-danger"> <?= $errors['quantity'] ?> </small>
      <?php endif; ?>
      <?php if (!empty($errors['amount'])) : ?>
        <small class="text-danger"> <?= $errors['amount'] ?> </small>
      <?php endif; ?>
</div>
 

<br>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="index.php?pg=admin&tab=sales">
      <button type="button"  class="btn btn-secondary col-12">Cancel</button>
    </a>
    <button type="submit" class="btn btn-success">Edit</button>
  </div>
  </form>
  <?php else: ?>
    No sale record found.
    <br><br>
    <a href="index.php?pg=admin&tab=sales">
      <button type="button"  class="btn btn-secondary col-12">Back to sales</button>
    </a>
  <?php endif; ?>
</div>


<?php require viewsPath('partials/footer');  ?>