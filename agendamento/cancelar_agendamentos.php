<?php
require_once './config_agendamento.php';

if (isset($_GET['sala_id'])) {
    $sala_id = $_GET['sala_id'];

    $sqlCancelAgendamento = "UPDATE agendamentos SET status = 'Cancelado' WHERE sala_id = :sala_id";
    $stmtCancelAgendamento = $conn->prepare($sqlCancelAgendamento);
    $stmtCancelAgendamento->execute(['sala_id' => $sala_id]);

    $sqlDisponivelSala = "UPDATE salas SET Status = 'Disponível' WHERE ID = :sala_id";
    $stmtDisponivelSala = $conn->prepare($sqlDisponivelSala);
    $stmtDisponivelSala->execute(['sala_id' => $sala_id]);

    header('Location: ./agendamentos.php');
    exit();
} else {
    header('Location: ./agendamentos.php');
    exit();
}
?>
