<?php


if (!empty($_SESSION['referer'])) {
  $back_link = $_SESSION['referer'];
} else {
  $back_link = "index.php?pg=admin&tab=users";
}

require viewsPath('partials/header');  ?>
<div class="container-fluid border col-lg-5 col-md-6 p-5 mt-5" id="signup-container">
  <?php if (!empty($row)) : ?>
    <h3>User Profile</h3>
    <table class="table table-hover table-striped">
      <center>
        <img style="width:80% " src="<?= $row['image'] ?>" alt="">
      </center>
      <br><br>
      <tr>
        <th>Username</th>
        <td><?= $row['username'] ?></td>
      </tr>
      <tr>
        <th>Email</th>
        <td><?= $row['email'] ?></td>
      </tr>
      <tr>
        <th>Role</th>
        <td><?= $row['role'] ?></td>
      </tr>
      <tr>
        <th>Date Created</th>
        <td><?= date("jS M, Y", strtotime($row['date'])) ?></td>
      </tr>

    </table>

    <a href="index.php?pg=user-edit&id=<?= $row['id'] ?>">
      <button type="button" class="btn col-12 btn-success mb-2">Edit</button>
    </a>
    <a href="index.php?pg=user-delete&id=<?= $row['id'] ?>">
      <button class="btn btn-danger mb-2 col-12">Delete</button>
    </a>

    <a href="<?= $back_link ?>">
      <button type="button" class="btn col-12  btn-secondary mb-2">Cancel</button>
    </a>

  <?php else : ?>
    No user found.
    <br><br>
    <a href="<?= $back_link ?>">
      <button type="button" class="btn btn-secondary col-12">Back to users</button>
    </a>
  <?php endif; ?>
</div>



<?php require viewsPath('partials/footer');  ?>