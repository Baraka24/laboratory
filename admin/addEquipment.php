<?php
session_start();
require_once '../includes/config.php';
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
include_once 'actions/viewStructures.php';
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
<div class="main" style="font-weight:bold;background:gray"><!-- start main -->

  <h2 style="text-align:center">Nouvel équipement</h2>
  <!-- starting form row -->
  <form action="actions/addEquipement.php" method="post" enctype="multipart/form-data">
    <div class="row">
      <div class="col-25">
        <label for="fname">Nom</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="nom" placeholder="Nom de l'équipement.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Date</label>
      </div>
      <div class="col-75">
        <input value="<?php echo date('Y-m-d')?>" type="date" id="lname" name="dateE" required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="country">Structure</label>
      </div>
      <div class="col-75">
        <select id="country" name="structure" required>
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
        <input type="text" id="fname" name="nbreT" placeholder="Nombre total..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">NombreBons</label>
      </div>
      <div class="col-75">
        <input type="text" id="fname" name="nbreB" placeholder="Nombre total équipements en bon état..." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="fname">Image</label>
      </div>
      <div class="col-75">
        <input type="file" id="fname" name="file" placeholder="Nom de l'équipement.." required>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="subject">Spécification</label>
      </div>
      <div class="col-75">
        <textarea id="subject" name="specification" placeholder="Ecrire spécification..." style="height:200px" required></textarea>
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
