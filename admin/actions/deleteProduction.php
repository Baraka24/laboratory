<?php
session_start();
require_once '../../includes/config.php';
$sql = "DELETE FROM `production` WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($con, $sql)) {
    $_SESSION['alerteE']="Production supprimé avec succès";
       header('Location:../productions.php'); 
} else {
    echo "Error deleting record: " . mysqli_error($con);
}
mysqli_close($con);
?>