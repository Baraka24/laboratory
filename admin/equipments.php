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
<!-- style sheet for this table -->
<link rel="stylesheet" href="assets/css/table.css">

<!-- style for modifier and supprimer btn -->
<link rel="stylesheet" href="assets/css/modifSuppBtn.css">
<body>
<?php 
 include 'includes/navbar.php';
?>
<div class="main"><!-- start main -->

  <h2 style="text-align:center">Nos équipements</h2>
  <?php
   if(isset($_SESSION['alerteS']))
   {
    ?>
     <div class="success">
      <p><strong><i id="check" class="fa fa-check-square"></i></strong><?= $_SESSION['alerteS']?></p>
     </div>
    <?php
   }
   unset($_SESSION['alerteS']);
  ?>
  <?php
  if(isset($_SESSION['alerteE']))
  {
   ?>
    <div class="danger">
     <p><strong><i id="window" class="fa fa-window-close"></i></strong><?= $_SESSION['alerteE']?></p>
    </div>
   <?php
  }
  unset($_SESSION['alerteE']);
  ?>

  
<!-- search input -->
<input class="myInput" type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher Equipement par nom.." title="Type in a name">
<!-- search input -->
<!-- search input -->
<input class="myInput" type="text" id="myInputO" onkeyup="myFunctionO()" placeholder="Rechercher Equipement par structure.." title="Type in a name">
<!-- search input -->
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
<a href="addEquipment.php" class="notification">
  <span><i class="fa fa-upload"></i>Nouvel équipement</span>
  <span class="badge">
  <?=0+$nbreT?>
  </span>
  </a>
<hr>
<!-- starting table -->
<div style="overflow-x:auto;"> 
  <?php
if (mysqli_num_rows($result) > 0) {
?>
  <table id="myTable">
  <center><h3>Liste des équipements</h3></center> 
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
      <th>Actions</th>
  </tr>
<?php
$i=1;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
      <td><?=$i?></td>
      <td><?=$row['nom']?></td>
      <td><?=$row['specification']?></td>
      <td><?=$row['structure']?></td>
      <td>
        <img src="actions/upload/<?=$row['image']?>" alt="" width="100" height="150">
      <a href="updateEquipmentImg.php?id=<?=$row['id']?>" style="text-decoration:none;">
       <h5>
        <span class="badge"><i class="fa fa-edit"></i>Modifier</span>
       </h5>
      </a>
      </td>
      <td><?=$row['dateEncodage']?></td>
      <td><?=$row['nbreTotal']?></td>
      <td><?=$row['nbreBon']?></td>
      <td><?=$row['nbreMauvais']?></td>
      <td>
      <a href="updateEquipment.php?id=<?=$row['id']?>" style="text-decoration:none;">
       <h5>
        <span class="badge"><i class="fa fa-edit"></i>Modifier</span>
       </h5>
      </a>
      <a href="actions/deleteEquipment.php?id=<?=$row['id']?>" style="text-decoration:none;">
       <h5>
        <span onclick="return confirm('Voulez-vous vraiment supprimé?')" class="badgeS"><i class="fa fa-remove"></i>Supprimer</span>
       </h5>
      </a>
      </td>
</tr>
<?php
$i++;
}
?>

</table>
<hr>
  <button class="btn" onclick="printpart()">
    <i class="fa fa-print"></i>Imprimer
  </button>
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

  
</div>
<!-- ending table -->



</div><!-- end main -->
<!-- pagination script -->

<script  src="assets/js/script.js"></script>
<!-- pagination script -->

<!-- search script equipement par nom -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!-- search script equipement par nom -->

<!-- search script equipement par structure -->
<script>
function myFunctionO() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputO");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!-- search script equipement par structure -->

<!-- print script -->
<script>
function printpart () {
  var printwin = window.open("");
  printwin.document.write(document.getElementById("toprint").innerHTML);
  printwin.stop();
  printwin.print();
  printwin.close();
}
</script>
<!-- print script https://code-boxx.com/print-page-javascript/ -->
</body>
</html>
