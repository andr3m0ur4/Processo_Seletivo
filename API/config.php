<?php

    require 'environment.php';

    $config = [];

    // configurações da aplicação para acesso banco de dados
    // todas as alterações devem ser feitas aqui
    if (ENVIRONMENT == 'development') {
        define('BASE_URL', 'http://localhost');
        $config = [
            'dbname' => 'processo_seletivo',        // nome banco de dados
            'host' => '10.0.0.105',                 // domínio do banco de dados
            'dbuser' => 'andre-moura',              // usuário do banco de dados
            'dbpass' => 'andre',                    // senha do banco de dados
            'jwt_secret_key' => 'andre-moura!'      // chave secreta jwt da aplicação
        ];
    } else {
        define('BASE_URL', 'https://meusite.com.br');
        $config = [
            'dbname' => 'estrutura_mvc',            // nome banco de dados
            'host' => 'localhost',                  // domínio do banco de dados
            'dbuser' => 'andre-moura',              // usuário do banco de dados
            'dbpass' => 'andre',                    // senha do banco de dados
            'jwt_secret_key' => 'andre-moura!'      // chave secreta jwt da aplicação
        ];
    }

    global $db;
