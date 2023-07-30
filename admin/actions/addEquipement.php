<?php
session_start();
require_once '../../includes/config.php';
$idAdmin=$_SESSION['id'];
if(isset($_POST['save']))
{   
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="upload/";
 
 /* new file size in KB */
 $new_size = $file_size/1024;  
 /* new file size in KB */
 
 /* make file name in lower case */
 $new_file_name = strtolower($file);
 /* make file name in lower case */
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  $nom=mysqli_real_escape_string($con,$_POST['nom']);
  $specification=mysqli_real_escape_string($con,$_POST['specification']);
  $nbreT=$_POST['nbreT'];
  $nbreB=$_POST['nbreB'];
  $nbreM=$nbreT-$nbreB;
  $dateE=$_POST['dateE'];
  $structure=$_POST['structure'];
  $selectD=mysqli_query($con,"SELECT * FROM `equipement`");
  $dataF=mysqli_fetch_array($selectD);
  $nomExist=$dataF['nom'];
  if($nom==$nomExist)
  {
    $_SESSION['alerteE']="Eche d'enregistrement, Il existe un équipement du nom saisit!"." (".$nom.")";
    header('Location:../equipments.php');
  }
  else
  {
     $sql="INSERT INTO `equipement`(`id`, `nom`, `specification`, `image`, `idAdmin`, 
     `idStructure`, `dateEncodage`, `nbreTotal`, `nbreBon`, `nbreMauvais`) 
     VALUES (NULL,'$nom','$specification','$final_file','$idAdmin','$structure',
     '$dateE','$nbreT','$nbreB','$nbreM')";
    if (mysqli_query($con, $sql)) {
        $_SESSION['alerteS']="Equipement enregistré avec succès";
        header('Location:../equipments.php'); 
     } else {
        $_SESSION['alerteE']= "Error: " . $sql . " " . mysqli_error($con);
        header('Location:../equipments.php');
     }
  }  
 }
 else
 {
    $_SESSION['alerteE']= "Error.Please try again(Réessayer svp!)";
  header('Location:../equipments.php');		
 }
}
    mysqli_close($con);
?>