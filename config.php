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
    if (!defined('DB_PRODUCTION_HOST') || !defined('DB_PRODUCTION_NAME') || !defined('DB_PRODUCTION_USER') || !defined('DB_PRODUCTION_PASS') || !defined('DB_PRODUCTION_PORT')) {
        throw new RuntimeException('Credenciais de produção não configuradas. Crie config.local.php no servidor a partir de config.local.example.php.');
    }

    define('DB_HOST', DB_PRODUCTION_HOST);
    define('DB_NAME', DB_PRODUCTION_NAME);
    define('DB_USER', DB_PRODUCTION_USER);
    define('DB_PASS', DB_PRODUCTION_PASS);
    define('DB_PORT', DB_PRODUCTION_PORT);
}
