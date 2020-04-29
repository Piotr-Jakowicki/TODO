<?php
class DB{
    private static $instance = null;
    private $con;

    private function __construct(){
        try{
            $dsn = 'mysql:dbname=' . DB_NAME .';host=' . DB_HOST;
            $this->con = new PDO($dsn, DB_USER, DB_PASS);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getInstance(){
        if(self::$instance == null){
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public function getConnection(){
        return $this->con;
    }

    private function __clone(){}

    private function __wakeup(){}
}

