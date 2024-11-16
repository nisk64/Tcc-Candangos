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
    </div>
<br>

      <div class="cadastro">
    <h1  align="center"> Cadastrar Pacientes</h1>

    <div class="formulario">
        <form action="" method="post">
            
            <label for="">Nome Paciente</label>
            <input type="text"><br><br>

            <label for="">Data de Nascimento</label>
            <input type="date"><br><br>

            <label for="">ID Paciente</label>
            <input type="tel"><br><br>

            <label for="">Comorbidades</label>
            <input type="text"><br><br>

            <label for="">Endereço</label>
            <input type="text"><br><br>

            <label for="">Telefone</label>
            <input type="number" placeholder="(XX) XXXXX-XXXX" required>

        </form>
    </div> </div>
</body>
</html>