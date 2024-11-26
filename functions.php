<?php
function urlIs($value){
    return $_SERVER['REQUEST_URI']==$value;
}

function dd($data){
    return var_dump($data);
}