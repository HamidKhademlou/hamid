<?php

class Controller{

    public $viewObj = null;

    public function __construct()
    {
        $this->viewObj = new View();
        Session::start_session();
    }

    public function check_access($roll, $value, $page, $login){
        if($login == false){
            if(Session::getSession("$roll") != $value){
                $headerUrl = root_url.$page;
                header("Location: $headerUrl");
            }
        }else{
            if(Session::getSession("$roll") == $value){
                $headerUrl = root_url.$page;
                header("Location: $headerUrl");
            }
        }
    }
}