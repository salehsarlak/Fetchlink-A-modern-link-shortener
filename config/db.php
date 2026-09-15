<?php

// === دیباگ موقت ===
echo "<pre style='background:#111;color:#0f0;padding:15px;direction:ltr;text-align:left;font-size:13px;'>";
echo "=== All Environment Variables containing MYSQL or DB ===\n\n";

ksort($_ENV);
foreach ($_ENV as $k => $v) {
    if (stripos($k, 'MYSQL') !== false || stripos($k, 'DB_') !== false || stripos($k, 'DATABASE') !== false) {
        if (stripos($k, 'PASS') !== false || stripos($k, 'PASSWORD') !== false) {
            echo "$k = ******\n";
        } else {
            echo "$k = " . htmlspecialchars($v) . "\n";
        }
    }
}
echo "</pre>";
// === پایان دیباگ ===

// سعی می‌کنیم از همه نام‌های ممکن بخونیم
$servername = getenv('MYSQLHOST') 
           ?: getenv('MYSQL_HOST') 
           ?: getenv('DB_HOST') 
           ?: getenv('MYSQL_URL') 
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
           ?: 'link';

$port       = (int) (getenv('MYSQLPORT') 
           ?: getenv('MYSQL_PORT') 
           ?: getenv('DB_PORT') 
           ?: 3306);

// اگر MYSQL_URL وجود داشت، ازش پارس کنیم
if ($servername === 'localhost' && ($url = getenv('MYSQL_URL') ?: getenv('DATABASE_URL'))) {
    $parsed = parse_url($url);
    if ($parsed) {
        $servername = $parsed['host'] ?? $servername;
        $port       = $parsed['port'] ?? $port;
        $username   = $parsed['user'] ?? $username;
        $password   = $parsed['pass'] ?? $password;
        $dbname     = ltrim($parsed['path'] ?? '', '/') ?: $dbname;
    }
}

$conn = @new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("<pre style='color:#f55;background:#111;padding:15px;'>Connection failed: " . htmlspecialchars($conn->connect_error) . "\n\nTried:\nHost: $servername\nUser: $username\nDB: $dbname\nPort: $port</pre>");
}

$conn->set_charset("utf8mb4");

?>
