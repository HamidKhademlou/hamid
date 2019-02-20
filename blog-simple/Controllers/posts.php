<?php
class posts extends Controller{
    public $mymodel = null;
    public function __construct($model,$n)
    {
        parent::__construct();
        $this->mymodel = $model;

        $id = $this->mymodel->GetBlogPosts("'$n'");
        echo "<br>";
        $this->ViewObject->render('posts/index', $id);
    }

    // public function index($n)
    // {
        
    // }
}
?>