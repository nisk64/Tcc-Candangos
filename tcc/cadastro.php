<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=S, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Cadastrar</title>
</head>
<body align="center">
    <form class="fundo" action="cadastro.php" method="post">
        <h1>Cadastrar</h1>
        
        <label for="usuario">Usuário:</label>
        <input type="text" name="txtusuario" required>
        <br><br>

        <label for="senha">Senha:</label>
        <input type="password" name="txtsenha" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" name="txtemail" required>
        <br><br>

        <button type="submit">Salvar</button>
        <button type="reset">Limpar</button>
    </form>

    <?php
    // Inicia a sessão
    session_start();

    // Dados da conexão com o banco de dados
    $servername = "127.0.0.1";
    $username = "root";
    $password = ""; 
    $dbname = "Login";  // Aqui você deve colocar o nome do seu banco de dados

    // Cria a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verifica a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    // Processa o formulário após o envio
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['txtusuario'];
        $senha = $_POST['txtsenha'];
        $email = $_POST['txtemail'];

        // Prepara a consulta SQL
        $stmt = $conn->prepare("INSERT INTO tblCadastro (cadUsuario, cadSenha, cadEmail) VALUES (?, ?, ?)");

        // Verifica se a consulta foi preparada corretamente
        if ($stmt === false) {
            die('Erro na preparação da consulta: ' . $conn->error);
        }

        // Vincula os parâmetros (todos são strings)
        $stmt->bind_param("sss", $usuario, $senha, $email);

        // Executa a consulta
        if ($stmt->execute()) {
            // Caso o cadastro seja bem-sucedido, exibe a mensagem e redireciona
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href='ex1.php';</script>";
            exit();  // Finaliza o script para garantir que não ocorra mais execução
        } else {
            // Caso haja erro na execução da consulta
            echo "Erro ao cadastrar: " . $stmt->error;
        }

        // Fecha o statement após a execução
        $stmt->close(); 
    }

    // Fecha a conexão com o banco de dados
    $conn->close();
    ?>
</body>
</html>
