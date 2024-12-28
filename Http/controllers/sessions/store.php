<?php

use Http\Form\LoginForm;
use Core\Authenticator;
use Core\Session;
//log in the user if the details are found



$email=$_POST['email'];
$password=$_POST['password'];

$form=new LoginForm();

if($form->validate($email, $password)){


if((new Authenticator)->attempt($email, $password))
{
 redirect('/');
}
    $form->error('email','Account not found for email and password');

}

Session::flash('errors', $form->errors());
Session::flash('old',[
    'email'=>$_POST['email'],
]);
return redirect('/login');
//PRG Post, Redirect, Get
// return  view('sessions/create.view.php', ['errors'=>[
//     'errors'=>$form->errors()
// ]]);

