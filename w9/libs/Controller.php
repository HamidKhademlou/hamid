<?php 

class Controller {

  public $ViewObject=null;
   
  public function __construct(){

    $this->ViewObject= new View();
  }

}