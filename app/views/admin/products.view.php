<div class="table-responsive container-fluid product-table">
  <table class="table table-striped table-hover ">
<tr >
  <th>Barcode</th>
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
<?php if (!empty($products)):
  foreach ($products as $product) : ?>
<tr>
<td><?=$product['barcode']?></td>
<td>
  <a href="index.php?pg=single-product&id=<?=$product['id']?>">
  <?=$product['description']?>
</a>
</td>
<td><?=$product['quantity']?></td>
<td>Php. <?=$product['amount']?></td>
  <td><img style="height: 80px;" src="<?=$product['image']?>" alt="product image"></td>
<td><?=$product['date']?></td>
  <td>
    <button class="btn btn-success btn-sm">Edit</button>
    <button class="btn btn-danger btn-sm">Delete</button>
  </td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
</div>
