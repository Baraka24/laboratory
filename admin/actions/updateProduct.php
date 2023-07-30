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
    $sql = "UPDATE `produits` SET `description`='$description' WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($con, $sql)) {
       $_SESSION['alerteS']="Produit modifié avec succès";
       header('Location:../products.php'); 
    } else {
       echo "Error: " . $sql . " " . mysqli_error($con);
    }
    }
    mysqli_close($con);
}
?>