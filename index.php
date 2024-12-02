<?php
require "functions.php";
require "Database.php";

require "router.php";

require "Response.php";


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
