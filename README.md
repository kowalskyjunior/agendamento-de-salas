# Sistema de Agendamento de Salas

Este projeto é um sistema de agendamento de salas de reuniões desenvolvido em PHP e MySQL. O sistema permite que usuários cadastrem agendamentos para salas, garantindo que uma sala já reservada em um determinado horário não possa ser agendada por outro usuário.

## 🚀 Tecnologias Utilizadas

- PHP
- MySQL
- HTML, CSS e JavaScript
- Bootstrap (para estilização)

## 📌 Funcionalidades

- Cadastro de salas de reunião
- Agendamento de horários para as salas
- Bloqueio de horários já reservados
- Listagem de agendamentos
- Exclusão e edição de agendamentos

## 📦 Instalação e Execução

1. Clone o repositório:
   ```sh
   git clone https://github.com/seu-usuario/nome-do-repositorio.git
   ```
2. Entre no diretório do projeto:
   ```sh
   cd nome-do-repositorio
   ```
3. Configure o banco de dados MySQL:
   - Crie um banco de dados chamado `agendamentos`.
   - Importe o arquivo `database.sql` para criar as tabelas necessárias.
   
4. Configure a conexão com o banco no arquivo `config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'seu_usuario');
   define('DB_PASS', 'sua_senha');
   define('DB_NAME', 'agendamentos');
   ```
5. Inicie um servidor local:
   ```sh
   php -S localhost:8000
   ```
6. Acesse o sistema no navegador:
   ```
   http://localhost:8000
   ```



