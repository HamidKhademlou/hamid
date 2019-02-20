<?php 

class Site_model extends Model{

 private $flagConnection=null;   

 public function  __construct(){
    $this->flagConnection= parent::__construct();
    // $this->InsertToUser();
    // $this->searchuser('ali');
 }

 public function InsertToUser(){
     $username="hamid";
     $password="111111";
     $alluser=array();
     $alluser['username']=$username;
     $alluser['password']=$password;
     $this->insert($alluser,'users');
 }

 public function searchuser($username){

    $rows = $this->select('users','*',"username = $username",1);
    // // var_dump($rows);   echo "<br>";
    // $atts = explode(', ' ,$attr);
    // foreach($rows as $key=>$value){foreach($atts as $ke=>$val){
    //     echo "$val $key : ".$value[$val]."<br>";}
    var_dump($rows);
    return $rows;

 }
}