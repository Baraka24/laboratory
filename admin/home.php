<?php
session_start();
require_once '../includes/config.php';
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
include_once 'actions/viewEquipments.php';
?>
<!DOCTYPE html>
<html>
<?php 
 include 'includes/head.php';
?>

<!-- cards css -->
<link rel="stylesheet" href="assets/css/cards.css">

<!-- see (voir) btn css -->
<link rel="stylesheet" href="assets/css/seebtn.css"> 
<style>
  .ok{
    font-size:2vw;color:#45a049;border: 2px solid #333; border-radius: 50%;
    background:#333;
  }
  .nok{
    font-size:2vw;color:#f44336;border: 2px solid #333; border-radius: 50%;
    background:#333;
  }
</style>
<body>
<?php 
 include 'includes/navbar.php';
?>
<div class="main"><!-- start main -->

  <h2 style="text-align:center">Adminstration|Laboratoire Biotechnologique(U.A.C)</h2>
  <!-- starting Cards row -->
  <div class="row">
<!-- div toprint start -->
<div id="toprint" hidden>
<?php

if (mysqli_num_rows($result1) > 0) {
?>
  <table id="myTableP" border="2" cellspacing="0">
   <caption>Liste des équipements</caption>
  <tr>
      <th>#</th>
      <th>Nom</th>
      <th>Spécification</th>
      <th>Structure</th>
      <th>Image</th>
      <th>DateEncodage</th>
      <th>NombreTotal</th>
      <th>NombreBons</th>
      <th>NombreMauvais</th>
      
  </tr>
<?php
$i=1;
$nbreT=0;
$nbreB=0;
$nbreM=0;
while($row = mysqli_fetch_array($result1)) {
  $nbT=$row['nbreTotal'];
  $nbreT=$nbreT+$nbT;
  $nbB=$row['nbreBon'];
  $nbreB=$nbreB+$nbB;
  $nbM=$row['nbreMauvais'];
  $nbreM=$nbreM+$nbM;
?>
<tr>
      <td><?=$i?></td>
      <td><?=$row['nom']?></td>
      <td><?=$row['specification']?></td>
      <td><?=$row['structure']?></td>
      <td>
        <img src="actions/upload/<?=$row['image']?>" alt="" width="100" height="150">
      <a href="updateEquipmentImg.php?id=<?=$row['id']?>" style="text-decoration:none;">
       
      </a>
      </td>
      <td><?=$row['dateEncodage']?></td>
      <td><?=$row['nbreTotal']?></td>
      <td><?=$row['nbreBon']?></td>
      <td><?=$row['nbreMauvais']?></td>
      
</tr>

<?php
$i++;
}
?>
<tr>
  <td colspan="6">Nombre Total d'équipements</td><td><?=$nbreT?></td>
</tr>
<tr>
  <td colspan="7">Nombre Total d'équipements en bon état</td><td><?=$nbreB?></td>
</tr>
<tr>
  <td colspan="8">Nombre Total d'équipements en mauvais état</td><td><?=$nbreM?></td>
</tr>
</table>
 <?php
}
else{
  ?>
  <div class="warning">
  <p><strong><i id="exc" class="fa fa-exclamation-triangle"></i></strong>Aucune donnée trouvée dans la base des données.</p>
  </div>
  <?php
}
?>
<center><h5>©-Copyright-U.A.C-<?= date('Y')?>-Designed by Baraka Kinywa.</h5></center> 
</div>
<!-- div to print end -->

  <div class="column">
    <div class="card"> 
      <h3><i class="fa fa-gears"></i></h3>
      <h3>Equipements</h3>
      
      
      <h1 style="font-size:5vw;">
      <?=0+$nbreT?>
      </h1>
      <p>
        <a href="equipments.php">
         <button class="button">
          <span>Voir...</span>
         </button>
        </a>
      </p>
    </div>
  </div>

  <div class="column">
    <div class="card">
      <h3><i class="fa fa-sitemap"></i></h3>
      <h3>Structures</h3>
      <h1 style="font-size:5vw;">
      <?php
    $sqlS =mysqli_query($con,"SELECT COUNT(*) AS nbre FROM `structure`");
    $s=mysqli_fetch_array($sqlS);
    echo $s['nbre'];
    ?>
      </h1>
      <p>
        <a href="structures.php">
         <button class="button">
          <span>Voir...</span>
         </button>
        </a>
      </p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3><i class="fa fa-database"></i></h3>
      <h3>Produits</h3>
      <h1 style="font-size:5vw;">
      <?php
    $sqlc =mysqli_query($con,"SELECT COUNT(*) AS nbre FROM `produits`");
    $products=mysqli_fetch_array($sqlc);
    echo $products['nbre'];
    ?>
      </h1>
      <p>
        <a href="products.php">
         <button class="button">
          <span>Voir...</span>
         </button>
        </a>
      </p>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <h3><i class="fa fa-pie-chart"></i></h3>
      <h3>Statistiques Productions</h3>
      <h1 style="font-size:5vw;"><i class="fa fa-pie-chart"></i></h1>
      <p>
        <a href="statistiquesProductions.php">
         <button class="button">
          <span>Voir...</span>
         </button>
        </a>
      </p>
    </div>
  </div>
</div>
<!-- ending Cards row -->



</div><!-- end main -->
</body>
</html>