<?php
class site extends Controller
{
    public $mymodel;
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
        $this->viewobject->msg = array('site.js');
    }
    public function index()
    {
        $allposts=$this->mymodel->select('editor', '*', "", 0);
        $this->viewobject->render(__class__, 'index', $allposts, 0);
    }
}