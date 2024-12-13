<?php
require_once 'dados.php';
header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Rota GET: Exibe os dados coletados
        $dados = listarDados();
        echo json_encode($dados);
        break;
    
    case 'POST':
        // Rota POST: Recebe os dados e os armazena no banco
        $data = json_decode(file_get_contents("php://input"));
        $nome = $data->nome;
        $email = $data->email;
        $telefone = $data->telefone;
        $endereco = $data->endereco;
        $cidade = $data->cidade;
        $estado = $data->estado;
        $cep = $data->cep;
        $nascimento = $data->nascimento;

        inserirDados($nome, $email, $telefone, $endereco, $cidade, $estado, $cep, $nascimento);
        echo json_encode(["status" => "success", "message" => "Dados inseridos"]);
        break;
    
    case 'PUT':
        // Rota PUT: Atualiza os dados após edição
        if (preg_match('/\/dados\/(\d+)/', $_SERVER['REQUEST_URI'], $matches)) {
            $id = $matches[1];
            $data = json_decode(file_get_contents("php://input"));
            $nome = $data->nome;
            $email = $data->email;
            $telefone = $data->telefone;
            atualizarDados($id, $nome, $email, $telefone, $endereco, $cidade, $estado, $cep, $nascimento);
            echo json_encode(["status" => "success", "message" => "Dados atualizados"]);
        }
        break;
    
    default:
        echo json_encode(["status" => "error", "message" => "Método não permitido"]);
}
