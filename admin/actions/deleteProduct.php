<?php
session_start();
require_once '../../includes/config.php';
$sql = "DELETE FROM `produits` WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    $_SESSION['alerteE']="Produit supprimé avec succès";
       header('Location:../products.php'); 
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>