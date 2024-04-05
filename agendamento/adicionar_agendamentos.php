<?php

require_once './config_agendamento.php';

if (!empty($_POST['sala_id']) && !empty($_POST['data_reuniao']) && !empty($_POST['horario']) && !empty($_POST['nome_organizador']) && !empty($_POST['assunto']) && !empty($_POST['num_participantes'])) {
    $salaId = $_POST['sala_id'];
    $dataReuniao = $_POST['data_reuniao'];
    $horario = $_POST['horario'];
    $organizador = $_POST['nome_organizador'];
    $assunto = $_POST['assunto'];
    $numParticipantes = $_POST['num_participantes'];

    $sql = "SELECT * FROM agendamentos WHERE sala_id = :sala_id AND data_reuniao = :data_reuniao AND horario = :horario";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['sala_id' => $salaId, 'data_reuniao' => $dataReuniao, 'horario' => $horario]);
    $existingAgendamento = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingAgendamento) {
        echo "Desculpe, a sala selecionada já está agendada para o horário escolhido. Por favor, escolha outra sala ou horário.";
        exit; 
    }

    $sql = "UPDATE salas SET Status = 'Indisponível' WHERE ID = :sala_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['sala_id' => $salaId]);

    $sql = "INSERT INTO agendamentos (sala_id, data_reuniao, horario, nome_organizador, assunto, num_participantes) VALUES (:sala_id, :data_reuniao, :horario, :nome_organizador, :assunto, :num_participantes)";
    $stmt = $conn->prepare($sql);
    $stmt->execute(['sala_id' => $salaId, 'data_reuniao' => $dataReuniao, 'horario' => $horario, 'nome_organizador' => $organizador, 'assunto' => $assunto, 'num_participantes' => $numParticipantes]);

    header("Location: ./agendamentos.php");
    exit; 
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
