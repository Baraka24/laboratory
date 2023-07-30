<?php
session_start();
require_once '../../includes/config.php';
$idAdmin=$_SESSION['id'];
if(isset($_POST['save']))
{ 
    
  $periode=mysqli_real_escape_string($con,$_POST['periode']);
  $quantite=mysqli_real_escape_string($con,$_POST['qtte']);
  $produit=$_POST['produit'];
  $dateE=$_POST['dateE'];
  
     $sql="UPDATE `production` SET `periode`='$periode',
     `quantite`='$quantite',`idAdmin`='$idAdmin',
     `dateEncodage`='$dateE',`produit`='$produit' WHERE `id`='" . $_GET["id"] . "'";
    if (mysqli_query($con, $sql)) {
        $_SESSION['alerteS']="Production modifiée avec succès";
        header('Location:../productions.php'); 
     } else {
        echo "Error: " . $sql . " " . mysqli_error($con);
     }
   
 }
 else
 {
  echo "Error.Please try again";		
 }
 mysqli_close($con);
?>