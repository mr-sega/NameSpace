<?php
require_once 'autoloader.php';
/* spl_autoload_register(function ($class){
    var_dump($class);
   $class = str_replace('Hillel','src', $class ) . '.php';
    $class = str_replace('\\','/', $class );

    require_once $path;
   //var_dump($path);
   //require_once "src\Models\Color.php";
}); */

//new \Hillel\Models\Color();
$rgb = new Hillel\ValueObject\RGB();
var_dump($rgb);
