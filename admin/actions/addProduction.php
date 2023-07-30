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
  $periode=mysqli_real_escape_string($con,$_POST['periode']);
  $quantite=mysqli_real_escape_string($con,$_POST['qtte']);
  $produit=$_POST['produit'];
  $dateE=$_POST['dateE'];
  $selectD=mysqli_query($con,"SELECT * FROM `production`");
  $dataF=mysqli_fetch_array($selectD);
  $produitExist=$dataF['produit'];
  $periodeExist=$dataF['periode'];
  $quantiteExist=$dataF['quantite'];
  if($produit==$produitExist AND $periode==$periodeExist AND $quantite==$quantiteExist)
  {
    $_SESSION['alerteE']=" Echec lors de l'enregistrement: Il existe une production des identifiants entrés!";
    header('Location:../productions.php');
  }
  else
  {
     $sql="INSERT INTO `production`(`id`, `periode`, 
        `quantite`, `image`, `idAdmin`, `dateEncodage`, `produit`) 
         VALUES (NULL,'$periode','$quantite','$final_file','$idAdmin','$dateE','$produit')";
    if (mysqli_query($con, $sql)) {
        $_SESSION['alerteS']="Production enregistrée avec succès";
        header('Location:../productions.php'); 
     } else {
      $_SESSION['alerteE']= "Error: " . $sql . " " . mysqli_error($con);
        header('Location:../productions.php'); 
      }  
   }  
 }
 else
 {
   $_SESSION['alerteE']=  "Error.Please try again( Réessayer!)";	
   header('Location:../productions.php'); 	
 }
}
    mysqli_close($con);
?>