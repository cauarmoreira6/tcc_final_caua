<?php
$httpHost = $_SERVER['HTTP_HOST'] ?? 'localhost';
$hostName = strtolower(explode(':', $httpHost, 2)[0]);
$isLocal = in_array($hostName, ['localhost', '127.0.0.1'], true);

define('BASE_URL', $isLocal ? '/site_antigravity' : '');

$localConfig = __DIR__ . '/config.local.php';
if (is_file($localConfig)) {
    require_once $localConfig;
}

if ($isLocal) {
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'mathplay');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_PORT', 3308);
} else {
    define('DB_HOST', defined('DB_PRODUCTION_HOST') ? DB_PRODUCTION_HOST : '__DB_HOST__');
    define('DB_NAME', defined('DB_PRODUCTION_NAME') ? DB_PRODUCTION_NAME : '__DB_NAME__');
    define('DB_USER', defined('DB_PRODUCTION_USER') ? DB_PRODUCTION_USER : '__DB_USER__');
    define('DB_PASS', defined('DB_PRODUCTION_PASS') ? DB_PRODUCTION_PASS : '__DB_PASS__');
    define('DB_PORT', defined('DB_PRODUCTION_PORT') ? DB_PRODUCTION_PORT : 3306);
}
