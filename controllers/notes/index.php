<?php 
use Core\Database;

$config=require base_path("config.php");

$db=new Database($config['database']);


$notes=$db->query('select * from notes where user_id=4')->get();
//dd($notes);
view( "notes/index.view.php",[
    'heading'=>'My Notes',
    'notes'=>$notes
]);