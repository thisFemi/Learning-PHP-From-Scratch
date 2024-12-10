<?php

use Core\Validator;
use Core\App;
use Core\Database;
// include base_path ("Response.php");
// $config=require base_path("config.php");

// $db=new Database($config['database']);
$db=App::resolve(Database::class);
$errors=[];
if(!Validator::string($_POST['body'],1,400)){
    $errors['body']="A body of no more than 400 is required";
        }
        if(!empty($errors)){
            return view( "notes/create.view.php",[
                'heading'=>'Create note',
                'notes'=>$errors
            ]);
        }

      
    
            $db->query('INSERT INTO notes(body,user_id) VALUES(:body, :user_id)', [
                'body'=>$_POST['body'],
                'user_id'=>4,
            ]);
            header('location:/notes');
            die();
        