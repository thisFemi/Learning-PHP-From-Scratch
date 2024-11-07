<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            place-items: center;
    height: 100vh;
    margin: 0;
    display: grid;
    font-family: sans-serif;
}
        
    </style>
</head>
<body>
    <h1>
        Recommmeded Books
    </h1>
    <?php 
    $books=[
        ["name"=>"Potters Way",
        "releaseYear"=>2021,
        "author"=>"Femi First Edition","title"=>"Macmillian"  ],

        ["name"=>"Ps Way",
        "releaseYear"=>2024,
        "author"=>"Femi Second Edition","title"=>"Macmillian"  ],
    ];


    function filterByAuthor($books, $author){

$filteredBooks=[];
foreach($books as $book){
    if($book["author"]===$author){
        $filteredBooks[] = $book;
    }
}    return $filteredBooks;
    }
    ?>
    <ul>
      <?php foreach(filterByAuthor($books,"Femi Second Edition") as $book):  ?>
      
            <li>
                <?= $book['name'];?> (<?= $book['releaseYear']?>)
            </li>


<?php endforeach?>
    </ul>



</body>
</html>