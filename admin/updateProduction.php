<?php
session_start();
require_once '../includes/config.php';
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
require_once '../includes/config.php';
$resultu = mysqli_query($con,"SELECT `production`.`id` AS id, `production`.`periode` AS periode,
 `production`.`quantite` AS quantite, `production`.`image` AS image, 
 `production`.`idAdmin` AS idAdmin, `production`.`dateEncodage` AS dateEncodage, 
 `production`.`produit` AS idProduit,produits.description AS produit,
 admin.userName AS userName FROM `production`,produits,admin WHERE 
 production.idAdmin=admin.id AND production.produit=produits.id 
 AND production.id='" . $_GET["id"] . "'");
$rowu= mysqli_fetch_array($resultu);
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

  <h1><?php 
    echo $_SESSION['userName'];?></h1>
  <h2 style="text-align:center">Modifier production</h2>
  <!-- starting form row -->
  <form action="actions/updateProduction.php?id=<?=$rowu['id']?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="periode">Periode</label>
      </div>
      <div class="col-75">
        <input value="<?=$rowu['periode']?>" type="text" id="periode" name="periode" placeholder="Periode de production..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="produit">Produit</label>
      </div>
      <div class="col-75">
        <select id="produit" name="produit" required>
        <option value="<?=$rowu['idProduit']?>" selected><?=$rowu['produit']?></option>
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
        <input value="<?=$rowu['quantite']?>" type="text" id="qte" name="qtte" placeholder="Quantité de production..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="dateE">DateEncodage</label>
      </div>
      <div class="col-75">
        <input value="<?=$rowu['dateEncodage']?>" type="date" id="dateE" name="dateE" required>
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
