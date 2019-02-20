<?php

$url = $_SERVER["REQUEST_URI"];

$url = trim($url, "/");
$lenRoot = strlen(root_addr."/");
$url = substr($url, $lenRoot);

$array = explode("/", $url);
// var_dump($array);

// var_dump(ucfirst($array[0])."_model");

if($array[0] != null){
    if(file_exists("Controller/".$array[0].".php")){
        require "Controller/".$array[0].".php";
        $model = ucfirst($array[0])."_model";
        require "Model/".$model.".php";
    }else{
        // echo "Page Not Found!";
        $errorClass = error_controller;
        $rootAddress = root_addr;
        $errorArray = array('type'=>"404", 'message'=>"THE PAGE", 'file'=>"WAS NOT FOUND", 'line'=>"BACK TO HOME PAGE");
        $errorObj = new $errorClass($errorArray);
        $errorObj->index();
        die;
    }
}else{
    $headerUrl = root_url.first_page;
    header("Location: $headerUrl");
}

if($array[0] != error_controller){
    $currentModel = new $model;
    $currentController = new $array[0]($currentModel);
}else{
    $currentController = new $array[0](); 
}

if(!isset($array[1])){
    $array[1] = "index";
}

$currentMethod = $array[1];

if(method_exists($currentController, $currentMethod)){
    if(isset($array[3])){
        $currentController->$currentMethod($array[2],$array[3]);
    }
    if(isset($array[2])){
        $currentController->$currentMethod($array[2]);
    }else{
        $currentController->$currentMethod();
    }
}else{
    // echo "Page Not Found!";
    $errorClass = error_controller;
    $rootAddress = root_addr;
    $errorArray = array('type'=>"404", 'message'=>"THE PAGE", 'file'=>"WAS NOT FOUND", 'line'=>"BACK TO HOME PAGE");
    $errorObj = new $errorClass($errorArray);
    $errorObj->index();
    die;
}