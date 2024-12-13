<?php
// Conexão com o banco de dados
require_once('conexao.php');

// Verifica se os dados foram enviados via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    
    // Validação simples (você pode melhorar essa parte)
    if (empty($nome) || empty($email) || empty($telefone)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }

    // SQL para inserir os dados na tabela 'dados_originais'
    $sql = "INSERT INTO dados_originais (nome, email, telefone) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // Executa a inserção
    if ($stmt->execute([$nome, $email, $telefone])) {
        echo "Dados inseridos com sucesso!";
    } else {
        echo "Erro ao inserir os dados!";
    }
}
?>
