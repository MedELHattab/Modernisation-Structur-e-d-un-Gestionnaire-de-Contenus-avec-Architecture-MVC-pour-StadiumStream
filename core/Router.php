<?php

class Router
{
    private $controller = 'MVC\TestController';
    private $method = 'index';
    private $param = array();

    public function __construct()
    {
        $this->router();
    }

    public function router()
    {
        // $uri= $_SERVER['REQUEST_URI'];
        $uri= $_GET['url'] ?? ""; 

        $uri= explode('/',trim(strtolower($uri),'/'));
        $a= array_splice($uri,0,1);
           var_dump($uri);
           die();


        if (!empty($uri[0])) {
         
            $controller = $uri[0];
            unset($uri[0]);
            $controller = 'MVC\\' . ucwords($controller).'Controller';
            if (class_exists($controller)) {
                $this->controller = $controller;
                
            } else {
                include '../app/View/404/template_01.php';
                die();
            }
        }
        $class = new $this->controller; 
        if (isset($uri[1])) {
            if (method_exists($class, $uri[1])) {
                $this->method = $uri[1];
                unset($uri[1]);
            }

        }
        if (isset($uri[2])) {
            $this->param = $uri;
        }

        call_user_func_array([$class,$this->method],$this->param);



    }

}