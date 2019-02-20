<?php

class blog extends Controller{

    public $modelObj = null;

    public function __construct($modelObj)
    {
        parent::__construct();
        $this->modelObj = $modelObj;
        $this->viewObj->postsInfo = array();

    }
    
    public function index(){

        $condition = "";
        $this->viewObj->postsInfo = $this->modelObj->search('*', 'posts', $condition, true);
        
        $this->viewObj->render(__CLASS__, 'index', $params = array(), true);

    }

}