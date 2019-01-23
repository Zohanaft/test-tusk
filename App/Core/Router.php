<?php

namespace App\Core;



class Router {

    protected $routes = [];
    protected $params = [];

    public function __construct() {
        $arr = require 'App/Config/routes.php';
        
        foreach ( $arr as $rout => $params ) {
            $this->add( '/' . $rout, $params );
        }
    }

    public function add( $route, $params ) {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match() {
        $url = $_SERVER['REQUEST_URI'];
        echo $url . "<br>";
        foreach ( $this->routes as $route => $params ) {
            if ( preg_match( $route, $url, $matches ) ) {
                echo "MATCHES: ";
                debug($matches);
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    public function run() {
        if ($this->match())
        {
            $path = 'App\\Controllers\\' 
                    . ucfirst($this->params['controller']) 
                    . 'Controller';

            debug($this->routes);

            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';

                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                    echo $action;
                }
                else {
                    View::errorCode(404);
                }
            }
            else {
                View::errorCode(404);
            }
        }
        else {
            View::errorCode(404);
        }
    }
}
?>
