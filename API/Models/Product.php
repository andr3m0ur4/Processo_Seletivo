<?php

    namespace Models;

    use Core\Model;

    class Product extends Model implements \JsonSerializable
    {
        private $id;
        private $name;
        private $price;
        private $last_price_update_date;

        public function __construct()
        {
            
        }

        public function __get($name)
        {
            if ($this->$name) {
                return $this->$name;
            }
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function __toString()
        {
            echo "ID: {$this->id}, Name: {$this->name}, Price: {$this->price}, Data Última Alteração de Preço: {$this->last_price_update_date}";
        }

        public function jsonSerialize()
        {
            $vars = [];

            foreach (get_object_vars($this) as $key => $value) {
                if ($value) $vars[$key] = $value;
            }

            return $vars;
        }
    }
