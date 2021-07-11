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

            $method = $this->getMethod();
            $data = $this->getRequestData();
            $token = $_SERVER['HTTP_JWT'] ?? null;
            $jwt = new JWT();
            
            if (!empty($token) && $jwt->validate($token)) {
                if ($method == 'GET') {
                    $query = $data['q'] ?? null;
    
                    if ($query) {
                        $dao = new ProductDAO();
                        $response['products'] = $dao->search($query);
                    }
                }
            } else {
                $response['error'] = 'Invalid Secred Key';
            }
            

            return $this->returnJson($response);
        }
    }
