<?php

use Core\Database;
use Core\Validator;
use Core\App;
use Core\Authenticator;


$email=$_POST['email'];
$password=$_POST['password'];
//valdate the form inputs
if(!Validator::email($email)){
$errors['email']='Please provide a valid email address';
}
if(!Validator::string($password, 7, 255)){
    $errors['password']='Please provide a password of atleast 7 characters';
    }
    if(!empty($errors)){
        return view('registration/create.view.php', ['errors'=>$errors]);
    }
$db=App::resolve(Database::class);
    //check if the account already exist;
    $user=$db->query('select * from users where email= :email', [
        'email'=>$email
    ])->find();
    //dd($user);
//if yes, redirect to a login page
if($user){
    
    header('location:/');
    exit();
}else{
    //insert the user into the database
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
"email"=>$email,
"password"=>password_hash($password,PASSWORD_BCRYPT)
    ]);
(new Authenticator)->login($user);
   // dd($_SESSION['user']);
    header('location:/');
    exit();
}