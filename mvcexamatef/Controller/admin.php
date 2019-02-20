<?php

class admin extends Controller{

    public $modelObj = null;

    public function __construct($modelObj)
    {
        parent::__construct();
        $this->modelObj = $modelObj;
        $this->viewObj->js=array("admin.js");
    }
    
    public function index(){

        if(Session::getSession("admin_login") == false){
            $headerUrl = root_url."admin/login";
            header("Location: $headerUrl");
        }

        $this->viewObj->render(__CLASS__, 'index', $params = array("dir"=>root_url."Views/admin/"), false);

    }

    public function addPost(){

        $postArray = array("title"=>null,"abstract"=>null,"author"=>null,"content"=>null,"img"=>null);
        $errorArray = array("titleError"=>null,"abstractError"=>null,"authorError"=>null,"contentError"=>null,"imgError"=>null,"dupliError"=>null);

        if(!empty($_POST)){

            $errorArray['titleError'] = FormValidation::input_required($_POST['title'], 'Title');
            $errorArray['titleError'] .= FormValidation::max_length($_POST['title'], 200);
            $errorArray['titleError'] .= FormValidation::avoid_tags($_POST['title']);
            $postArray['title'] = FormValidation::securityTest_input($_POST['title']);
            
            $errorArray['abstractError'] = FormValidation::input_required($_POST['abstract'], 'Abstract');
            $errorArray['abstractError'] .= FormValidation::max_length($_POST['abstract'], 500);
            $errorArray['abstractError'] .= FormValidation::avoid_tags($_POST['abstract']);
            $postArray['abstract'] = FormValidation::securityTest_input($_POST['abstract']);
            
            $errorArray['authorError'] = FormValidation::input_required($_POST['author'], 'Author');
            $errorArray['authorError'] .= FormValidation::max_length($_POST['author'], 200);
            $errorArray['authorError'] .= FormValidation::avoid_tags($_POST['author']);
            $postArray['author'] = FormValidation::securityTest_input($_POST['author']);

            $errorArray['contentError'] = FormValidation::input_required($_POST['content'], 'Content');
            $postArray['content'] = FormValidation::securityTest_editor($_POST['content']);

            if(!array_filter($errorArray)){
                $uploadOk = 'yes';
            }else{
                $uploadOk = 'no';
            }
            
            $errorArray['imgError'] = FormValidation::input_image($_FILES["img"]["name"], 'Views\blog\image\posts_img', 'img', 500000, $uploadOk);
            $errorArray['imgError'] .= FormValidation::max_length($_FILES["img"]["name"], 50);
            $postArray['img'] = FormValidation::securityTest_input($_FILES["img"]["name"]);

            if(!array_filter($errorArray)){
                $this->modelObj->insert('posts', $postArray);
                $postArray = array("title"=>null,"abstract"=>null,"author"=>null,"content"=>null,"img"=>null);
                // $this->viewObj->render(__CLASS__, 'index', $params = array("dir"=>root_url."Views/admin/", "message"=>"Post Added Successfully!"), false);
                echo json_encode(array("errors"=>null, "message"=>"Post Added Succesfully."));
            }else{
                $Error = null;
                foreach($errorArray as $key=>$value){
                    if(!empty($value)){
                        $Error .= $value."<br>";
                    }
                }
                echo json_encode(array("errors"=>$Error, "message"=>null));
            }
        }
    }

    public function login(){
        if(Session::getSession("admin_login") != false){
            $headerUrl = root_url."admin/index";
            header("Location: $headerUrl");
        }

        if(!empty($_POST)){

            var_dump($_POST);
        
            $userName = $_POST['username'];
            $password = $_POST['password'];
            
            $searchResult = $this->modelObj->search('*', 'users', "username='$userName' AND password='$password'", true);

            if($searchResult == null){
                $headerUrl = root_url."admin/login/?error=1";
                header("Location: $headerUrl");
            }else{
                Session::setSession('admin_login', $userName);
                
                $headerUrl = root_url."admin/index";
                header("Location: $headerUrl");
            }

        }
        
        $this->viewObj->render(__CLASS__, 'login', $params = array("dir"=>root_url."Views/admin/"), false);
        
    }

    public function logout(){
        Session::end_session();
        $headerUrl = root_url;
        header("Location: $headerUrl");
    }
}