<?php 

class View {


    public function __contruct(){
        
    }
    public function render($name,$params = array()){
        
        extract($params);
        require("views/$name.php");
        return;
    }
}