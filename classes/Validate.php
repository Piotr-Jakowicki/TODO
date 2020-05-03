<?php
class Validate{
    private $errors = [];
    private $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    public function make($POST, $set = array()){
        foreach($set as $name => $rules){
            $rules = explode('|',$rules);
            foreach ($rules as $rule){
                $rule = explode(':',$rule);
                if($rule[0] == 'required' && $rule[1]){
                    if($POST[$name] == NULL){
                        $this->addError("{$name} field required");
                    }
                }
                if($rule[0] == 'min'){
                    if(strlen($POST[$name]) < $rule[1] ){
                        $this->addError("{$name} too short");
                    }
                }
                if($rule[0] == 'max'){
                    if(strlen($POST[$name]) > $rule[1] ){
                        $this->addError("{$name} too long");
                    }
                }
                if($rule[0] == 'same'){
                    if($POST[$name] != $POST[$rule[1]]){
                        $this->addError("{$name} and {$rule[1]} are not the same");
                    }
                }
                if($rule[0] == 'unique'){
                    $this->db->query('SELECT * FROM users where username = :username');
                    $this->db->bind(':username', $POST[$name]);
                    if($this->db->resultSet()){
                        $this->addError("{$name} already exists");
                    }
                }
            }
        }
    }

    public function addError($str){
        $this->errors[] = $str;
    }

    public function passed(){
        if($this->errors != NULL){
            return false;
        } else {
            return true;
        }
    }

    public function getErrors(){
        return $this->errors;
    }
}
    