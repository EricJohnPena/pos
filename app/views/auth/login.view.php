
<?php require viewsPath('partials/header');  ?>

<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="login-container">
<form methos="post"></form>
<center>
  <img src="assets/images/logo.png" alt="logo" class="logo-login" >
  <h1>Login</h1>
</center>
  <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label" autofocus>Username</label>
  <input type="text" class="form-control" id="username" placeholder="Enter Username">
</div>

<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Password</label>
  <input type="password" class="form-control" id="password" placeholder="Enter Password">

<div class="d-grid gap-2 ">
    
    <button type="submit" class="btn btn-login mt-4 " style="background-color: #8EDAD1;"><p class="text-login">Login</p></button>
  </div>
</form>
</div>

<?php require viewsPath('partials/footer');  ?>