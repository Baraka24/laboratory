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
    
     $sql="UPDATE `production` SET `image`='$final_file' WHERE id='" . $_GET["id"] . "'";
    if (mysqli_query($con, $sql)) {
        $_SESSION['alerteS']="Image Production modifiée avec succès";
        header('Location:../productions.php'); 
     } else {
        echo "Error: " . $sql . " " . mysqli_error($con);
     }
 }
 else
 {
  echo "Error.Please try again";		
 }
}
    mysqli_close($con);
?>