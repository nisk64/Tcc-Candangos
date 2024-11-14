<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>

</head>
<body align="center">
    
    

    <form class="fundo" action="" method="post">

        <h1>Logi</h1>
        <label for="">Usuário:</label>
        <input type="text" name='txtusuario' >
<br><br>
        <label for="">  Senha:    </label>
        <input type="password" name='txtsenha'>
<br><br>
        <button type="submit" name='chacar.php'>Logar</button>
        <button type="reset">Limpar</button> <br><br>

        <p>Caso não possua <a href="cadastro.php">cadastro</a></p>
    </form>


<?php
    // Inicia a sessão
    session_start();

    // Configurações de conexão
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "login";

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

     // Verificar se o usuário já existe no banco de dados
     $sql = "SELECT * FROM tblCadastro WHERE cadUsuario = ? OR cadEmail = ?";
     $stmt = $conn->prepare($sql);
     if ($stmt === false) {
         die('Erro na preparação da consulta: ' . $conn->error);
     }


    // Processa o formulário após o envio
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['txtusuario'];
        $senha = $_POST['txtsenha'];

        // Prepara a consulta para verificar se o usuário existe
        $stmt = $conn->prepare("SELECT * FROM tblCadastro WHERE cadUsuario = ? AND cadSenha = ?");
        $stmt->bind_param("ss", $usuario, $senha);
        $stmt->execute();
        $result = $stmt->get_result();
        
    
    
        // Verifica se algum registro foi retornado
        if ($result && $result->num_rows > 0) {
            // Se encontrou um usuário válido, faz login
            $_SESSION['usuario'] = $usuario;  // Armazena o usuário na sessão
        
            // Exibe um uma mensagem de boas vindas com o nome do usuário e leva para a página inicial do site
            echo "<script>
                    alert('Bem-vindo, " . htmlspecialchars($usuario) . "!');
                    window.location.href = 'pagina1.php'; // Redireciona para a página1
                  </script>";
        } else {
            // Se não encontrar nenhum usuário ou se houve erro
            echo 'Erro nas informações cadastrais.';
        }
        
    }

        // Fecha o statement
        $stmt->close();
    

    // Fecha a conexão
    $conn->close();
    ?>
</body>
</html>