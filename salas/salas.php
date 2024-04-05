<?php

require_once './config_salas.php';
$sql = 'SELECT * FROM salas';
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

<script>
  function confirmarExclusao(salaID) {
    if (confirm("Tem certeza que deseja excluir esta sala?")) {
      window.location.href = "excluir_sala.php?ID=" + salaID;
    } else {
      return false;
    }
  }
</script>

<body>
  <header class="container py-3 shadow-sm p-3 mb-5 bg-white rounded">
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="../agendamento/agendamentos.php">Agendamentos</a>
      </li>
      <li class="nav-item">
        <a style="text-decoration: underline;" class="nav-link" href="./salas.php">Salas</a>
      </li>
    </ul>
  </header>

  <div class="d-flex justify-content-end container"><a style="color: #fff; text-decoration:none;" href="./cadastrar.php"><button type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
        </svg>Adicionar</button></div></a>

  <table class="table table-striped container text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Capacidade de pessoas</th>
        <th scope="col">Nome da Sala</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($salas as $salas) { ?>

        <tr>
          <th scope="row"><?php echo $salas['ID']; ?></th>
          <td><?php echo $salas['Capacidade']; ?></td>
          <td><?php echo $salas['Nome']; ?></td>

          <td>
            <?php if ($salas['Status'] == 'Disponível') { ?>
              <button type="button" class="btn btn-success btn-sm">Disponível</button>
            <?php } else { ?>
              <button type="button" class="btn btn-danger btn-sm">Indisponível</button>
            <?php } ?>
          </td>

          <td>
            <a href="./editar_sala.php?ID=<?php echo $salas['ID']; ?>"><button class="btn btn-primary btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                </svg></button></a>

            <button class="btn btn-danger btn-sm" onclick="confirmDelete()">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
              </svg>
            </button>

          </td>
          </td>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <footer class="container text-center py-3">
    <p>&copy; <?php echo date("Y"); ?> Sistema de Agendamento de Sala de Reuniões</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    function confirmDelete(salaID) {
      Swal.fire({
        title: "Deletar a sala?",
        text: "Não poderá desfazer.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Deletar"
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            title: "Deletada!",
            text: "Sala deletada com sucesso.",
            icon: "success"
          });
          window.location.href = `excluir_sala.php?ID=<?php echo $salas['ID']; ?>`
        }
      });
    }
  </script>

</body>

</html>