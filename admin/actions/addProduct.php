<?php
session_start();
require_once '../../includes/config.php';
if(isset($_POST['save']))
{
    $description=mysqli_real_escape_string($con,$_POST['description']);
    $products=mysqli_query($con,"SELECT * FROM `produits`");
    $product=mysqli_fetch_array($products);
    $productDesc=$product["description"];
    if($description==$productDesc)
    {
        $_SESSION['alerteE']="Le produit: '".$description."' existe déjà dans la base de données";
        header('Location:../products.php'); 
    }
    else
    {
    $sql = "INSERT INTO `produits`(`id`, `description`) VALUES (NULL,'$description')";
    if (mysqli_query($con, $sql)) {
       $_SESSION['alerteS']="Produit enregistré avec succès";
       header('Location:../products.php'); 
    } else {
        $_SESSION['alerteE']= "Error: " . $sql . " " . mysqli_error($con);
        header('Location:../products.php');
    }
    }
    mysqli_close($con);
}
?>