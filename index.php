<?php
require_once 'includes/config.php';
include_once 'admin/actions/viewProductions.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<title>Laboratoire biotechnologique de l'UAC</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Style the body */
body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

/* Header/logo Title */
.header {
  padding: 80px;
  text-align: center;
  background: #1abc9c;
  color: white;
}

/* Increase the font size of the heading */
.header h1 {
  font-size: 40px;
}

/* Sticky navbar - toggles between relative and fixed, depending on the scroll position. It is positioned relative until a given offset position is met in the viewport - then it "sticks" in place (like position:fixed). The sticky value is not supported in IE or Edge 15 and earlier versions. However, for these versions the navbar will inherit default position */
.navbar {
  overflow: hidden;
  background-color: #333;
  position: sticky;
  position: -webkit-sticky;
  top: 0;
}

/* Style the navigation bar links */
.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}


/* Right-aligned link */
.navbar a.right {
  float: right;
}

/* Change color on hover */
.navbar a:hover {
  background-color: #ddd;
  color: black;
}

/* Active/current link */
.navbar a.active {
  background-color: #666;
  color: white;
}

/* Column container */
.row {  
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
}

/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  -ms-flex: 30%; /* IE10 */
  flex: 30%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {   
  -ms-flex: 70%; /* IE10 */
  flex: 70%;
  background-color: white;
  padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
}

/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>

<div class="header">
  <h1>Laboratoire Biotechnologique</h1>
  <h1>(U.A.C)</h1>
</div>

<div class="navbar">
  <a href="#" class="active">Accueil</a>
  <a href="#">Nos productions</a>
  <a href="#" class="right">Contactez-nous</a>
</div>

<div class="row">
  <div class="side">
    <h2>Apropos</h2>
    <img src="img/img1.jpg" class="fakeimg" style="height:200px;">
    <p>
      Etant une institution aux grandes ambitions, 
      l’UAC s’est doté d’un laboratoire biotechnologique moderne et 
      bien équipé pour permettre à ses étudiants de marier les théories apprises à la pratique. 
      Ce laboratoire biotechnologique aidera les étudiants dans leurs recherches scientifiques 
      du domaine de biotechnologie.
    </p>
    <h3>Vues interieures:</h3>
    <!-- <p>Lorem ipsum dolor sit ame.</p> -->
    <img src="img/img2.jpg" class="fakeimg" style="height:150px;"><br>
    <img src="img/img4.jpg" class="fakeimg" style="height:150px;"><br>
    <img src="img/img3.jpg" class="fakeimg" style="height:150px;">
  </div>
  <div class="main">
    <h2>Nos productions</h2>
  <?php
$i=1;
while($row = mysqli_fetch_array($result1)) {
?>
    <h5><?=$row['produit']?>, <?=$row['dateEncodage']?></h5>
    <div class="fakeimg" style="height:200px;">
     <img src="admin/actions/upload/<?=$row['image']?>" alt="" width="100" height="150">
    </div>
    <p>
      Nous sommes un Laboratoire biotecthnologique moderne offrant des produits de qualité
      resultants d'une préparation acetique de différentes cultures.
    </p>
    <br>
    <?php
$i++;
}
?>
</div>
</div>
<div class="footer">
  <h5>©-Copyright-U.AC.-<?= date('Y')?>-Designed by Baraka Kinywa.</h5>
</div>

</body>
</html>
