<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "lab2"; // <-- updated database name

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
