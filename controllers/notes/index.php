<?php 

use Core\Database;
use Core\App;
// include base_path ("Response.php");
// $config=require base_path("config.php");

// $db=new Database($config['database']);
$db=App::resolve(Database::class);


$notes=$db->query('select * from notes where user_id=4')->get();
//dd($notes);
view( "notes/index.view.php",[
    'heading'=>'My Notes',
    'notes'=>$notes
]);