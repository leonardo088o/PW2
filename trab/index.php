<?php
// Definindo as variáveis de conexão com o banco de dados.
$servidor = "localhost";  // Endereço do servidor do banco de dados.
$usuario = "root";        // Usuário do banco de dados.
$senha = "";              // Senha do banco de dados.
$db = "comp_link_uteis";      // Nome do banco de dados
 
// Estabelecendo a conexão com o banco de dados.
$conexao = mysqli_connect($servidor, $usuario, $senha, $db);
 
// Criando uma consulta SQL para selecionar todos os dados da tabela "vendedor".
$query = "SELECT * FROM link";
 
// Executando a consulta no banco de dados.
$consulta_vendedor = mysqli_query($conexao, $query);
?>
 
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkstack - Gerenciamento de Links</title>
    <style>
        /* Estilos gerais da página */
        body {
            font-family: Arial, sans-serif;
            background-color: #1e2730; /* Fundo escuro como na imagem */
            margin: 0;
            padding: 0;
            color: #fff;
        }
        
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 70px; /* Aumentado para dar mais espaço */
            background-color: #8aa2b5; /* Cor da barra lateral */
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 40px; /* Aumentado o espaço no topo */
        }
        
        .sidebar-icon {
            width: 40px; /* Aumentado o tamanho dos ícones */
            height: 40px; /* Aumentado o tamanho dos ícones */
            background-color: #fff;
            border-radius: 50%;
            margin-bottom: 50px; /* AUMENTADO: Espaçamento entre os ícones da barra lateral */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8aa2b5;
            font-size: 20px; /* Aumentado o tamanho do ícone */
        }
        
        .content {
            margin-left: 70px; /* Ajustado para o novo tamanho da barra lateral */
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin-bottom: 30px; /* Aumentado o espaço após o logo */
        }
        
        .form-container {
            background-color: #f5f7f9;
            border-radius: 15px;
            padding: 30px; /* AUMENTADO: Mais padding interno */
            width: 100%;
            max-width: 550px; /* AUMENTADO: Largura máxima do formulário */
            margin-bottom: 30px; /* AUMENTADO: Espaço entre o formulário e a tabela */
        }
        
        .label {
            color: #333;
            text-align: center;
            display: block;
            margin-bottom: 8px; /* Aumentado */
            font-size: 16px; /* AUMENTADO: Tamanho da fonte */
        }
        
        input[type="text"] {
            width: 100%;
            padding: 15px; /* AUMENTADO: Padding dos inputs */
            margin-bottom: 20px; /* AUMENTADO: Espaço entre os inputs */
            border: none;
            border-radius: 25px;
            background-color: #8aa2b5; /* Cor cinza dos inputs */
            color: #fff;
            font-size: 16px; /* AUMENTADO: Tamanho da fonte */
            box-sizing: border-box;
        }
        
        input[type="text"]::placeholder {
            color: #fff;
            opacity: 0.8;
        }
        
        input[type="submit"] {
            display: none; /* Escondendo o botão de envio como na imagem */
        }
        
        /* Estilo da tabela */
        table {
            width: 100%;
            max-width: 550px; /* AUMENTADO: Largura máxima da tabela */
            background-color: #fff;
            border-collapse: collapse;
            border-radius: 5px;
            overflow: hidden;
            font-size: 16px; /* AUMENTADO: Tamanho da fonte */
        }
        
        th, td {
            padding: 15px 20px; /* AUMENTADO: Padding das células */
            text-align: left;
            color: #333;
        }
        
        th {
            background-color: #f5f7f9;
            font-weight: normal;
            border-bottom: 1px solid #ddd;
        }
        
        tr:hover {
            background-color: #f9f9f9;
        }
        
        /* Estilo para o segundo input com borda roxa */
        .url-input {
            border: 2px solid #9370DB !important; /* Borda roxa como na imagem */
        }
        
        /* Adicionado: ícone de menu no topo */
        .menu-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #8aa2b5;
            width: 40px;
            height: 40px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 24px;
        }
    </style>
</head>
<body>
    <!-- Barra lateral com ícones -->
    <div class="sidebar">
        <div class="sidebar-icon">👤</div>
        <div class="sidebar-icon">🔗</div>
        <div class="sidebar-icon">✏️</div>
        <div class="sidebar-icon">🔍</div>
        <div class="sidebar-icon">⚙️</div>
    </div>
    
    <div class="content">
        <!-- Ícone de menu (visível na imagem) -->
        
        <!-- Logo do Linkstack -->
        <img src="imagem.png" alt="Linkstack Logo" class="logo">
        
        <!-- Formulário para inserir um novo link -->
        <div class="form-container">
            <form method="post" action="processa_link.php">
                <div class="label">Nome:</div>
                <input type="text" name="nome_link" placeholder="Digite o nome do link">
                
                <div class="label">URL:</div>
                <input type="text" name="urls" placeholder="Digite a URL" class="url-input">
                
                <input type="submit" value="Inserir link">
            </form>
        </div>
        
        <!-- Tabela para exibir os links cadastrados -->
        <table>
            <thead>
                <tr>
                    <th>Nome:</th>
                    <th>URL:</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Laço para exibir cada linha de resultado da consulta.
                while($linha = mysqli_fetch_array($consulta_vendedor)){
                    echo '<tr>';
                    echo '<td>', $linha['nome_link'], '</td>';
                    echo '<td>', $linha['urls'], '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>