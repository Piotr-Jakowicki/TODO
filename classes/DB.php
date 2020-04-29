<?php
class DB{
    private static $instance = null;
    private $con;
    private $stmt;

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

    private function __clone(){}

    private function __wakeup(){}

    public function query($query){
        $this->stmt = $this->con->prepare($query); 
    }

    public function bind($param, $value){
        $this->stmt->bindValue($param, $value);
    }

    public function execute(){
        return $this->stmt->execute();
    }

    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function first(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }
}

