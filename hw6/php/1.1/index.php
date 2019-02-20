<?php

    //autoload classes:
    function myAutoloader($className)
    {
        // $path = '/path/to/class';
        
        include 'Class.'.$className.'.php';
    }
    spl_autoload_register('myAutoloader');

    $uri = $_SERVER['REQUEST_URI'];
    $host = $_SERVER['HTTP_HOST'];
    $indexAddr = $_SERVER["SCRIPT_NAME"];
    
    $obj = new Controller($uri, $host, $indexAddr);

    echo "<br><br><br>"."--------------------------------------------------"."<br>";
    echo "THIS FILE RUN FROM INDEX.PHP!!!";

?>