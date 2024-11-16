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
            <h2><a href="pagina1.php">Home</a></h2> 
            <h2><a href="pagina_Pac.php">Meus Pacientes</a></h2>
            <h2><a href="pagina_Agenda.php">Agenda</a></h2> 
            <h2><a href="pagina_Pac_Cad.php">Cadastrar Pacientes</a></h2> 
    </div>


<div class="cadastro">
    <h1 align="center">Cadastrar Pacientes</h1>

    


    <form action="" method="post">        
        <!-- Estrutura de pares com .Informacoes -->
        <div class="Informacoes">
            <label for="nome">Nome Paciente:</label>
            <input type="text" id="nome" placeholder="Digite o nome" name="txtNome">
        </div>

        <div class="Informacoes">
            <label for="nascimento">Data de Nascimento:</label>
            <input type="date" id="nascimento" name="txtNasci">
        </div>

        <div class="Informacoes">
            <label for="id">ID Paciente:</label>
            <input type="tel" id="id" placeholder="Digite o ID" name="txtID">
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
            <input type="number" id="telefone" placeholder="(XX) XXXXX-XXXX" required name="txtTelefone">
        </div>

        <div class="Informacoes">
            <label for="observacoes">Observações:</label>
            <input type="text" id="observacoes" placeholder="Insira as observações" name="txtObs">
        </div>
    </form>

    <button type="submit">Cadastrar</button>
    <button type="reset"><a href="pagina_Pac_Cad.php">Limpar</a></button>
</div>



    <!--  <?php
    
    session_start();

    $Nome = $_POST ['txtNome'];
    $Nascimento = $_POST ['txtNasci'];
    $ID = ['txtID'];
    $Comorbidades = $_POST ['txtComorbi'];
    $Endereco = $_POST ['txtEndereco'];
    $Telefone = $_POST ['txtTelefone'];
    $OBS = $_POST ['txtObs'];
    ?>  -->

</body>
</html>