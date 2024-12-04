<?php
use Core\Database;
use Core\Validator;
//require  base_path("Validator.php");
$config=require base_path("config.php");

$db=new Database($config['database']);

$errors=[];
//dd(Validator::email('femi#gmail.com'));
if($_SERVER['REQUEST_METHOD']=='POST'){


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

view( "notes/create.view.php",[
    'heading'=>'Create note',
    'notes'=>$errors
]);
