<?php

    namespace Core;

    use Models\Product;

    class Controller
    {
        public function getMethod()
        {
            return $_SERVER['REQUEST_METHOD'];
        }

        public function getRequestData()
        {
            // obter cada um dos verbos principais do HTTP
            switch ($this->getMethod()) {
                case 'GET':
                    return $_GET;
                    break;

                case 'PUT':
                case 'DELETE':
                    $data = json_decode(file_get_contents('php://input'));
                    return (array) $data;
                    break;

                case 'POST':
                    $data = json_decode(file_get_contents('php://input'));

                    $data = is_null($data) ? $_POST : $data;

                    return (array) $data;
                    break;
            }
        }

        public function returnJson($array)
        {
            // conversão em json
            header('Content-Type: application/json');
            echo json_encode($array);
            exit;
        }
    }
