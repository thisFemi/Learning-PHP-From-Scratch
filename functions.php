
<?php

function urlIs($value){
    return $_SERVER['REQUEST_URI']==$value;
}

function dd($data){
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
   die();
}

function authorize($condition, $status=Response::FORBIDDEN){
    if(!$condition){
        abort( $status);
    }
}