<?php
session_start();
require_once '../includes/config.php';
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
require_once '../includes/config.php';
$resultu = mysqli_query($con,"SELECT `equipement`.`id` AS id,`equipement`.`nom` AS nom, 
`equipement`.`specification` AS specification, `equipement`.`image` AS image,
 `equipement`.`idAdmin` AS idAdmin, `equipement`.`idStructure` AS idStructure, 
 `equipement`.`dateEncodage` AS dateEncodage, `equipement`.`nbreTotal` AS nbreTotal, 
 `equipement`.`nbreBon` AS nbreBon, `equipement`.`nbreMauvais` AS nbreMauvais,
 structure.structure AS structure,structure.description AS description,admin.userName 
 AS userName,structure.id AS idstructure FROM `equipement`,structure,admin WHERE equipement.idAdmin=admin.id AND 
 equipement.idStructure=structure.id
 AND equipement.id='" . $_GET["id"] . "'");
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
  <h2 style="text-align:center">Modidifier Image Equipement</h2>
  <p style="text-align:center"><img src="actions/upload/<?=$rowu['image']?>" alt="" width="100" height="150"></p>
  <!-- starting form row -->
  <form action="actions/updateEquipmentImg.php?id=<?=$rowu['id']?>" method="post" enctype="multipart/form-data">
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
