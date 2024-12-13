<?php
require_once 'api/conexao.php';

if ($pdo) {
    echo "Conexão bem-sucedida!";
} else {
    echo "Falha na conexão.";
}
?>
