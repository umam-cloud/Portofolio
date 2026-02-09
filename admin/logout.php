<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit;
}

session_start();
session_destroy();
header("Location: index.php");

