<?php

    session_start();

    // configurar headers para permitir o acesso de um domínio externo
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Headers: jwt, Content-Type');

    require '../config.php';
    require '../routers.php';
    require '../vendor/autoload.php';

    $core = new Core\Core();
    $core->run();
