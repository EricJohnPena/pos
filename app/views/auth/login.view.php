
<?php require viewsPath('partials/header');  ?>

<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="login-container">
<form method="post">
<center>
  <img src="assets/images/logo.png" alt="logo" class="logo-login" >
  <h1>Login</h1>
</center>
  <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label" autofocus>Username</label>
  <input value="<?=setValue('username'); ?>"  name="username" type="text" class="form-control <?=!empty($errors['username']) ? 'border-danger': '' ?> " id="username" placeholder="Enter Username">
  <?php if(!empty($errors['username'])) : ?>
    <small class="text-danger"> <?=$errors['username']?> </small>
    <?php endif; ?>
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Password</label>
  <input name="password" type="password" class="form-control <?=!empty($errors['password']) ? 'border-danger': '' ?> " id="password" placeholder="Enter Password">
  <?php if(!empty($errors['password'])) : ?>
    <small class="text-danger"> <?=$errors['password']?> </small>
    <?php endif; ?>
<div class="d-grid gap-2 ">
    
    <button type="submit" class="btn btn-login mt-4 " style="background-color: #8EDAD1;"><p class="text-login">Login</p></button>
  </div>
</form>
</div>

<?php require viewsPath('partials/footer');  ?>