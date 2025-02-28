<?php
$servername  ="localhost";
$user = "root";
$password = "";
$db_name = "mbfitnessclub";

$conn = mysqli_connect($servername, $user, $password,$db_name,3307);

if ($conn)
{
    //echo "db connected";
}
else
{
    //echo "not connected";
}


?>