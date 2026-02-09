<?php
$host = "localhost";
$user = "root";        // ganti saat hosting
$pass = "";
$db   = "portofolio";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
