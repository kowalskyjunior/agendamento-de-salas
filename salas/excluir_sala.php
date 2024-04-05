<?php
require_once './config_salas.php';

if (isset($_GET['ID'])) {
    $sala_id = $_GET['ID'];

    $sql_delete_agendamentos = "DELETE FROM agendamentos WHERE sala_id = :sala_id";
    $stmt_delete_agendamentos = $conn->prepare($sql_delete_agendamentos);
    $stmt_delete_agendamentos->bindParam(':sala_id', $sala_id);
    $stmt_delete_agendamentos->execute();

    $sql_delete_sala = "DELETE FROM salas WHERE ID = :ID";
    $stmt_delete_sala = $conn->prepare($sql_delete_sala);
    $stmt_delete_sala->bindParam(':ID', $sala_id);
    $stmt_delete_sala->execute();

    header("Location: salas.php");
    exit;
} else {
    echo "ID de sala não especificado.";
    exit;
}
?>

