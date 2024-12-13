Projeto PHP - Sistema de Cadastro e Edição de Dados
Este projeto permite o cadastro, visualização e edição de dados de usuários em um banco de dados utilizando PHP e MySQL. A interface frontend é simples e utiliza HTML, CSS e JavaScript para interagir com o backend via requisições HTTP (GET, POST).
Funcionalidades
Cadastro de dados: Formulário para inserir nome, email, telefone, endereço, cidade, estado, CEP e data de nascimento.
Exibição de dados: Tabela que exibe os dados cadastrados no banco de dados.
Edição de dados: Permite editar os dados de cada linha diretamente na tabela.
Tecnologias Utilizadas
Frontend: HTML, CSS, JavaScript (Fetch API)
Backend: PHP, MySQL
Banco de Dados: MySQL
Estrutura de Arquivos
tela_insercao.html: Formulário para inserir dados.
listagem.html: Página para listar e editar dados.
api/dados.php: Endpoint para listar dados.
api/insert.php: Endpoint para inserir novos dados no banco de dados.
api/editar.php: Endpoint para atualizar os dados existentes.
Como Rodar o Projeto
Clone o repositório.
Configure o banco de dados MySQL com as tabelas adequadas.
Coloque o código PHP no servidor web com suporte a PHP (ex: Apache).
Acesse as páginas tela_insercao.html e listagem.html no navegador.

URLs de Acesso
Cadastro de Dados (tela_insercao.html):
http://localhost/ProjetoPHP/tela_insercao.html

Listagem de Dados (listagem.html):
http://localhost/ProjetoPHP/listagem.html
