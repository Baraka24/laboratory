<div class="navbar">
  <a href="home.php"><i class="fa fa-home"></i>Accueil</a>
  <a href="equipments.php"><i class="fa fa-gears"></i>Nos équipements</a>
  <a href="structures.php"><i class="fa fa-sitemap"></i>Nos structures</a>
  <a href="products.php"><i class="fa fa-database"></i>Nos produits</a>
  <a href="productions.php"><i class="fa fa-pie-chart"></i>Nos productions</a>
  <a href="statistiquesProductions.php"><i class="fa fa-pie-chart"></i>Statistiques Productions</a>
  <a href="logout.php"><i class="fa fa-power-off" style="color:red"></i>Se deconnecter</a>
  <p class="admin" style="color:#04AA6D">
   <button style="color:#04AA6D;font-weight:bold;">
    <i class="fa fa-user-circle"></i>Utilisateur: <?php 
    echo $_SESSION['userName'];?>
   </button>
  </p>
</div>