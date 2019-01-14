<?php

use App\Core\Router;

function debug($param) {
?>
<div style ="background: white;"><pre>
<?
    var_dump($param);
?>
</div></pre>
<?php

}

spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class . '.php');
    if (file_exists($class)) {
        require $class;
    }
    else {
        echo "can't open";
    }
});
 
$router = new Router();
$router->run();?>
