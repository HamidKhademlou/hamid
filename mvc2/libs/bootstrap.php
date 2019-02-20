<?php
$uri = $_SERVER["REQUEST_URI"];
$url = trim($uri, "/");
$request = explode("/", $url);

if (file_exists('controllers/' . $request[2] . '.php')) {
    require('controllers/' . $request[2] . '.php');
    $model = ucfirst($request[2]) . "_model";
    require('models/' . $model . '.php');
}
$currentmodel = new $model;
$currentcontroller = new $request[2]($currentmodel);
$currentfunction = $request[3];
$inp = array_slice($request, 4);
if (method_exists($currentcontroller, $currentfunction)) {
    $currentcontroller->$currentfunction($inp);
}