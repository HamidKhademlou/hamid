<?php
define('URL',$_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/hamid/mvc2");
require_once "libs/Controller.php";
require_once "libs/Model.php";
require_once "libs/View.php";
require_once "libs/bootstrap.php";
// var_dump($_GET['url']);