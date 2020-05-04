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
        $data = $this->getUser('username', $username);
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
            Message::danger('User not found');
        }
        Message::set();
    }

    public function update($table, $name){
        $this->db->query("UPDATE users SET {$table} = :name WHERE id = :id");
        $this->db->bind(':name',$name);
        $this->db->bind(':id',$_SESSION['id']);
        $this->db->execute();
    }
    
    public function getUser($mode, $value){
        $this->db->query("SELECT * FROM users where {$mode} = :value");
        $this->db->bind(':value',$value);
        $this->db->execute();
        return $this->db->first();
    }

    public function checkPassword($password){
        $data = $this->getUser('id', $_SESSION['id']);
        if(Hash::make($password, $data->salt) == $data->password){
            return true;
        }
    }

    public function changePassword($password){
        $salt = Hash::salt(32);
        $this->db->query("UPDATE users SET password = :password, salt = :salt WHERE id = :id");
        $this->db->bind(':id',$_SESSION['id']);
        $this->db->bind(':password', Hash::make($password, $salt));
        $this->db->bind(':salt',$salt);
        $this->db->execute();
    }
    
    public static function logout(){
        session_unset();
        session_destroy();
    }
    
}