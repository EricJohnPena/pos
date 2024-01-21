<?php require viewsPath('partials/header');  ?>
<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
<?php if(!empty($row) && $row['role'] != "admin"):?>
  <form method="post">
    <h3>Delete User</h3>
    <div class="alert alert-danger text-center">
    Are you sure you want to remove this user?
  </div>
    <center>
 
<img style="width:80%" src="<?=$row['image'] ?>" alt="">
</center>

<br>
    
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input disabled value="<?= setValue('username', $row['username']); ?>" name="username" type="text" class="form-control <?= !empty($errors['username']) ? 'border-danger' : '' ?> " id="username" placeholder="Enter Username">
      <?php if (!empty($errors['username'])) : ?>
        <small class="text-danger"> <?= $errors['username'] ?> </small>
      <?php endif; ?>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input disabled value="<?= setValue('email', $row['email']); ?>" name="email" type="email" class="form-control <?= !empty($errors['email']) ? 'border-danger' : '' ?>" id="email" placeholder="Enter Email address">
      <?php if (!empty($errors['email'])) : ?>
        <small class="text-danger"> <?= $errors['email'] ?> </small>
      <?php endif; ?>
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
      <select disabled name="role" class="form-control" aria-label="select role">
        <option><?=$row['role']?></option>
        <option value="admin">Admin</option>
        <option value="cashier">Cashier</option>
    </select>
      <?php if (!empty($errors['role'])) : ?>
        <small class="text-danger"> <?= $errors['role'] ?> </small>
      <?php endif; ?>
    </div>

    
    <a href="index.php?pg=admin&tab=users">
      <button type="button" class="btn col-12 col-md-3 btn-secondary mb-2">Cancel</button>
      </a>
    <button type="submit" class="btn col-12 col-md-3 btn-danger float-end">Delete</button>

  </form>
  <?php else: ?>
    <?php if($row['role'] == "admin"){ ?>
      <div class="alert alert-danger text-center">
   An admin account can't be deleted.
  </div>
    <?php }else{ ?>
      <div class="alert alert-danger text-center">
   No user found.
  </div>
      <?php } ?>
    <br><br>
    <a href="index.php?pg=admin&tab=users">
      <button type="button"  class="btn btn-secondary col-12">Back to users</button>
    </a>
  <?php endif; ?>
</div>



<?php require viewsPath('partials/footer');  ?>