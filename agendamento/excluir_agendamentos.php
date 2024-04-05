<?php
require_once './config_agendamento.php';

if (isset($_GET['sala_id'])) {
    $sala_id = $_GET['sala_id'];

    try {
        $conn->beginTransaction();

        $sql_delete_agendamentos = "DELETE FROM agendamentos WHERE sala_id = :sala_id";
        $stmt_delete_agendamentos = $conn->prepare($sql_delete_agendamentos);
        $stmt_delete_agendamentos->bindParam(':sala_id', $sala_id);
        $stmt_delete_agendamentos->execute();

        $sql_update_sala = "UPDATE salas SET Status = 'Disponível' WHERE ID = :sala_id";
        $stmt_update_sala = $conn->prepare($sql_update_sala);
        $stmt_update_sala->bindParam(':sala_id', $sala_id);
        $stmt_update_sala->execute();

        $conn->commit();

        header("Location: agendamentos.php");
        exit;
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Erro ao excluir agendamento: " . $e->getMessage();
        exit;
    }
} else {
    echo "ID da sala não especificado.";
    exit;
}
