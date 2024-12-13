<?php
ini_set('display_errors', 1);  // Exibe os erros no navegador
error_reporting(E_ALL);        // Reporta todos os erros

require_once('conexao.php');

// Função para listar dados
function listarDados() {
    global $pdo;
    $sql = "SELECT * FROM dados_originais";  // Consulta para obter dados
    $stmt = $pdo->query($sql);
    
    // Se não houver dados
    if ($stmt->rowCount() > 0) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);  // Retorna os dados como um array associativo
    } else {
        return [];  // Retorna um array vazio se não houver dados
    }
}

// Função para inserir dados
function inserirDados($nome, $email, $telefone, $endereco, $cidade, $estado, $cep, $nascimento) {
    global $pdo;
    $sql = "INSERT INTO dados_originais (nome, email, telefone, endereco, cidade, estado, cep, nascimento) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $telefone, $endereco, $cidade, $estado, $cep, $nascimento]);
}

// Função para atualizar dados
function atualizarDados($id, $nome, $email, $telefone, $endereco, $cidade, $estado, $cep, $nascimento) {
    global $pdo;
    $sql = "UPDATE dados_originais 
            SET nome = ?, email = ?, telefone = ?, endereco = ?, cidade = ?, estado = ?, cep = ?, nascimento = ?, data_atualizacao = NOW() 
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $email, $telefone, $endereco, $cidade, $estado, $cep, $nascimento, $id]);
}

// Exibindo os dados via API em formato JSON
header("Content-Type: application/json");
$dados = listarDados();  // Chama a função para listar os dados
echo json_encode($dados);  // Retorna os dados em JSON

