<div class="table-responsive container-fluid product-table">
  <table class="table table-striped table-hover ">
    <tr>
      <th>Image</th>
      <th>Username</th>
      <th>Email</th>
      <th>Date</th>
      <th>Role</th>
      
      <th>
        <a href="index.php?pg=signup">
          <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
        </a>
      </th>
    </tr>
    <?php if (!empty($users)) :
      foreach ($users as $user) : ?>
        <tr>
          <td><img style="max-height: 90px; max-width:90px;" src="<?php if($user['image']){echo $user['image'];}else{echo '../public/assets/images/placeholder.jpg';} ?>" alt="user image"></td>
          <td><?= $user['username'] ?></td>
          <td>
            <a href="index.php?pg=profile&id=<?= $user['id'] ?>">
              <?= $user['email'] ?>
            </a>
            <td><?= date("jS M, Y", strtotime($user['date'])) ?></td>
          </td>
          <td><?= $user['role'] ?></td>
         
          <td>
            <a href="index.php?pg=user-edit&id=<?= $user['id'] ?>">
              <button class="btn btn-success btn-sm">Edit</button>
            </a>
            <a href="index.php?pg=user-delete&id=<?= $user['id'] ?>">
              <button class="btn btn-danger btn-sm">Delete</button>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </table>
</div>