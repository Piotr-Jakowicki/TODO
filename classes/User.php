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
        $salt = Hash::salt(32);
        $this->db->query('INSERT INTO users (username, password, name, salt, joined) VALUES (:username, :password, :name, :salt, :joined)');
        $this->db->bind(':username',$fields['username']);
        $this->db->bind(':password',Hash::make($fields['password'],$salt));
        $this->db->bind(':name',$fields['name']);
        $this->db->bind(':salt',$salt);
        $this->db->bind(':joined',date("Y-m-d H:i:s"));
        $this->db->execute();
    }

    public function login(string $username, string $password){
        //TODO
    }

    public function logout(){
        //TODO
    }
    


}