<?php
session_start();
require_once '../../includes/config.php';
$sql = "DELETE FROM `equipement` WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    $_SESSION['alerteE']="Equipement supprimé avec succès";
       header('Location:../equipments.php'); 
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>