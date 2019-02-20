<?php

class errors extends Controller{
    public function __construct(){
        parent::__construct();
    }
    public function index(){
        $this->ViewObject->render('errors/index',error_get_last());
    }
}