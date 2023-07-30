<?php
session_start();
require_once '../../includes/config.php';
if(isset($_POST['save']))
{
    $description=mysqli_real_escape_string($con,$_POST['description']);
    $structure=mysqli_real_escape_string($con,$_POST['structure']);
    $structures=mysqli_query($con,"SELECT * FROM `structure`");
    $str=mysqli_fetch_array( $structures);
    $strStr=$str["structure"];
    if($structure==$productStr)
    {
        $_SESSION['alerteE']="La structure: '".$structure."' existe déjà dans la base de données";
        header('Location:../structures.php'); 
    }
    else
    {
    $sql = "UPDATE `structure` SET 
    `structure`='$structure',`description`='$description' 
    WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($con, $sql)) {
       $_SESSION['alerteS']="Structure modifiée avec succès";
       header('Location:../structures.php'); 
    } else {
       echo "Error: " . $sql . " " . mysqli_error($con);
    }
    }
    mysqli_close($con);
}
?>