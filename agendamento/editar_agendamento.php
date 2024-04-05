<?php
require_once './config_agendamento.php';

if (isset($_GET['sala_id'])) {
    $agendamento_id = $_GET['sala_id'];

    $sql = "SELECT * FROM agendamentos WHERE sala_id = :sala_id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':sala_id', $agendamento_id);
    $stmt->execute();
    $agendamento = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($agendamento) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data_reuniao = $_POST['data_reuniao'];
            $nome_organizador = $_POST['nome_organizador'];
            $horario = $_POST['horario'];
            $assunto = $_POST['assunto'];
            $num_participantes = $_POST['num_participantes'];

            $sql = "UPDATE agendamentos SET data_reuniao = :data_reuniao, nome_organizador = :nome_organizador, horario = :horario, assunto = :assunto, num_participantes = :num_participantes WHERE sala_id = :sala_id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':data_reuniao', $data_reuniao);
            $stmt->bindParam(':nome_organizador', $nome_organizador);
            $stmt->bindParam(':horario', $horario);
            $stmt->bindParam(':assunto', $assunto);
            $stmt->bindParam(':num_participantes', $num_participantes);
            $stmt->bindParam(':sala_id', $agendamento_id);
            $stmt->execute();

            header("Location: agendamentos.php");
            exit;
        }
    } else {
        echo "Agendamento não encontrado.";
        exit;
    }
} else {
    echo "ID de agendamento não especificado.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Agendamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-end container"> <a style="color: #fff; text-decoration:none; margin-left:.5rem;" href="./agendamentos.php"><button type="button" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg>Voltar</button></div></a>
        <h1>Editar Agendamento</h1>
        <form action="editar_agendamento.php?sala_id=<?php echo $agendamento_id; ?>" method="POST">
            <div class="form-row">
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
                <div class="form-group col-md-12 mt-3">
                    <label for="inputData">Data da Reunião</label>
                    <input type="date" class="form-control" id="inputData" name="data_reuniao" value="<?php echo $agendamento['data_reuniao']; ?>">
                </div>
                <div class="form-group col-md-12 mt-3">
                    <label for="inputHorario">Horário da Reunião</label>
                    <input type="time" class="form-control" id="inputHorario" name="horario" value="<?php echo $agendamento['horario']; ?>">
                </div>
            </div>
            <div class="form-group col-md-12 mt-3">
                <label for="inputOrganizador">Nome do Organizador</label>
                <input type="text" class="form-control" id="inputOrganizador" name="nome_organizador" value="<?php echo $agendamento['nome_organizador']; ?>">
            </div>
            <div class="form-group col-md-12 mt-3">
                <label for="inputAssunto">Assunto da Reunião</label>
                <input type="text" class="form-control" id="inputAssunto" name="assunto" value="<?php echo $agendamento['assunto']; ?>">
            </div>
            <div class="form-group col-md-12 mt-3">
                <label for="inputParticipantes">Número de Participantes</label>
                <input type="number" class="form-control" id="inputParticipantes" name="num_participantes" value="<?php echo $agendamento['num_participantes']; ?>">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>