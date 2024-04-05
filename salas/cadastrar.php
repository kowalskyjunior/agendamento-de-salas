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
        <a class="nav-link active" aria-current="page" href="../agendamento/agendamentos.php">Agendamentos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./salas.php">Salas</a>
      </li>
    </ul>
  </header>


  <div class="d-flex justify-content-end container"> <a style="color: #fff; text-decoration:none; margin-left:.5rem;" href="./salas.php"><button type="button" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>Voltar</button></div></a>

  <div class="container">
    <h3>Cadastrar Sala</h3>
    <form action="./adicionar_salas.php" method="post">
      <div class="form-row">
        <div class="form-group col-md-12 mt-3">
          <label for="inputEmail4">Capacidade de pessoas</label>
          <input type="number" require class="form-control" id="inputEmail4" placeholder="Capacidade de pessoas" name="capacidade">
        </div>
        <div class="form-group col-md-12 mt-3">
          <label for="inputPassword4">Nome da sala</label>
          <input type="text" require class="form-control" id="inputPassword4" placeholder="Nome da sala" name="nome">
        </div>
      </div>
      <div class="form-group mt-3">
        <label for="inputAddress">Status</label>
        <select require name="status" id="inputState" class="form-control">
          <option selected>Disponível</option>
          <option>Indisponível</option>
        </select>
      </div>

      <button onclick="confirmarSala()" type="submit" onsubmit="confirmarSala()" class="btn btn-primary mt-3">Cadastrar</button>
    </form>
  </div>

  <footer class="container text-center py-3">
    <p>&copy; <?php echo date("Y"); ?> Sistema de Agendamento de Sala de Reuniões</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="./assets/js/switchAlert.js"></script>

</body>

</html>