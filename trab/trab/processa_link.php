<?php

// Declaração das informações necessárias para se conectar ao banco de dados.
$servidor= "localhost"; // Endereço do servidor do banco de dados. "localhost" indica que está no servidor local.
$usuario= "root";       // Nome do usuário do banco de dados. O padrão para servidores locais é "root".
$senha= "";             // Senha para o banco de dados. Em ambientes de desenvolvimento, pode ser vazia.
$db= "comp_link_uteis";     // Nome do banco de dados ao qual a aplicação vai se conectar.

// Criação da conexão com o banco de dados usando os parâmetros acima.
$conexao = mysqli_connect($servidor, $usuario, $senha, $db);

// Verifica se a conexão foi bem-sucedida. Em caso de falha, exibe uma mensagem de erro.
if (!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Recebe os dados enviados pelo formulário através do método POST.
$a = $_POST['nome_link']; // Nome do vendedor, enviado pelo campo "nome_vendedor" do formulário.
$b = $_POST['urls'];      // O que o vendedor vende, enviado pelo campo "oq_vende" do formulário.

// Criação da query SQL para inserir os dados no banco.
// Esta query insere os valores recebidos ($a e $b) na tabela "vendedor".
$query = "INSERT INTO link (nome_link, urls)
            VALUES('$a', '$b')";

// Executa a query SQL na conexão estabelecida com o banco de dados.
mysqli_query($conexao, $query);

// Redireciona o usuário para a página "index.php" após a execução da query.
header('location:index.php');
?>