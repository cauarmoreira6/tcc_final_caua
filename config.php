<?php

$httpHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
$isLocal = in_array($httpHost, ['localhost', '127.0.0.1', 'localhost:80', 'localhost:8080'], true);

if ($isLocal) {
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'mathplay');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_PORT', 3308);
} else {
    define('DB_HOST', 'sql311.infinityfree.com');
    define('DB_NAME', 'if0_43256333_mathplay');
    define('DB_USER', 'if0_43256333');
    define('DB_PASS', 'SesiSenai475');
    define('DB_PORT', 3306);
}
