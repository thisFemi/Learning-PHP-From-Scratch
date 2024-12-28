<?php
use Core\Authenticator;
//log out the user
$auth=new Authenticator();
$auth->logout();
header('location:/');
exit();