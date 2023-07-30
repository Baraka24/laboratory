<?php
session_start();
require_once '../includes/config.php';
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
include_once 'actions/viewStructures.php';
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
<div class="main" style="font-weight:bold"><!-- start main -->

  <h2 style="text-align:center">Nouvel équipement</h2>
  <!-- starting form row -->
  <form  action="actions/updateEquipment.php?id=<?=$rowu['id']?>" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Nom</label>
      </div>
      <div class="col-75">
        <input  value="<?=$rowu['nom']?>" type="text" id="fname" name="nom" placeholder="Nom de l'équipement.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Date</label>
      </div>
      <div class="col-75">
        <input value="<?=$rowu['dateEncodage']?>" type="date" id="lname" name="dateE" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Structure</label>
      </div>
      <div class="col-75">
        <select id="country" name="structure" required>
        <option value="<?=$rowu['idstructure']?>"><?=$rowu['structure']?></option>
        <?php
        while($row = mysqli_fetch_array($result)) {
          ?>
           <option value="<?=$row['id']?>"><?=$row['structure']?></option>
          <?php
          }
        ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">NombreTotal</label>
      </div>
      <div class="col-75">
        <input value="<?=$rowu['nbreTotal']?>" type="text" id="fname" name="nbreT" placeholder="Nombre total..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">NombreBons</label>
      </div>
      <div class="col-75">
        <input value="<?=$rowu['nbreBon']?>" type="text" id="fname" name="nbreB" placeholder="Nombre total équipements en bon état..." required>
      </div>
    </div>
   
    <div class="row">
      <div class="col-25">
        <label for="subject">Spécification</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="specification" placeholder="Ecrire spécification..." style="height:200px" required><?=$rowu['specification']?></textarea>
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
