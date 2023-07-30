<?php
session_start();
require_once '../../includes/config.php';
$idAdmin=$_SESSION['id'];
if(isset($_POST['save']))
{   
  $nom=mysqli_real_escape_string($con,$_POST['nom']);
  $specification=mysqli_real_escape_string($con,$_POST['specification']);
  $nbreT=$_POST['nbreT'];
  $nbreB=$_POST['nbreB'];
  $nbreM=$nbreT-$nbreB;
  $dateE=$_POST['dateE'];
  $structure=$_POST['structure'];
     $sql="UPDATE `equipement` SET `nom`='$nom',`specification`='$specification',
     `idAdmin`='$idAdmin',`idStructure`='$structure',
     `dateEncodage`='$dateE',
     `nbreTotal`='$nbreT',`nbreBon`='$nbreB',`nbreMauvais`='$nbreM' WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($con, $sql)) {
        $_SESSION['alerteS']="Equipement modifié avec succès";
        header('Location:../equipments.php'); 
     } else {
        echo "Error: " . $sql . " " . mysqli_error($con);
     }  
}
    mysqli_close($con);
?>