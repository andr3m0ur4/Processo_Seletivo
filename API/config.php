<?php

    require 'environment.php';

    $config = [];

    if (ENVIRONMENT == 'development') {
        define('BASE_URL', 'http://localhost');
        $config = [
            'dbname' => 'processo_seletivo',
            'host' => '10.0.0.105',
            'dbuser' => 'andre-moura',
            'dbpass' => 'andre',
            'jwt_secret_key' => 'andre-moura!'
        ];
    } else {
        define('BASE_URL', 'https://meusite.com.br');
        $config = [
            'dbname' => 'estrutura_mvc',
            'host' => 'localhost',
            'dbuser' => 'andre-moura',
            'dbpass' => 'andre',
            'jwt_secret_key' => 'andre-moura!'
        ];
    }

    global $db;
