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
    <link rel="icon" type="image/png" href="imagem.png">

    <title>Linkstack - Adição de URLS</title>
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
    margin-bottom: 30px;
    object-fit: contain; /* Garante que a imagem se ajuste sem distorção */
}

        
        .form-container {
            background-color: white;
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
            font-size: 16px; /* AUMENTADO: Tamanho da fonte */
            box-sizing: border-box;
        }
        
        input[type="text"]::placeholder {
            color:white;
            opacity: 0.8;
        }
        
        input[type="submit"] {
            display: none; /* Escondendo o botão de envio como na imagem */
        }
        
        /* Estilo da tabela */
        table {
            width: 100%;
            max-width: 550px; /* AUMENTADO: Largura máxima da tabela */
            background-color: white;
            border-collapse: collapse;
            border-radius: 5px;
            font-size: 16px; /* AUMENTADO: Tamanho da fonte */
        }
        
        th, td {
            padding: 15px 20px; /* AUMENTADO: Padding das células */
            text-align: left;
            color: black;
        }
        
        th {
            background-color: white;
            font-weight: normal;
            border-bottom: 1px solid;
        }
        
        tr:hover {
            background-color:white;
        }
        
        
        .sidebar-icon {
    width: 50px;
    height: 50px;
    background-color: #d8e4ed;
    margin-bottom: 35px;
    border: none;
    display: flex;
    transition: background-color 0.2s ease, transform 0.1s ease;
    cursor: pointer;
    padding: 0;
}

.sidebar-icon:hover {
    background-color: #c0d3e0;
    transform: scale(1.1);
}

.sidebar-icon:active {
    background-color: #a8bdcf;
    transform: scale(0.9);
}

.sidebar-icon img {
    width: 35px;
    height: 35px;
}

.submit-button {
    background-color:rgb(138, 162, 181);
    color: white;
    font-size: 16px;
    padding: 12px 25px;
    border: none;
    border-radius: 25px;
    transition: background-color 0.2s ease;
    margin-top: 10px;
    align-items: center;
    cursor: pointer
}

.submit-button:hover {
    background-color:rgb(114, 138, 155);
}
        

    </style>
</head>
<body>
    <!-- Barra lateral com ícones -->
    <div class="sidebar">
        <button class="sidebar-icon"><img src="ic_pes1.png" alt=""></button>
        <button class="sidebar-icon"><img src="ic_link1.png" alt=""></button>
        <button class="sidebar-icon"><img src="ic_lap1.png" alt=""></button>
        <button class="sidebar-icon"><img src="ic_lupa1.png" alt=""></button>
        <button class="sidebar-icon"><img src="ic_eng1.png" alt=""></button>
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
        
        <div style="text-align: center;">
            <button type="submit" class="submit-button">Inserir link</button>
        </div>
    </form>


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