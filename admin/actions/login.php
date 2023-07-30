<?php
session_start();
require_once '../includes/config.php';
if($_POST['login'])
{
    $userName =$_POST["username"];
    $userPass =$_POST["password"];
    $hashedPass = md5($userPass);
    $query = "SELECT * FROM `admin` WHERE `userName`= '$userName' AND `pwd` = '$hashedPass'";
    $result = mysqli_query( $con, $query);
    $row = mysqli_fetch_array($result);

    if($row)
    {
        $_SESSION['id']=$row['id'];
        $_SESSION['userName']=$row['userName'];
        $session = md5($userName.$hashedPass);
        mysqli_query($con, "UPDATE `admin` SET `session` = '$session' WHERE `userName` = '$userName' AND `pwd` = '$hashedPass'");
        setcookie("login", $userName,time()+3600);
        header('Location:home.php');

    }
    else
    {
        //die('Account has not been found.');
        header('Location:index.php?errCon=1');
    }
}
?>