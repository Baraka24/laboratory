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
<!-- style sheet for this table -->
<link rel="stylesheet" href="assets/css/table.css">

<!-- style for modifier and supprimer btn -->
<link rel="stylesheet" href="assets/css/modifSuppBtn.css">
<body>
<?php 
 include 'includes/navbar.php';
?>
<div class="main"><!-- start main -->
 

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

  <h2 style="text-align:center">Nos structures</h2>
<a href="addStructure.php" class="notification">
  <span><i class="fa fa-upload"></i>Nouvelle Structure</span>
  <span class="badge">
    <?php
         $sqlS =mysqli_query($con,"SELECT COUNT(*) AS nbre FROM `structure`");
         $s=mysqli_fetch_array($sqlS);
         echo $s['nbre'];
    ?>
  </span>
</a>
<hr>
<!-- search input -->
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Rechercher par structure.." title="Type in a name">
<!-- search input -->
<!-- div to be printed -->

<div id="toprint" hidden>

  <?php
if (mysqli_num_rows($result1) > 0) {
?>
  <table id="myTableP" border="2" cellspacing="0">
  
  <tr>
      <th>#</th>
      <th>Structure</th>
      <th>Description</th>
      
  </tr>
<?php
$i=1;
while($row = mysqli_fetch_array($result1)) {
?>
<tr>
      <td><?=$i?></td>
      <td><?=$row['structure']?></td>
      <td><?=$row['description']?></td>
      
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

<h5>©-Copyright-U.A.C-<?= date('Y')?>-Designed by Baraka Kinywa.</h5>
</div>
<!-- div to be printed -->


<!-- starting table -->
<div style="overflow-x:auto;">

  <?php
if (mysqli_num_rows($result) > 0) {
?>
  <table id="myTable">
  
  <tr>
      <th>#</th>
      <th>Structure</th>
      <th>Description</th>
      <th>Actions</th>
  </tr>
<?php
$i=1;
while($row = mysqli_fetch_array($result)) {
?>
<tr>
      <td><?=$i?></td>
      <td><?=$row['structure']?></td>
      <td><?=$row['description']?></td>
      <td>
      <a href="updateStructure.php?id=<?=$row['id']?>" style="text-decoration:none;">
       <h5>
        <span class="badge"><i class="fa fa-edit"></i>Modifier</span>
       </h5>
      </a>
      <a href="actions/deleteStructure.php?id=<?=$row['id']?>" style="text-decoration:none;">
       <h5>
        <span class="badgeS"><i class="fa fa-remove"></i>Supprimer</span>
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
<!-- search script -->
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
<!-- search script -->

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
