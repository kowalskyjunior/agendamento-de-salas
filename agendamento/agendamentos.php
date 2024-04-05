<?php

require_once './config_agendamento.php';
$sql = 'SELECT a.sala_id, a.data_reuniao, a.nome_organizador, a.num_participantes, a.status, a.horario, a.assunto, s.Nome as nome_sala 
        FROM agendamentos a
        INNER JOIN salas s ON a.sala_id = s.ID';
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
        <a class="nav-link active" aria-current="page" href="#" style="text-decoration: underline;">Agendamentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../salas/salas.php">Salas</a>
      </li>
    </ul>
  </header>

  <div class="d-flex justify-content-end container"><a style="color: #fff; text-decoration:none;" href="./cadastrar_agendamentos.php"><button type="button" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
          <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
        </svg>Adicionar</button></div></a>

  <table class="table table-responsive container text-center ">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Sala</th>
        <th scope="col">Data</th>
        <th scope="col">Organizador</th>
        <th scope="col">Horário da Reunião</th>
        <th scope="col">Assunto</th>
        <th scope="col">n.º de Participantes</th>
        <th scope="col">Status</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($salas as $agendamentos) { ?>
        <tr>
          <th scope="row"><?php echo $agendamentos['sala_id'] ?></th>
          <td><?php echo $agendamentos['nome_sala'] ?></td>
          <td><?php echo $agendamentos['data_reuniao'] ?></td>
          <td><?php echo $agendamentos['nome_organizador'] ?></td>
          <td><?php echo $agendamentos['horario'] ?></td>
          <td><?php echo $agendamentos['assunto'] ?></td>
          <td><?php echo $agendamentos['num_participantes'] ?></td>
          <td><?php if ($agendamentos['status'] == 'Ativo') { ?>
              <button type="button" class="btn btn-success btn-sm">Ativo</button>
            <?php } else { ?>
              <button type="button" class="btn btn-danger btn-sm">Cancelado</button>
            <?php } ?>
          </td>

          <td>
            <a href="./editar_agendamento.php?sala_id=<?php echo $agendamentos['sala_id']; ?>">
              <button type="button" class="btn btn-primary btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                </svg>
              </button>
            </a>

            <button onclick="confirmCancelAgendamento(<?php echo $agendamentos['sala_id']; ?>)" type="button" class="btn btn-danger btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
                <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
              </svg></button>

          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function confirmCancelAgendamento(salaID) {
      Swal.fire({
        title: "Cancelar Agendamento?",
        text: "Esta ação irá cancelar o agendamento.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Sim, cancelar"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = `cancelar_agendamentos.php?sala_id=${salaID}`;
        }
      });
    }
  </script>
  <footer class="container text-center py-3">
    <p>&copy; <?php echo date("Y"); ?> Sistema de Agendamento de Sala de Reuniões</p>
  </footer>