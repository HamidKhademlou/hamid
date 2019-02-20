<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//define
define("db_username", "root");
define("db_password", "");
define("db_Databasename", "blog");
define("db_Servername", $_SERVER["SERVER_NAME"]);

//requires
require_once "libs/Controller.php";
require_once "libs/Model.php";
require_once "libs/View.php";
require "libs/bootstrap1.php";
