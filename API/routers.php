<?php

    // rotas da aplicação, cada end-point precisa ser definido aqui
    global $routes;
    $routes = [
        '/home' => '/home/index',
        '/jwt/get' => '/home/get-JWT',
        '/products/name' => '/product/search-product'
    ];
