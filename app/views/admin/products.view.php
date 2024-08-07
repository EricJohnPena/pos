<div class="table-responsive container-fluid product-table">
  <table class="table table-striped table-hover ">
    <tr>
     
      <th>Product</th>
      <th>Qty</th>
      <th>Price</th>
      <th>Image</th>
      <th>Date</th>
      <th>
        <a href="index.php?pg=product-new">
          <button class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add new</button>
        </a>
      </th>
    </tr>
    <?php if (!empty($products)) :
      foreach ($products as $product) : ?>
        <tr>
        
          <td>
            <!-- <a href="index.php?pg=product-single&id=<?= $product['id'] ?>"> -->
              <?= $product['description'] ?>
            <!-- </a> -->
          </td>
          <td><?= $product['quantity'] ?></td>
          <td>Php. <?= $product['amount'] ?></td>
          <td><img style="max-height: 90px; max-width:90px;" src="<?= $product['image'] ?>" alt="product image"></td>
          <td><?= date("jS M, Y", strtotime($product['date'])) ?></td>
          <td>
            <a href="index.php?pg=product-edit&id=<?= $product['id'] ?>">
              <button class="btn btn-success btn-sm">Edit</button>
            </a>
            <a href="index.php?pg=product-delete&id=<?= $product['id'] ?>">
              <button class="btn btn-danger btn-sm">Delete</button>
            </a>
          </td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </table>
</div>