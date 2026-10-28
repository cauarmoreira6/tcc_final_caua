<?php
require_once __DIR__ . '/config.php';
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="UTF-8"><title>Diagnóstico Educa Play</title></head>
<body>
<h1>Diagnóstico Educa Play</h1>
<p><strong>Versão do PHP:</strong> <?= htmlspecialchars(PHP_VERSION) ?></p>
<p><strong>Extensão mysqli:</strong> <?= extension_loaded('mysqli') ? 'Ativa' : 'Inativa' ?></p>
<h2>Arquivos de include</h2>
<ul>
<?php
$arquivos = [
    __DIR__ . '/config.php',
    __DIR__ . '/includes/conexao.php',
    __DIR__ . '/includes/accessibility.php',
    __DIR__ . '/includes/header.php',
    __DIR__ . '/includes/verificar_login.php',
];
foreach ($arquivos as $arquivo) {
    echo '<li>' . htmlspecialchars(basename($arquivo)) . ': ' . (is_file($arquivo) ? 'OK' : 'Arquivo não encontrado') . '</li>';
}
?>
</ul>
<p><strong>Conexão com o banco:</strong>
<?php
if (!extension_loaded('mysqli')) {
    echo 'mysqli inativa';
} else {
    mysqli_report(MYSQLI_REPORT_OFF);
    $teste = @new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
    if ($teste->connect_error) {
        echo 'Erro ao conectar: ' . htmlspecialchars($teste->connect_error);
    } else {
        echo 'OK';
        $teste->close();
    }
}
?>
</p>
<p><strong>⚠️ Apague este arquivo do servidor depois do diagnóstico.</strong></p>
</body>
</html>
