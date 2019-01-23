<?php

use App\Core\Router;

function debug($arg) {
    ?>
        <div style="background: white;"><pre>
            <?php
                echo var_dump($arg);
            ?>
        </pre></div>
    <?php
}

function class_exists_debug($classname) {
    
    if (class_exists($classname)) {
        echo "Exists! <br>";
    } 
    else {
        echo "Class " . $classname . " unexpected! <br>";
    }
}

spl_autoload_register(function($class) {
    $class =  str_replace("\\", "/", __NAMESPACE__ . $class . ".php");
    if (file_exists($class)) {
        echo "<br>INCLUDE: " . $class . "<br>";
        require $class; 

    } 
});
 
$router = new Router();
$router->run();

?>
