<?php 


if(!empty($_SESSION['referer'])){
  $back_link = $_SESSION['referer'] ;
 
}else{
  $back_link = "index.php?pg=admin&tab=users";
}

require viewsPath('partials/header');  ?>
<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
<?php if(!empty($row)):?>
  <form method="post" enctype="multipart/form-data" >
    <h3>Edit User</h3>
    <center>
 
<img style="width:80% " src="<?=$row['image'] ?>" alt="">

</center>
<br><br>
<br>
<div class="row">
<div class="mb-3">
			  <label for="formFile" class="form-label">User Image</label>
			  <input name="image" class="form-control <?=!empty($errors['image']) ? 'border-danger':''?>" type="file" id="formFile">
			  <?php if(!empty($errors['image'])):?>
					<small class="text-danger"><?=$errors['image']?></small>
				<?php endif;?>
			</div>
    <div class="mb-3 col-md-6">
      <label for="username" class="form-label">Username</label>
      <input value="<?= setValue('username', $row['username']); ?>" name="username" type="text" class="form-control <?= !empty($errors['username']) ? 'border-danger' : '' ?> " id="username" placeholder="Enter Username">
      <?php if (!empty($errors['username'])) : ?>
        <small class="text-danger"> <?= $errors['username'] ?> </small>
      <?php endif; ?>
    </div>
    <div class="mb-3 col-md-6">
      <label for="role" class="form-label">Role</label>
      <select name="role" class="form-control" aria-label="select role">
        <option><?=$row['role']?></option>
        <option value="admin">Admin</option>
        <option value="cashier">Cashier</option>
    </select>
      <?php if (!empty($errors['role'])) : ?>
        <small class="text-danger"> <?= $errors['role'] ?> </small>
      <?php endif; ?>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email Address</label>
      <input value="<?= setValue('email', $row['email']); ?>" name="email" type="email" class="form-control <?= !empty($errors['email']) ? 'border-danger' : '' ?>" id="email" placeholder="Enter Email address">
      <?php if (!empty($errors['email'])) : ?>
        <small class="text-danger"> <?= $errors['email'] ?> </small>
      <?php endif; ?>
    </div>
    <?php if(Auth::access('admin') ){ ?>
    <?php } ?>
    <div class="mb-3">
      <label for="password" class="form-label">Enter Password (Leave empty when no change)</label>
      <input value="" name="password" type="text" class="form-control <?= !empty($errors['password']) ? 'border-danger' : '' ?>" id="password" placeholder="Enter new password">
      <?php if (!empty($errors['password'])) : ?>
        <small class="text-danger"> <?= $errors['password'] ?> </small>
      <?php endif; ?>
    </div>
    <div class="mb-3">
      <label for="repassword" class="form-label">Re-Type Password</label>
      <input name="repassword" type="text" class="form-control <?= !empty($errors['repassword']) ? 'border-danger' : '' ?>" id="repassword" placeholder="Re-Type Password">
      <?php if (!empty($errors['repassword'])) : ?>
        <small class="text-danger"> <?= $errors['repassword'] ?> </small>
      <?php endif; ?>
    </div>
</div>
    
 
        <a href="<?=$back_link?>">
          <button type="button" class="btn col-12 col-md-3 btn-secondary mb-2">Cancel</button>
          </a>
        <button type="submit" class="btn col-12 col-md-3 btn-success float-end">Save</button>

  </form>
  <?php else: ?>
    No user found.
    <br><br>
    <a href="<?=$back_link?>">
      <button type="button"  class="btn btn-secondary col-12">Back to users</button>
    </a>
  <?php endif; ?>
</div>



<?php require viewsPath('partials/footer');  ?>