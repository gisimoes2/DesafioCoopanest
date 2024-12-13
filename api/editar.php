<?php
require_once('conexao.php');

// Recebe os dados via POST
$data = json_decode(file_get_contents("php://input"), true);

// Verifica se o ID e os dados foram fornecidos
if (isset($data['id'], $data['nome'], $data['email'], $data['telefone'])) {
    $id = $data['id'];
    $nome = $data['nome'];
    $email = $data['email'];
    $telefone = $data['telefone'];

    try {
        // Inicia a transação
        $pdo->beginTransaction();

        // Atualiza os dados na tabela 'dados_originais'
        $sqlUpdateOriginal = "UPDATE dados_originais SET nome = ?, email = ?, telefone = ?, data_atualizacao = NOW() WHERE id = ?";
        $stmtUpdateOriginal = $pdo->prepare($sqlUpdateOriginal);
        $stmtUpdateOriginal->execute([$nome, $email, $telefone, $id]);

        // Insere os dados diretamente na tabela 'dados_editados'
        $sqlInsertEditados = "INSERT INTO dados_editados (id, nome, email, telefone, data_atualizacao) 
                              VALUES (?, ?, ?, ?, NOW())";
        $stmtInsertEditados = $pdo->prepare($sqlInsertEditados);
        $stmtInsertEditados->execute([$id, $nome, $email, $telefone]);

        // Commit da transação
        $pdo->commit();

        // Envia a resposta de sucesso
        echo json_encode(["status" => "success", "message" => "Dados atualizados na tabela dados_originais e inseridos na tabela dados_editados"]);
        
    } catch (Exception $e) {
        // Rollback em caso de erro
        $pdo->rollBack();
        echo json_encode(["status" => "error", "message" => "Erro ao processar os dados: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "ID, nome, email ou telefone não fornecidos"]);
}
?>
