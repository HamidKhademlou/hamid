<?php
class admin extends Controller
{
    public $mymodel = null;
    // seda zadan model
    public function __construct($model)
    {
        parent::__construct();
        $this->mymodel = $model;
        // $this->check_access();
        $this->viewobject->msg = array();
    }

    public function addpost()
    {
        $this->viewobject->render(__class__, 'addpost', $alldata = array(), 0);
        if (isset($_POST["submit"])) {
            $read = array();
            $read["title"] = trim($_POST["title"]);
            $read["body"] = $_POST["myeditor"];
            $read["date"] = date("d M, Y H:i:s");
            $postdata = $this->mymodel->insert("editor", $read);
        }
    }
    public function editpost()
    {
        if (empty($_POST)) {
            $this->viewobject->render(__class__, 'editpost');
        }
        if (isset($_POST["submit"])) {
            $read = array();
            $read["title"] = trim($_POST["title"]);
            $read["body"] = $_POST["myeditor"];
            $read["date"] = date("d M, Y H:i:s");
            $postid= $_POST["postid"];
            $editeddata = $this->mymodel->update("editor", $read, "postid = '$postid'");
            header("Location: " . URL . "/site/index/");
        }

    }

    public function delete()
    {
        $this->mymodel->delete('editor', $_GET['postid']);
    }
}