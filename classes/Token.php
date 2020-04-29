<?php
class Token{
    public static function generate(){
        return $_SESSION['token'] = md5(uniqid());
    }

    public static function check($token){
        $tokenName = $_SESSION['token'];
        if(isset($tokenName) && $token  === $tokenName){
            unset($tokenName);
            return true;
        }
        return false;
    }
}