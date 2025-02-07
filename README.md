# Sistema de Agendamento de Salas

Este projeto é um sistema de agendamento de salas de reuniões desenvolvido em PHP e MySQL. O sistema permite que usuários cadastrem agendamentos para salas, garantindo que uma sala já reservada em um determinado horário não possa ser agendada por outro usuário.

## 🚀 Tecnologias Utilizadas

- PHP
- MySQL
- XAMPP (para ambiente de desenvolvimento)
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
3. Configure o banco de dados MySQL no XAMPP:
   - Inicie o Apache e o MySQL no painel do XAMPP.
   - Acesse `http://localhost/phpmyadmin` e crie um banco de dados chamado `agendamentos`.
   - Importe o arquivo `database.sql` para criar as tabelas necessárias.
   
4. Configure a conexão com o banco no arquivo `config.php`:
   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'root');
   define('DB_PASS', '');
   define('DB_NAME', 'agendamentos');
   ```
5. Mova os arquivos do projeto para a pasta `htdocs` do XAMPP.
6. Acesse o sistema no navegador:
   ```
   http://localhost/nome-do-repositorio
   ```

