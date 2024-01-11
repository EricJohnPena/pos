
<?php require viewsPath('partials/header');  ?>
<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">

  <h3>Add User</h3>
  <div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Username</label>
  <input type="text" class="form-control" id="username" placeholder="Enter Username">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Email Address</label>
  <input type="text" class="form-control" id="email" placeholder="Enter Email address">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Password</label>
  <input type="password" class="form-control" id="password" placeholder="Enter Password">
</div><div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">Re-Type Password</label>
  <input type="password" class="form-control" id="repassword" placeholder="Re-Type Password">
</div>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="submit" class="btn btn-secondary">Cancel</button>

    <button type="submit" class="btn btn-success">Submit</button>
  

  </div>

</div>



<?php require viewsPath('partials/footer');  ?>