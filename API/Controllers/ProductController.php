<?php

    namespace Controllers;

    use Core\Controller;
    use Models\DAO\ProductDAO;
    use Models\JWT;

    class ProductController extends Controller
    {
        public function searchProduct()
        {
            $response = [
                'error' => false,
                'products' => []
            ];

            // obter o verbo da requisição
            $method = $this->getMethod();
            // obter os dados da requisição
            $data = $this->getRequestData();
            // obter o token de autenticação
            $token = $_SERVER['HTTP_JWT'] ?? null;
            $jwt = new JWT();
            
            if (!empty($token) && $jwt->validate($token)) {
                if ($method == 'GET') {
                    $query = $data['q'] ?? null;
    
                    if ($query) {
                        $dao = new ProductDAO();

                        try {
                            $response['products'] = $dao->search($query);
                        } catch (\Exception $err) {
                            $response['error'] = $err->getMessage();
                        }
                    }
                } else {
                    $response['error'] = 'Método inválido, você precisa usar GET';
                }
            } else {
                $response['error'] = 'Invalid Secred Key';
            }
            

            return $this->returnJson($response);
        }
    }
