
<?php require viewsPath('partials/header');  ?>
<center class="p-2"><h4><i class="fa fa-user-shield"></i> Admin</h4></center>
<div class="container-fluid row">
  <div class="border col-12 col-sm-5 col-md-4 col-lg-2">
  <ul class="list-group">
  <a href="index.php?pg=admin&tab=dashboard" > <li class="list-group-item <?=!$tab || $tab =='dashboard'?'active' :''?>" aria-current="true"><i class="fa fa-th-large"></i> Dashboard</li></a>
  <a href="index.php?pg=admin&tab=users"> <li class="list-group-item <?=$tab=='users'?'active':''?>"><i class="fa fa-users"></i> Users</li></a>
  <a href="index.php?pg=admin&tab=sales"> <li class="list-group-item <?=$tab=='sales'?'active':''?>"><i class="fa fa-coins"></i> Sales</li></a>
  <a href="index.php?pg=admin&tab=products"><li class="list-group-item <?=$tab=='products'?'active':''?>"><i class="fa fa-hamburger"></i> Products</li></a>
  <a href="index.php?pg=logout"><li class="list-group-item "><i class="fa fa-sign-out-alt"></i> Logout</li></a>
</ul>
  </div>
  <div class="border col p-1">


<?php
switch($tab){
  case 'products':
    require viewsPath('admin/products');
  break;
  default:
  break;

}

?>
  </div>
</div>

<?php require viewsPath('partials/footer');  ?>