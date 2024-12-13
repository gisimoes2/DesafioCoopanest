<?php
$host = 'localhost';
$dbname = 'meu_projeto';   // Nome do seu banco de dados
$username = 'root';        // Seu usuário do MySQL
$password = '12345678';            // Sua senha do MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}
?>

