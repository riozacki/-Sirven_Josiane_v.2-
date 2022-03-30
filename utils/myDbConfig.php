<?php
    class  MyDbConfig {
        private $host = "localhost";
        private $dbName = "sirven_josiane_v001";
        private $userName = "riozacki";
        private $password = "Domino777.";
        public $connect;

        public  function getConnection() {
            $this->connect = null;
            try {
                $this->connect = new PDO("mysql:host=".$this->host."; dbname=".$this->dbName, $this->userName, $this->password);
                $this->connect->exec("set names utf8");
            } catch(PDOException $exception) {
                echo "Erreur de connexion".$exception->getMessage();
            }
            return $this->connect;
        }
    }
?>











