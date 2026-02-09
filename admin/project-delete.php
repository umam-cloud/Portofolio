<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}
require "../config/database.php";

$id = (int) $_GET['id'];

$q = mysqli_query($conn, "SELECT image FROM projects WHERE id=$id");
$p = mysqli_fetch_assoc($q);

if ($p && file_exists("../uploads/" . $p['image'])) {
    unlink("../uploads/" . $p['image']);
}

mysqli_query($conn, "DELETE FROM projects WHERE id=$id");

header("Location: dashboard.php");
exit;
