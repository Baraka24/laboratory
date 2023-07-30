<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
error_reporting(0);
$con = mysqli_connect('localhost', 'root', '', 'laboratory');
if (mysqli_connect_errno())
{
    echo "Failed to connect to the database: " . mysqli_connect_error();
    die();
}
mysqli_set_charset($con, "utf8");
?>