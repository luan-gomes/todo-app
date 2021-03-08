## Orientações para Configuração do Ambiente

Esta aplicação foi construída utilizando Laravel, Vue.js e MySQL. Sendo assim, antes de mais nada, é necessário ter em sua máquina as seguintes ferramentas: PHP, os gerenciadores de pacotes Composer e NPM, Node.js, o banco MySQL e algum SGBD que suporte o banco em questão.

-   [Composer](https://getcomposer.org/).
-   [Node + NPM](https://nodejs.org/en/).

## Passo a passo

-   Fazer o git clone do projeto;
-   Rodar o comando "composer install";
-   Executar o comando "npm install";

-   Criar o Banco de Dados;
-   Configurar no arquivo .env os seguintes campos com as informações do banco de dados criados:

    DB_CONNECTION=
    DB_HOST=
    DB_PORT=
    DB_DATABASE=
    DB_USERNAME=
    DB_PASSWORD=

-   Executar o comando "php artisan serv" para subir um servidor local ou utilizar um de sua preferência.
