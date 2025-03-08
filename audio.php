<?php
// Definir o diretório onde os áudios estão armazenados
$audioDir = __DIR__ . '/audio/';

// Pegar o nome do arquivo da URL
$file = isset($_GET['file']) ? basename($_GET['file']) : '';

// Caminho completo do arquivo
$filePath = $audioDir . $file;

// Verificar se o arquivo existe
if (file_exists($filePath)) {
    // Definir os cabeçalhos para permitir o acesso de qualquer origem (bypass CORS)
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: audio/mpeg");
    header("Content-Length: " . filesize($filePath));

    // Ler e exibir o arquivo
    readfile($filePath);
    exit;
} else {
    // Retornar erro caso o arquivo não seja encontrado
    http_response_code(404);
    echo "Arquivo não encontrado.";
}
?>
