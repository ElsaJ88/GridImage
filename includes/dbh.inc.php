<?php

$dsn = "mysql:host=localhost;dbname=grid_image_tool";
$dbusername = "root";
$dbpassword = "";

try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOExeception $e) {
    echo "Failed to connect: " . $e->getMessage();
}