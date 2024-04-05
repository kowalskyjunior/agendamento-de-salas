<?php
require_once './config_agendamento.php';

$sql = "SELECT * FROM salas";
$stmt = $conn->query($sql);
$salas = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Agendamento de Sala de Reuniões</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="container py-3 shadow-sm p-3 mb-5 bg-white rounded">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./agendamentos.php">Agendamentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../salas/salas.php">Salas</a>
            </li>
        </ul>
    </header>

    <div class="d-flex justify-content-end container"> <a style="color: #fff; text-decoration:none; margin-left:.5rem;" href="./agendamentos.php"><button type="button" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>Voltar</button></div></a>

    <div class="container d-flex justify-content-center">
        <form class="container" action="./adicionar_agendamentos.php" method="post">
            <div class="form-row">
                    <h3>Cadastrar Agendamento</h3>
                    <div class=" col-md-12 mt-3">
                        <label for="inputSala">Salas disponíveis</label>
                        <select name="sala_id" class="form-control" id="inputSala">
                            <?php foreach ($salas as $sala) {
                                if ($sala['Status'] == 'Disponível') { ?>
                                    <option value="<?php echo $sala['ID']; ?>"><?php echo $sala['Nome']; ?></option>
                            <?php }
                            } ?>
                        </select>
                    </div>
                    <div class=" col-md-12 mt-3">
                        <label for="inputData">Data da Reunião</label>
                        <input type="date" class="form-control" id="inputData" name="data_reuniao">
                    </div>
                    <div class=" col-md-12 mt-3">
                        <label for="inputHorario">Horário da Reunião</label>
                        <input type="time" class="form-control" id="inputHorario" name="horario">
                    </div>
            </div>
            <div class=" col-md-12 mt-3">
                <label for="inputOrganizador">Nome do Organizador</label>
                <input type="text" class="form-control" id="inputOrganizador" name="nome_organizador">
            </div>
            <div class="form-group col-md-12 mt-3">
                <label for="inputAssunto">Assunto da Reunião</label>
                <input type="text" class="form-control" id="inputAssunto" name="assunto">
            </div>
            <div class="form-group col-md-12 mt-3">
                <label for="inputParticipantes">Número de Participantes</label>
                <input type="number" class="form-control" id="inputParticipantes" name="num_participantes">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
        </form>
    </div>

    <footer class="container text-center py-3">
        <p>&copy; <?php echo date("Y"); ?> Sistema de Agendamento de Sala de Reuniões</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9.3fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
