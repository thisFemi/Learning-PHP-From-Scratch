<?php
session_start();

const BASE_PATH = __DIR__ .'/../';
require BASE_PATH. "Core/functions.php";


spl_autoload_register(function ($class){
    //Core\Database
   $class= str_replace('\\',DIRECTORY_SEPARATOR,$class);
    require base_path( $class.".php");
});

// require base_path( "Database.php");
// require base_path("Response.php");

require base_path('bootstrap.php');



$router=new \Core\Router();


$routes=require base_path("routes.php");
$uri=parse_url($_SERVER['REQUEST_URI'])['path'];
$method=$_POST['_method']?? $_SERVER['REQUEST_METHOD'];
$router->route($uri,$method ); 

//require base_path( "Core/router.php");




//connect to MYSQL database.
// class Person{
//     public $name;public $age;

//     public function breath(){
//     echo $this->name . "is breathing";
//     }
// }

// $person=new Person();
// $person->name="Femi ";
// $person->age=25;
// $person->breath();
//Connnecting to db, and execute a query.

// $config=require ("config.php");

// $db=new Database($config['database']);

// $id=$_GET['id'];
// $query="select * from posts where id=?";
// $posts=$db->query($query, [$id])->fetch();



//dd($posts);
// foreach($posts as $post){
//     echo "<li>" . $post['title'] ."</li>";
// }
