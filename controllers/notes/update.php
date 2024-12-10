<?php
use Core\App;
use Core\Database;
use Core\Validator;
// include base_path ("Response.php");
// $config=require base_path("config.php");

// $db=new Database($config['database']);
$db=App::resolve(Database::class);




$note=$db->query('select * from notes where id= :id',[
    // 'user'=>4,
    'id'=>$_POST['id']])->findOrFail();
//dd($note);
$currentUserId=4;
authorize($note['user_id']==$currentUserId);
$errors=[];
if(!Validator::string($_POST['body'],1,400)){
    $errors['body']="A body of no more than 400 is required";
        }
        if(count($errors)){
            return view( "notes/edit.view.php",[
                'heading'=>'Edit Note',
                'note'=>$note,

            'errors'=>$errors
            ]);
        }
$db->query('update notes set body = :body where id=:id', [
'id'=>$_POST['id'],
'body'=>$_POST['body']
        ]);
        header('location:/notes');