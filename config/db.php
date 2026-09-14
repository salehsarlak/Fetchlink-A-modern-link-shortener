<?php

$servername = getenv('MYSQLHOST') ?: getenv('DB_HOST') ?: 'localhost';
$username   = getenv('MYSQLUSER') ?: getenv('DB_USER') ?: 'root';
$password   = getenv('MYSQLPASSWORD') ?: getenv('DB_PASSWORD') ?: '';
$dbname     = getenv('MYSQLDATABASE') ?: getenv('DB_NAME') ?: 'link';
$port       = (int) (getenv('MYSQLPORT') ?: getenv('DB_PORT') ?: 3306);

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>
