<?php
namespace Core;
class Router{
    protected $routes=[];
    protected function add($method,$uri,$controller){
        $this->routes[]=[
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=> $method,
            'middleware'=>null
        ];
        return $this;
    }
    public function get($uri, $controller){
       return $this->add('GET', $uri, $controller);

    }
    public function put($uri, $controller){
       return $this->add('PUT', $uri, $controller);

        
    
    }
    public function delete($uri, $controller){
       return $this->add("DELETE", $uri, $controller);
    }
    public function post($uri, $controller){
       return $this->add('POST', $uri, $controller);
    }
    public function patch($uri, $controller){
       return $this->add('PATCH', $uri, $controller);
    }
   public  function only($key){
      $this->routes[array_key_last($this->routes)]['middleware']=$key;
      return $this;
   }
    public function route($uri, $method){
foreach($this->routes as $route){
if($route['uri']==$uri && $route['method']==strtoupper($method)){
    //apply the middleware
    if($route['middleware']=='guest'){
if($_SESSION['user']??false){
    header('location:/');
    exit();
}
    }
    if($route['middleware']=='auth'){
      
            }
    return require base_path($route['controller']);
}

}
$this->abort();

    }
    protected function abort($code=404){
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}

// $routes=require base_path("routes.php");
// $uri=parse_url($_SERVER['REQUEST_URI'])['path'];




// function routeToController($uri, $routes){
//     if(array_key_exists($uri,$routes)){
//         require base_path($routes[$uri]);
//     }else{
//         abort();
//     }
// }


// routeToController($uri, $routes); -->
