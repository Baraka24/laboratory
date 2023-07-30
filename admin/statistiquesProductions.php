<?php
session_start();
require_once '../includes/config.php';
if(!isset($_SESSION['id']))
{
    header('Location:index.php');
}
include_once 'actions/viewProductions.php';
?>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});
      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);
      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {
        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Sémences produites');
        data.addColumn('number', 'Quantités');
        data.addRows([
            <?php
             while($row = mysqli_fetch_array($result))
             {
                $libelle=$row['produit']; 
                $quantite=$row['quantite'];
                $periode=$row['periode'];
                $lp=$libelle." (".$periode." )";
               echo "['".$lp."', $quantite],";

             }
            ?>
        ]);
        // Set chart options
        var options = {'title':'Statistiques de production Laboratoire biotechnologique de l\'UAC',
                       'width':550,
                       'height':400};
        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
    <style>
      .content {
  max-width: 500px;
  margin: auto;
  background: white;
  padding: 10px;
}
    </style>
<?php 
 include 'includes/head.php';
?>
  </head>

  <body>
  <?php 
 include 'includes/navbar.php';
?>
<div class="main"><!-- start main -->
    <!--Div that will hold the pie chart-->
    <br><br> <br><br><br><br>
    <div style="overflow-x:auto;" class="content">
    <table>
      <tr>
        <th></th>
      </tr>
      <tr>
        <th><div id="chart_div"></div></th>
      </tr>
    </table>
    
    </div>
</div>
  </body>
</html>