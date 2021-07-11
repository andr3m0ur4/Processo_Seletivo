<?php

    namespace Models\DAO;

    use Models\DAO;

    class ProductDAO extends DAO
    {
        // método para fazer a consulta no banco de dados
        public function search($query)
        {
            $data = [];
            // consulta do banco de dados, o valor recebido do usuário não é passado diretamente
            $sql = "SELECT price, last_price_update_date FROM products WHERE name = :name";

            $result = $this->db->prepare($sql);
            // por meio do método bindParam o valor do usuário eh inserido na consulta, evitando SQL Injection
            $result->bindParam(':name', $query);
            $result->execute();

            if ($result->rowCount() > 0) {
                // converter cada resultado em um objet da classe Product
                $data = $result->fetchAll(\PDO::FETCH_CLASS, '\Models\Product');
            }

            return $data;
        }
    }
