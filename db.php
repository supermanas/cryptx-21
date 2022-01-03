<?php 

$server = "localhost";
$users = "";
$pass = "";
$database = "";

$conn = mysqli_connect($server, $users, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>