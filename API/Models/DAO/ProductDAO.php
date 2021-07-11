<?php

    namespace Models\DAO;

    use Core\DAO;

    class ProductDAO extends DAO
    {
        public function search($query)
        {
            $data = [];
            $sql = "SELECT price, last_price_update_date FROM products WHERE name = :name";

            $result = $this->db->prepare($sql);
            $result->bindParam(':name', $query);
            $result->execute();

            if ($result->rowCount() > 0) {
                $data = $result->fetchAll(\PDO::FETCH_CLASS, '\Models\Product');
            }

            return $data;
        }
    }
