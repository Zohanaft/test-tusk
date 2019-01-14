<?php
namespace App\Core;

class Router {

    public $routes = [];
    public $controller;
    public $params;

    public function __construct() {
        $routes = require "App/config/routes.php";
        foreach ($routes as $route => $params) {
            $this->add('/' . $route, $params);
        }
    }

    public function add($route, $params) {
        $route = "#^" . $route . "$#";
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = $_SERVER["REQUEST_SERVER_URI"];
        foreach ($this->routes as $route => $params) {
            if(preg_match($route, $url, $matches)){
                $this->params = $params;      
            }
        }
    }

    public function run() {
        if ($this->match()) {
            $path ='App/Controllers//' . ucfirst($this->params['controller']);
            echo $path;
            if (class_exists($path)) {
                $action = $this->params["action"] . "Action";
                if (method_exists($action)) {
                    $controller = new $path($this->params);
                }
            }
        }
    }
}

?>
