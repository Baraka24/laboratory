<?php
session_start();
require_once '../includes/config.php';
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
include_once 'actions/viewProducts.php';
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

  
  <h2 style="text-align:center">Nouvelle production</h2>
  <!-- starting form row -->
  <form action="actions/addProduction.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="periode">Periode</label>
      </div>
      <div class="col-75">
        <input type="text" id="periode" name="periode" placeholder="Periode de production..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="produit">Produit</label>
      </div>
      <div class="col-75">
        <select id="produit" name="produit" required>
        <?php
        while($row = mysqli_fetch_array($result)) {
          ?>
           <option value="<?=$row['id']?>"><?=$row['description']?></option>
          <?php
          }
        ?>
          
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="qte">Quantité</label>
      </div>
      <div class="col-75">
        <input type="text" id="qte" name="qtte" placeholder="Quantité de production..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="dateE">DateEncodage</label>
      </div>
      <div class="col-75">
        <input value="<?php echo date('Y-m-d')?>" type="date" id="dateE" name="dateE" required>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
        <label for="image">Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="image" name="file" placeholder="Nom de l'équipement.." required>
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
