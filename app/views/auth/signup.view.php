
<?php require viewsPath('partials/header');  ?>
<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
<form method="post">
  <h3>Add User</h3>
  <div class="mb-3">
  <label for="username" class="form-label">Username</label>
  <input value="<?=setValue('username'); ?>" name="username" type="text" class="form-control <?=!empty($errors['username']) ? 'border-danger': '' ?> " id="username" placeholder="Enter Username">
  <?php if(!empty($errors['username'])) : ?>
    <small class="text-danger"> <?=$errors['username']?> </small>
    <?php endif; ?>
</div>
<div class="mb-3">
  <label for="email" class="form-label">Email Address</label>
  <input value="<?=setValue('email'); ?>" name="email" type="email" class="form-control <?=!empty($errors['email']) ? 'border-danger': '' ?>" id="email" placeholder="Enter Email address">
  <?php if(!empty($errors['email'])) : ?>
    <small class="text-danger"> <?=$errors['email']?> </small>
    <?php endif; ?>
</div>
<div class="mb-3">
  <label for="password" class="form-label">Password</label>
  <input value="<?=setValue('password'); ?>" name="password" type="password" class="form-control <?=!empty($errors['password']) ? 'border-danger': '' ?>" id="password" placeholder="Enter Password">
  <?php if(!empty($errors['password'])) : ?>
    <small class="text-danger"> <?=$errors['password']?> </small>
    <?php endif; ?>
</div><div class="mb-3">
  <label for="repassword" class="form-label">Re-Type Password</label>
  <input  name="repassword" type="password" class="form-control <?=!empty($errors['repassword']) ? 'border-danger': '' ?>" id="repassword" placeholder="Re-Type Password">
  <?php if(!empty($errors['repassword'])) : ?>
    <small class="text-danger"> <?=$errors['repassword']?> </small>
    <?php endif; ?>
</div>

    <button type="submit" class="btn btn-secondary">Cancel</button>
    <button type="submit" class="btn btn-success float-end">Add</button>
  
</form>
</div>



<?php require viewsPath('partials/footer');  ?>