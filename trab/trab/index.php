<?php
// Definindo as variáveis de conexão com o banco de dados.
$servidor = "localhost";  // Endereço do servidor do banco de dados.
$usuario = "root";        // Usuário do banco de dados.
$senha = "";              // Senha do banco de dados.
$db = "comp_link_uteis";      // Nome do banco de dados

// Estabelecendo a conexão com o banco de dados.
$conexao = mysqli_connect($servidor, $usuario, $senha, $db);



// Iniciar sessão
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegando o e-mail do formulário
    $email = trim($_POST["email"]);

    // Validando o campo
    if (empty($email)) {
        $email_err = "Por favor, insira um e-mail.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_err = "E-mail inválido.";
    } else {
        // Salvando na sessão (se quiser usar depois)
        $_SESSION["email"] = $email;

        // Redirecionando
        header("Location: ad_url.php");
        exit;
    }
}


// Variáveis para armazenar mensagens de erro e valores de entrada
$email = $password = "";
$email_err = $password_err = $login_err = "";


?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Linkstack - Login</title>
    <link rel="icon" type="image/png" href="imagem.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e2730;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        
        .login-container {
            width: 100%;
            max-width: 340px;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .logo {
            width: 80px;
            height: 80px;
            margin: 0 auto 15px;
            display: block;
        }
        
        .brand-name {
            color: #8aa2b5;
            font-size: 24px;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .login-options {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .btn {
            display: flex;
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 25px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            justify-content: center;
            align-items: center;
        }
        
        .btn-vk {
            background-color: #4a76a8;
            color: white;
        }
        
        .btn-apple {
            background-color: white;
            color: black;
        }
        
        .btn-google {
            background-color: white;
            color: black;
        }
        
        .divider {
            display: flex;
            align-items: center;
            width: 100%;
            margin: 15px 0;
            color: #8aa2b5;
        }
        
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #3a4a5a;
        }
        
        .divider span {
            padding: 0 10px;
            font-size: 14px;
        }
        
        .email-form {
            width: 100%;
        }
        
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 25px;
            border: none;
            background-color: white;
            box-sizing: border-box;
            font-size: 14px;
        }
        
        .btn-next {
            background-color: #00c853;
            color: white;
        }
        
        .register-link {
            margin-top: 15px;
            text-align: center;
            width: 100%;
        }
        
        .register-link a {
            color: #4a9ced;
            text-decoration: none;
            font-size: 14px;
        }
        
        .error-message {
            color: #ff5252;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
            width: 100%;
        }
        
        .icon {
            margin-right: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-4xJPbZWdJIo2UqC1WGvfT0az69XzxW.png" alt="Linkstack Logo" class="logo">
        <div class="brand-name">Linkstack</div>
        
        <?php 
        if(!empty($login_err)){
            echo '<div class="error-message">' . $login_err . '</div>';
        }        
        ?>

        <div class="login-options">
            <a href="#" class="btn btn-vk">
                <span class="icon">VK</span> Continuar com VK
            </a>
            
            <a href="#" class="btn btn-apple">
                <svg class="icon" width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M16.365 1.43c0 1.14-.493 2.27-1.177 3.08-.744.9-1.99 1.57-2.987 1.57-.12 0-.23-.02-.3-.03-.01-.06-.04-.22-.04-.39 0-1.15.572-2.27 1.206-2.98.804-.94 2.142-1.64 3.248-1.68.03.13.05.28.05.43zm4.565 15.71c-.03.07-.463 1.58-1.518 3.12-.945 1.34-1.94 2.71-3.43 2.71-1.517 0-1.9-.88-3.63-.88-1.698 0-2.302.91-3.67.91-1.377 0-2.332-1.26-3.428-2.8-1.287-1.82-2.323-4.63-2.323-7.28 0-4.28 2.797-6.55 5.552-6.55 1.448 0 2.675.95 3.6.95.865 0 2.222-1.01 3.902-1.01.613 0 2.886.06 4.374 2.19-.13.09-2.383 1.37-2.383 4.19 0 3.26 2.854 4.42 2.955 4.45z" />
                </svg>
                Continuar com Apple
            </a>
            
            <a href="#" class="btn btn-google">
                <svg class="icon" width="16" height="16" viewBox="0 0 24 24">
                    <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                    <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                    <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                    <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                </svg>
                Continuar com Google
            </a>
            
            <div class="divider">
                <span>ou</span>
            </div>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="email-form">
                <input type="email" name="email" value="<?php echo $email; ?>" placeholder="E-mail">
                <span class="error-message"><?php echo $email_err; ?></span>
                
                <button type="submit" class="btn btn-next">Próximo</button>


            </form>
            
            <div class="register-link">
                <a href="register.php">Sem conta? Inscreva-se agora></a>
            </div>
        </div>
    </div>
</body>
</html>