<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulario.css">
    <title>Meus Pacientes</title>
</head>
<body align="center">

    <div class="cabecalho"> <!-- classe para cabeçalho do site -->
            <h2><a href="pagina_Pac.php">Meus Pacientes</a></h2>
            <h2><a href="pagina_Agenda.php">Agenda</a></h2> 
            <h2><a href="pagina_Pac_Cad.php">Cadastrar Pacientes</a></h2> 
    </div>
    </div>


<div class="cadastro">
    <h1 align="center">Cadastrar Pacientes</h1>

    


    <form action="" method="post">        
      <div class="PacienteCad">
        <br><br>
      <div class="Informacoes">
            <label for="nome">Nome Paciente:</label>
            <input type="text" id="nome" placeholder="Digite o nome" name="txtNome">
        </div>

        <div class="Informacoes">
            <label for="nascimento">Data de Nascimento:</label>
            <input type="date" id="nascimento" name="txtNasci">
        </div>

        <div class="Informacoes">
            <label for="comorbidades">Comorbidades:</label>
            <input type="text" id="comorbidades" placeholder="Digite as comorbidades" name="txtComorbi">
        </div>

        <div class="Informacoes">
            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" placeholder="Digite o endereço" name="txtEndereco">
        </div>

        <div class="Informacoes">
            <label for="telefone">Telefone:</label>
            <input type="tel" id="telefone" placeholder="(XX) XXXXX-XXXX" required name="txtTelefone">
        </div>

        <div class="Informacoes">
            <label for="observacoes">Observações:</label>
            <input type="text" id="observacoes" placeholder="Insira as observações" name="txtObs">
        </div>
    </form>

    <button type="submit" name='btnCad'>Cadastrar</button>
    <button type="reset" ><a href="pagina_Pac_Cad.php">Limpar</a></button> <br><br>
</div>

      </div>   


      <?php
session_start();

// Configuração do banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cadastrarpac";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $Nome = $_POST['txtNome'];
    $Nascimento = $_POST['txtNasci'];
    $Comorbidades = $_POST['txtComorbi'];
    $Endereco = $_POST['txtEndereco'];
    $Telefone = $_POST['txtTelefone'];
    $OBS = $_POST['txtObs'];

    // Verifica se o botão foi clicado
    if (isset($_POST['btnCad'])) {
        // Cria a query para inserir os dados na tabela (por exemplo, `pacientes`)
        $sql = "INSERT INTO tblpaciente (pacNome, pacNascimento, idPaciente, pacComorbidades, pacEndereco, pacTelefone, pacObs) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        // Prepara a query
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $Nome, $Nascimento, $ID, $Comorbidades, $Endereco, $Telefone, $OBS);

        // Executa a query
        if ($stmt->execute()) {
            echo "<script> 
                    alert('Paciente cadastrado');
                    window.location.href = 'pagina_Pac_cad.php'; 
                  </script>"; /* mensagem na tela */
        } else {
            echo "Erro ao cadastrar: " . $stmt->error;
        }

        // Fecha o statement
        $stmt->close();
    } else {
        echo 'Erro: o botão de cadastro não foi acionado.';
    }
}

   
    $conn->close();
    ?>

</body>

</html>