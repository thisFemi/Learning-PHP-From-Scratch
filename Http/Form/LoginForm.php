<?php

namespace Http\Form;
use Core\Validator;
class LoginForm{
    protected $errors=[];
    public function validate($email, $password){
     

        //valdate the form inputs
        if(!Validator::email($email)){
            $this->errors['email']='Please provide a valid email address';
            }
            if(!Validator::string($password, )){
                $this->errors['password']='Please provide a password a valid password';
                }
                return empty($this->errors);
        
    }
    public function errors(){
        return $this->errors;
    }
    public function error($field,$message){
        $this->errors[$field]=$message;
    }
}