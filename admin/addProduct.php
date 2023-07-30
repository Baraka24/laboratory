<?php
session_start();
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html>
<?php 
 include 'includes/head.php';
?>
<!-- style sheet for this add page -->
<link rel="stylesheet" href="assets/css/add.css">
<body>
<?php 
 include 'includes/navbar.php';
?>
<div class="main"><!-- start main -->

  <h2 style="text-align:center">Nouveau produit</h2>
  <!-- starting form row -->
  <form action="actions/addProduct.php" method="POST">
    <div class="row">
      <div class="col-25">
        <label for="subject">Description</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="description" placeholder="Ecrire description..." style="height:200px" required></textarea>
      </div>
    </div>
    <div class="row">
      <input type="submit" name="save" value="Sauvegarder">
    </div>
  </form>
<!-- ending form row -->



</div><!-- end main -->
</body>
</html>
