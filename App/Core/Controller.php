<?php

namespace App\Controllers


abstract class Controller {
    public $route;
    public $view;

    public function __construct($route) {
        $this->route = $route;
    }

}

?>
