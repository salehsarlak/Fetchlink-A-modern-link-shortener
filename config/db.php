<?php

// === موقت برای دیباگ ===
echo "<pre style='background:#111;color:#0f0;padding:15px;direction:ltr;text-align:left;'>";
echo "=== Database Environment Variables ===\n\n";

$vars = ['MYSQLHOST', 'MYSQLUSER', 'MYSQLPASSWORD', 'MYSQLDATABASE', 'MYSQLPORT', 'DB_HOST', 'DB_USER', 'DB_PASSWORD', 'DB_NAME', 'DB_PORT'];
foreach ($vars as $v) {
    $val = getenv($v);
    if ($val === false) {
        echo "$v = (not set)\n";
    } else {
        // پسورد رو مخفی کن
        if (strpos($v, 'PASSWORD') !== false || strpos($v, 'PASS') !== false) {
            echo "$v = ******\n";
        } else {
            echo "$v = $val\n";
        }
    }
}
echo "\n=== All MYSQL* variables ===\n";
foreach ($_ENV as $k => $v) {
    if (stripos($k, 'MYSQL') !== false || stripos($k, 'DB_') !== false) {
        if (stripos($k, 'PASS') !== false) {
            echo "$k = ******\n";
        } else {
            echo "$k = $v\n";
        }
    }
}
echo "</pre>";
// === پایان دیباگ ===

$servername = getenv('MYSQLHOST') ?: getenv('DB_HOST') ?: 'localhost';
$username   = getenv('MYSQLUSER') ?: getenv('DB_USER') ?: 'root';
$password   = getenv('MYSQLPASSWORD') ?: getenv('DB_PASSWORD') ?: '';
$dbname     = getenv('MYSQLDATABASE') ?: getenv('DB_NAME') ?: 'link';
$port       = (int) (getenv('MYSQLPORT') ?: getenv('DB_PORT') ?: 3306);

$conn = @new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("<pre style='color:red;'>Connection failed: " . $conn->connect_error . "\n\nHost: $servername\nUser: $username\nDB: $dbname\nPort: $port</pre>");
}

$conn->set_charset("utf8mb4");

?>
