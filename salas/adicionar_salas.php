<?php 

require_once './config_salas.php';

if (!empty($_POST['capacidade']) && !empty($_POST['nome']) && !empty($_POST['status'])) {

    $capacidade = $_POST['capacidade'];
    $nome = $_POST['nome'];
    $status = $_POST['status'];

    $sql = "INSERT INTO salas (capacidade, nome, status) VALUES (:capacidade, :nome, :status)";
    $stmt = $conn->prepare($sql);
    $stmt->bindValue(':capacidade', $capacidade);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':status', $status);
    $stmt->execute();

    if($stmt->rowCount() > 0){
        header("Location: ./salas.php");
    }else{
        echo "Erro ao tentar adicionar salas!";
    }
} else {
    echo "Por favor, preencha todos os campos.";
}
?>
