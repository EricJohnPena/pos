<?php require viewsPath('partials/header');  ?>

<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
  <?php if(!empty($row)):?>
  <form method="post" enctype="multipart/form-data">
  <h3>Delete Product</h3>
  <div class="alert alert-danger text-center">
    Are you sure you want to delete this product?
  </div>
  <div class="mb-3">
    <label for="formGroupExampleInput" class="form-label">Product Description:</label>
    <input disabled value="<?=setValue('description', $row['description']) ?>" name="description" type="text" class="form-control <?= !empty($errors['description']) ? 'border-danger' : '' ?> " id="description" placeholder="Product Description">
    <?php if (!empty($errors['description'])) : ?>
        <small class="text-danger"> <?= $errors['description'] ?> </small>
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
    <button type="submit" class="btn btn-danger">Delete</button>
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