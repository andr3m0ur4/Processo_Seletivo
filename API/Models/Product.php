<?php

    namespace Models;

    use Core\Model;
use DateTime;
use DateTimeZone;

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
            if ($name == 'price') return doubleval($this->$name);

            if ($name == 'last_price_update_date') {
                $date = new DateTime($this->$name, new DateTimeZone('America/Sao_Paulo'));

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
            echo "ID: {$this->id}, Name: {$this->name}, Price: {$this->price}, Data Última Alteração de Preço: {$this->last_price_update_date}";
        }

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
