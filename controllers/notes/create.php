<?php
require("Validator.php");
$config=require("config.php");

$db=new Database($config['database']);
$heading="Create note";
dd(Validator::email('femi#gmail.com'));
if($_SERVER['REQUEST_METHOD']=='POST'){
    $errors=[];

    if(!Validator::string($_POST['body'],1,400)){
$errors['body']="A body of no more than 400 is required";
    }
  
    if(empty($errors)){
        $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)', [
            'body'=>$_POST['body'],
            'user_id'=>4,
        ]);
    }
    
}
require 'views/notes/create.view.php';

