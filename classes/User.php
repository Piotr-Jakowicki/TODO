<?php
class User{
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
        $data = $this->db->first();
        if(isset($data->username)){
            $salt = $data->salt;
            if(Hash::make($password, $salt) == $data->password){
                $_SESSION['is_Logged_in'] = true;
                $_SESSION['id'] = $data->id;
                header('Location: dashboard.php');
                exit;
            } else {
                Message::danger('Wronge password');
            }
        } else {
            Message::danger('User not found');;
        }
        Message::set();
    }

    public function update($name){
        $this->db->query('UPDATE users SET users.name = :name WHERE id = :id');
        $this->db->bind(':name',$name);
        $this->db->bind(':id',$_SESSION['id']);
        $this->db->execute();
    }

    public function single($id){
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id',$id);
        $this->db->execute();
        return $this->db->first();
    }

    public static function logout(){
        session_unset('is_Logged_in');
    }
}