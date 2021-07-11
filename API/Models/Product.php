<?php

    namespace Models;

    use Core\Model;

    class Product extends Model implements \JsonSerializable
    {
        // propriedades
        private $id;
        private $name;
        private $price;
        private $last_price_update_date;

        // método construtor
        public function __construct()
        {
            
        }

        // métodos getters e setters
        public function __get($name)
        {
            if ($name == 'price') return doubleval($this->$name);

            if ($name == 'last_price_update_date') {
                $date = new \DateTime($this->$name, new \DateTimeZone('America/Sao_Paulo'));

                return $date->format('d/m/Y');
            }

            return $this->$name;
        }

        public function __set($name, $value)
        {
            $this->$name = $value;
        }

        public function __toString()
        {
            echo "ID: {$this->id}, Name: {$this->name}, Price: {$this->price}, Last Price Update Date: {$this->last_price_update_date}";
        }

        // método da interface JsonSerialize, responsável por obter os dados do objeto na conversão em JSON
        public function jsonSerialize()
        {
            $vars = [];

            foreach (get_object_vars($this) as $key => $value) {
                if ($value) {
                    $vars[$key] = $this->__get($key);
                }
            }

            return $vars;
        }
    }
