<?php

    namespace Controllers;

    use Core\Controller;
    use Models\JWT;

    class HomeController extends Controller
    {
        public function index()
        {
            $data = [
                'nome' => 'André Moura',
                'idade' => 30
            ];

            return $this->returnJson($data);
        }

        // método responsáel por devolver uma resposta com o token de autenticação
        public function getJWT()
        {
            $jwt = new JWT();
            $response['jwt'] = $jwt->create('pr0duct!!!');

            $this->returnJson($response);
        }
    }
