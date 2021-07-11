<?php

    namespace Models;

    use Core\Model;
    
    class DAO extends Model
    {
        // um objeto da classe DAO tem um objeto que guarda a conexão com o banco nele
        protected $db;

        public function __construct()
        {
            global $config;

            try {
                // instanciar o objeto de acesso ao banco
                $this->db = new \PDO(
                    "mysql:dbname={$config['dbname']};host={$config['host']};charset=utf8",
                    $config['dbuser'],
                    $config['dbpass']
                );

                // configurar PDO para exibir erros e exceções
                $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                die("Ops, ocorreu um erro com o banco de dados: {$e->getMessage()}");
            }
        }
    }
