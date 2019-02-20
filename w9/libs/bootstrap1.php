<?php 
//  var_dump($_SERVER["REQUEST_URI"]);
 $request=$_SERVER["REQUEST_URI"];
 $request=explode('/',$request);
//===============controller=================
 if(file_exists('Controllers/'.$request[3].".php"))
 {
     require('Controllers/'.$request[3].".php");
     $model=ucfirst($request[3])."_model";
     require('models/'. $model.".php");
     
 }else{
   require_once('index.php');
   die;
 }
 //================end controller===========
 $currentmodel= new  $model;

$currentcontroller= new $request[3]($currentmodel);

 $currentfunction=$request[4];
if(method_exists($currentcontroller,$currentfunction)){

    if(isset($request[8])){

        $currentcontroller->$currentfunction($request[5],$request[6],$request[7],$request[8]);

    }elseif(isset($request[7])){

        $currentcontroller->$currentfunction($request[5],$request[6],$request[7]);
    
    }elseif(isset($request[6])){

        $currentcontroller->$currentfunction($request[5],$request[6]);
    
    }elseif(isset($request[5])){

        $currentcontroller->$currentfunction($request[5]);
    
    }else{
        $currentcontroller->$currentfunction();
    }
}

