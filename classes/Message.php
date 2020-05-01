<?php
class Message{
    private static $msg = [];

    public static function info($str){
        self::$msg[] = array($str => 'info');
    }

    public static function success($str){
        self::$msg[] = array($str => 'success');
    }
    
    public static function warning($str){
        self::$msg[] = array($str => 'warning');
    }

    public static function danger($str){
        self::$msg[] = array($str => 'danger');
    }

    public function set(){
        return $_SESSION['msg'] = self::$msg;
    }

    public function display(){
        foreach($_SESSION['msg'] as $item){
            foreach($item as $msg => $class){
                echo "<div class='alert alert-{$class} mb-0' role='alert'>
                {$msg}
                </div>";
            }
        }
        unset($_SESSION['msg']);
    }
}
