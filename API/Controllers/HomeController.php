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

        public function createJWT()
        {
            $jwt = new JWT();
            $data = [
                'jwt' => $jwt->create('pr0duct!!!')
            ];

            $this->returnJson($data);
        }

        public function getJWT()
        {
            $jwt = new JWT();
            $response['jwt'] = $jwt->create('pr0duct!!!');

            $this->returnJson($response);
        }
    }
