<?php require viewsPath('partials/header');  ?>

<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
  <?php if(!empty($row)):?>
  <form method="post" enctype="multipart/form-data">
  <h3>Edit Product</h3>
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Product Description:</label>
    <input value="<?=setValue('description', $row['description']) ?>" name="description" type="text" class="form-control <?= !empty($errors['description']) ? 'border-danger' : '' ?> " id="description" placeholder="Product Description">
    <?php if (!empty($errors['description'])) : ?>
        <small class="text-danger"> <?= $errors['description'] ?> </small>
      <?php endif; ?>
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput2" class="form-label">Barcode (Optional)</label>
    <input value="<?=setValue('barcode', $row['barcode']) ?>" type="text" class="form-control" id="barcode" name="barcode" placeholder="Product barcode">
    <?php if (!empty($errors['barcode'])) : ?>
        <small class="text-danger"> <?= $errors['barcode'] ?> </small>
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

  <div class=" mb-3">
    <label class="form-label" for="image">Upload Product Image</label>
    <input type="file" name="image" class="form-control <?= !empty($errors['image']) ? 'border-danger' : '' ?> " id="image">
    <?php if (!empty($errors['image'])) : ?>
        <small class="text-danger"> <?= $errors['image'] ?> </small>
      <?php endif; ?>
  </div>
 Image preview:<br>
<center>
 
<img style="width:80%" src="<?=$row['image'] ?>" alt="preview">
</center>

<br>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="index.php?pg=admin&tab=products">
      <button type="button"  class="btn btn-secondary col-12">Cancel</button>
    </a>
    <button type="submit" class="btn btn-success">Edit</button>
  </div>
  </form>
  <?php else: ?>
    No product found.
    <br><br>
    <a href="index.php?pg=admin&tab=products">
      <button type="button"  class="btn btn-secondary col-12">Back to products</button>
    </a>
  <?php endif; ?>
</div>


<?php require viewsPath('partials/footer');  ?>