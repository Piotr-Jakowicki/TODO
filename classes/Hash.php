<?php
class Hash{
    public static function make($string, $salt = ''){
        return hash('sha256', $string . $salt);
    }

    public static function salt($string){
        return bin2hex(random_bytes($string));
    }

    public static function unique(){
        return self::make(uniqid());
    }
}