<?php
session_start();
require_once '../includes/config.php';
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
include_once 'actions/viewProductions.php';
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

  
  <h2 style="text-align:center">Nos productions</h2>
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
<a href="addproduction.php" class="notification">
  <span><i class="fa fa-upload"></i>Nouvelle production</span>
  <span class="badge">
   <?php
    $sqlc =mysqli_query($con,"SELECT COUNT(*) AS nbre FROM `production`");
    $products=mysqli_fetch_array($sqlc);
    echo $products['nbre'];
    ?>
  </span>
</a>
<hr>
<!-- search input -->
<input class="myInput" type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher par période de production.." title="Type in a name">
<!-- search input -->
<!-- search input -->
<input class="myInput" type="text" id="myInputO" onkeyup="myFunctionO()" placeholder="Rechercher production par produit.." title="Type in a name">
<!-- search input -->
<!-- hidden table to be printed -->
<div id="toprint" hidden>
  <?php
if (mysqli_num_rows($result1) > 0) {
?>
  <table id="myTableP" border="2" cellspacing="0">
  <caption>Liste des productions</caption>
  <tr>
      <th>#</th>
      <th>Produit</th>
      <th>Quantité</th>
      <th>Période</th>
      <th>Image</th>
      <th>DateEncodage</th>
  </tr>
<?php
$i=1;
while($row = mysqli_fetch_array($result1)) {
?> 
<tr>
      <td><?=$i?></td>
      <td><?=$row['produit']?></td>
      <td><?=$row['quantite']?></td>
      <td><?=$row['periode']?></td>
      <td>
        <img src="actions/upload/<?=$row['image']?>" alt="" width="100" height="150">
     
      </td>
      <td><?=$row['dateEncodage']?></td>
</tr>
<?php
$i++;
}
?>
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
<!-- hidden table to be printed -->
<!-- starting table -->
<div style="overflow-x:auto;">
  <?php
if (mysqli_num_rows($result) > 0) {
?>
  <table id="myTable">
  
  <tr>
      <th>#</th>
      <th>Produit</th>
      <th>Quantité</th>
      <th>Période</th>
      <th>Image</th>
      <th>DateEncodage</th>
      <th>Actions</th>
  </tr>
<?php
$i=1;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
      <td><?=$i?></td>
      <td><?=$row['produit']?></td>
      <td><?=$row['quantite']?></td>
      <td><?=$row['periode']?></td>
      <td>
        <img src="actions/upload/<?=$row['image']?>" alt="" width="100" height="150">
      <a href="updateProductionImg.php?id=<?=$row['id']?>" style="text-decoration:none;">
       <h5>
        <span class="badge"><i class="fa fa-edit"></i>Modifier</span>
       </h5>
      </a>
      </td>
      <td><?=$row['dateEncodage']?></td>
      <td>
      <a href="updateProduction.php?id=<?=$row['id']?>" style="text-decoration:none;">
       <h5>
        <span class="badge"><i class="fa fa-edit"></i>Modifier</span>
       </h5>
      </a>
      <a href="actions/deleteProduction.php?id=<?=$row['id']?>" style="text-decoration:none;">
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
  <button class="btn" onclick="printpart()"><i class="fa fa-print"></i>Imprimer</button>
</div>
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
<!-- ending table -->



</div><!-- end main -->
<!-- pagination script -->

<script  src="assets/js/script.js"></script>
<!-- pagination script -->

<!-- search script periode -->
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
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
<!-- search script periode -->

<!-- search script produit -->
<script>
function myFunctionO() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInputO");
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
<!-- search script produit -->

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
