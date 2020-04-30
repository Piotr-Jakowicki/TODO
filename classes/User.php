<?php
interface UserInterface{
    public function register(array $fields);
    public function login(string $username, string $password);
    public static function logout();
}
class User implements UserInterface{
    private $db;

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
        $this->db->query('SELECT * FROM users where username = :username');
        $this->db->bind(':username',$username);
        if($this->db->first()){
            $salt = $this->db->first()->salt;
            $this->db->query('SELECT * FROM users where username = :username AND password = :password');
            $this->db->bind(':username',$username);
            $this->db->bind(':password',Hash::make($password,$salt));
            if($this->db->first()){
                $_SESSION['is_Logged_in'] = true;
                $_SESSION['id'] = $this->db->first()->id;
                header('Location: index.php');
            } else {
                echo 'Bledne haslo';
            }
        } else {
            echo 'nie znaleziono uzytkownika';
        }
    }

    public static function logout(){
        session_unset('is_Logged_in');
    }
    
}