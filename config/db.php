<?php

$servername = getenv('MYSQLHOST') 
           ?: getenv('MYSQL_HOST') 
           ?: getenv('DB_HOST') 
           ?: 'localhost';

$username   = getenv('MYSQLUSER') 
           ?: getenv('MYSQL_USER') 
           ?: getenv('DB_USER') 
           ?: 'root';

$password   = getenv('MYSQLPASSWORD') 
           ?: getenv('MYSQL_PASSWORD') 
           ?: getenv('MYSQL_ROOT_PASSWORD') 
           ?: getenv('DB_PASSWORD') 
           ?: '';

$dbname     = getenv('MYSQLDATABASE') 
           ?: getenv('MYSQL_DATABASE') 
           ?: getenv('DB_NAME') 
           ?: 'railway';

$port       = (int) (getenv('MYSQLPORT') 
           ?: getenv('MYSQL_PORT') 
           ?: getenv('DB_PORT') 
           ?: 3306);

// اگر MYSQL_URL وجود داشت ازش استفاده کن
if (($url = getenv('MYSQL_URL') ?: getenv('DATABASE_URL'))) {
    $parsed = parse_url($url);
    if ($parsed) {
        $servername = $parsed['host'] ?? $servername;
        $port       = $parsed['port'] ?? $port;
        $username   = $parsed['user'] ?? $username;
        $password   = $parsed['pass'] ?? $password;
        $dbname     = ltrim($parsed['path'] ?? '', '/') ?: $dbname;
    }
}

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>
