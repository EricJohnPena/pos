<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=APP_NAME?></title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet"  type="text/css" href="assets/css/all.min.css">
  <link rel="stylesheet"  type="text/css" href="assets/css/styles.css">
  <style>
    body{
      background-color: white;
    }
  </style>
</head>
<body>
<?php
$vars = $_GET['vars'] ?? "";
$obj = json_decode($vars,true);
?>
<?php if(is_array($obj)): ?>
<center>
 <h1><?=$obj['company'] ?></h1>
 <h5>Receipt</h5> 
 <h6>Labac, Naic, Cavite</h6>
 <h6>09xx xxx xxxx</h6>
<h6><i> <?= date("jS F, Y H:i a") ?></i></h6> 
</center>

<table class="table table-striped">

<tr class=" text-center">
 <th>Description</th><th>Quantity</th><th>@</th><th>Amount</th>
</tr>


<?php foreach($obj['data'] as $row): ?>
<tr class=" text-center">
 <td><?=$row['description']?></td><td><?=$row['quantity']?></td><td><?=$row['amount']?></td><td><?=($row['quantity'] * $row['amount'])?></td>
</tr>
<?php endforeach; ?>
<tr >
  <td colspan="2"></td> <td><b>Total:</b></td> <td class=" text-center"><b>Php<?=$obj['gtotal'] ?></b> </td>
</tr>
<tr>
<td colspan="2"></td> <td>Amount paid:</td> <td class=" text-center">Php<?=$obj['amount'] ?></td>
</tr>
<tr>
<td colspan="2"></td> <td>Change:</td> <td class=" text-center">Php<?=$obj['change'] ?></td>
</tr>
</table>
<center><p><i>Thankyou!!!</i></p> </center>
<?php endif; ?>

<script>
   window.print();
</script>

</body>
</html>