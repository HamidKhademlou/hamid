<?php

class errors extends Controller{

    public $errorCode = null;
    public $errorMessage = null;
    public $errorFile = null;
    public $errorLine = null;

    public function __construct($lastError=null)
    {
        parent::__construct();
        if($lastError != null){
            extract($lastError);
            if(isset($type)){
                $this->errorCode = $type;
            }
            if(isset($message)){
                $this->errorMessage = $message;
            }
            if(isset($file)){
                $this->errorFile = $file;
            }
            if(isset($line)){
                $this->errorLine = $line;
            }
        }
    }

    public function index(){
        $params = array('errorType'=>$this->errorCode, 'errorMessage'=>$this->errorMessage, 'errorFile'=>$this->errorFile, 'errorLine'=>$this->errorLine);
        $this->viewObj->render(__CLASS__, 'index', $params, false);
    }

}