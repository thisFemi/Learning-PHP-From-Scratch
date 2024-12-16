<?php
use Core\Database;
use Core\Validator;
use Core\App;
//log in the user if the details are found


$db=App::resolve(Database::class);
$email=$_POST['email'];
$password=$_POST['password'];
$errors=[];

//valdate the form inputs
if(!Validator::email($email)){
    $errors['email']='Please provide a valid email address';
    }
    if(!Validator::string($password, )){
        $errors['password']='Please provide a password a valid password';
        }
        if(!empty($errors)){
            return view('sessions/create.view.php', ['errors'=>$errors]);
        }

        //match the credentials

       $user= $db->query("select * from users where email = :email",['email'=>$email])->find();
if($user){
    if(password_verify($password,$user['password'])){
        login(['email'=>$email]);
    
        header('location:/');
        exit();
    }
}
//check the password


return  view('sessions/create.view.php', ['errors'=>[
    'errors'=>'Account not found for email and password',
]]);