<?php


$servername = "localhost";
$username = "root";
$password = "";
$database = "l&l";

$conn = mysqli_connect($servername, $username, $password, $database);


session_start();
unset($_SESSION["login"]);
unset($_SESSION["password"]);
header("Location:zaloguj.php");





mysqli_close($conn);
?>