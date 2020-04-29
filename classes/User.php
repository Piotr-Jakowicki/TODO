<?php
interface UserInterface{
    public function register(array $fields);
    public function login(string $username, string $password);
    public function logout();
}
class User implements UserInterface{
    private $dbh;

    public function __construct()
    {
        $this->dbh = DB::getInstance()->getConnection();
    }

    public function register(array $fields){
        //TODO
    }

    public function login(string $username, string $password){
        //TODO
    }

    public function logout(){
        //TODO
    }
    


}