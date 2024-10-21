<?php
$server = "localhost:3307";
$username = 'root';
$password = '';
$db_name = 'filmefydb';

$conn = mysqli_connect($server, $username, $password, $db_name);

if (!$conn) {
    die("gagal terhubung ke database: " . mysqli_connect_error());
}
?>