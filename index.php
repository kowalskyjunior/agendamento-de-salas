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
                <a class="nav-link active" aria-current="page" href="./agendamento/agendamentos.php">Agendamentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Salas</a>
            </li>
        </ul>
    </header>

    <section class="container d-flex flex-column justify-content-center ">
        <img src="./assets/images/undraw_meeting_re_i53h.svg" style="max-width: 500px; width:100%; height:300px; margin:0px auto; ">
        <h2 style="text-align: center;" class="mt-3">Bem-vindo(a) ao seu Sistema de Agendamento de Salas de Reunião!</h2>
        <a class="btn btn-primary btn-lg mt-3" style="width: 200px; margin: 0 auto" href="./agendamento/agendamentos.php">Agendar um sala</a>
    </section>

    <footer class="container text-center py-3">
        <p>&copy; <?php echo date("Y"); ?> Sistema de Agendamento de Sala de Reuniões</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>