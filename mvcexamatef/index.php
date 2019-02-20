<?php
// database define:
define("db_username", "root");
define("db_password", "");
define("db_name", "mvc_blog");
define("db_server", "Localhost");
    
//Error controller class name: 
define("error_controller", "errors");;

//Model suffix class names:
define("model_suffix", "_model");

// addr define:
define("root_addr", "maktab/mvcexam(blog)");
define("theme_addr", "Views/theme");
define("first_page", "blog/index");
define("root_url", $_SERVER['REQUEST_SCHEME']."://".$_SERVER['HTTP_HOST']."/".root_addr."/");
define("html_assets_url", root_url.theme_addr."/");

// requires:
require_once "Libs/Session.php";
require_once "Libs/FormValidation.php";
require_once "Libs/Model.php";
require_once "Libs/View.php";
require_once "Libs/Controller.php";

require_once "Libs/router.php";