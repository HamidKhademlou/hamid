<?php 

class site extends Controller{

    // public $a = 10;
    public $mymodel = null;
    public function __construct($model)
    {
        parent :: __construct();

        $this->mymodel=$model;
    }

    public function index(){
        $myuser = $this->mymodel->searchuser("'navid'");
        echo "<br>";
        var_dump($myuser);//اینجا وردامپ نمیده
        $this->ViewObject->render('site/index',$myuser);
        //  require ("views/site/index.php");
        //  return;
       }
    

    // public function sum($b){
    //     $c = 0;
    //     // $x = explode(', ', $b);
    //     foreach($b as $key=>$value){        
    //         $c += $value;
    //     }
    //     return $c;
    // }

//      public function index1(){
//         $this->ModelObject->render('site/index');
//         //  require ("views/site/index.php");
//         //  return;
//  }
} 
