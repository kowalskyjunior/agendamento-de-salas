<?php
require_once './config_salas.php';

if (isset($_GET['ID'])) {
    $sala_id = $_GET['ID'];

    $sql = "SELECT * FROM salas WHERE ID = :ID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':ID', $sala_id);
    $stmt->execute();
    $sala = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($sala) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $capacidade = $_POST['capacidade'];
            $nome = $_POST['nome'];
            $status = $_POST['status'];

            $sql = "UPDATE salas SET Capacidade = :capacidade, Nome = :nome, Status = :status WHERE ID = :ID";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':capacidade', $capacidade);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':ID', $sala_id);
            $stmt->execute();

            header("Location: salas.php");
            exit;
        }
    } else {
        echo "Sala não encontrada.";
        exit;
    }
} else {
    echo "ID de sala não especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Sala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-end container"> <a style="color: #fff; text-decoration:none; margin-left:.5rem;" href="./salas.php"><button type="button" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg>Voltar</button></div></a>
        <h1>Editar Sala</h1>
        <form action="editar_sala.php?ID=<?php echo $sala_id; ?>" method="POST">
            <div class="form-row">
                <div class="form-group col-md-12 mt-3">
                    <label for="inputEmail4">Capacidade de pessoas</label>
                    <input type="number" require class="form-control" id="inputEmail4" placeholder="Capacidade" name="capacidade" value="<?php echo $sala['Capacidade']; ?>">
                </div>
                <div class="form-group col-md-12 mt-3">
                    <label for="inputPassword4">Nome da sala</label>
                    <input type="text" require class="form-control" id="inputPassword4" placeholder="Nome da sala" name="nome" value="<?php echo $sala['Nome']; ?>">
                </div>
            </div>
            <div class="form-group mt-3">
                <label for="inputAddress">Status</label>
                <select require name="status" id="inputState" class="form-control" value="<?php echo $sala['Status']; ?>">
                    <option selected>Disponível</option>
                    <option>Indisponível</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>