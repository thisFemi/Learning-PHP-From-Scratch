<?php 
use Core\App;
use Core\Database;
// include base_path ("Response.php");
// $config=require base_path("config.php");

// $db=new Database($config['database']);
$db=App::resolve(Database::class);




$note=$db->query('select * from notes where id= :id',[
    // 'user'=>4,
    'id'=>$_GET['id']])->findOrFail();
//dd($note);
$currentUserId=4;
authorize($note['user_id']==$currentUserId);
// if($note['user_id']!=$currentUserId){
//     abort(Response::FORBIDDEN);
// }


view( "notes/show.view.php",[
    'heading'=>'Note',
    'note'=>$note
]);