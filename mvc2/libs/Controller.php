<?php
class Controller{
public $viewobject=null;
    public function __construct()
    {
        $this->viewobject= new View();
    }
}