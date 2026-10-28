<?php
// ============================================================
// Educa Play — Conexão com o Banco de Dados
// ============================================================
// Este arquivo cria a conexão com o MySQL usando a extensão
// mysqli (MySQL Improved). É incluído em todas as páginas
// que precisam acessar o banco de dados.
// ============================================================

// Configurações de conexão
require_once dirname(__DIR__) . '/config.php';

// Cria a conexão
// Os dados são carregados de config.php para separar ambiente local e produção
mysqli_report(MYSQLI_REPORT_OFF);

if (preg_match('/^__/i', DB_HOST) || preg_match('/^__/i', DB_NAME) || preg_match('/^__/i', DB_USER) || preg_match('/^__/i', DB_PASS)) {
    http_response_code(503);
    die('<div style="text-align:center;padding:50px;font-family:sans-serif;"><h2>Configuração do banco pendente</h2><p>As credenciais de produção ainda não foram configuradas no servidor.</p></div>');
}

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    // connect_error retorna a mensagem de erro se a conexão falhar
    die('<div style="text-align:center;padding:50px;font-family:sans-serif;">
            <h2 style="color:#e74c3c;"> Erro de Conexão</h2>
            <p>Não foi possível conectar ao banco de dados.</p>
            <p><small>Erro interno ao acessar o banco de dados.</small></p>
            <p>Verifique as credenciais em config.php.</p>
         </div>');
}

// Define o charset como UTF-8 para suportar acentos e caracteres especiais
$conn->set_charset('utf8');
?>

