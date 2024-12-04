<?php 
use Core\Database;
// include base_path ("Response.php");
$config=require base_path("config.php");

$db=new Database($config['database']);




$note=$db->query('select * from notes where id= :id',[
    // 'user'=>4,
    'id'=>$_GET['id']])->findOrFail();
//dd($notes);
$currentUserId=4;
authorize($note['user_id']==$currentUserId);
// if($note['user_id']!=$currentUserId){
//     abort(Response::FORBIDDEN);
// }


view( "notes/show.view.php",[
    'heading'=>'Note',
    'notes'=>$note
]);