<?php require viewsPath('partials/header');  ?>
<br>
<center>
  <h1>Access Denied!</h1>
  <div><?=Auth::getMessage()?></div>
</center>
<?php require viewsPath('partials/footer');  ?>