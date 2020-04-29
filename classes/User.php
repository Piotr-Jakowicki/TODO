<?php
interface UserInterface{
    public function register(array $fields);
    public function login(string $username, string $password);
    public function logout();
}
class User implements UserInterface{
    private $db;
    private $stmt;
    private $sql;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function register(array $fields){
        $this->db->query("INSERT INTO users (username, password, name) VALUES (:username, :password, :name)");
        $this->db->bind(':username',$fields['username']);
        $this->db->bind(':password',$fields['password']);
        $this->db->bind(':name',$fields['name']);
        $this->db->execute();
    }

    public function login(string $username, string $password){
        //TODO
    }

    public function logout(){
        //TODO
    }
    


}