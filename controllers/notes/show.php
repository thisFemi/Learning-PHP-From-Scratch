<?php 
include("Response.php");
$config=require("config.php");

$db=new Database($config['database']);
$heading="Note";



$note=$db->query('select * from notes where id= :id',[
    // 'user'=>4,
    'id'=>$_GET['id']])->findOrFail();
//dd($notes);
$currentUserId=4;
authorize($note['user_id']==$currentUserId);
// if($note['user_id']!=$currentUserId){
//     abort(Response::FORBIDDEN);
// }
require "views/notes/show.view.php.view.php";